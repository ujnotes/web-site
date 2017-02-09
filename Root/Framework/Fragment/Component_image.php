<?php
	$imageFileName = '..\\Resource\\'.$id.'\\'.$title.'.'.$ext;
	if($ext == "svg") {
		$svgfile = simplexml_load_file($imageFileName);
		list($x_start, $y_start, $x_end, $y_end) = explode(' ', $svgfile['viewBox']);
		$width = $x_end-$x_start;
		$height = $y_end-$y_start;
	}
	else
		list($width, $height, $type, $attr) = getimagesize($imageFileName);
?>
<div style='max-height: <?php echo $height; ?>px'>
	<div class='content-image <?php if($center=="true") echo ' '."center"; ?>' style='padding-bottom: <?php echo round($height/$width*100, 2)?>%'>
		<img src='/<?php echo $id.'/'.$title.'.'.$ext ?>' alt='<?php echo $alt ?>'>
	</div>
</div>
