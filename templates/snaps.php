<?php
include __DIR__ . '/../include/tools.php';

$major_order = array('5.4', '5.3', 'trunk');
$minor_order = array(
		'5.4' => array(
				'nts-windows-vc9-x86',
				'ts-windows-vc9-x86'
			),
		'5.3' => array(
				'nts-windows-vc9-x86',
				'ts-windows-vc9-x86'
			),
		'trunk' => array(
				'nts-windows-vc9-x86',
				'ts-windows-vc9-x86'
			)
	);

$labels = array(
			'nts-windows-vc9-x86' => 'VC9 x86 Non Thread Safe',
			'ts-windows-vc9-x86'  => 'VC9 x86 Thread Safe',
			'nts-windows-vc9-x64' => 'VC9 x64 Non Thread Safe',
			'nts-windows-vc9-x64'  => 'VC9 x64 Thread Safe',

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
if ($_GET['id']) {
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
	<p>Revision: <?php echo $data[$major]['revision_last']; ?></p>
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
		<p>
		<ul>
<?php if (isset($data[$major][$minor]['files'])) { ?>
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
