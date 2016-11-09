<?php
	header('Content-Type: text/css');

	$CSSRoot = "CSS\\";
	$cssFiles = scandir($CSSRoot);
	array_shift($cssFiles);
	array_shift($cssFiles);
	foreach ($cssFiles as $cssFile) {
		require $CSSRoot.'\\'.$cssFile;
	};
?>
