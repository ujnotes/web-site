function closeCoverCredit(credit) {
	if(!credit)
		return;
	credit.classList.remove('is-open');
	var toggle = credit.querySelector('.cover-credit-toggle');
	if(toggle)
		toggle.setAttribute('aria-expanded', 'false');
}

function closeAllCoverCredits(except) {
	var open = document.querySelectorAll('.cover-credit.is-open');
	for(var i = 0; i < open.length; i++) {
		if(open[i] !== except)
			closeCoverCredit(open[i]);
	}
}

function openCoverCredit(credit) {
	if(!credit)
		return;
	closeAllCoverCredits(credit);
	credit.classList.add('is-open');
	var toggle = credit.querySelector('.cover-credit-toggle');
	if(toggle)
		toggle.setAttribute('aria-expanded', 'true');
}

document.addEventListener('click', function(event) {
	var toggle = event.target.closest('.cover-credit-toggle');
	if(toggle) {
		var credit = toggle.closest('.cover-credit');
		if(!credit)
			return;
		if(credit.classList.contains('is-open'))
			closeCoverCredit(credit);
		else
			openCoverCredit(credit);
		return;
	}
	if(!event.target.closest('.cover-credit'))
		closeAllCoverCredits();
});

document.addEventListener('keydown', function(event) {
	if(event.key === 'Escape')
		closeAllCoverCredits();
});
