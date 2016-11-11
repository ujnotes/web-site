// external PROJECT_TITLE
var curTab;
var intrvl = 0;
var gTarget;
/*if (document.readyState == "complete" || document.readySate == "loaded" || document.readyState == "interactive")
{
	var x = 0;
	x++;
     // document has at least been parsed
}*/
//var tb = (Date.now());
/*var aeCalled = false;
if(document.addEventListener)
	document.addEventListener('DOMContentLoaded', Init)
else if(document.attachEvent) {
	function TryScroll() {
		if(aeCalled)
			return;
		try {
			document.documentElement.doScroll("left")
			aeCalled = true;
			Init();
		}
		catch(e) {
			setTimeout(TryScroll, 10)
		}
	}
	TryScroll();
}
else*/
	window.onload = Init;

var trackOutboundLink = function(title, url) {
   	if(!(typeof (ga) === 'undefined')) {
			if(!(typeof (title) === 'undefined'))
				title = url;
			ga('send', 'event', 'outbound', 'click', title, {
	     'transport': 'beacon',
	     'hitCallback': function(){document.location = url;}
	   });
	 }
}

window.onpopstate = function(e) { //window.addEventListener('popstate', function(e)
	if(!!e.state)
		if(e.state.id == "menu")
			activateMenuFn();
		else {
			LoadCanvas(e.state.id, e.state.title);
			activateMainFn();
		}
}

var menuActive = false;

function Init() {
//console.log(Date.now()-tb);
	SetXURL(document);
	var hashID = GetHashID();
	var URLID = GetURLID();

	var canvas_main = document.querySelector( '#canvas-main' ),
		menu_button = document.querySelector( ".toggle-push-left" ),
		menu_items = document.querySelectorAll(".XURL");

	if(!!hashID) {
		curTab = "root";//document.getElementById('root');
		LoadCanvas(document.getElementById(hashID));
	}
	else if(!!URLID)
		curTab = URLID;//document.getElementById(URLID);
	else
		curTab = "root";//document.getElementById('root');

	if(URLID == "menu") {
		menuActive = true;
		classie.add( menu_button, "active" );
		canvas_main.style.maxHeight = document.querySelector('#nav-menu').scrollHeight+"px";
	}
	else
		document.querySelector('#nav-menu').style.maxHeight = canvas_main.scrollHeight+"px";

	if (!hashID && !URLID)
		window.history.replaceState({"id":"root"}, "", "/");

	menu_button.addEventListener( "click", function(){
		if (!menuActive) {
			activateMenuFn();
		}
		else {
			if(curTab == 'root' || curTab == 'menu')
				curTab = "";
			window.history.pushState({"id":curTab}, "", "/"+curTab);
			activateMainFn();
			canvas_main.style.maxHeight = "99999px";
			document.querySelector('#nav-menu').style.maxHeight = canvas_main.scrollHeight+"px";
			document.getElementById('path').style.visibility = "visible";
			document.getElementById('title').style.visibility = "visible";
			document.getElementById('updated').style.visibility = "visible";

		}
    } );

	[].forEach.call(document.getElementsByClassName('coming-soon'), function(el) { el.addEventListener( 'click', function() {
		if(!(typeof (ga) === "undefined")) {
			ga('send', 'event', {
			  'eventCategory': 'download',
			  'eventAction': 'click'
			});
		}
		alert("Hold your breath! Coming soon..");
	});});

	[].slice.call(menu_items).forEach(function(el,i){
        el.addEventListener( "click", function(){
            //activeNav = "";
			curTab = this.getAttribute('data-target');
			activateMainFn();
        } );
    });

	if (!supportsSvg()) {
		var image_div = document.getElementsByClassName('image');
		var i;
		var l = image_div.length;
		for (i = 0; i < l; i++) {
			image_div[i].classList.add("no-svg");
		}
		// or even .className += " no-svg"; for deeper support
	}

	initPageFunction(curTab);
	return false;
}

var initPageFunction = function(path) {
	var pageFunction = path.replace("/", "__");
	if (typeof window[pageFunction] === "function")
		window[pageFunction]();
}

var activateMenuFn = function() {
	document.getElementById('path').style.visibility = "hidden";
	document.getElementById('title').style.visibility = "hidden";
	document.getElementById('updated').style.visibility = "hidden";
	var nav_menu = document.querySelector( '#nav-menu' ),
		canvas_main = document.querySelector( '#canvas-main' ),
		canvas_wrapper = document.querySelector( "#canvas-wrapper" ),
		menu_button = document.querySelector( "#menu-button" );
	window.history.pushState({"id":"menu"}, "", "/"+"menu");
	classie.add( canvas_wrapper, "pml-open" );
	classie.add( menu_button, "active" );
	//document.body.appendChild(mask);
	activeNav = "pml-open";
	var height = nav_menu.scrollHeight;
	canvas_main.style.maxHeight = height+"px";
	nav_menu.style.maxHeight = "99999px";
	menuActive = true;
	if(!(typeof (ga) === "undefined")) {
		ga('set', 'page', '/'+'menu');
		ga('send', 'pageview');
	}
}

var activateMainFn = function() {
	var nav_menu = document.querySelector( '#nav-menu' ),
		canvas_wrapper = document.querySelector( "#canvas-wrapper" ),
		menu_button = document.querySelector( "#menu-button" );
	classie.remove( canvas_wrapper, "pml-open" );
	classie.remove( menu_button, "active" );
	//var height = canvas_main.clientHeight;
	//nav_menu.setAttribute("style", "max-height:"+height+"px");
	//canvas_main.setAttribute("style", "height:auto");
	menuActive = false;
}

function GetURLID() {
	var loc = window.location.pathname;
	if(loc == '/')
		return "";
	else
		return loc.substring(1);
}

function GetHashID() {
	var hash = window.location.hash;
	if(hash.length == 0)
		return "";
	else
		return hash.substring(2);
}

function SetXURL(node) {
	var arClassElement = getElementsByClassName(node, 'XURL');
	var n = arClassElement.length;
	for(i = 0; i < n; i++) {
		var a = arClassElement[i].children[0];
		//a.onclick = function(){return false};
		arClassElement[i].onclick = LoadCanvasI;
	}
}

function LoadCanvasI(m) {
	LoadCanvasH(this);
	return false;
}

function LoadCanvasH(e) {
	var target = e.getAttribute('data-target');
	if(target == "root")
		URLid = "";
	else
		URLid = target;
	LoadCanvas(target, e.getAttribute('data-title'));
	window.history.pushState({"id":target, "title":e.getAttribute('data-title')}, "", "/"+URLid);
	if(!(typeof (ga) === "undefined")) {
		ga('set', 'page', '/'+URLid);
		ga('send', 'pageview');
	}
}

function LoadCanvas(target, title) {
	//var target = e.getAttribute('data-target');
	if(target == "root") {
		document.getElementById('path').style.visibility = "hidden";
		document.getElementById('title').style.visibility = "hidden";
  }
	// if(!!curTab)
		// curTab.classList.remove('sidebar-nav-high');
	// curTab = e;
	// e.classList.add('sidebar-nav-high');

	// var sideBar = document.getElementById('sidebar-nav');
	// sideBar.style.display = 'none';
	// sideBar.style.display = 'block';

	var date = document.getElementById('updated');
	var canvas_main = document.getElementById('canvas-main');

	canvas_main.innerHTML = "";
	date.style.visibility='hidden';
	beginLoading();

	var xmlhttp = new XMLHttpRequest();
	if(window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else { // IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4) {
			if(target === gTarget) {
				var canvas_main = document.getElementById('canvas-main');
				switch (xmlhttp.status) {
				case 200: {
					killLoading();

					var resp = JSON.parse(xmlhttp.responseText);

					var bXURL = resp.xurl;
					var bASCR = resp.async;
					var titleBar = PROJECT_TITLE;
					if(target != "root")
						titleBar += " - " + title;

					//var lTitle = resp.desc.length;
					//if(lTitle != 0)
					titleBar += " : " + resp.desc;
					document.title = titleBar;
					if(target == "root") {
						document.getElementById('path').innerHTML = "&nbsp;";
						document.getElementById('title').innerHTML = "";
					}
					else {
						document.getElementById('path').innerHTML = resp.path;
						document.getElementById('title').innerHTML = title;
					}
					canvas_main.innerHTML = resp.content;
					document.getElementById('updated').style.display = 'block';
					document.getElementById('date').innerHTML = resp.date;
					if(!URLid == "") {
						document.getElementById('path').style.visibility = "visible";
						document.getElementById('title').style.visibility = "visible";
					}
					document.getElementById('updated').style.visibility = "visible";
					var height = document.getElementById('canvas-main').scrollHeight;
					document.getElementById('nav-menu').style.maxHeight = height+"px";
					document.getElementById('canvas-main').style.maxHeight = "99999px";
					date.style.visibility='visible';
					if(bXURL == "1")
						SetXURL(document);
					if(bASCR == "1")
						initPageFunction(target);
					fbReload();
				} break;
				case 404: {
					document.getElementById('updated').style.display = 'none';
					document.getElementById('date').innerHTML = "";
					canvas_main.innerHTML = "Error: 404 - Resource not found!";
				} break;
				case 408:
				case 501:
				case 502: {
					document.getElementById('date').innerHTML = "";
					document.getElementById('updated').style.display = 'none';
					canvas_main.innerHTML = "Error!";
					errorLoading();
				}
				}
			}
		}
	}
	gTarget = target;
	xmlhttp.open("GET", "/"+target+".json", true);
	xmlhttp.setRequestHeader("Content-Type", "text/plain;charset=UTF-8");//application/xhtml+xml
	xmlhttp.send();
}
