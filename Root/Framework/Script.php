<?php
	require 'Config.php';
	$config = loadConfig();

	header('Content-Type: text/javascript');
?>
var PROJECT_TITLE = '<?php echo $config['project_title']; ?>';
<?php
	$JSRoot = "JS\\";
	$jsFiles = scandir($JSRoot);
	array_shift($jsFiles);
	array_shift($jsFiles);
	foreach ($jsFiles as $jsFile) {
		require $JSRoot.$jsFile;
	};
?>
if (!(window.history && window.history.pushState)) {
	<?php require $JSRoot."History.js"; ?>
}
<?php
	require "..\\".$JSRoot."PageAJAX.js"
?>
