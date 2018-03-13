<?php
include __DIR__ . '/../include/tools.php';

$major_order = array('7.2', '7.1', '7.0', '5.6', 'master');
$minor_order = array(
		'master' => array(
				'nts-windows-vc15-x64',
				'ts-windows-vc15-x64',
				'nts-windows-vc15-x86',
				'ts-windows-vc15-x86',
				'nts-windows-vc15-x64-avx',
				'ts-windows-vc15-x64-avx',
		),
		'7.2' => array(
				'nts-windows-vc15-x64',
				'ts-windows-vc15-x64',
				'nts-windows-vc15-x86',
				'ts-windows-vc15-x86'
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

$labels = array(
			'nts-windows-vc9-x86' => 'VC9 x86 Non Thread Safe',
			'ts-windows-vc9-x86'  => 'VC9 x86 Thread Safe',
			'nts-windows-vc11-x86' => 'VC11 x86 Non Thread Safe',
			'ts-windows-vc11-x86'  => 'VC11 x86 Thread Safe',
			'nts-windows-vc11-x64' => 'VC11 x64 Non Thread Safe',
			'ts-windows-vc11-x64'  => 'VC11 x64 Thread Safe',
			'nts-windows-vc14-x86' => 'VC14 x86 Non Thread Safe',
			'ts-windows-vc14-x86'  => 'VC14 x86 Thread Safe',
			'nts-windows-vc14-x64' => 'VC14 x64 Non Thread Safe',
			'ts-windows-vc14-x64'  => 'VC14 x64 Thread Safe',
			'nts-windows-vc15-x86' => 'VC15 x86 Non Thread Safe',
			'ts-windows-vc15-x86'  => 'VC15 x86 Thread Safe',
			'nts-windows-vc15-x64' => 'VC15 x64 Non Thread Safe',
			'ts-windows-vc15-x64'  => 'VC15 x64 Thread Safe',
			'nts-windows-vc15-x64-avx' => 'VC15 x64 AVX Non Thread Safe',
			'ts-windows-vc15-x64-avx'  => 'VC15 x64 AVX Thread Safe',
);

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
	<optgroup label="php-<?php echo $major; ?>">
<?php foreach ($minor_order[$major] as $minor) { if (!isset($data[$major]) || !isset($data[$major][$minor])) continue; ?>
		<option value="php-<?php echo $major . '-' . $minor; ?>"><?php echo $labels[$minor]; ?></option>
<?php } ?>
	</optgroup>
<?php } ?>

                                    </select>
                                </div><!-- .info -->
                                
                                <span class="corners-bottom"><span></span></span>
                            </div><!-- .adv-block -->

<?php
if (isset($_GET["id"]) && $_GET['id']) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
foreach ($major_order as $major) {
?>
	<div class="block">
	<span class="corners-top"><span></span></span>
	<div class="info entry"> 
	<h3 id="php-<?php echo $major; ?>" name="php-<?php echo $major; ?>" class="summary entry-title">PHP <?php echo $major . (isset($versions[$major]['version']) ? ' (' . $versions[$major]['version'] . ')' : ''); ?></h3>
	<p class="news-date"></p>
<?php
	if (!isset($data[$major])) {
		echo "$major has no release.<br>";
?>
</div><span class="corners-bottom"><span></span></span></div>
<?php
		continue;
	}
?>
	<p>Revision: <?php echo $data[$major]['revision_last']; ?> (<?php echo $data[$major]['build_time']; ?>)</p>
<?php
if (0) {
?>
	<p>Source: <a href="<?php echo $baseurl . $versions[$major]['source']['path']; ?>">Download source code</a> [<?php echo $versions[$major]['source']['size']; ?>]</p>

<?php
}
	foreach ($minor_order[$major] as $minor) { 
?>

<?php if (isset($data[$major][$minor])) {
?>
		<div class="innerbox">
		<span class="corners-top"><span></span></span>

		<h4 id="php-<?php echo $major . '-' . $minor; ?>" name="php-<?php echo $major . '-' . $minor;?>"><?php echo $labels[$minor]; ?> </h4>
		<?php if (substr($minor, strlen($minor)-3) == 'avx') echo "<p><b>WARNING!</b> These builds are experimental and require a CPU with the AVX instruction set.</p>"; ?>
		<p>
		<ul>
<?php if (isset($data[$major][$minor]['files']) && $data[$major][$minor]['files']['php']['size'] > 0) { ?>
		<li>
			<a href="<?php echo $data[$major][$minor]['files']['php']['url']; ?>">Zip</a>
			[<?php echo bytes2string($data[$major][$minor]['files']['php']['size']); ?>]<br />
		</li>
		<li>
			<a href="<?php echo $data[$major][$minor]['files']['debug']['url']; ?>">Debug Pack</a>
			[<?php echo bytes2string($data[$major][$minor]['files']['debug']['size']); ?>]<br />
		</li>
		<li>
			<a href="<?php echo $data[$major][$minor]['files']['devel']['url']; ?>">Development package (SDK to develop PHP extensions)</a>
			[<?php echo bytes2string($data[$major][$minor]['files']['devel']['size']); ?>]<br />
		</li>
<?php } else { ?>
Build missing or in progress.

<?php } ?>
		</ul> 

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
