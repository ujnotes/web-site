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
