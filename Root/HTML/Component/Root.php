<?php
	require_once 'Fragment/Item_text.php';
	require_once 'Fragment/Item_image.php';
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
	<section class="home-menu-branch" aria-label="World">
		<?php group_image('page-list home-menu-level home-menu-level-0', 0, ['world', 'World']); ?>
		<?php group_image('page-list home-menu-level home-menu-level-1', 0, ['world/philosophy', 'Philosophy']); ?>
		<?php group_image('page-list home-menu-level home-menu-level-2', 0, ...getSubComponents('world/philosophy')); ?>
	</section>
	<section class="home-menu-branch" aria-label="Computer">
		<?php group_image('page-list home-menu-level home-menu-level-0', 0, ['computer', 'Computer']); ?>
		<?php group_image('page-list home-menu-level home-menu-level-1', 1, ['computer/os', 'OS', '//ujnotes.com/computer/os'], ['computer/program', 'Program', '//ujnotes.com/computer/program'], ['computer/programming', 'Programming', '//ujnotes.com/computer/programming'], ['computer/game', 'Game']); ?>
		<?php group_image('page-list home-menu-level home-menu-level-2', 0, ...getSubComponents('computer/game')); ?>
	</section>
</div>
<div id='fb_components'>
	<?php require('../HTML/Fragment/Component_FB_buttons.php') ?>
</div>
