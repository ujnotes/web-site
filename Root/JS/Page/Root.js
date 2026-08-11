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
		button.addEventListener('click', function() {
			var target = document.getElementById(button.getAttribute('aria-controls'));
			if(!target)
				return;

			var expanded = button.getAttribute('aria-expanded') == 'true';
			button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
			button.setAttribute('aria-label', (expanded ? 'Expand ' : 'Collapse ') + button.getAttribute('data-home-menu-label'));
			target.hidden = expanded;
		});
	});
}
