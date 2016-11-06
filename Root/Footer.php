<div id='footer-wrapper'>
	<div id='updated'>Updated:
		<span id='date'>
			<?php echo $date; ?>
		</span>
	</div>
	<div class='shadow-scroll-bottom'></div>
	<div id='footer-wrapper-divider'></div>
	<div id='footer-wrapper-inside'>
		<div id='social-links'>
			<span class='social'>
				<a href='https://twitter.com/ujnotesx' id='twitter' onclick='trackOutboundLink('ujnotes-twitter', 'https://twitter.com/ujnotesx'); return false;'><span class='image'><?php echo file_get_contents('Resource\twitter.svg'); ?></span></a>
			</span>
			<span class='social'>
				<a href='https://facebook.com/ujnotes' id='facebook' onclick='trackOutboundLink('ujnotes-facebook', 'https://facebook.com/ujnotes'); return false;'><span class='image'><?php echo file_get_contents('Resource\facebook.svg'); ?></span></a>
			</span>
			<span class='social'>
				<a href='https://plus.google.com/+ujnotesx' id='google' onclick='trackOutboundLink('ujnotes-google', 'https://plus.google.com/+ujnotesx'); return false;'><span class='image'><?php echo file_get_contents('Resource\google+.svg'); ?></span></a>
			</span>
		</div>
		<div id='footer-left'>
			<a class='content-link-grey XURL' href='/license' data-target='license' data-title='License'>Some rights reserved</a>
		</div>
		<div id='footer-right'>
			by <a class='content-link XURL' href='/about_me' data-target='about_me' data-title='About me' rel='author'>Ujjwal Singh</a>
		</div>
	</div>
</div>
