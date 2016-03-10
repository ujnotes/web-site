<?php

function LoadComponents()
{
	global $component;
	$fHandle = fopen("..\IDs.tsv", "r");
	$i = 0;
	while(($tsvLine = fgetcsv($fHandle, 0, "\t")) !== FALSE)
	{
		for($j = 0; $j < count($tsvLine); $j++)
			$component[$i][$j] = $tsvLine[$j];
		$i++;
	}
}

function GetComponentTitle($id)
{
	global $component;
	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][1];
	exit ("Wrong ID");
}

function GetComponentDesc($id)
{
	global $component;
	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][4];
	exit ("Wrong ID");
}

function GetComponentModeXURL($id)
{
	global $component;
	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][2];
	exit ("Wrong ID");
}

function GetComponentModeASYNC($id)
{
	global $component;
	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][3];
	exit ("Wrong ID");
}

?>
