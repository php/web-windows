<?php
/*This script is called on new uploads, by the build bots */
include __DIR__ . '/../include/config.php';

/* TODO: use exported branches list when available instead */
$active_branches = array('5.3', 'trunk');

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

	$branch_dir = SNAPS_DIR . 'php-' . $branch_name;
	$branch_url = SNAPS_URL . 'php-' . $branch_name;

	echo $branch_dir . '/php-' . $branch_name . '.json' . "\n";
	if (!file_exists($branch_dir . '/php-' . $branch_name . '.json')) {
		echo "cannot read json data\n";
		continue;
	} else {
		echo "processing\n";
	}
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
	$rev_last = $data[$branch_name]['revision_last'];
	$rev_dir = $branch_dir . '/r' . $rev_last;
	$rev_url = $branch_url  . '/r' . $rev_last;
	foreach ($data[$branch_name]['builds'] as $build_name) {
		echo "processing $build_name...\n";
		$build_json = file_get_contents($rev_dir . '/' . $build_name . '.json');
		$build = json_decode($build_json);
		$files = array();
		if ($build->has_php_pkg) {
			$files['php']['url']	= $rev_url . '/php-' . $branch_name . '-' . $build_name . '-r' . $rev_last . '.zip';
			$files['php']['size']	= filesize($rev_dir . '/php-' . $branch_name . '-' . $build_name . '-r' . $rev_last . '.zip');
		}
		if ($build->has_debug_pkg) {
			$files['debug']['url']	= $rev_url . '/php-debug-pack-' . $branch_name . '-' . $build_name . '-r' . $rev_last . '.zip';
			$files['debug']['size']	= filesize($rev_dir . '/php-debug-pack-' . $branch_name . '-' . $build_name . '-r' . $rev_last . '.zip');
			echo $rev_dir . '/php-debug-pack-' . $branch_name . '-' . $build_name . '-r' . $rev_last . '.zip';
		}
		if ($build->has_devel_pkg) {
			$files['devel']['url']	= $rev_url . '/php-devel-pack-' . $branch_name . '-' . $build_name . '-r' . $rev_last . '.zip';
			$files['devel']['size']	= filesize($rev_dir . '/php-devel-pack-' . $branch_name . '-' . $build_name . '-r' . $rev_last . '.zip');
		}
		$data[$branch_name][$build_name]['files'] = $files;
	}
	echo "**********************\n\n";
}

if (0&& !$has_new_revision) {
	echo "Done.\n";
	exit();
}
file_put_contents($data_path, json_encode($data));


$title_page = 'Binaries and sources Snapshots';
ob_start();
include __DIR__ . '/../templates/snaps.php';
$snaps = ob_get_contents();
ob_end_clean();

file_put_contents(DOCROOT . '/snapshot.html', $snaps);
