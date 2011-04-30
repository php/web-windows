<?php
function bytes2string($size, $precision = 2) {
	$sizes = array('YB', 'ZB', 'EB', 'PB', 'TB', 'GB', 'MB', 'kB', 'B');
	$total = count($sizes);

	while($total-- && $size > 1024) $size /= 1024;

	return round($size, $precision).$sizes[$total];
}
