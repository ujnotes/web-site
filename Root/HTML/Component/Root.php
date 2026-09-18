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
				I discuss topics ranging from <?php link_xurl('philosophy/life', 'Life') ?>, <?php link_xurl('philosophy/death', 'Death') ?> and <?php link_xurl('philosophy/god', 'God') ?> to current affairs;<br>
				And <?php link_xurl('technology/computer', 'Computers') ?> &amp; <?php link_xurl('technology', 'Technology') ?>.
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
</div>
<div id='fb_components'>
	<?php require('../HTML/Fragment/Component_FB_buttons.php') ?>
</div>
