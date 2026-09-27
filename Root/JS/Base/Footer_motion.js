document.addEventListener('DOMContentLoaded', function() {
	var footer = document.getElementById('footer-wrapper');
	if(!footer || !('IntersectionObserver' in window)
		|| window.matchMedia('(prefers-reduced-motion: reduce)').matches)
		return;
	footer.classList.add('footer-motion-pending');
	var observer = new IntersectionObserver(function(entries) {
		if(!entries[0].isIntersecting)
			return;
		requestAnimationFrame(function() {
			footer.classList.add('footer-motion-visible');
		});
		observer.disconnect();
	}, { threshold: .12, rootMargin: '0px 0px 24px 0px' });
	observer.observe(footer);
});
