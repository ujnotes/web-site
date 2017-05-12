<?php
	require_once '../API/IncludeDir.php';
	if($bPublish) {
?>
	<script>
<?php
		includeDir('../JS/Base/', $INCLUDE_TYPE_JS, $INCLUDE_MODE_EMBED, '');
		includeDir('../../JS/Base/', $INCLUDE_TYPE_JS, $INCLUDE_MODE_EMBED, '');
?>
	</script>
	<script async src='/script.js' defer></script>
<?php
	}
	else {
		includeDir('../../Framework/JS/', $INCLUDE_TYPE_JS, $INCLUDE_MODE_LINK, '');
		includeDir('../../JS/', $INCLUDE_TYPE_JS, $INCLUDE_MODE_LINK, '');
	}
?>
