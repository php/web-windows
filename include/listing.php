<?php
function processSha1Sums($snaps_dir)
{
	// Reading and processing the sha1sum file
	if (!file_exists($snaps_dir . 'sha1sum.txt')) {
		return array();
	}
	$sha1sums = file($snaps_dir . 'sha1sum.txt');
	$res = array();
	foreach ($sha1sums as $sha1){
		list($sha1, $file) = explode('  ', $sha1);
		$file = str_replace(array("\r","\n", $snaps_dir), array('','', ''), $file);
		$res[strtolower($file)] = $sha1;
	}
	return $res;
}

function bytes2string($size, $precision = 2) {
	$sizes = array('YB', 'ZB', 'EB', 'PB', 'TB', 'GB', 'MB', 'kB', 'B');
	$total = count($sizes);

	while($total-- && $size > 1024) $size /= 1024;

	return round($size, $precision).$sizes[$total];
}


function buildReleasesCache($snaps_dir, $release=false)
{
	$releases = array();
	$sha1sums = processSha1Sums($snaps_dir);
	$old_dir = getcwd();
	chdir($snaps_dir);

	if ($release) {
		$pattern = '*.zip';
	} else {
		$pattern = '{*-latest.zip}';
	}
	foreach (glob('*.zip') as $file) {
		$lower_file = strtolower($file);

		if (strpos($lower_file, '-debug-pack-') === false && strpos($lower_file, '-src') === false) {
			$basename = str_replace('.zip',  '', $file);
			$elm = explode('-', $basename);
			if (count($elm) > 5) {
				list($package, $full_version, $nts, , $vc, $arch) = $elm;
				$intermediate_version = $nts . '-Win32-'  .  $vc . '-' . $arch;
				$debugpack_file = 'php-debug-pack-' . $full_version . '-' . $intermediate_version . '.zip';
			} else {
				list($package, $full_version, ,$vc, $arch) = $elm;
				$nts = '';
				$intermediate_version = 'Win32-' . $vc . '-' . $arch;
			}
			$intermediate_version_key = str_replace('Win32', 'win32', $intermediate_version);
			$point_version = substr($full_version, 0, 3);

			$mtime = date('Y-M-d H:i:s', filemtime($file));
			if (!array_key_exists($point_version, $releases)) {
				$releases[$point_version] = array(
						'size' => bytes2string(filesize('php-' . $full_version . '-src.zip')),
						'file' =>  'php-' . $full_version . '-src.zip',
						);
			}

			$releases[$point_version][$intermediate_version_key] = array(
					'mtime' => $mtime,
					'size' => bytes2string(filesize($file)),
					'file' => 'php-' . $full_version . '-' . $intermediate_version . '.zip',
					'version' => $full_version,
					'sha1' => $sha1sums[$lower_file],
					);

			$debugpack_file = 'php-debug-pack-' . $full_version . '-' . $intermediate_version . '.zip';
			if (file_exists($debugpack_file)) {
				$releases[$point_version][$intermediate_version_key]['debug-pack'] = array(
						'mtime' => $mtime,
						'size' => bytes2string(filesize($debugpack_file)),
						'file' => $debugpack_file,
						'sha1' => $sha1sums[strtolower($debugpack_file)],
						);

			}

			$installer_file = 'php-' . $full_version . '-' . $intermediate_version . '.msi';

			if (file_exists($installer_file)) {
				$releases[$point_version][$intermediate_version_key]['installer'] = array(
						'mtime' => $mtime,
						'size' => bytes2string(filesize($installer_file)),
						'file' => $installer_file,
						'sha1' => $sha1sums[strtolower($installer_file)],
						);
			}
		}
	}
	$cache_content = '<?php $releases = ' . var_export($releases, true) . ';';

	$tmp_name = tempnam('.', '_cachinfo');
	file_put_contents($tmp_name, $cache_content);
	rename($tmp_name, 'cache.info');
	chdir($old_dir);
	return $releases;
}


function buildSnapsCache($snaps_dir, $release=false)
{
	$releases = array();
	$sha1sums = processSha1Sums($snaps_dir);
	$old_dir = getcwd();
	chdir($snaps_dir);

	if ($release) {
		$pattern = '*.zip';
	} else {
		$pattern = '{*-latest.zip}';
	}

	foreach (glob($pattern, GLOB_BRACE) as $file) {
		$lower_file = strtolower($file);
		// We only process the php-XXX (without dev or debug packs) values
		if (!$release && substr($lower_file, 0, 4) == 'php-' &&  strpos($lower_file, '-latest') !== false && strpos($lower_file, '-debug-pack-') === false) {
			$full_version = substr($file, 4, strrpos($lower_file, '-latest') - 4);
			$point_version = substr($full_version, 0, strpos($full_version, '-'));
			$intermediate_version = substr( 
					$full_version,
					strpos($full_version, $point_version) + strlen($point_version) + 1, 
					strlen($full_version) - strlen($point_version)
					);
			$link = readlink($file);
			$datetime_str = substr($link, strlen($link) - 16, 12);
			if (!preg_match("/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/", $datetime_str, $m)) {
				$mtime = date('Y-M-d H:i:s', filemtime($file));
			} else {
				$snap_time = date_create();
				$snap_time->setDate($m[1], $m[2], $m[3]);
				$snap_time->setTime( $m[4], $m[5], 0);
				$mtime = date_format($snap_time, 'Y-M-d H:i:s');
			}

			if (!array_key_exists($point_version, $releases)) {
				$releases[$point_version] = array(
						'size' => bytes2string(filesize('php-' . $point_version . DIRECTORY_SEPARATOR . 'php-' . $point_version . '-src-latest.zip')),
						'file' => 'php-' . $point_version . '/php-' . $point_version . '-src-latest.zip',
						);
			}
			$releases[$point_version][$intermediate_version] = array(
					'mtime' => $mtime,
					'size' => bytes2string(filesize('php-' . $full_version . '-latest.zip')),
					'buildconf' => 'buildconf-' . str_replace('win32-','',$full_version) . '-latest.log',
					'configure' => 'configure-' . str_replace('win32-','',$full_version) . '-latest.log',
					'compile' => 'compile-' . str_replace('win32-','',$full_version) . '-latest.log',
					'cvs' => 'cvs-' . str_replace('win32-','',$full_version) . '-latest.log',
					'file' => 'php-' . $full_version . '-latest.zip',
					'sha1' => $sha1sums[$lower_file],
					);

			$debugpack_file = 'php-debug-pack-' . $full_version . '-latest.zip';
			if (file_exists($debugpack_file)) {
				$releases[$point_version][$intermediate_version]['debug-pack'] = array(
						'mtime' => $mtime,
						'size' => bytes2string(filesize($debugpack_file)),
						'file' => $debugpack_file,
						'sha1' => $sha1sums[strtolower($debugpack_file)],
						);

			}
			$installer_file = 'php-' . $full_version . '-latest.msi';
			if (file_exists($installer_file)) {
				$releases[$point_version][$intermediate_version]['installer'] = array(
						'mtime' => $mtime,
						'size' => bytes2string(filesize($installer_file)),
						'file' => $installer_file,
						'sha1' => $sha1sums[strtolower($installer_file)],
						);
			}
		}
	}
	$cache_content = '<?php $releases = ' . var_export($releases, true) . ';';

	$tmp_name = tempnam('.', '_cachinfo');
//	file_put_contents($tmp_name, $cache_content);
	rename($tmp_name, 'cache.info');
	chdir($old_dir);
	return $releases;
}


function processSnapsDirectory($snaps_dir, $release = false)
{
	$releases = array();
	$cache_file = $snaps_dir . 'cache.info';
	$expire = 30 * 60 * 1;
	if (1 || ! file_exists($cache_file) || (filemtime($cache_file) + $expire) < time()) {
		@unlink($cache_file);
		if ($release) {
			$releases = buildReleasesCache($snaps_dir, $release);
		} else {
			$releases = buildSnapsCache($snaps_dir, $release);
		}
	} else {
		include $cache_file;
	}

	return $releases;
}


function buildOptionPerReleases($releases, $order)
{
	$str = '';
	foreach ($order as $point_version) {
	//	foreach ($releases as $point_version => $version) {
		$version = $releases[$point_version];
		$str .= '<optgroup label="PHP '.$point_version.'">';

		unset($version['size'], $version['file']);

		foreach ($version as $intermediate_version => $build_version) {
			$str .= '<option value="php-'.$point_version.'-'.$intermediate_version.'">'
				. 'PHP '.$point_version.' '. ucfirst(str_replace('-', ' ', $intermediate_version))
				. '</option>';
		}

		$str .= '</optgroup>';
	}

	return $str;
}


function buildPointVersionBox($point_version, $version, $version_order, $mode = false)
{
	if ($mode == 'release') {
		$path = '/downloads/releases/';
	} elseif ($mode) {
		$path = '/downloads/qa/';
	} else {
		$path = '/downloads/snaps/';
	}
	
	$str = '
		<div class="block"><!-- .block -->
		<span class="corners-top"><span></span></span>
		<div class="info entry"><!-- .info -->
		<h3 id="php-'.$point_version.'" name="php-'.$point_version.'" class="summary entry-title">PHP ' . $point_version . '</h3>
		<p class="news-date"></p>
		<p>
		<a href="' . $path . $version['file'] . '">Download source code</a> [' . $version['size'] . ']
		</p>
		<div>
		';
	unset($version['size'], $version['file']);
	foreach($version_order as $v) {
		if (isset($version[$v])) {
			$str .= buildIntermediateReleaseBox($point_version, $v, $version[$v], $mode);
		}

	}

	$str .= '
		</div>
		</div><!-- .info -->
		<span class="corners-bottom"><span></span></span>
		</div><!-- .block -->
		';


	return $str;
}


function buildIntermediateReleaseBox($point_version, $intermediate_version, $build_version, $release = false)
{
	$version_human = array(
						'win32-VC6-x86' => 'Windows x86 VC6 (thread safe))',
						'nts-win32-VC6-x86' => 'Windows x86 VC6 (non thread safe))',
						'win32-VC9-x86' => 'Windows x86 VC9 (thread safe))',
						'nts-win32-VC9-x86' => 'Windows x86 VC9 (non thread safe))',
						'win32-VC9-x64' => 'Windows x64 VC9 (thread safe))',
						'nts-win32-VC9-x64' => 'Windows x64 VC9 (non thread safe))',
					);

	$intermediate_version_human = $version_human[$intermediate_version];
	if ($release == 'release') {
		$path = '/downloads/releases/';
		$version = $build_version['version'];
	} elseif ($release) {
		$path = '/downloads/qa/';
		$version = $build_version['version'];
	} else {
		$path = '/downloads/snaps/';
		$version = $point_version . ' - ' . ucfirst($intermediate_version_human);
	}
	
	$ret = '
		<div class="innerbox">
		<span class="corners-top"><span></span></span>
		<h4 id="php-'.$point_version.'-'.$intermediate_version.'" name="php-'.$point_version.'-'.$intermediate_version.'">'.ucfirst($intermediate_version_human).'</h4>
		<p>
		<ul>
		<li>
		<a href="' . $path . $build_version['file'].'">PHP ' . $version . '</a>
		['.$build_version['size'].'] -  '.$build_version['mtime'].'<br />
		<span class="md5sum">sha1: '.$build_version['sha1'].'</span>
		</li>';


	if (isset($build_version['installer'])) {	

		$ret .= '<li>
				<a href="' . $path . $build_version['installer']['file'] . '">Installer</a> 
				['.$build_version['installer']['size'].'] -  '.$build_version['installer']['mtime'].'<br />
				<span class="md5sum">sha1: '.$build_version['installer']['sha1'].'</span>';
	}


	if (isset($build_version['debug-pack'])) {	
		$ret .= '</li><li>
				<a href="' . $path . $build_version['debug-pack']['file'].'">Debug Pack</a> 
				['.$build_version['debug-pack']['size'].'] -  '.$build_version['debug-pack']['mtime'].'<br />
				<span class="md5sum">sha1: '.$build_version['debug-pack']['sha1'].'</span>
				';
	}
	if (!$release) {
		$ret .= '<blockquote>
			<strong>Logs:</strong>
			[<a href="' . $path . $build_version['buildconf'].'">BuildConf</a>]
			[<a href="' . $path . $build_version['configure'].'">Configure</a>]
			[<a href="' . $path . $build_version['compile'].'">Compile</a>]
			</blockquote>';
	}

	$ret .= '</li>
			</ul>
			</p>
			<span class="corners-bottom"><span></span></span>
			</div><!-- .innerbox -->
			';

	return $ret;
}

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: sw=4 ts=4 fdm=marker
 * vim<600: sw=4 ts=4
 */
