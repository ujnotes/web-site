<?php

function loadConfig() {
	$fHandle = fopen(__DIR__.'\..\..\Config\Vars.tsv', 'r');
	while(($tsvLine = fgetcsv($fHandle, 0, "\t")) !== FALSE) {
		$config[$tsvLine[0]] = $tsvLine[1];
	}

  return $config;
}

?>
