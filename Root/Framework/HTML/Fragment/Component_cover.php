<?php
	$imageFileName;
	$ext;
	if(file_exists('../../Resource/'.$id.'.'.'jpg')) {
		$ext = 'jpg';
		$imageFileName = '../../Resource/'.$id.'.'.'jpg';
	}
	else if(file_exists('../../Resource/'.$id.'.'.'svg')) {
		$ext = 'svg';
		$imageFileName = '../../Resource/'.$id.'.'.'svg';
	}
	else if(file_exists('../../Resource/'.$id.'/'.'Index'.'.'.'jpg')) {
		$ext = 'jpg';
		$imageFileName = '../../Resource/'.$id.'/'.'Index'.'.'.'jpg';
	}
	else if(file_exists('../../Resource/'.$id.'/'.'index'.'.'.'svg')) {
		$ext = 'svg';
		$imageFileName = '../../Resource/'.$id.'/'.'index'.'.'.'svg';
	}
	else {
		echo "&lt; Exception: no cover image &gt;";
		return;
	}

	if($ext == 'svg') {
		$svgfile = simplexml_load_file($imageFileName);
		list($NULL, $NULL, $width, $height) = explode(' ', $svgfile['viewBox']);
	}
	else
		list($width, $height, $type, $attr) = getimagesize($imageFileName);
?>
<div class='cover-image' style='padding-bottom: <?php echo round($height/$width*100, 2)?>%'>
	<img src='/<?php echo $id.'.'.$ext; ?>' alt='<?php echo $alt ?>'>
</div>
