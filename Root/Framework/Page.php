<?php
	require 'API.php';
	require 'ComponentDetails.php';
	require 'Config.php';

	$config = loadConfig();

	if( isset($_GET['mode']) && ($_GET['mode'] === "publish") )
		$bPublish = TRUE;
	else
		$bPublish = FALSE;

	$component = loadComponents();

	$id = getOrigCall();
	$menu_active_class = "";

	if(strlen($id) == 0)
		$id = "root";
	$menu_active_class;
	if($id == "menu") {
		$menu_active_class = "pml-open";
		$id = "root";
	}
	$title = getComponentTitle($id);
	$desc = getComponentDesc($id);
	$date = getFileDate(getComponentPath($id));

	$dom = new DOMDocument();

	//ob_start();
	require '..\Template\Base.php';
	//$dom->loadHTML(ob_get_contents());
	//ob_end_clean();

	//AddAttribute(($dom->getElementById($id)), "class", "sidebar-nav-high");
	//echo $dom->saveHTML();
?>
