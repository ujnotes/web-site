<?php
	require_once '../API/API.php';
	require_once '../API/ComponentDetails.php';
	require_once '../API/Config.php';
	require_once 'Fragment/Item.php';

	$config = loadConfig();

	if( isset($_GET['mode']) && ($_GET['mode'] === "publish") )
		$bPublish = TRUE;
	else
		$bPublish = FALSE;

	if( isset($_GET['full']) && ($_GET['full'] === "true") )
		$bFull = TRUE;
	else
		$bFull = FALSE;

	$component = loadComponents();

	$id = substr(getOrigCall(), 0, -5); //stripping extension part
	$file = getComponentPath($id);
	$desc = getComponentDesc($id);

	header('Content-type: application/json; charset=utf-8');

	ob_start();
	include("..\HTML\Fragment\Path.php");
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
		$cmd = 'java -jar'.' "'.getenv('TIGGU').'\Tools\HTML-Compressor.jar" -t html --compress-js --js-compressor closure --closure-opt-level simple --compress-css';

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
