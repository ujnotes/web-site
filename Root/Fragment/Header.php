<div id='header-wrapper' style='overflow: hidden'>
	<div id='header-title'>
	<div id='header-slogan' class='XURL' data-target='root' data-title=''>
		<a id='header-slogan-href' href='/'>
			<span id='header-slogan-text'>my notes</span>
		</a>
	</div>
	<div id='header-logo' class='XURL' data-target='root' data-title=''>
		<a id='header-logo-href' href='/'>
			<span id='header-logo-image' class='header-logo image'><?php echo file_get_contents('..\resource\logo_full.svg'); ?></span>
		</a>
	</div>
	</div>
	<div id='header-bar'>
	<div><span class='toggle-push-left image' id='menu-button'><?php echo file_get_contents('..\resource\menu_icon.svg'); ?></span></div>
	<div id='loading'></div>
	<div id='header-right-list'>
		<span id='download_button'>
			<div id='google_translate_element'></div>
			<script type='text/javascript'>
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false, gaTrack: true <?php if($bPublish) echo ", gaId: '".$config['google_analytics_id']."'"; ?>}, 'google_translate_element');
				}
			</script>
			<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
		</span>
	</div>
	</div>
</div>
<div id='header-wrapper-divider'></div>
