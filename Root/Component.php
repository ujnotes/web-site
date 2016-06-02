<?php

	header('Content-type: application/json; charset=utf-8');

	require "API.php";
	require "ComponentDetails.php";

	if( isset($_GET['Mode']) && ($_GET['Mode'] === "Publish") )
		$bPublish = TRUE;
	else
		$bPublish = FALSE;

	$component;
	LoadComponents();

	$id = substr(GetOrigCall(), 0, -5); //No id w/o .html
	$file = GetComponentPath($id);
	
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
	echo "\"title\":";
	echo "\"";
	echo GetComponentTitle($id);
	echo "\"";
	echo ",";
	echo "\"xurl\":";
	echo "\"";
	echo GetComponentModeXURL($id);
	echo "\"";
	echo ",";
	echo "\"async\":";
	echo "\"";
	echo GetComponentModeASYNC($id);
	echo "\"";
	echo ",";
	echo "\"date\":";
	echo "\"";
	echo GetFileDate($file);
	echo "\"";
	echo ",";
	echo "\"desc\":";
	echo "\"";
	echo GetComponentDesc($id);
	echo "\"";
	echo ",";
	echo "\"content\":";
	echo json_encode($fileContent);
	echo "}";
	
?>
