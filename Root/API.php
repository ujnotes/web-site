<?php

	function GetOrigCall() {
		if(strlen($_SERVER['QUERY_STRING']) == 0)
			return (substr($_SERVER['REQUEST_URI'], 1));
		else {
			$pos = strpos($_SERVER['REQUEST_URI'], $_SERVER['QUERY_STRING']);
			return (substr($_SERVER['REQUEST_URI'], 1, $pos - 2));
		}
	}
	
	function AddAttribute(DOMElement $e, $name, $value) {
		$a = $e->getAttribute($name);
		$e->setAttribute($name, $a." ".$value);
	}

	function GetFileDate($file) {
		date_default_timezone_set("UTC");
		return date("Y M d", filemtime($file));
	}
	
	function GetComponentPath($title) {
		$s = "Component\\".str_replace(' ','_', $title);
		if(file_exists($s.".php"))
			return ($s.".php");
		else
			return ($s.".html");
	}

	function endsWith($haystack, $needle) {
		return preg_match('/' . preg_quote($haystack, '/') . '$/', $needle);
	}
	
?>
