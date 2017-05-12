<?php
	
	function url_part($target) {
		return ($target == 'root')? '' : $target;
	}
	
	function title_label($title) {
		return ($title == '')? '\\' : $title;		
	}

	function link_xurl($target, $title) {
?><a class='content-link XURL' href='/<?php echo url_part($target) ?>' data-target='<?php echo $target ?>' data-title='<?php echo $title ?>'><?php echo title_label($title) ?></a><?php	
	}
	
?>
