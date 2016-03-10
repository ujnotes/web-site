function Loading() {
	var e = document.getElementById("loading");
	if(Loading.count === undefined) {
		Loading.count = 0;
		e.innerText = "Loading";
		e.setAttribute("style", "display: block");
	}
	else {
		if(Loading.count == 3)
			KillLoading();
		else {
			e.innerText += ".";
			Loading.count++;
		}
	}
}

function BeginLoading() {
	clearTimeout(intrvl); // ensure single timer
	intrvl = setInterval(Loading, 1000);
}

function KillLoading() {
	var e = document.getElementById("loading");
	Loading.count = undefined;
	e.setAttribute("style", "display: none");
	clearTimeout(intrvl);
}

function about_me() {
	gapi.plus.go("me_g-plus");
	twttr.widgets.load();
}

function presentation() {
	BeginLoading();
}
