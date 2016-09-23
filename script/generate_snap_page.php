<?php
/*This script is called on new uploads, by the build bots */
include __DIR__ . '/../include/config.php';

/* TODO: use exported branches list when available instead */
$active_branches = array('master', '7.1', '7.0', '5.6');

$builds = array(
		'master' => array(
				'nts-windows-vc14-x64',
				'ts-windows-vc14-x64',
				'nts-windows-vc14-x86',
				'ts-windows-vc14-x86'
			),
		'7.1' => array(
				'nts-windows-vc14-x64',
				'ts-windows-vc14-x64',
				'nts-windows-vc14-x86',
				'ts-windows-vc14-x86'
		),
		'7.0' => array(
				'nts-windows-vc14-x64',
				'ts-windows-vc14-x64',
				'nts-windows-vc14-x86',
				'ts-windows-vc14-x86'
		),
		'5.6' => array(
				'nts-windows-vc11-x64',
				'ts-windows-vc11-x64',
				'nts-windows-vc11-x86',
				'ts-windows-vc11-x86'
			),
	);

function parse_meta($path)
{
	$path .= "/*.json";
	$files = glob($path);
	foreach ($files as $file) {
		echo "Build: " . pathinfo($file, PATHINFO_FILENAME) . "\n";
		$json = json_decode(file_get_contents($file));
		return $json;
	}
	return FALSE;
}

$path = "C:/domains/windows.php.net/docroot/downloads/snaps/php-5.6";
$files = glob($path . "/*", GLOB_ONLYDIR);
usort($files, function($a, $b) {
    return filemtime($a) < filemtime($b);
});

$min_time = strtotime("- 1 week");
foreach($files as $file){
	if (filemtime($file) >= $min_time) {
		echo 'revision: ' . basename($file) . " \t " . date('F d Y, H:i:s', filemtime($file)) . "\n";
		parse_meta($file);
		break;
	}
}

$base_dir = SNAPS_DIR;
$data_path = DATA_DIR . '/status.json';

if (file_exists($data_path)) {
	$data = json_decode(file_get_contents($data_path), true);
} else {
	$data = array();
	foreach ($active_branches as $branch_name) {
		$data[$branch_name] = array('revision_last' => NULL);
	}
}
$has_new_revision = FALSE;
$force = true;

foreach ($active_branches as $branch_name) {
	echo "processing $branch_name\n";

	if ($branch_name != 'master') {
		$branch_dir = SNAPS_DIR . 'php-' . $branch_name;
		$branch_url = SNAPS_URL . 'php-' . $branch_name;
		$json_file = $branch_dir . '/php-' . $branch_name . '.json';
	} else {
		$branch_dir = SNAPS_DIR . $branch_name;
		$branch_url = SNAPS_URL . $branch_name;
		$json_file = $branch_dir . '/' . $branch_name . '.json';
	}

	echo $branch_dir . $json_file . "\n";
	if (!file_exists($json_file)) {
		echo "cannot read json data\n" . $branch_dir . '/php-' . $branch_name . '.json' . "\n";
		continue;
	} else {
		echo "processing\n";
	}

	$files = glob($branch_dir . "/*", GLOB_ONLYDIR);
	usort($files, function($a, $b) {
		return filemtime($a) < filemtime($b);
	});
	$file = $files[0];
	echo 'revision: ' . basename($file) . " \t " . date('F d Y, H:i:s', filemtime($file)) . "\n";
	$revision = basename($file);
	$meta = parse_meta($file);
	$force = true;

	$contents = file_get_contents($branch_dir . '/php-' . $branch_name . '.json');
	$new = json_decode($contents, true);
	if ($force || ($new['revision_last'] != $data[$branch_name]['revision_last'])) {
		echo "new revision\n";
		$has_new_revision = true;
		$data[$branch_name] = $new;
	} else {
		echo "no new revision\n";
		echo "**********************\n\n";
		continue;
	}
	$data[$branch_name]['revision_last'] = $revision;
	$data[$branch_name]['build_time'] = date('F d Y, H:i:s', filemtime($file));
	$rev_last = $revision;
	$rev_dir = $branch_dir . '/' . $rev_last;
	$rev_url = $branch_url  . '/' . $rev_last;

	if (!isset($data[$branch_name]['builds'])) {
		$data[$branch_name]['builds'] = $builds[$branch_name];
	}
	foreach ($data[$branch_name]['builds'] as $build_name) {
		echo "**************** processing $build_name...\n";
		$build_json = file_get_contents($rev_dir . '/' . $build_name . '.json');
		echo $rev_dir . '/' . $build_name . '.json' . "\n";
		$build = json_decode($build_json);
		$files = array();

		if ($build->has_php_pkg) {
			$files['php']['url']	= $rev_url . '/php-' . $branch_name . '-' . $build_name . '-' . $rev_last . '.zip';
			$files['php']['size']	= filesize($rev_dir . '/php-' . $branch_name . '-' . $build_name . '-' . $rev_last . '.zip');
		}
		if ($build->has_debug_pkg) {
			$files['debug']['url']	= $rev_url . '/php-debug-pack-' . $branch_name . '-' . $build_name . '-' . $rev_last . '.zip';
			$files['debug']['size']	= filesize($rev_dir . '/php-debug-pack-' . $branch_name . '-' . $build_name . '-' . $rev_last . '.zip');
		}
		if ($build->has_devel_pkg) {
			$files['devel']['url']	= $rev_url . '/php-devel-pack-' . $branch_name . '-' . $build_name . '-' . $rev_last . '.zip';
			$files['devel']['size']	= filesize($rev_dir . '/php-devel-pack-' . $branch_name . '-' . $build_name . '-' . $rev_last . '.zip');
		}
		$data[$branch_name][$build_name]['files'] = $files;
	}
	print_r($files); echo "\n";
	print_r($rev_dir . '/php-' . $branch_name . '-' . $build_name . '-' . $rev_last . '.zip'); echo "\n";
	echo "**********************\n\n";
}

file_put_contents($data_path, json_encode($data));

$title_page = 'Binaries and sources Snapshots';
ob_start();
include __DIR__ . '/../templates/snaps.php';
$snaps = ob_get_contents();
ob_end_clean();

file_put_contents(DOCROOT . '/snapshot.html', $snaps);
