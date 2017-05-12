<?php
	require_once '../API/API.php';
	require_once '../API/IncludeDir.php';
	
	header('Content-Type: text/css');

	includeDir('../CSS/', $INCLUDE_TYPE_CSS, $INCLUDE_MODE_EMBED, 'base');
	includeDir('../../CSS/', $INCLUDE_TYPE_CSS, $INCLUDE_MODE_EMBED, 'base');	
?>
