<?php

include __DIR__ . '/../include/config.php';

$mode = isset($_GET['mode']) ? $_GET['mode'] : 'releases';

$nmode = MODE_RELEASE;

switch ($mode) {
	case 'qa':
		$dir_to_parse = 'downloads/qa';
		$title_page = 'Binaries and sources QA Releases';
		$nmode = MODE_QA;
		break;
	/* The snapshot page is currently gets generated. listing2.php seems 
	to be quite outdated, so we just redirect to the correct snapshot page
	instead. */
	case 'snapshots':
	case 'snaps':
		header("Location: /snapshots/");
		//include 'listing2.php';
		exit();
		$dir_to_parse = 'downloads/snaps';
		$title_page = 'Binaries and sources Snapshots';
		$nmode = MODE_SNAP;
		break;
	case 'releases':
	default:
		$dir_to_parse = 'downloads/releases';
		$title_page = 'Binaries and sources Releases';
}

include __DIR__ . '/../include/listing.php';


$baseurl = '/' . $dir_to_parse . '/';

$versions = generate_listing($dir_to_parse, $nmode);
$major_order = array('8.4', '8.3', '8.2', '8.1');
$minor_order = array(
		'8.1' => array(
			'nts-vs16-x64',
			'ts-vs16-x64',
			'nts-vs16-x86',
			'ts-vs16-x86'
		),
		'8.2' => array(
			'nts-vs16-x64',
			'ts-vs16-x64',
			'nts-vs16-x86',
			'ts-vs16-x86'
		),
		'8.3' => array(
			'nts-vs16-x64',
			'ts-vs16-x64',
			'nts-vs16-x86',
			'ts-vs16-x86'
		),
		'8.4' => array(
			'nts-vs17-x64',
			'ts-vs17-x64',
			'nts-vs17-x86',
			'ts-vs17-x86'
		),
	);

$labels = array(
			'nts-VC15-x86' => 'VC15 x86 Non Thread Safe',
			'ts-VC15-x86'  => 'VC15 x86 Thread Safe',
			'nts-VC15-x64' => 'VC15 x64 Non Thread Safe',
			'ts-VC15-x64'  => 'VC15 x64 Thread Safe',
			'nts-vc15-x86' => 'VC15 x86 Non Thread Safe',
			'ts-vc15-x86'  => 'VC15 x86 Thread Safe',
			'nts-vc15-x64' => 'VC15 x64 Non Thread Safe',
			'ts-vc15-x64'  => 'VC15 x64 Thread Safe',
			'nts-vs16-x86' => 'VS16 x86 Non Thread Safe',
			'ts-vs16-x86'  => 'VS16 x86 Thread Safe',
			'nts-vs16-x64' => 'VS16 x64 Non Thread Safe',
			'ts-vs16-x64'  => 'VS16 x64 Thread Safe',
			'nts-vs17-x86' => 'VS17 x86 Non Thread Safe',
			'ts-vs17-x86'  => 'VS17 x86 Thread Safe',
			'nts-vs17-x64' => 'VS17 x64 Non Thread Safe',
			'ts-vs17-x64'  => 'VS17 x64 Thread Safe',
);

if ($mode == 'snapshots') {
	unset($major_order[1]);
}

include TPL_PATH . 'header.php';
include TPL_PATH . 'news_line.php';
?>
            <li id="content">
                <ul id="content-columns">
<?php

include TPL_PATH . 'left_column.php';

?>
                    <li id="main-column">

                        <div class="content">
                            <div class="adv-block"><!-- .adv-block -->
                                <span class="corners-top"><span></span></span>
                                
                                <div class="info entry"><!-- .info -->
                                    <h2 name="top" id="top"><?php echo $title_page; ?></h2>
                                    
                                    <select onchange="window.location.hash=this.options[this.selectedIndex].value">
                                        <option value="top" selected="true">Select an option to direct access...</option>
<?php foreach ($major_order as $major) {?>
	<optgroup label="php-<?php echo '-' . $major; ?>">
<?php foreach ($minor_order[$major] as $minor) { if (!isset($versions[$major]) || !isset($versions[$major][$minor])) continue; ?>
		<option value="php-<?php echo $major . '-' . $minor; ?>"><?php echo $labels[$minor]; ?></option>
<?php } ?>
	</optgroup>
<?php } ?>

                                    </select>
<?php if ($mode == 'release'):?>
                                    <br><br><a href="https://windows.php.net/downloads/releases/archives/">Past releases</a>
<?php endif?>
                                </div><!-- .info -->
                                
                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .adv-block -->

<?php
foreach ($major_order as $major) {
?>
	<div class="block">
	<span class="corners-top"><span></span></span>
	<div class="info entry"> 
	<h3 id="php-<?php echo $major; ?>" name="php-<?php echo $major; ?>" class="summary entry-title">PHP <?php echo $major . (isset($versions[$major]['version']) ? ' (' . $versions[$major]['version'] . ')' : ''); ?></h3>
	<p class="news-date"></p>
<?php
	if (!isset($versions[$major])) {
		echo "$major has no release.<br>";
?>
</div><span class="corners-bottom"><span></span></span></div>
<?php
		continue;
	}
?>
	<p><a href="<?php echo $baseurl . $versions[$major]['source']['path']; ?>">Download source code</a> [<?php echo $versions[$major]['source']['size']; ?>]</p>

<?php 
if (isset($versions[$major]['test_pack'])) { 
?>
	<p><a href="<?php echo $baseurl . $versions[$major]['test_pack']['path']; ?>">Download tests package (phpt)</a> [<?php echo $versions[$major]['test_pack']['size']; ?>]</p>
<?php
}
?>

<?php
	foreach ($minor_order[$major] as $minor) { 
?>

<?php if (isset($versions[$major][$minor])) {
?>
		<div class="innerbox<?= stripos($minor, 'x86') !== false ? ' x86' : ''; ?>">
		<span class="corners-top"><span></span></span>

		<h4 id="php-<?php echo $major . '-' . $minor; ?>" name="php-<?php echo $major . '-' . $minor;?>"><?php echo $labels[$minor]; ?> (<?php echo $versions[$major][$minor]['mtime']; ?>)</h4>
		<p>
		<ul>
		<li>
			<a href="<?php echo $baseurl . $versions[$major][$minor]['zip']['path']; ?>">Zip</a>
		[<?php echo $versions[$major][$minor]['zip']['size']; ?>]<br />
		<span class="md5sum">sha256: <?php echo $versions[$major][$minor]['zip']['sha256']; ?></span>
		</li>
<?php if (isset($versions[$major][$minor]['installer'])) { ?>
		<li>
			<a href="<?php echo $baseurl . $versions[$major][$minor]['installer']['path']; ?>">Installer</a>
		[<?php echo $versions[$major][$minor]['installer']['size']; ?>]<br />
		<span class="md5sum">sha256: <?php echo $versions[$major][$minor]['installer']['sha256']; ?></span>
		</li>
<?php } ?>
<?php if (isset($versions[$major][$minor]['debug_pack'])) { ?>
		<li>
			<a href="<?php echo $baseurl . $versions[$major][$minor]['debug_pack']['path']; ?>">Debug Pack</a>
		[<?php echo $versions[$major][$minor]['debug_pack']['size']; ?>]<br />
		<span class="md5sum">sha256: <?php echo $versions[$major][$minor]['debug_pack']['sha256']; ?></span>
		</li>
<?php } ?>
<?php if (isset($versions[$major][$minor]['devel_pack'])) { ?>
		<li>
			<a href="<?php echo $baseurl . $versions[$major][$minor]['devel_pack']['path']; ?>">Development package (SDK to develop PHP extensions)</a>
		[<?php echo $versions[$major][$minor]['devel_pack']['size']; ?>]<br />
		<span class="md5sum">sha256: <?php echo $versions[$major][$minor]['devel_pack']['sha256']; ?></span>
		</li>
<?php } ?>
		</ul>
<?php
	if ($mode == 'snapshots') {
?>
			<blockquote>
			[<a href="<?php  echo $baseurl . $versions[$major][$minor]['buildconf']; ?>">Buildconf</a>] [<a href="<?php  echo $baseurl . $versions[$major][$minor]['configure']; ?>">Configure</a>] [<a href="<?php  echo $baseurl . $versions[$major][$minor]['compile']; ?>">Compile</a>]
			</blockquote>
<?php
}
?>
			</p>
			<span class="corners-bottom"><span></span></span>
			</div><!-- innerbox -->

	<?php
	}
	?>
	<?php
		}
	?>
		</div>
		<span class="corners-bottom"><span></span></span>
		</div> <!-- block -->
	<?php 
	}
	?>

				    <p class="t-center">
				    </p>
				</div> <!-- .content -->
			    </li><!-- #main-column -->

			</ul> <!-- #content-columns -->
		    </li> <!-- #content -->

<?php

	include TPL_PATH . 'footer.php';

?>
