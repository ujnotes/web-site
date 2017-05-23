<?php
	require_once '../API/IncludeDir.php';
	if($bPublish) {
?>
	<style type='text/css'>
<?php
		includeDir('../CSS/Base/', $INCLUDE_TYPE_CSS, $INCLUDE_MODE_EMBED, '');
		includeDir('../../CSS/Base/', $INCLUDE_TYPE_CSS, $INCLUDE_MODE_EMBED, '');
?>
	</style>
<?php
		if(hasLink($INCLUDE_TYPE_CSS, '../CSS/', '../../CSS/')) {
?>
	<link rel='stylesheet' type='text/css' href='/style.css' >
<?php
		}
	}
	else {
		includeDir('../../Framework/CSS/', $INCLUDE_TYPE_CSS, $INCLUDE_MODE_LINK, '');
		includeDir('../../CSS/', $INCLUDE_TYPE_CSS, $INCLUDE_MODE_LINK, '');
	}
?>
