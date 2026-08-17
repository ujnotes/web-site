<?php

function home_menu_render_tree($items, $level) {
	usort($items, function($a, $b) {
		$label_order = strcasecmp(trim($a[1]), trim($b[1]));
		return $label_order == 0 ? strcasecmp($a[0], $b[0]) : $label_order;
	});

	foreach($items as $item) {
		$item[1] = trim($item[1]);
		$children = getSubComponents($item[0]);
		$has_children = count($children) > 0;
		$control_id = 'home-' . trim(preg_replace('/[^a-z0-9]+/i', '-', $item[0]), '-') . '-children';
?>
		<div class="home-menu-node">
<?php if($has_children) { ?>
			<button class="home-menu-toggle" type="button" aria-expanded="true" aria-controls="<?php echo $control_id ?>" aria-label="Collapse <?php echo htmlspecialchars($item[1]) ?> descendants" data-home-menu-toggle data-home-menu-label="<?php echo htmlspecialchars($item[1]) ?> descendants"><span aria-hidden="true"></span></button>
<?php } ?>
<?php
		group_image('page-list home-menu-level home-menu-level-' . $level, 0, $item);
		if($has_children) {
?>
			<div class="home-menu-subtree" id="<?php echo $control_id ?>">
<?php
			home_menu_render_tree($children, $level + 1);
?>
			</div>
<?php } ?>
		</div>
<?php
	}
}
