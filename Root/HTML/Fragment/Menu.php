<?php
	require_once 'Fragment\Item.php';
?>
<div id='nav-menu'>
	<div class='nav-menu_container'>
		<div class='sidebar-nav-li sidebar-sub'>
<?php
			$MENU_MAX_ITEM_COUNT = 5;
			group($MENU_MAX_ITEM_COUNT, ['root', ''], ['world', 'World'], ['computer', 'Computer']);
			group($MENU_MAX_ITEM_COUNT, ['about', 'About'], ['faq', 'FAQ']);
			group($MENU_MAX_ITEM_COUNT, ['feedback', 'Feedback'], ['license', 'License'], ['logo', 'Logo'], ['roadmap', 'Roadmap'], ['changelog', 'Changelog'], ['timeline', 'Timeline']);
			group($MENU_MAX_ITEM_COUNT, ['about_site', 'About site'], ['about_me', 'About me']);
?>
		</div>
	</div>
</div>
