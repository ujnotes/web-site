function homeMenuNodeTile(node) {
	if(!node)
		return null;
	return node.querySelector(':scope > .home-menu-level > .item_block_container')
		|| node.querySelector(':scope > .home-menu-tile-row > .home-menu-level > .item_block_container');
}

function homeMenuSharesRowWithSibling(node) {
	// True when another sibling sits on the same row (left or right). First-in-row
	// must count too (e.g. Algorithm beside Program) so bottom leaders and child
	// tiles like Binary Search align with Illustrator / *Nix / Ajax.
	var parentSubtree = node.parentElement;
	if(!parentSubtree || !parentSubtree.classList.contains('home-menu-subtree'))
		return false;
	var siblings = parentSubtree.querySelectorAll(':scope > .home-menu-node');
	var index = [].indexOf.call(siblings, node);
	if(index < 0 || siblings.length < 2)
		return false;
	var nodeRect = node.getBoundingClientRect();
	for(var i = 0; i < siblings.length; i++) {
		if(i === index)
			continue;
		var otherRect = siblings[i].getBoundingClientRect();
		if(Math.abs(otherRect.top - nodeRect.top) < 2)
			return true;
	}
	return false;
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
function syncHomeMenuConnectors() {
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
		// Bottom drop when this node shares a row with any sibling (including
		// first-in-row, e.g. Algorithm beside Program). Vertically stacked
		// children keep the side toggle next to their tile. World hubs never use it.
		var siblingNodes = node.parentElement && node.parentElement.classList.contains('home-menu-subtree')
			? node.parentElement.querySelectorAll(':scope > .home-menu-node')
			: [];
		var bottomConnector = !!subtreeAll && siblingNodes.length > 1
			&& !node.classList.contains('home-menu-hub')
			&& homeMenuSharesRowWithSibling(node);
		node.classList.toggle('home-menu-connector-bottom', bottomConnector);

		if(bottomConnector) {
			var parentLineXCollapsed = sourceRect.left - nodeRect.left + sourceRect.width / 2;
			var lineOriginYCollapsed = sourceRect.bottom - nodeRect.top + 8;
			node.style.setProperty('--home-bottom-line-start-y', lineOriginYCollapsed + 'px');
			node.style.setProperty('--home-bottom-line-x', parentLineXCollapsed + 'px');
		}
		else {
			node.style.removeProperty('--home-bottom-line-start-y');
			node.style.removeProperty('--home-bottom-line-x');
			if(subtreeAll)
				subtreeAll.style.removeProperty('--home-bottom-child-indent');
		}

		if(!subtree) {
			node.classList.remove('home-menu-group-connector');
			node.classList.remove('home-menu-connector-alternate');
			node.style.removeProperty('--home-line-height');
			return;
		}

		var directNodes = subtree.querySelectorAll(':scope > .home-menu-node');
		var directNode = directNodes.length ? directNodes[directNodes.length - 1] : null;

		var parentLineX = parseFloat(getComputedStyle(node).getPropertyValue('--home-glyph-center')) || 21;
		var lineOriginY = sourceCenter;
		if(bottomConnector) {
			// Drop from under the parent tile center, then turn right onto a
			// horizontal where the plus/minus sits — entered from the left.
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
			child.style.setProperty('--home-parent-elbow-y', elbowY + 'px');
			var toggle = child.querySelector(':scope > .home-menu-toggle');
	var tileEdgeX = toggle ? (toggle.getBoundingClientRect().left - childRect.left + toggle.getBoundingClientRect().width / 2 - 8) : (childSourceRect.left - childRect.left - 8);
			child.style.setProperty('--home-parent-elbow-left', Math.min(lineX, tileEdgeX) + 'px');
			child.style.setProperty('--home-parent-elbow-width', Math.abs(tileEdgeX - lineX) + 'px');
		});

		// Bottom connectors: park the expand glyph soon after the leader START
		// (under the parent tile), not out at the first child's elbow.
		if(bottomConnector) {
			var hitSize = parseFloat(getComputedStyle(node).getPropertyValue('--home-glyph-hit-size')) || 32;
			// Just below the drop origin, centered on the vertical stem.
			var glyphTop = lineOriginY + hitSize * 0.15;
			var glyphLeft = parentLineX - hitSize / 2;
			node.style.setProperty('--home-bottom-glyph-y', glyphTop + 'px');
			node.style.setProperty('--home-bottom-glyph-x', glyphLeft + 'px');
		}
		else {
			node.style.removeProperty('--home-bottom-glyph-y');
			node.style.removeProperty('--home-bottom-glyph-x');
		}

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
				childRows[rowKey] = { left: childSourceRect.left, right: childSourceRect.right, centerY: rowCenterY };
			else {
				childRows[rowKey].left = Math.min(childRows[rowKey].left, childSourceRect.left);
				childRows[rowKey].right = Math.max(childRows[rowKey].right, childSourceRect.right);
			}
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
			var groupCenterY = (groupTop + groupBottom) / 2;
			var lineAbsoluteX = nodeRect.left + parentLineX;
			// Sit close left of the leftmost child tiles.
			var groupSpineX = groupLeft - 24;
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
	menu.classList.add('home-menu-ready');
}

function initHomeMenuMotion(menu) {
	if(menu.dataset.homeMotionInitialized || !('IntersectionObserver' in window)
		|| window.matchMedia('(prefers-reduced-motion: reduce)').matches)
		return;
	menu.dataset.homeMotionInitialized = 'true';

	var tiles = menu.querySelectorAll('.home-menu-level > .item_block_container');
	var observer = new IntersectionObserver(function(entries) {
		entries.forEach(function(entry) {
			if(!entry.isIntersecting)
				return;
			entry.target.classList.add('home-motion-visible');
			observer.unobserve(entry.target);
		});
	}, { rootMargin: '0px 0px 48px 0px', threshold: 0.08 });

	[].forEach.call(tiles, function(tile, index) {
		// Keep the first screen readable while connector layout is measured.
		if(tile.getClientRects().length && tile.getBoundingClientRect().top < window.innerHeight + 48)
			return;
		tile.style.setProperty('--home-motion-delay', ((index % 5) * 55) + 'ms');
		tile.classList.add('home-motion-pending');
		observer.observe(tile);
	});
	menu.classList.add('home-motion-enabled');
}

function initHomeWordReveal() {
	var message = document.getElementById('home-message');
	if(!message || message.dataset.wordsInitialized || window.matchMedia('(prefers-reduced-motion: reduce)').matches)
		return;
	message.dataset.wordsInitialized = 'true';
	var wordIndex = 0;
	var walker = document.createTreeWalker(message, NodeFilter.SHOW_TEXT);
	var nodes = [];
	while(walker.nextNode())
		nodes.push(walker.currentNode);
	nodes.forEach(function(node) {
		if(!node.nodeValue.trim())
			return;
		var fragment = document.createDocumentFragment();
		node.nodeValue.split(/(\s+)/).forEach(function(part) {
			if(!part)
				return;
			if(/^\s+$/.test(part)) {
				fragment.appendChild(document.createTextNode(part));
				return;
			}
			var word = document.createElement('span');
			word.className = 'home-word';
			word.style.setProperty('--home-word-delay', (wordIndex++ * 85) + 'ms');
			word.textContent = part;
			fragment.appendChild(word);
		});
		node.parentNode.replaceChild(fragment, node);
	});
	message.classList.add('home-words-ready');
}

function initProfileImageDialog() {
	var portrait = document.getElementById('profile-image');
	var dialog = document.getElementById('profile-image-dialog');
	if(portrait && !dialog) {
		var hindi = document.documentElement.lang == 'hi';
		dialog = document.createElement('dialog');
		dialog.id = 'profile-image-dialog';
		dialog.setAttribute('aria-label', hindi ? 'प्रोफ़ाइल चित्र' : 'Profile picture');
		var headerTitle = document.getElementById('header-title');
		if(headerTitle) {
			var slogan = headerTitle.querySelector('#header-slogan-text');
			var logo = headerTitle.querySelector('#header-logo-image svg');
			if(slogan && logo) {
				var brand = document.createElement('div');
				brand.className = 'profile-image-dialog-brand';
				var brandSlogan = document.createElement('span');
				brandSlogan.className = 'profile-image-dialog-slogan';
				brandSlogan.textContent = slogan.textContent;
				brandSlogan.style.fontSize = slogan.style.fontSize;
				brand.appendChild(brandSlogan);
				brand.appendChild(logo.cloneNode(true));
				dialog.appendChild(brand);
			}
		}
		var image = document.createElement('img');
		image.src = portrait.querySelector('img').src;
		image.alt = '';
		var photo = document.createElement('figure');
		photo.className = 'profile-image-dialog-photo';
		var caption = document.createElement('figcaption');
		caption.className = 'profile-image-dialog-name';
		caption.textContent = 'Ujjwal Singh';
		photo.appendChild(image);
		photo.appendChild(caption);
		var close = document.createElement('button');
		close.id = 'profile-image-dialog-close';
		close.type = 'button';
		close.setAttribute('aria-label', hindi ? 'प्रोफ़ाइल चित्र बंद करें' : 'Close profile picture');
		close.innerHTML = '&times;';
		dialog.appendChild(photo);
		dialog.appendChild(close);
		document.body.appendChild(dialog);
	}
	if(portrait && dialog && !portrait.dataset.dialogInitialized) {
		portrait.dataset.dialogInitialized = 'true';
		portrait.setAttribute('role', 'button');
		portrait.setAttribute('aria-label', document.documentElement.lang == 'hi' ? 'प्रोफ़ाइल चित्र बड़ा करें' : 'Enlarge profile picture');
		portrait.addEventListener('click', function(event) {
			event.preventDefault();
			dialog.showModal();
		});
		portrait.addEventListener('keydown', function(event) {
			if(event.key == ' ') {
				event.preventDefault();
				dialog.showModal();
			}
		});
		if(!dialog.dataset.closeInitialized) {
			dialog.dataset.closeInitialized = 'true';
			dialog.querySelector('#profile-image-dialog-close').addEventListener('click', function() { dialog.close(); });
			dialog.addEventListener('click', function(event) {
				if(event.target === dialog)
					dialog.close();
			});
		}
	}
}

function root() {
	initHomeWordReveal();
	initProfileImageDialog();

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
		target.classList.toggle('home-branch-opening', !expanded);
		requestAnimationFrame(syncHomeMenuConnectors);
		});
	});

	syncHomeMenuConnectors();
	var homeMenu = document.getElementById('home-menu');
	if(homeMenu) {
		// AJAX inserts the whole tree at once. The first geometry pass changes
		// connector classes and wrapping, so measure again after layout settles.
		requestAnimationFrame(function() {
			syncHomeMenuConnectors();
			requestAnimationFrame(function() {
				syncHomeMenuConnectors();
				initHomeMenuMotion(homeMenu);
			});
		});
	}

	if(!root.homeMenuResizeInitialized) {
		root.homeMenuResizeInitialized = true;
		window.addEventListener('resize', syncHomeMenuConnectors);
	}
}
