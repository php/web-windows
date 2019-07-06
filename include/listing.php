<?php

function bytes2string($size, $precision = 2) {
	$sizes = array('YB', 'ZB', 'EB', 'PB', 'TB', 'GB', 'MB', 'kB', 'B');
	$total = count($sizes);

	while($total-- && $size > 1024) $size /= 1024;

	return round($size, $precision).$sizes[$total];
}


function processSha1Sums($path)
{
	if (!file_exists($snaps_dir . 'sha1sum.txt')) {
		return array();
	}
	$sha1sums = file($snaps_dir . 'sha1sum.txt');
	$res = array();
	foreach ($sha1sums as $sha1){
		list($sha1, $file) = explode('  ', $sha1);
		$file = str_replace(array("\r","\n", $snaps_dir), array('','', ''), $file);
		$res[strtolower(basename($file))] = $sha1;
	}
	return $res;
}


function processSha256Sums($path)
{
	if (!file_exists($snaps_dir . 'sha256sum.txt')) {
		return array();
	}
	$sha256sums = file($snaps_dir . 'sha256sum.txt');
	$res = array();
	foreach ($sha256sums as $sha256){
		list($sha256, $file) = preg_split("/\s+\*?/", $sha256);
		$file = str_replace(array("\r","\n", $snaps_dir), array('','', ''), $file);
		$res[strtolower(basename($file))] = $sha256;
	}
	return $res;
}


function parse_file_name($v)
{
	$v = str_replace(array('-Win32', '.zip'), array('', ''), $v);

	$elms = explode('-', $v);
	if (is_numeric($elms[2]) || $elms[2] == 'dev') {
		$version = $elms[1] . '-' . $elms[2];
		$nts = $elms[3] == 'nts' ? 'nts' : false;
		if ($nts) {
			$vc = $elms[4];
			$arch = $elms[5];
		} else {
			$vc = $elms[3];
			$arch = $elms[4];
		}
	} elseif ($elms[2] == 'nts') {
		$nts = 'nts';
		$version = $elms[1];
		$vc = $elms[3];
		$arch = $elms[4];
	} else {
		$nts = false;
		$version = $elms[1];
		$vc = $elms[2];
		$arch = $elms[3];
	}
	if (is_numeric($vc)) {
		$vc = 'VC6';
		$arch = 'x86';
	}
	$t = count($elms) - 1;
	$ts = is_numeric($elms[$t]) ? $elms[$t] : false;

	return array(
			'version'  => $version,
			'version_short'  => substr($version, 0, 3),
			'nts'      => $nts,
			'vc'       => $vc,
			'arch'     => $arch,
			'ts'       => $ts
			);
}

function generate_listing($path, $nmode) {
	$lck = fopen(DATA_DIR . DIRECTORY_SEPARATOR . "site_generate_listing.lock", "wb");
	flock($lck, LOCK_EX);

	if (file_exists($path . '/cache.info')) {
		include $path . '/cache.info';
		flock($lck, LOCK_UN);
		fclose($lck);
		return $releases;
	}

	$old_cwd = getcwd();
	chdir($path);

	$versions = glob('php-[67].*[0-9]-latest.zip');
	if (empty($versions)) {
		$versions = glob('php-[67].*[0-9].zip');
	}

	$releases = array();
	$sha1sums = processSha1Sums($path);
	$sha256sums = processSha256Sums($path);
	foreach ($versions as $file) {
		$file_ori = $file;
		if (MODE_SNAP === $nmode) {
			$file = readlink($file);
		}
		$datetime_str = substr($file, strlen($file) - 16, 12);
		if (!preg_match("/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/", $datetime_str, $m)) {
			$mtime = date('Y-M-d H:i:s', filemtime($file));
		} else {
			$snap_time = date_create();
			$snap_time->setDate($m[1], $m[2], $m[3]);
			$snap_time->setTime( $m[4], $m[5], 0);
			$mtime = date_format($snap_time, 'Y-M-d H:i:s');
			$snap_time_suffix = $m[1] . $m[2] . $m[3] . $m[4] . $m[5];
		}


		$elms = parse_file_name(basename($file));
		$key = ($elms['nts'] ? 'nts-' : 'ts-') . $elms['vc'] . '-' . $elms['arch'];
		$version_short = $elms['version_short'];
		if (!isset($releases['version'])) {
			$releases[$version_short]['version'] = $elms['version'];
		}
		$releases[$version_short][$key]['mtime'] = $mtime;
		$releases[$version_short][$key]['zip'] = array(
				'path' => $file_ori,
				'size' => bytes2string(filesize($file_ori)),
				'sha1' => $sha1sums[strtolower($file_ori)],
				'sha256' => $sha256sums[strtolower($file_ori)]
				);
		$compile = $configure = $buildconf = false;
		if (MODE_SNAP === $nmode) {
			$debug_pack = 'php-debug-pack-' . $elms['version_short'] . ($elms['nts'] ? '-' . $elms['nts'] : '') . '-win32' . ($elms['ts'] ? '-' . $elms['vc'] . '-' . $elms['arch'] . '-latest' : '') . '.zip';
			$installer =  'php-' . $elms['version_short'] . ($elms['nts'] ? '-' . $elms['nts'] : '') . '-win32' . ($elms['ts'] ? '-' . $elms['vc'] . '-' . $elms['arch'] . '-latest' : '') . '.msi';
			$testpack = 'php-test-pack-' . $elms['version_short'] . '-latest.zip';
			$source     = 'php-' . $elms['version_short'] . '/php-' . $elms['version_short'] . '-src-latest.zip';
			$configure  = 'configure-' . $elms['version_short'] . '-' . $elms['vc'] . '-' . $elms['arch'] . '-' . ($elms['nts'] ? $elms['nts'] . '-' : '') .  $snap_time_suffix . '.log';
			$compile    = 'compile-' . $elms['version_short'] . '-' . $elms['vc'] . '-' . $elms['arch'] . '-' . ($elms['nts'] ? $elms['nts'] . '-' : '') . $snap_time_suffix . '.log';
			$buildconf  = 'buildconf-'. $elms['version_short'] . '-' . $elms['vc'] . '-' . $elms['arch'] . '-' . ($elms['nts'] ? $elms['nts'] . '-' : '') . $snap_time_suffix . '.log'; 
		} else {
			$debug_pack = 'php-debug-pack-' . $elms['version'] . ($elms['nts'] ? '-' . $elms['nts'] : '') . '-Win32-' . $elms['vc'] . '-' . $elms['arch'] . ($elms['ts'] ? '-' . $elms['ts'] : '') . '.zip';
			$devel_pack = 'php-devel-pack-' . $elms['version'] . ($elms['nts'] ? '-' . $elms['nts'] : '') . '-Win32-' . $elms['vc'] . '-' . $elms['arch'] . ($elms['ts'] ? '-' . $elms['ts'] : '') . '.zip';
			$installer =  'php-' . $elms['version'] . ($elms['nts'] ? '-' . $elms['nts'] : '') . '-Win32-' . $elms['vc'] . '-' . $elms['arch'] . ($elms['ts'] ? '-' . $elms['ts'] : '') . '.msi';
			$testpack = 'php-test-pack-' . $elms['version'] . '.zip';
			$source = 'php-' . $elms['version'] . '-src.zip';
		}
		if (file_exists($source)) {
			$releases[$version_short]['source'] = array(
					'path' => $source,
					'size' => bytes2string(filesize($source))
					);
		}
		if (file_exists($debug_pack)) {
			$releases[$version_short][$key]['debug_pack'] = array(
					'size' => bytes2string(filesize($debug_pack)),
					'path' => $debug_pack,
					'sha1' => $sha1sums[strtolower($debug_pack)],
					'sha256' => $sha256sums[strtolower($debug_pack)]
						);
		}		
		if (file_exists($devel_pack)) {
			$releases[$version_short][$key]['devel_pack'] = array(
					'size' => bytes2string(filesize($devel_pack)),
					'path' => $devel_pack,
					'sha1' => $sha1sums[strtolower($devel_pack)],
					'sha256' => $sha256sums[strtolower($devel_pack)]
						);
		}
		if (file_exists($installer)) {
			$releases[$version_short][$key]['installer'] = array(
					'size' => bytes2string(filesize($installer)),
					'path' => $installer,
					'sha1' => $sha1sums[strtolower($installer)],
					'sha256' => $sha256sums[strtolower($installer)]
						);
		}
		if (file_exists($testpack)) {
			$releases[$version_short]['test_pack'] = array(
					'size' => bytes2string(filesize($testpack)),
					'path' => $testpack,
					'sha1' => $sha1sums[strtolower($testpack)],
					'sha256' => $sha256sums[strtolower($testpack)]
						);
		}


		if (MODE_SNAP === $nmode) {
			if ($buildconf) {
				$releases[$version_short][$key]['buildconf'] = $buildconf;
			}
			if ($compile) {
				$releases[$version_short][$key]['compile'] = $compile;
			}
			if ($configure) {
				$releases[$version_short][$key]['configure'] = $configure;
			}
		}
	}

	$cache_content = '<?php $releases = ' . var_export($releases, true) . ';';
	$tmp_name = tempnam('.', '_cachinfo');
	file_put_contents($tmp_name, $cache_content);
	rename($tmp_name, 'cache.info');
	chdir($old_cwd);

	if (MODE_RELEASE === $nmode) {
		generate_web_config($releases);
		generate_latest_releases_html($releases);
	}

	flock($lck, LOCK_UN);
	fclose($lck);

	return $releases;
}

function transform_fname_to_latest($fname_real, $ver, $cur_ver)
{
	$ret = implode($ver, explode($cur_ver, $fname_real));
	$ret = str_replace(".zip", "-latest.zip", $ret);

	return $ret;
}

function get_redirection_conf_piece($tpl, $fname_real, $ver, $cur_ver)
{
	$real_fname_path = RELEASES_DIR . $fname_real;
	if (".zip" != substr($fname_real, strlen($fname_real)-4) || !is_file($real_fname_path)) {
		/* This might be something invalid like a partially uploaded file or wrong path, don't generate anything. */
		return "";
	}

	$search = array("REAL_FILENAME", "FAKE_FILENAME");
	$fname_fake = transform_fname_to_latest($fname_real, $ver, $cur_ver);
	$ret = str_replace($search, array($fname_real, $fname_fake), $tpl);

	return $ret . "\n\t\t";
}

function generate_web_config(array $releases = array())
{
	$config_tpl = file_get_contents(TPL_PATH . "/web.config.tpl");
	$redirect_tpl = trim(file_get_contents(TPL_PATH . "/web.config.rewrite.tpl"));

	/* Handle releases. */
	if (empty($releases)) {
		$cache = DOCROOT . "/downloads/releases/cache.info";
		if (!file_exists($cache)) {
			return false;
		}
		include $cache;
	}

	$tmp = "";
	foreach ($releases as $version => $release) {

		$cur_ver = $release["version"];
		unset($release["version"]);

		$tmp .= "\t\t\t<!--  redirect to latest downloads php-$version -->\n\t\t";

		$tmp .= get_redirection_conf_piece($redirect_tpl, $release["source"]["path"], $version, $cur_ver);
		unset($release["source"]);
		
		foreach ($release as $flavour) {
			$tmp .= get_redirection_conf_piece($redirect_tpl, $flavour["zip"]["path"], $version, $cur_ver);
			$tmp .= get_redirection_conf_piece($redirect_tpl, $flavour["debug_pack"]["path"], $version, $cur_ver);
			$tmp .= get_redirection_conf_piece($redirect_tpl, $flavour["devel_pack"]["path"], $version, $cur_ver);
			$tmp .= get_redirection_conf_piece($redirect_tpl, $flavour["test_pack"]["path"], $version, $cur_ver);
		}
	}

	$config_content = str_replace("RELEASES_REDIRECT_TO_LATEST_PLACEHOLDER", $tmp, $config_tpl);


	/* Save generated web.config. */
	$config_path = DOCROOT . "/web.config";
	if (strlen($config_content) !== file_put_contents($config_path, $config_content, LOCK_EX)) {
		return false;
	}

	return true;
}

function generate_latest_html_piece($fname, $ts, $size, $ver, $cur_ver)
{
	$tpl = " DATETIME     SIZE <a href=\"/downloads/releases/latest/FNAME\">FNAME</a>\n";

	$fn = transform_fname_to_latest($fname, $ver, $cur_ver);

	return str_replace(
		array("DATETIME", "SIZE", "FNAME"),
		array(date("m/d/Y h:i A", $ts), (int)$size, $fn),
		$tpl
	);
}

function generate_latest_releases_html(array $releases = array())
{
	$index_html_tpl = trim(file_get_contents(TPL_PATH . "/releases_latest.tpl"));
	$index_html_path = DOCROOT . "/downloads/releases/latest/index.html";

	/* Handle releases. */
	if (empty($releases)) {
		$cache = DOCROOT . "/downloads/releases/cache.info";
		if (!file_exists($cache)) {
			return false;
		}
		include $cache;
	}

	$tmp = "";
	foreach ($releases as $version => $release) {
		$cur_ver = $release["version"];
		unset($release["version"]);

		/* TODO Src date and size should be cached but it's currently absent. */
		$src_path = DOCROOT . "/downloads/releases/" . $release["source"]["path"];
		$src_mtime = isset($release["source"]["mtime"]) ? strtotime($release["source"]["mtime"]) : filemtime($src_path);
		$src_size = isset($release["source"]["size"]) ? ((float)$release["source"]["size"]*1024*1024) : filesize($src_path);
		$tmp .= generate_latest_html_piece($release["source"]["path"], $src_mtime, $src_size, $version, $cur_ver);
		unset($release["source"]);

		foreach ($release as $flavour) {
			$mtime = strtotime($flavour["mtime"]);

			$tmp .= generate_latest_html_piece($flavour["zip"]["path"], $mtime, (float)$flavour["zip"]["size"]*1024*1024, $version, $cur_ver);
			$tmp .= generate_latest_html_piece($flavour["debug_pack"]["path"], $mtime, (float)$flavour["debug_pack"]["size"]*1024*1024, $version, $cur_ver);
			$tmp .= generate_latest_html_piece($flavour["devel_pack"]["path"], $mtime, (float)$flavour["devel_pack"]["size"]*1024*1024, $version, $cur_ver);
			$tmp .= generate_latest_html_piece($flavour["test_pack"]["path"], $mtime, (float)$flavour["test_pack"]["size"]*1024*1024, $version, $cur_ver);
		}
	}

	$index_html_content = str_replace("RELEASES_LIST_PLACEHOLDER", $tmp, $index_html_tpl);

	if (!is_dir(dirname($index_html_path))) {
		if (!mkdir(dirname($index_html_path))) {
			return false;
		}
	}

	if (strlen($index_html_content) !== file_put_contents($index_html_path, $index_html_content, LOCK_EX)) {
		return false;
	}

	return true;
}

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: sw=4 ts=4 fdm=marker
 * vim<600: sw=4 ts=4
 */
