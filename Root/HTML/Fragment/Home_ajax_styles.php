<?php
	// AJAX can insert Home into an older article shell with older inline CSS.
	// Keep the current Home rules with the root JSON response.
	$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
	if (substr($requestPath ?? '', -5) === '.json') {
		echo "<style id='home-ajax-styles'>\n";
		foreach (array('Home.css', 'Home_narrow.css', 'Profile_image.css') as $cssFile) {
			readfile(__DIR__.'/../../CSS/Base/Component/Home/'.$cssFile);
			echo "\n";
		}
		echo "</style>\n";
	}
?>
