<?php
	$imageFileName = '..\\Resource\\'.$id.'\\'.$title.'.'.$ext;
	if($ext == "svg") {
		$svgfile = simplexml_load_file($imageFileName);
		list($NULL, $NULL, $width, $height) = explode(' ', $svgfile['viewBox']);
	}
	else
		list($width, $height, $type, $attr) = getimagesize($imageFileName);
?>
<div class="content-image-container" style='max-height: <?php echo $height; ?>px'>
	<div class='content-image <?php if($center=="true") echo "center"; ?>' style='padding-bottom: <?php echo round($height/$width*100, 2)?>%'>
		<img src='/<?php echo $id.'/'.$title.'.'.$ext ?>' alt='<?php echo $alt ?>'>
	</div>
</div>
