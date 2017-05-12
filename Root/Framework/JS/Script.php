<?php
	require_once '../API/API.php';
	require_once '../API/IncludeDir.php';

	header('Content-Type: text/javascript');

	includeDir('../JS/', $INCLUDE_TYPE_JS, $INCLUDE_MODE_EMBED, 'base');
	includeDir('../../JS/', $INCLUDE_TYPE_JS, $INCLUDE_MODE_EMBED, 'base');
?>
