<?php
	require_once 'Fragment/Item.php';
	$SIDEBAR_NAV_GROUP = 'sidebar-nav-group page-list';
?>
<div id='nav-menu'>
	<div id='nav-menu_container'>
		<div class='sidebar-nav-li sidebar-sub'>
			<?php
			$MENU_MAX_ITEM_COUNT = -5;
			group_image($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['root', ''], ['world', 'World'], ['computer', 'Computer']);
			group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['about', 'About'], ['faq', 'FAQ']);
			group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['feedback', 'Feedback'], ['license', 'License'], ['logo', 'Logo'], ['roadmap', 'Roadmap'], ['changelog', 'Changelog'], ['timeline', 'Timeline']);
			group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['about_site', 'About site'], ['about_me', 'About me']);
			?>
		</div>
	</div>
</div>
