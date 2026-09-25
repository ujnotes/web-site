<?php
	require_once 'Fragment/Item.php';
	$SIDEBAR_NAV_GROUP = 'sidebar-nav-group page-list';
?>
<div id='nav-menu'>
	<div id='nav-menu_container'>
		<div class='sidebar-nav-li sidebar-sub'>
			<?php
			$MENU_MAX_ITEM_COUNT = -5;
			foreach (sidebar_menu_groups() as $group) {
				$items = array();
				foreach ($group['items'] as $slug)
					$items[] = array($slug, htmlspecialchars(sidebar_menu_label($slug, $lang), ENT_QUOTES, 'UTF-8'));
				if ($group['kind'] === 'image')
					group_image($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ...$items);
				else
					group_text($SIDEBAR_NAV_GROUP, $MENU_MAX_ITEM_COUNT, ...$items);
			}
			?>
		</div>
	</div>
</div>
