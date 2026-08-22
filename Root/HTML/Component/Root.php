<?php
	require_once 'Fragment/Item_text.php';
	require_once 'Fragment/Item_image.php';
	require_once '../../HTML/Fragment/Home_menu.php';
?>
<div id='message'>
	<div>
		<div id='home-message'>
			<p>Hello,</p>
			<p>
				I am <a class="content-link XURL" href='/about_me' data-target='about_me' data-title='About me'>Ujjwal Singh</a>.
			</p>
			<p>
				Here I share my thoughts, findings and recommendations.
			</p>
			<p>
				I strive to make them more accurate and relevant.<br>
				As I come across new information, these may evolve.
			</p>
			<p>
				I discuss topics ranging from <?php link_xurl('world/philosophy/life', 'Life') ?>, <?php link_xurl('world/philosophy/death', 'Death') ?> and <?php link_xurl('world/philosophy/god', 'God') ?> to current affairs;<br>
				And computers &amp; tech.
			</p>
			<p>
				Follow 'Ujnotes' via the social channels down below.
			</P>
		</div>
		<div id='profile-image-container' class='message_leave'>
			<a id='profile-image' href='#'>
				<img src='/photo.jpg' alt="Author's picture">
			</a>
		</div>
	</div>
</div>
<div class='center' id='content-body-separator'></div>
<div class='message_center_div' id='home-menu'>
	<section class="home-menu-branch" aria-label="<?php echo htmlspecialchars(getComponentLabel('world')) ?>">
		<?php home_menu_render_branch('world'); ?>
	</section>
	<section class="home-menu-branch" aria-label="<?php echo htmlspecialchars(getComponentLabel('computer')) ?>">
		<?php home_menu_render_branch('computer'); ?>
	</section>
	<p id='home-image-disclaimer'>
		<strong>Image credits:</strong> Third-party images are used under their respective licenses or applicable copyright exceptions. Copyright remains with the respective owners. Where required, attribution and licensing information are provided with the image or its <a class='content-link XURL' href='/license' data-target='license' data-title='License'>source link</a>.
	</p>
</div>
<div id='fb_components'>
	<?php require('../HTML/Fragment/Component_FB_buttons.php') ?>
</div>
