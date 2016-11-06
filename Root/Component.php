<?php

	header('Content-type: application/json; charset=utf-8');

	require "API.php";
	require "ComponentDetails.php";

	if( isset($_GET['mode']) && ($_GET['mode'] === "publish") )
		$bPublish = TRUE;
	else
		$bPublish = FALSE;

	if( isset($_GET['full']) && ($_GET['full'] === "true") )
		$bFull = TRUE;
	else
		$bFull = FALSE;

	$component;
	loadComponents();

	$id = substr(getOrigCall(), 0, -5); //No id w/o .html
	$file = getComponentPath($id);

	ob_start();
	include("Fragment\Path.php");
	$path = ob_get_clean();

	if(endsWith($file, ".php")) {
		$fileContent = file_get_contents($file);
	}
	else {
		ob_start();
		include($file);
		$fileContent = ob_get_clean();
	}

	if( $bPublish ) {
		$cmd = "java -jar ..\Tools\HTML-Compressor.jar -t html --compress-js --js-compressor closure --closure-opt-level simple --compress-css";

		$descriptorspec = array(
		   0 => array("pipe", "r"),
		   1 => array("pipe", "w"),
		   2 => array("pipe", "w"),
		);

		$process = proc_open($cmd, $descriptorspec, $pipes);

		if (is_resource($process)) {

			fwrite($pipes[0], $fileContent);
			fclose($pipes[0]);

			$fileContent = stream_get_contents($pipes[1]);
			fclose($pipes[1]);

			proc_close($process);
		}
	}

	echo "{";
	echo "\"path\":";
	echo json_encode($path);
	echo ",";
	echo "\"xurl\":";
	echo "\"";
	echo getComponentModeXURL($id);
	echo "\"";
	echo ",";
	echo "\"async\":";
	echo "\"";
	echo getComponentModeASYNC($id);
	echo "\"";
	echo ",";
	echo "\"date\":";
	echo "\"";
	echo getFileDate($file);
	echo "\"";
	echo ",";
	echo "\"desc\":";
	echo "\"";
	echo getComponentDesc($id);
	echo "\"";
	echo ",";
	echo "\"content\":";
	echo json_encode($fileContent);
	echo "}";

?>
