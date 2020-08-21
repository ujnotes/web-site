<?php
	require_once 'Fragment\Item_text.php';
	require_once 'Fragment\Item_image.php';
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
	<div class="home-menu-group-parent"><?php link_xurl('world', 'World') ?></div>
	<?php group_image('page-list', 0, ['world/philosophy', 'Philosophy']); ?>
	<?php
	// '/universe' 'universe'
	// 	'world/reality''Reality'
	?>
	<br>
	<div class="home-menu-group-parent"><?php link_xurl('computer', 'Computer') ?></div>
	<?php group_image('page-list', 1, ['computer/os', 'OS', '//ujnotes.com/computer/os'], ['computer/program', 'Program', '//ujnotes.com/computer/program'], ['computer/programming', 'Programming', '//ujnotes.com/computer/programming'], ['computer/game', 'Game']); ?>
</div>
<div id='fb_components'>
	<?php require('..\HTML\Fragment\Component_FB_buttons.php') ?>
</div>
