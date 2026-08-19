function homeMenuNodeTile(node) {
	if(!node)
		return null;
	return node.querySelector(':scope > .home-menu-level > .item_block_container')
		|| node.querySelector(':scope > .home-menu-tile-row > .home-menu-level > .item_block_container');
}

function syncHomeMenuConnectorStyles(menu) {
	var nodes = menu.querySelectorAll('.home-menu-node');
	var branches = [];

	function addPseudoSegment(branch, element, pseudo, vertical) {
		var style = getComputedStyle(element, pseudo);
		if(style.content == 'none')
			return;
		var rect = element.getBoundingClientRect();
		var start = vertical ? parseFloat(style.top) : parseFloat(style.left);
		var length = vertical ? parseFloat(style.height) : parseFloat(style.width);
		var fixed = vertical ? parseFloat(style.left) : parseFloat(style.top);
		if(!isFinite(start) || !isFinite(length) || !isFinite(fixed) || length <= 0)
			return;
		branch.segments.push(vertical
			? { vertical: true, fixed: rect.left + fixed, start: rect.top + start, end: rect.top + start + length }
			: { vertical: false, fixed: rect.top + fixed, start: rect.left + start, end: rect.left + start + length });
	}

	function rangesOverlap(aStart, aEnd, bStart, bEnd) {
		return Math.min(aEnd, bEnd) - Math.max(aStart, bStart) > 1;
	}

	function segmentsConflict(a, b) {
		if(a.vertical == b.vertical)
			return Math.abs(a.fixed - b.fixed) <= 1 && rangesOverlap(a.start, a.end, b.start, b.end);
		var vertical = a.vertical ? a : b;
		var horizontal = a.vertical ? b : a;
		return vertical.fixed > horizontal.start + 1 && vertical.fixed < horizontal.end - 1
			&& horizontal.fixed > vertical.start + 1 && horizontal.fixed < vertical.end - 1;
	}


	function segmentCrossesTile(segment, rect) {
		if(segment.vertical)
			return segment.fixed > rect.left + 1 && segment.fixed < rect.right - 1
				&& rangesOverlap(segment.start, segment.end, rect.top + 1, rect.bottom - 1);
		return segment.fixed > rect.top + 1 && segment.fixed < rect.bottom - 1
			&& rangesOverlap(segment.start, segment.end, rect.left + 1, rect.right - 1);
	}

	[].forEach.call(nodes, function(node) {
		node.classList.remove('home-menu-connector-alternate');
		var subtree = node.querySelector(':scope > .home-menu-subtree:not([hidden])');
		if(!subtree)
			return;
		var branch = {
			node: node,
			subtree: subtree,
			parent: node.parentElement,
			rect: subtree.getBoundingClientRect(),
			segments: [],
			forceAlternate: false
		};
		addPseudoSegment(branch, node, '::after', true);
		if(node.classList.contains('home-menu-group-connector')) {
			addPseudoSegment(branch, subtree, '::before', false);
			addPseudoSegment(branch, subtree, '::after', true);
			[].forEach.call(subtree.querySelectorAll(':scope > .home-menu-group-row-line'), function(line) {
				var rect = line.getBoundingClientRect();
				branch.segments.push({ vertical: false, fixed: rect.top, start: rect.left, end: rect.right });
			});
		}
		else {
			[].forEach.call(subtree.querySelectorAll(':scope > .home-menu-node'), function(child) {
				addPseudoSegment(branch, child, '::before', false);
			});
			var level = subtree.querySelector(':scope > .home-menu-level');
			if(level)
				addPseudoSegment(branch, level, '::before', false);
		}
		branches.push(branch);
	});

	var conflicts = branches.map(function() {
		return branches.map(function() { return false; });
	});
	function addConflict(a, b) {
		if(a < 0 || b < 0 || a == b)
			return;
		conflicts[a][b] = true;
		conflicts[b][a] = true;
	}

	for(var i = 0; i < branches.length; i++) {
		for(var j = i + 1; j < branches.length; j++) {
			if(branches[i].node.contains(branches[j].node) || branches[j].node.contains(branches[i].node))
				continue;
			for(var a = 0; a < branches[i].segments.length; a++) {
				for(var b = 0; b < branches[j].segments.length; b++) {
					if(segmentsConflict(branches[i].segments[a], branches[j].segments[b]))
						addConflict(i, j);
				}
			}
		}
	}

	function branchIndexForTile(tile) {
		var owner = tile.closest('.home-menu-node');
		while(owner) {
			for(var index = 0; index < branches.length; index++) {
				if(branches[index].node == owner)
					return index;
			}
			var parent = owner.parentElement;
			owner = parent ? parent.closest('.home-menu-node') : null;
		}
		return -1;
	}

	[].forEach.call(menu.querySelectorAll('.item_block_container'), function(tile) {
		var tileRect = tile.getBoundingClientRect();
		var ownerIndex = branchIndexForTile(tile);
		for(var branchIndex = 0; branchIndex < branches.length; branchIndex++) {
			if(branchIndex == ownerIndex)
				continue;
			if(ownerIndex >= 0 && (branches[branchIndex].node.contains(branches[ownerIndex].node) || branches[ownerIndex].node.contains(branches[branchIndex].node)))
				continue;
			for(var segmentIndex = 0; segmentIndex < branches[branchIndex].segments.length; segmentIndex++) {
				if(segmentCrossesTile(branches[branchIndex].segments[segmentIndex], tileRect)) {
					if(ownerIndex >= 0)
						addConflict(branchIndex, ownerIndex);
					else
						branches[branchIndex].forceAlternate = true;
					break;
				}
			}
		}
	});

	var styles = [];
	for(var branchIndex = 0; branchIndex < branches.length; branchIndex++) {
		var solidUsed = false;
		var alternateUsed = false;
		for(var previousIndex = 0; previousIndex < branchIndex; previousIndex++) {
			if(!conflicts[branchIndex][previousIndex])
				continue;
			if(styles[previousIndex])
				alternateUsed = true;
			else
				solidUsed = true;
		}
		styles[branchIndex] = branches[branchIndex].forceAlternate
			? true
			: solidUsed && !alternateUsed;
		branches[branchIndex].node.classList.toggle('home-menu-connector-alternate', styles[branchIndex]);
	}
}
function syncHomeMenuConnectors(settled) {
	var menu = document.getElementById('home-menu');
	if(!menu)
		return;

	var menuRight = menu.getBoundingClientRect().right;
	var visibleSubtrees = menu.querySelectorAll('.home-menu-subtree:not([hidden])');
	var menuNodes = menu.querySelectorAll('.home-menu-node');
	[].forEach.call(menuNodes, function(node) {
		node.style.removeProperty('margin-right');
	});
	[].forEach.call(visibleSubtrees, function(subtree) {
		var subtreeLeft = subtree.getBoundingClientRect().left;
		subtree.style.setProperty('--home-subtree-width', Math.max(0, menuRight - subtreeLeft) + 'px');
	});

	var pageRight = document.body.getBoundingClientRect().right;
	[].forEach.call(menuNodes, function(node) {
		var subtree = node.querySelector(':scope > .home-menu-subtree:not([hidden])');
		var parentSubtree = node.parentElement;
		if(!subtree || !parentSubtree || !parentSubtree.classList.contains('home-menu-subtree'))
			return;
		var siblings = parentSubtree.querySelectorAll(':scope > .home-menu-node');
		if(siblings.length < 2)
			return;
		var source = homeMenuNodeTile(node);
		var firstChildSource = homeMenuNodeTile(subtree.querySelector(':scope > .home-menu-node'));
		if(!source || !firstChildSource)
			return;
		var sourceRect = source.getBoundingClientRect();
		var desiredChildRight = sourceRect.left + sourceRect.width / 2 + 36 + firstChildSource.getBoundingClientRect().width;
		if(desiredChildRight <= pageRight)
			return;
		var index = [].indexOf.call(siblings, node);
		var previous = index > 0 ? siblings[index - 1] : null;
		if(!previous)
			return;
		var nodeRect = node.getBoundingClientRect();
		var previousRect = previous.getBoundingClientRect();
		if(Math.abs(previousRect.top - nodeRect.top) < 2)
			previous.style.marginRight = Math.max(0, parentSubtree.getBoundingClientRect().right - previousRect.right) + 'px';
	});

	[].forEach.call(visibleSubtrees, function(subtree) {
		var subtreeLeft = subtree.getBoundingClientRect().left;
		subtree.style.setProperty('--home-subtree-width', Math.max(0, menuRight - subtreeLeft) + 'px');
	});

	[].forEach.call(document.querySelectorAll('#home-menu .home-menu-node'), function(node) {
		var source = homeMenuNodeTile(node);
		if(!source)
			return;

		var nodeRect = node.getBoundingClientRect();
		var sourceRect = source.getBoundingClientRect();
		var sourceCenter = sourceRect.top - nodeRect.top + sourceRect.height / 2;
		node.style.setProperty('--home-node-center-y', sourceCenter + 'px');

		var subtreeAll = node.querySelector(':scope > .home-menu-subtree');
		var subtree = node.querySelector(':scope > .home-menu-subtree:not([hidden])');
		var parentSubtree = node.parentElement;
		var siblingCount = parentSubtree && parentSubtree.classList.contains('home-menu-subtree')
			? parentSubtree.querySelectorAll(':scope > .home-menu-node').length
			: 0;
		var bottomConnector = siblingCount > 1 && !!subtreeAll;
		node.classList.toggle('home-menu-connector-bottom', bottomConnector);

		if(bottomConnector) {
			var parentLineXCollapsed = sourceRect.left - nodeRect.left + sourceRect.width / 2;
			var lineOriginYCollapsed = sourceRect.bottom - nodeRect.top + 8;
			node.style.setProperty('--home-bottom-line-start-y', lineOriginYCollapsed + 'px');
			node.style.setProperty('--home-bottom-line-x', parentLineXCollapsed + 'px');
		}

		if(!subtree) {
			node.classList.remove('home-menu-group-connector');
			node.classList.remove('home-menu-connector-alternate');
			node.style.removeProperty('--home-line-height');
			return;
		}

		var directNodes = subtree.querySelectorAll(':scope > .home-menu-node');
		var directNode = directNodes.length ? directNodes[directNodes.length - 1] : null;

		var parentLineX = parseFloat(getComputedStyle(node).getPropertyValue('--home-glyph-center')) || 19;
		var lineOriginY = sourceCenter;
		if(bottomConnector) {
			parentLineX = sourceRect.left - nodeRect.left + sourceRect.width / 2;
			lineOriginY = sourceRect.bottom - nodeRect.top + 8;
			var firstChild = directNodes.length ? directNodes[0] : null;
			var firstChildSource = homeMenuNodeTile(firstChild);
			if(firstChildSource) {
				var firstChildRect = firstChild.getBoundingClientRect();
				var childSourceOffset = firstChildSource.getBoundingClientRect().left - firstChildRect.left;
				subtree.style.setProperty('--home-bottom-child-indent', Math.max(0, parentLineX + 36 - childSourceOffset) + 'px');
			}
			node.style.setProperty('--home-bottom-line-start-y', lineOriginY + 'px');
			node.style.setProperty('--home-bottom-line-x', parentLineX + 'px');
		}
		[].forEach.call(directNodes, function(child) {
			var childSource = homeMenuNodeTile(child);
			if(!childSource)
				return;
			var childRect = child.getBoundingClientRect();
			var childSourceRect = childSource.getBoundingClientRect();
			var elbowY = childSourceRect.top - childRect.top + childSourceRect.height / 2;
			var lineX = nodeRect.left + parentLineX - childRect.left;
			var tileEdgeX = childSourceRect.left - childRect.left - 8;
			child.style.setProperty('--home-parent-elbow-y', elbowY + 'px');
			child.style.setProperty('--home-parent-elbow-left', Math.min(lineX, tileEdgeX) + 'px');
			child.style.setProperty('--home-parent-elbow-width', Math.abs(tileEdgeX - lineX) + 'px');
		});

		var childRows = {};
		var groupLeft = Infinity;
		var groupTop = Infinity;
		var groupBottom = -Infinity;
		[].forEach.call(directNodes, function(child) {
			var childSource = homeMenuNodeTile(child);
			if(!childSource)
				return;
			var childSourceRect = childSource.getBoundingClientRect();
			var rowKey = Math.round(childSourceRect.top);
			var rowCenterY = childSourceRect.top + childSourceRect.height / 2;
			if(!childRows[rowKey])
				childRows[rowKey] = { left: childSourceRect.left, centerY: rowCenterY };
			else
				childRows[rowKey].left = Math.min(childRows[rowKey].left, childSourceRect.left);
			groupLeft = Math.min(groupLeft, childSourceRect.left);
			groupTop = Math.min(groupTop, rowCenterY);
			groupBottom = Math.max(groupBottom, rowCenterY);
		});
		[].forEach.call(subtree.querySelectorAll(':scope > .home-menu-group-row-line'), function(line) {
			line.remove();
		});
		var wrappedGroup = directNodes.length > 1 && Object.keys(childRows).length > 1;
		node.classList.toggle('home-menu-group-connector', wrappedGroup);

		var target = directNode
			? homeMenuNodeTile(directNode)
			: homeMenuNodeTile(subtree.querySelector(':scope > .home-menu-node')) || subtree.querySelector(':scope > .home-menu-level > .item_block_container');

		if(!target) {
			node.style.removeProperty('--home-line-height');
			return;
		}

		var targetRect = target.getBoundingClientRect();
		var targetCenter = targetRect.top - nodeRect.top + targetRect.height / 2;
		if(wrappedGroup) {
			var subtreeRect = subtree.getBoundingClientRect();
			var groupSpineX = groupLeft - 24;
			var groupCenterY = (groupTop + groupBottom) / 2;
			var lineAbsoluteX = nodeRect.left + parentLineX;
			targetCenter = groupCenterY - nodeRect.top;
			subtree.style.setProperty('--home-group-elbow-y', groupCenterY - subtreeRect.top + 'px');
			subtree.style.setProperty('--home-group-elbow-left', Math.min(lineAbsoluteX, groupSpineX) - subtreeRect.left + 'px');
			subtree.style.setProperty('--home-group-elbow-width', Math.abs(groupSpineX - lineAbsoluteX) + 'px');
			subtree.style.setProperty('--home-group-spine-top', groupTop - subtreeRect.top + 'px');
			subtree.style.setProperty('--home-group-spine-x', groupSpineX - subtreeRect.left + 'px');
			subtree.style.setProperty('--home-group-spine-height', groupBottom - groupTop + 'px');
			Object.keys(childRows).sort(function(a, b) { return Number(a) - Number(b); }).forEach(function(rowKey) {
				var row = childRows[rowKey];
				var rowLine = document.createElement('span');
				rowLine.className = 'home-menu-group-row-line';
				rowLine.setAttribute('aria-hidden', 'true');
				rowLine.style.setProperty('--home-group-row-line-y', row.centerY - subtreeRect.top + 'px');
				rowLine.style.setProperty('--home-group-row-line-left', groupSpineX - subtreeRect.left + 'px');
				rowLine.style.setProperty('--home-group-row-line-width', Math.max(0, row.left - 8 - groupSpineX) + 'px');
				subtree.appendChild(rowLine);
			});
		}
		node.style.setProperty('--home-line-height', Math.max(0, targetCenter - lineOriginY) + 'px');


	});

	syncHomeMenuConnectorStyles(menu);

	if(settled !== true)
		requestAnimationFrame(function() {
			syncHomeMenuConnectors(true);
		});
}

function root() {
	var e = document.getElementById('profile-image');
	if(e) {
		root.full = false;
		e.addEventListener( "click", function(){
			if(root.full) {
				e.blur();
				root.full = false;
			}
			else
				root.full = true;
		});
	}

	[].forEach.call(document.querySelectorAll('#home-menu [data-home-menu-toggle]'), function(button) {
		if(button.getAttribute('data-home-menu-initialized') == 'true')
			return;

		button.setAttribute('data-home-menu-initialized', 'true');
		var glyph = button.querySelector('span');
		if(glyph && !glyph.textContent)
			glyph.textContent = button.getAttribute('aria-expanded') == 'false' ? '+' : '\u2212';
		button.addEventListener('click', function() {
			var target = document.getElementById(button.getAttribute('aria-controls'));
			if(!target)
				return;

			var expanded = button.getAttribute('aria-expanded') == 'true';
			button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
			button.setAttribute('aria-label', (expanded ? 'Expand ' : 'Collapse ') + button.getAttribute('data-home-menu-label'));
			var glyph = button.querySelector('span');
			if(glyph)
				glyph.textContent = expanded ? '+' : '\u2212';
			target.hidden = expanded;
			requestAnimationFrame(syncHomeMenuConnectors);
		});
	});

	syncHomeMenuConnectors();

	if(!root.homeMenuResizeInitialized) {
		root.homeMenuResizeInitialized = true;
		window.addEventListener('resize', syncHomeMenuConnectors);
	}
}
