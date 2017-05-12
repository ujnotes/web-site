function nowLoading() {
	var e = document.getElementById("loading");
	if(nowLoading.count === undefined) {
		nowLoading.count = 0;
		resetLoadingText(e);
		e.setAttribute("style", "visibility: visible");
	}
	else {
		if(nowLoading.count == 3)
			resetLoadingText(e);
		else {
			e.innerText += ".";
			nowLoading.count++;
		}
	}
}

function beginLoading() {
	clearTimeout(intrvl); // ensure single timer
	intrvl = setInterval(nowLoading, 1000);
}

function resetLoadingText(e) {
	e.innerText = "Loading";
}

function errorLoading() {
	var e = document.getElementById("loading");
	e.setAttribute("style", "visibility: visible");
	e.innerText = "Error!";
}

function endLoading() {
	var e = document.getElementById("loading");
	nowLoading.count = undefined;
	e.setAttribute("style", "visibility: hidden");
	clearTimeout(intrvl);
}

function fbReload() {
	try{
		FB.XFBML.parse();
	}catch(ex){}
}
