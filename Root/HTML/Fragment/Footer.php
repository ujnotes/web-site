<div id='footer-wrapper'>
	<div id='updated-container'>
		<div id='updated'>
			Updated:
			<span id='date'>
				<?php echo $date; ?>
			</span>
		</div>
	</div>
	<div class='shadow-scroll-bottom'></div>
	<div id='footer-wrapper-divider'></div>
	<div class='footer-content' id='footer-support'>
		<a class='content-link' href='https://patreon.com/ujnotes' id='patreon' onclick="trackOutboundLink('ujnotes-patreon', 'https://patreon.com/ujnotes'); return false;">support project on Patreon</a>
	</div>
	<div id='footer-wrapper-inside'>
		<div id='social-links'>
			<span class='social'>
				<a href='https://twitter.com/ujnotesx' id='site-twitter' onclick="trackOutboundLink('ujnotes-twitter', 'https://twitter.com/ujnotesx'); return false;"><span class='image'><?php echo file_get_contents('..\..\Resource\twitter.svg'); ?></span></a>
			</span>
			<span class='social'>
				<a href='https://facebook.com/ujnotes' id='site-facebook' onclick="trackOutboundLink('ujnotes-facebook', 'https://facebook.com/ujnotes'); return false;"><span class='image'><?php echo file_get_contents('..\..\Resource\facebook.svg'); ?></span></a>
			</span>
			<span class='social'>
				<a href='https://www.youtube.com/channel/UCTwMsocIDjjMf4f0gFmMAtQ' id='site-youtube' onclick="trackOutboundLink('ujnotes-youtube', 'https://youtube.com/ujnotes'); return false;"><span class='image'><?php echo file_get_contents('..\..\Resource\youtube.svg'); ?></span></a>
			</span>
		</div>
		<div class='footer-content' id='footer-rights'>
			<a class='content-link-grey XURL' href='/license' data-target='license' data-title='License'>Some rights reserved</a>
		</div>
		<div class='footer-content'>
			by <a class='content-link XURL' href='/about_me' data-target='about_me' data-title='About me' rel='author'>Ujjwal Singh</a>
		</div>
	</div>
</div>
