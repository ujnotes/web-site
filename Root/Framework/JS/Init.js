window.onload = function() {

	setXURL(document);
	var hashID = getHashID();
	URLid = getURLid();

	var canvas_main = document.querySelector('#canvas-main'),
		menu_button = document.querySelector('.toggle-push-left'),
		menu_items = document.querySelectorAll('.XURL'),
		header_button = document.querySelector('#header_button'),
		translate_button = document.querySelector('#translate-button'),
		search_button = document.querySelector('#search-button'),
		translate_box = document.querySelector('#google_translate_element'),
		search_box = document.querySelector('#search_box');

	if(!!hashID) {
		curTab = 'root';
		loadCanvas(document.getElementById(hashID));
	}
	else if(!!URLid)
		curTab = URLid;
	else
		curTab = 'root';

	if(URLid == 'menu') {
		menuActive = true;
		classie.add( menu_button, 'active' );
		canvas_main.style.maxHeight = document.querySelector('#nav-menu').scrollHeight+'px';
	}
	else
		document.querySelector('#nav-menu').style.maxHeight = canvas_main.scrollHeight+'px';

	if (!hashID && !URLid)
		window.history.replaceState({'id':'root'}, '', '/');

	menu_button.addEventListener( 'click', function() {
		if (!menuActive) {
			window.history.pushState({'id':'menu'}, '', '/'+'menu');
			activateMenuFn();
		}
		else {
			if(curTab == 'root' || curTab == 'menu')
				curTab = '';
			window.history.pushState({'id':curTab}, '', '/'+curTab);
			activateMainFn();
			canvas_main.style.maxHeight = null;
			document.querySelector('#nav-menu').style.maxHeight = canvas_main.scrollHeight+'px';
		}
	} );

	translate_button.addEventListener( 'click', function() {
		if(typeof isTranslateButtonActive === 'undefined') {
			var scriptTag = document.createElement('script');
			scriptTag.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
			// scriptTag.onload = implementationCode;
			// scriptTag.onreadystatechange = implementationCode;
			translate_button.parentNode.appendChild(scriptTag);
			isTranslateButtonActive = false;
		}
		if(!isTranslateButtonActive) {
			classie.add(translate_button, 'header-button-active');
			classie.remove(translate_box, 'hide_display');
			isTranslateButtonActive = true;
		}
		else {
			classie.remove(translate_button, 'header-button-active');
			classie.add(translate_box, 'hide_display');
			isTranslateButtonActive = false;
		}
	} );

	search_button.addEventListener( 'click', function() {
		if(isSearchButtonActive === undefined) {
			gcse_init();
			isSearchButtonActive = false;
		}
		if(!isSearchButtonActive) {
			classie.add(search_button, 'header-button-active');
			classie.remove(search_box, 'hide_display');
			isSearchButtonActive = true;
		}
		else {
			classie.remove(search_button, 'header-button-active');
			classie.add(search_box, 'hide_display');
			isSearchButtonActive = false;
		}
	});

	[].forEach.call(document.getElementsByClassName('coming-soon'), function(el) { el.addEventListener( 'click', function() {
		if(!(typeof (ga) === 'undefined')) {
			ga('send', 'event', {
				'eventCategory': 'download',
				'eventAction': 'click'
			});
		}
		alert("Hold your breath! Coming soon..");
	});});

	[].slice.call(menu_items).forEach( function(el,i) {
			el.addEventListener( 'click', function() {
				curTab = this.getAttribute('data-target');
				activateMainFn();
			} );
		} );

	if (!supportsSvg()) {
		var image_div = document.getElementsByClassName('image');
		var i;
		var l = image_div.length;
		for (i = 0; i < l; i++) {
			image_div[i].classList.add('no-svg');
		}
		// or even .className += ' no-svg'; for deeper support
	}

	initPageFunction(curTab);
	return false;

}
