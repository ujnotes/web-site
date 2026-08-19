<?php

function home_menu_leaf_slugs() {
	// Homepage shows these nodes but does not expand their descendants.
	return [
		'computer/game/doom',
	];
}

function home_menu_cap_children_of() {
	// Direct children of these nodes are shown as leaves (no deeper).
	return [
		'computer/os',
		'computer/program',
		'computer/programming',
		'computer/technology',
	];
}

function home_menu_selected_child_slugs() {
	// Parent slug => child slugs to show. When set, other siblings are omitted
	// and a vertical ⋮ is shown against that last selected child tile.
	return [
	];
}

function home_menu_selected_child_limit() {
	// Parent slug => keep the first N children after alphabetical sort.
	// Used when that parent has no explicit selected-child list.
	return [
		'computer/os' => 1,
		'computer/program' => 1,
		'computer/programming' => 1,
		'computer/technology' => 1,
	];
}

function home_menu_parent_slug($slug) {
	$pos = strrpos($slug, '/');
	return $pos === false ? '' : substr($slug, 0, $pos);
}

function home_menu_is_leaf($slug) {
	$slug = strtolower($slug);
	if (in_array($slug, home_menu_leaf_slugs(), true))
		return true;
	$parent = home_menu_parent_slug($slug);
	return $parent !== '' && in_array($parent, home_menu_cap_children_of(), true);
}

function home_menu_visible_children($parent_slug, $children) {
	$parent_slug = strtolower($parent_slug);
	$allow = home_menu_selected_child_slugs();
	if (isset($allow[$parent_slug]) && count($allow[$parent_slug]) > 0) {
		$set = array();
		foreach ($allow[$parent_slug] as $slug)
			$set[strtolower($slug)] = true;
		$visible = array();
		foreach ($children as $child) {
			if (isset($set[strtolower($child[0])]))
				$visible[] = $child;
		}
		return array($visible, count($visible) < count($children));
	}
	$limits = home_menu_selected_child_limit();
	if (isset($limits[$parent_slug]) && count($children) > $limits[$parent_slug]) {
		$limit = (int)$limits[$parent_slug];
		return array(array_slice($children, 0, $limit), true);
	}
	return array($children, false);
}

function home_menu_render_branch($slug) {
	$label = getComponentLabel($slug);
	$children = getSubComponents($slug);
	$control_id = 'home-' . trim(preg_replace('/[^a-z0-9]+/i', '-', $slug), '-') . '-children';
?>
	<div class="home-menu-node">
		<button class="home-menu-toggle" type="button" aria-expanded="true" aria-controls="<?php echo $control_id ?>" aria-label="Collapse <?php echo htmlspecialchars($label) ?> descendants" data-home-menu-toggle data-home-menu-label="<?php echo htmlspecialchars($label) ?> descendants"><span aria-hidden="true"></span></button>
<?php
	group_image('page-list home-menu-level home-menu-level-0', 0, [$slug, $label]);
?>
		<div class="home-menu-subtree" id="<?php echo $control_id ?>">
<?php
	home_menu_render_tree($children, 1, $slug);
?>
		</div>
	</div>
<?php
}

function home_menu_render_tree($items, $level, $parent_slug) {
	usort($items, function($a, $b) {
		$label_order = strcasecmp(trim($a[1]), trim($b[1]));
		return $label_order == 0 ? strcasecmp($a[0], $b[0]) : $label_order;
	});

	$truncated = false;
	if ($parent_slug) {
		list($items, $truncated) = home_menu_visible_children($parent_slug, $items);
	}

	$count = count($items);
	$index = 0;
	foreach($items as $item) {
		$index++;
		$item[1] = trim($item[1]);
		$children = getSubComponents($item[0]);
		$has_children = count($children) > 0 && !home_menu_is_leaf($item[0]);
		$show_more = $truncated && $index === $count;
		$control_id = 'home-' . trim(preg_replace('/[^a-z0-9]+/i', '-', $item[0]), '-') . '-children';
		$more_label = getComponentLabel($parent_slug);
?>
		<div class="home-menu-node<?php echo $show_more ? ' home-menu-has-more' : '' ?>">
<?php if($has_children) { ?>
			<button class="home-menu-toggle" type="button" aria-expanded="true" aria-controls="<?php echo $control_id ?>" aria-label="Collapse <?php echo htmlspecialchars($item[1]) ?> descendants" data-home-menu-toggle data-home-menu-label="<?php echo htmlspecialchars($item[1]) ?> descendants"><span aria-hidden="true"></span></button>
<?php } ?>
<?php
		if ($show_more) {
?>
			<div class="home-menu-tile-row">
<?php
		}
		group_image('page-list home-menu-level home-menu-level-' . $level, 0, $item);
		if ($show_more) {
			$more_href = getComponentURL($parent_slug);
?>
			<a class="home-menu-more" href="<?php echo htmlspecialchars($more_href) ?>" aria-label="<?php echo htmlspecialchars('More ' . $more_label . ' articles') ?>"><span aria-hidden="true"></span><span aria-hidden="true"></span><span aria-hidden="true"></span></a>
			</div>
<?php
		}
		if($has_children) {
?>
			<div class="home-menu-subtree" id="<?php echo $control_id ?>">
<?php
			home_menu_render_tree($children, $level + 1, $item[0]);
?>
			</div>
<?php } ?>
		</div>
<?php
	}
}
