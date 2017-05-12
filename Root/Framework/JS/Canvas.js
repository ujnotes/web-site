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

	//canvas_main.innerHTML = '';
	var startTime = new Date().getTime();
	syncScrollReload.startTime = null;
	scrollTop();
	beginLoading();

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
					if(target == 'root') {
						document.getElementById('path').innerHTML = '&nbsp;';
						document.getElementById('title').innerHTML = '&nbsp;';
						classie.add(document.getElementById('title'), 'hide_scale');
					}
					else {
						document.getElementById('path').innerHTML = resp.path;
						document.getElementById('title').innerHTML = title;
					}
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
	var scrollInterval = setInterval(function(){
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
		content.innerHTML = resp.content;
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
	if(transitionFromMenu) {
		transitionFromMenu = false;
		return 0;
	}
	else {
		timeout = 350 - elapsed;
		if(timeout < 0)
			return 0;
		else
			return timeout;		
	}
}
