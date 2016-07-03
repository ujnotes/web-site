<?php
	require "API.php";
	require "ComponentDetails.php";

	$project_title = "Ujnotes";
	
	if( isset($_GET['mode']) && ($_GET['mode'] === "publish") )
		$bPublish = TRUE;
	else
		$bPublish = FALSE;

	$component;
	LoadComponents();
	
	$id = GetOrigCall();
	$menu_active_class = "";
	
	if(strlen($id) == 0)
		$id = "root";
	$menu_active_class;
	if($id == "menu") {
		$menu_active_class = "pml-open";
		$id = "root";
	}
	$title = GetComponentTitle($id);
	$desc = GetComponentDesc($id);
	$date = GetFileDate(GetComponentPath($id));
	
	$dom = new DOMDocument();

	ob_start();
	require 'Template.php';
	$dom->loadHTML(ob_get_contents());
	ob_end_clean();

	//AddAttribute(($dom->getElementById($id)), "class", "sidebar-nav-high");
	echo $dom->saveHTML();
?>
