<?php
	$INCLUDE_MODE_EMBED = 'embed';
	$INCLUDE_MODE_LINK = 'include';
	$INCLUDE_TYPE_CSS = 'css';
	$INCLUDE_TYPE_JS = 'js';
	
	function includeDir($fileRoot, $type, $mode, $exclude) {
		global $INCLUDE_MODE_EMBED;
		global $INCLUDE_MODE_LINK;
		global $INCLUDE_TYPE_CSS;
		global $INCLUDE_TYPE_JS;
		$INCLUDE_TYPE_EXT = [$INCLUDE_TYPE_CSS => 'css', $INCLUDE_TYPE_JS => 'js'];
		
		$files = loadFiles($fileRoot);
		foreach ($files as $file) {
			if(!in_array(strtolower($file), [$exclude, 'link', 'fragment'])) {
				if(is_dir($fileRoot.$file) == 1) {
					includeDir($fileRoot.$file.'/', $type, $mode, $exclude);
				}
				else if(matchExt($file, $INCLUDE_TYPE_EXT[$type])) {
					if($mode == $INCLUDE_MODE_EMBED) {
						require $fileRoot.$file;
					}
					else if ($mode == $INCLUDE_MODE_LINK) {
						$filePathRoot = substr($fileRoot, 5);
						if ($type == $INCLUDE_TYPE_CSS) {
?>
	<link rel='stylesheet' type='text/css' href='<?php echo $filePathRoot.$file ?>' >
<?php
						}
						else if ($type == $INCLUDE_TYPE_JS) {
?>
	<script async src='<?php echo $filePathRoot.$file ?>'></script>
<?php
						}
						else {
							// log error
						}
					}
					else {
						// log error
					}
				}
			}
		}
	}
?>
