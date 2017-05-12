// external PROJECT_TITLE
var curTab;
var intrvl = 0;
var gTarget;
var URLid;

var menuActive = false;
var isTranslateButtonActive;
var isSearchButtonActive;

var activateMenuFn = function() {
	var nav_menu = document.querySelector( '#nav-menu' ),
		canvas_main = document.querySelector( '#canvas-main' ),
		main_wrapper = document.querySelector( '#main-wrapper' ),
		menu_button = document.querySelector( '#menu-button' );
	classie.add( main_wrapper, 'pml-open' );
	classie.add( menu_button, 'active' );
	activeNav = 'pml-open';
	var height = nav_menu.scrollHeight;
	canvas_main.style.maxHeight = height+'px';
	nav_menu.style.maxHeight = null;
	menuActive = true;
	if(!(typeof (ga) === 'undefined')) {
		ga('set', 'page', '/'+'menu');
		ga('send', 'pageview');
	}
}

var transitionFromMenu;
var activateMainFn = function() {
	if(menuActive)
		transitionFromMenu = true;
	var main_wrapper = document.querySelector( '#main-wrapper' ),
		menu_button = document.querySelector( '#menu-button' );
	classie.remove( main_wrapper, 'pml-open' );
	classie.remove( menu_button, 'active' );
	menuActive = false;
}
