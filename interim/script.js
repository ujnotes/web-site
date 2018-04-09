var notification_intrvl;
var init_loading_intrvl;
var fade_loading_intrvl;

function beginLoading() {
	document.getElementById("wait_loader").classList.remove('hide');
}

function stopLoading() {
	document.getElementById("wait_loader").classList.add('hide');
}

function initLoading() {
	clearTimeout(init_loading_intrvl);
	init_loading_intrvl = setTimeout(function() {
		beginLoading();
	}, 3000);	
}

function endLoading() {
	clearTimeout(init_loading_intrvl);
	clearTimeout(fade_loading_intrvl);
	stopLoading();
}

function fadeLoading() {
	clearTimeout(fade_loading_intrvl);
	fade_loading_intrvl = setTimeout(function() {
		stopLoading();
	}, 3000);
}

function errorLoading() {
	document.getElementById("notification").classList.remove('hide');
	clearTimeout(notification_intrvl); // ensure single timer
	notification_intrvl = setInterval(function() {
		document.getElementById("notification").classList.add('hide');
	}, 3000);
}

function fbReload() {
	try{
		FB.XFBML.parse();
	}catch(ex) {};
}
function getElementsByClassName(node, classname){
	if (node.getElementsByClassName) { // use native implementation if available
		return node.getElementsByClassName(classname);
	} else {
		return (function getElementsByClass(searchClass,node) {
				if ( node == null )
					node = document;
				var classElements = [],
						els = node.getElementsByTagName("*"),
						elsLen = els.length,
						pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)"), i, j;

				for (i = 0, j = 0; i < elsLen; i++) {
					if ( pattern.test(els[i].className) ) {
							classElements[j] = els[i];
							j++;
					}
				}
				return classElements;
		})(classname, node);
	}
}

function supportsSvg() {
	var div = document.createElement('div');
	div.innerHTML = '<svg/>';
	return (div.firstChild && div.firstChild.namespaceURI) == 'http://www.w3.org/2000/svg';
};
function loadCanvasI(m) {
	loadCanvasH(this);
	return false;
}

function loadCanvasH(e) {
	var target = e.getAttribute('data-target');
	if(target == 'root')
		URLid = '';
	else
		URLid = target;
	loadCanvas(target, e.getAttribute('data-title'));
	window.history.pushState({'id':target, 'title':e.getAttribute('data-title')}, '', '/'+URLid);
	if(!(typeof (ga) === 'undefined')) {
		ga('set', 'page', '/'+URLid);
		ga('send', 'pageview');
	}
}

function loadCanvas(target, title) {

	var date = document.getElementById('updated');
	var canvas_main = document.getElementById('canvas-main');
	var main_wrapper = document.getElementById('main-wrapper');

	classie.add(main_wrapper, 'hide_path_title_updated');
	classie.add(canvas_main, 'hide');

	var startTime = new Date().getTime();
	syncScrollReload.startTime = null;
	scrollTop();
	initLoading();
	if(target == 'root')
		classie.add(document.getElementById('title-container'), 'hide_scale');
	else
		classie.remove(document.getElementById('title-container'), 'hide_scale');
	classie.add(document.getElementById('path'), 'hide');
	classie.add(document.getElementById('title'), 'hide');

	var xmlhttp = new XMLHttpRequest();
	if(window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else { // IE6, IE5
		xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4) {
			if(target === gTarget) {
				var canvas_main = document.getElementById('canvas-main');
				switch (xmlhttp.status) {
				case 200: {
					endLoading();

					var resp = JSON.parse(xmlhttp.responseText);
					document.title = resp.desc + ' - ' + PROJECT_TITLE;
					if(target == 'root')
						updatePathTitle('', '&nbsp;');
					else
						updatePathTitle(resp.path, title);
					syncScrollReload(startTime, resp, target);
				} break;
				case 404: {
					document.getElementById('date').innerHTML = '';
					canvas_main.innerHTML = "Error: 404 - Resource not found!";
				} break;
				case 408:
				case 501:
				case 502: {
					document.getElementById('date').innerHTML = '';
					canvas_main.innerHTML = 'Error!';
					errorLoading();
				}
				}
			}
		}

	}

	gTarget = target;
	xmlhttp.open('GET', '/'+target+'.json', true);
	xmlhttp.setRequestHeader('Content-Type', 'text/plain;charset=UTF-8');
	xmlhttp.send();

}

function scrollTop() {
	scrollActive = true;
	var y = window.scrollY;
	var dy = 100;
	var scrollInterval = setInterval(function() {
		window.scrollTo(0, y);
		if(y <= 0) {
			clearInterval(scrollInterval);
			scrollActive = false;
			syncScrollReload();
		}
		else
			y = y-dy;
	}, 10);
}

var scrollActive;
function syncScrollReload(startTime, resp, target) {
	if(typeof startTime != 'undefined') {
		syncScrollReload.startTime = startTime;
		syncScrollReload.resp = resp;
		syncScrollReload.target = target;
		activateMainFn();
	}
	if(typeof syncScrollReload.startTime != 'undefined' && syncScrollReload.startTime != null && !scrollActive)
		executeReload(syncScrollReload.startTime, syncScrollReload.resp, syncScrollReload.target);
}

function executeReload(startTime, resp, target) {
	if(typeof reloadTimeout != 'undefined')
		clearTimeout(reloadTimeout);
	reloadTimeout = setTimeout( function() {
		var canvas_main = document.getElementById('canvas-main');
		var main_wrapper = document.getElementById('main-wrapper');
		document.getElementById('content').innerHTML = resp.content;
		classie.remove(canvas_main, 'hide');
		document.getElementById('date').innerHTML = resp.date;
		if(!URLid == '') {
			classie.remove(main_wrapper, 'hide_path_title_updated')
		}
		var height = document.getElementById('canvas-main').scrollHeight;
		document.getElementById('nav-menu').style.maxHeight = height+'px';
		document.getElementById('canvas-main').style.maxHeight = null;
		if(resp.xurl == '1')
			setXURL(document);
		if(resp.async == '1')
			initPageFunction(target);
		fbReload();
	}, getTimeOutDuration(new Date().getTime() - startTime) );
}

function getTimeOutDuration(elapsed) {
	timeout = 380 - elapsed;
	if(timeout < 0)
		return 0;
	else
		return timeout;
}

function updatePathTitle(path, title) {
	setTimeout(function() {
		document.getElementById('path').innerHTML = path;
		document.getElementById('title').innerHTML = title;
		classie.remove(document.getElementById('path'), 'hide');
		classie.remove(document.getElementById('title'), 'hide');
	}, 300);
}
/*
 * classList.js: Cross-browser full element.classList implementation.
 * 2011-06-15
 *
 * By Eli Grey, http://eligrey.com
 * Public Domain.
 * NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.
 */

/*global self, document, DOMException */

/*! @source http://purl.eligrey.com/github/classList.js/blob/master/classList.js*/

if (typeof document !== "undefined" && !("classList" in document.createElement("a"))) {

(function (view) {

"use strict";

var
	  classListProp = "classList"
	, protoProp = "prototype"
	, elemCtrProto = (view.HTMLElement || view.Element)[protoProp]
	, objCtr = Object
	, strTrim = String[protoProp].trim || function () {
		return this.replace(/^\s+|\s+$/g, "");
	}
	, arrIndexOf = Array[protoProp].indexOf || function (item) {
		var
			  i = 0
			, len = this.length
		;
		for (; i < len; i++) {
			if (i in this && this[i] === item) {
				return i;
			}
		}
		return -1;
	}
	// Vendors: please allow content code to instantiate DOMExceptions
	, DOMEx = function (type, message) {
		this.name = type;
		this.code = DOMException[type];
		this.message = message;
	}
	, checkTokenAndGetIndex = function (classList, token) {
		if (token === "") {
			throw new DOMEx(
				  "SYNTAX_ERR"
				, "An invalid or illegal string was specified"
			);
		}
		if (/\s/.test(token)) {
			throw new DOMEx(
				  "INVALID_CHARACTER_ERR"
				, "String contains an invalid character"
			);
		}
		return arrIndexOf.call(classList, token);
	}
	, ClassList = function (elem) {
		var
			  trimmedClasses = strTrim.call(elem.className)
			, classes = trimmedClasses ? trimmedClasses.split(/\s+/) : []
			, i = 0
			, len = classes.length
		;
		for (; i < len; i++) {
			this.push(classes[i]);
		}
		this._updateClassName = function () {
			elem.className = this.toString();
		};
	}
	, classListProto = ClassList[protoProp] = []
	, classListGetter = function () {
		return new ClassList(this);
	}
;
// Most DOMException implementations don't allow calling DOMException's toString()
// on non-DOMExceptions. Error's toString() is sufficient here.
DOMEx[protoProp] = Error[protoProp];
classListProto.item = function (i) {
	return this[i] || null;
};
classListProto.contains = function (token) {
	token += "";
	return checkTokenAndGetIndex(this, token) !== -1;
};
classListProto.add = function (token) {
	token += "";
	if (checkTokenAndGetIndex(this, token) === -1) {
		this.push(token);
		this._updateClassName();
	}
};
classListProto.remove = function (token) {
	token += "";
	var index = checkTokenAndGetIndex(this, token);
	if (index !== -1) {
		this.splice(index, 1);
		this._updateClassName();
	}
};
classListProto.toggle = function (token) {
	token += "";
	if (checkTokenAndGetIndex(this, token) === -1) {
		this.add(token);
	} else {
		this.remove(token);
	}
};
classListProto.toString = function () {
	return this.join(" ");
};

if (objCtr.defineProperty) {
	var classListPropDesc = {
		  get: classListGetter
		, enumerable: true
		, configurable: true
	};
	try {
		objCtr.defineProperty(elemCtrProto, classListProp, classListPropDesc);
	} catch (ex) { // IE 8 doesn't support enumerable:true
		if (ex.number === -0x7FF5EC54) {
			classListPropDesc.enumerable = false;
			objCtr.defineProperty(elemCtrProto, classListProp, classListPropDesc);
		}
	}
} else if (objCtr[protoProp].__defineGetter__) {
	elemCtrProto.__defineGetter__(classListProp, classListGetter);
}

}(self));

}

/*!
 * classie v1.0.1
 * class helper functions
 * from bonzo https://github.com/ded/bonzo
 * MIT license
 *//* 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true, unused: true */
/*global define: false, module: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else if ( typeof exports === 'object' ) {
  // CommonJS
  module.exports = classie;
} else {
  // browser global
  window.classie = classie;
}

})( window );window.onpopstate = function(e) { //window.addEventListener('popstate', function(e)
	if(!!e.state)
		if(e.state.id == 'menu')
			activateMenuFn();
		else {
			loadCanvas(e.state.id, e.state.title);
		}
}
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
var initPageFunction = function(path) {
	var pageFunction = path.replace('/', '__');
	if (typeof window[pageFunction] === 'function')
		window[pageFunction]();
}
// external PROJECT_TITLE
var curTab;
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

var activateMainFn = function() {
	var main_wrapper = document.querySelector( '#main-wrapper' ),
		menu_button = document.querySelector( '#menu-button' );
	classie.remove( main_wrapper, 'pml-open' );
	classie.remove( main_wrapper, 'hide_path_title_updated' );
	classie.remove( menu_button, 'active' );
	menuActive = false;
}
function getURLid() {
	var loc = window.location.pathname;
	if(loc == '/')
		return '';
	else
		return loc.substring(1);
}

function getHashID() {
	var hash = window.location.hash;
	if(hash.length == 0)
		return '';
	else
		return hash.substring(2);
}

function setXURL(node) {
	var arClassElement = getElementsByClassName(node, 'XURL');
	var n = arClassElement.length;
	for(i = 0; i < n; i++) {
		var a = arClassElement[i].children[0];
		arClassElement[i].onclick = loadCanvasI;
	}
}
function root() {
	var e = document.getElementById('profile-image');
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

function about_me() {
	gapi.plus.go("me_g-plus");
	twttr.widgets.load();
}

function presentation() {
	beginLoading();
}
