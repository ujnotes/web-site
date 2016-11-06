<?php

function loadComponents() {
	global $bPublish;
	global $bFull;
	global $component;

	$fHandle = fopen("..\IDs.tsv", "r");
	$i = 0;
	while(($tsvLine = fgetcsv($fHandle, 0, "\t")) !== FALSE) {
		if($tsvLine[0] == null) {
			if($bFull)
				array_shift($tsvLine);
			else
				continue;
		}
		for($j = 0; $j < count($tsvLine); $j++)
			$component[$i][$j] = $tsvLine[$j];
		$i++;
	}
}

function getComponentTitle($id) {
	global $component;

	if($id == '')
		return '';

	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][1];

	exit ("Wrong ID"." : ".$id);
}

function getComponentDesc($id) {
	global $component;

	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][4];
	exit ("Wrong ID"." : ".$id);
}

function getComponentModeXURL($id) {
	global $component;

	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][2];
	exit ("Wrong ID"." : ".$id);
}

function getComponentModeASYNC($id) {
	global $component;

	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			return $component[$i][3];
	exit ("Wrong ID"." : ".$id);
}

function getSubComponents($id) {
	global $component;

	$pattern = "#".$id."\/[^\/]+$#";
	$matches = array_filter($component, function($a) use($pattern)  {
    return preg_grep($pattern, $a);
	});
	return $matches;
}

function getComponentPath($id) {
	$s = "Component\\".str_replace(' ','_', $id);
	if(file_exists($s)) {
		$s = $s."\Root";
	}
	if(file_exists($s.".php"))
		return ($s.".php");
	else
		return ($s.".html");
}

function getComponentPathStylized($id) {
	$pathStack = array();
	$idStack = "";
	$x = explode("/", $id);
	array_pop($x);
	foreach ($x as $key => $value) {
		$idStack = $idStack.$value;
		$x = array();
		array_push($x, $idStack);
		array_push($x, GetComponentTitle($idStack));
		array_push($pathStack, $x);
		$idStack = $idStack."/";
	}
	return $pathStack;
}

function getComponentURL($id) {
	if($id == 'root')
		return "";
	else
		return ("/".$id);
}

function getParentId($id) {
	if($id == "root")
		return "";
	$parentId = substr($id, 0, strrpos($id, "/"));
	if($parentId == "")
		return "root";
	else
		return $parentId;
}

function getPrevId($id) {
	global $component;
	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			if($i != 0 && getParentId($id) == getParentId($component[$i-1][0]))
				return $component[$i-1][0];
			else
				return "";
	exit ("Wrong ID"." : ".$id);
}

function getNextId($id) {
	global $component;
	for($i = 0; $i < count($component); $i++)
		if($component[$i][0] == $id)
			if($i != count($component)-1 && getParentId($id) == getParentId($component[$i+1][0]))
				return $component[$i+1][0];
			else
				return "";
	exit ("Wrong ID"." : ".$id);
}

?>
