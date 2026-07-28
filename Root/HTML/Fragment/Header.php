<div id='header-wrapper'>
	<div id='header-title'>
		<div id='header-slogan' class='XURL' data-target='root' data-title=''>
			<a id='header-slogan-href' href='/'>
				<div id='header-slogan-text'>my notes</div>
			</a>
		</div>
		<div id='header-logo' class='XURL' data-target='root' data-title=''>
			<a id='header-logo-image' href='/' class='header-logo image'>
				<?php includeSVG('', 'Logo_Full'); ?>
			</a>
		</div>
	</div>
	<div id='header-bar'>
	<div><div class='toggle-push-left image grow' id='menu-button'><?php includeSVG('', 'Menu_icon'); ?></div></div>
	<div id='loading'></div>
	<div id='header-right-list'>
		<div id='header_buttons_right'>
			<div id='header_button'>
				<div id='search-button' class='grow'><div class='image'><?php includeSVG('', 'Search'); ?></div></div>
				<div id='translate-button' class='grow'><div class='image'><?php includeSVG('', 'Translate'); ?></div></div>
				<div id='theme-selector'>
					<button id='darkmode-button' class='grow' type='button' aria-haspopup='menu' aria-expanded='false'>
						<span class='theme-current-icon image' data-theme-icon='light'><?php includeSVG('', 'Light_mode'); ?></span>
						<span class='theme-current-icon image' data-theme-icon='dark'><?php includeSVG('', 'Dark_mode'); ?></span>
					</button>
					<div id='theme-menu' role='menu' aria-label='Theme' hidden>
						<button class='theme-option' type='button' role='menuitemradio' data-theme='system'>
							<span class='theme-option-icon image'><?php includeSVG('', 'System_mode'); ?></span><span>System</span>
						</button>
						<button class='theme-option' type='button' role='menuitemradio' data-theme='light'>
							<span class='theme-option-icon image'><?php includeSVG('', 'Light_mode'); ?></span><span>Light</span>
						</button>
						<button class='theme-option' type='button' role='menuitemradio' data-theme='dark'>
							<span class='theme-option-icon image'><?php includeSVG('', 'Dark_mode'); ?></span><span>Dark</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<div id='header-wrapper-divider'></div>
