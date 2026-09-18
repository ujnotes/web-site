<?php

function home_menu_leaf_slugs() {
	// Homepage shows these nodes but does not expand their descendants.
	return [
		'technology/computer/game/doom',
		'technology/computer/artificial_intelligence/machine_learning',
	];
}

function home_menu_cap_children_of() {
	// Direct children of these nodes are shown as leaves (no deeper).
	return [
		'technology/computer/os',
		'technology/computer/program',
		'technology/computer/programming',
	];
}

function home_menu_selected_child_slugs() {
	// Parent slug => child slugs to show. When set, other siblings are omitted
	// and a vertical ⋮ is shown against that last selected child tile.
	return [
		'technology/computer' => [
			'technology/computer/algorithm',
			'technology/computer/program',
			'technology/computer/os',
			'technology/computer/programming',
			'technology/computer/game',
			'technology/computer/artificial_intelligence',
		],
	];
}

function home_menu_selected_child_limit() {
	// Parent slug => keep the first N children in Config/ID.tsv order.
	// Used when that parent has no explicit selected-child list.
	return [
		'technology/computer/os' => 1,
		'technology/computer/program' => 1,
		'technology/computer/programming' => 1,
	];
}

function home_menu_parent_slug($slug) {
	$pos = strrpos($slug, '/');
	return $pos === false ? '' : substr($slug, 0, $pos);
}

function home_menu_branch_children($slug) {
	// Homepage hubs nested under World (URLs stay /philosophy, /science, /technology).
	// Order: Philosophy → Science → Technology. Timeline is a site meta page, not here.
	if (strtolower($slug) === 'world') {
		$hubs = ['philosophy', 'science', 'technology'];
		$out = [];
		foreach ($hubs as $hub) {
			if (componentExists($hub) && isComponentLocalized($hub))
				$out[] = [$hub, getComponentLabel($hub)];
		}
		return $out;
	}
	return getSubComponents($slug);
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
		$ordered = array();
		foreach ($allow[$parent_slug] as $slug) {
			$slug = strtolower($slug);
			foreach ($visible as $child) {
				if (strtolower($child[0]) === $slug)
					$ordered[] = $child;
			}
		}
		return array($ordered, count($ordered) < count($children));
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
	$children = home_menu_branch_children($slug);
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
		$is_hub = strtolower($parent_slug) === 'world';
		// Hubs under World stack like old top-level branches (no bottom drop).
		$bottom_connector = !$is_hub && $count > 1 && $has_children;
		$control_id = 'home-' . trim(preg_replace('/[^a-z0-9]+/i', '-', $item[0]), '-') . '-children';
		$more_label = getComponentLabel($parent_slug);
		$node_class = 'home-menu-node';
		if ($is_hub)
			$node_class .= ' home-menu-hub';
		if ($show_more)
			$node_class .= ' home-menu-has-more';
		if ($bottom_connector)
			$node_class .= ' home-menu-connector-bottom';
?>
		<div class="<?php echo $node_class ?>">
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

