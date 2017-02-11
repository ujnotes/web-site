<?php
	$imageFileName;
	if(file_exists('..\\Resource\\'.$id.'.'.'jpg'))
		$imageFileName = '..\\Resource\\'.$id.'.'.'jpg';
	else
		$imageFileName = '..\\Resource\\'.$id.'\\'.'Index'.'.'.'jpg';
	list($width, $height, $type, $attr) = getimagesize($imageFileName);
?>
<div class='cover-image' style='padding-bottom: <?php echo round($height/$width*100, 2)?>%'>
	<img src='/<?php echo $id ?>.jpg' alt='<?php echo $alt ?>'>
</div>
