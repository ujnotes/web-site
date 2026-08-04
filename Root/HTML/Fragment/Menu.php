<?php
	require_once 'Fragment/Item.php';
	require_once __DIR__.'/UITranslation.php';
	$SIDEBAR_NAV_GROUP = 'sidebar-nav-group page-list';
?>
<div id='nav-menu'>
	<div id='nav-menu_container'>
		<div class='sidebar-nav-li sidebar-sub'>
			<?php
			$MENU_MAX_ITEM_COUNT = -5;
			group_image($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['root', getUITranslation('menu_home', $lang)], ['world', getUITranslation('menu_world', $lang)], ['computer', getUITranslation('menu_computer', $lang)]);
			group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['about', getUITranslation('menu_about', $lang)], ['faq', getUITranslation('menu_faq', $lang)]);
			group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['feedback', getUITranslation('menu_feedback', $lang)], ['license', getUITranslation('menu_license', $lang)], ['logo', getUITranslation('menu_logo', $lang)], ['roadmap', getUITranslation('menu_roadmap', $lang)], ['changelog', getUITranslation('menu_changelog', $lang)], ['timeline', getUITranslation('menu_timeline', $lang)]);
			group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ['about_site', getUITranslation('menu_about_site', $lang)], ['about_me', getUITranslation('menu_about_me', $lang)]);
			?>
		</div>
	</div>
</div>
