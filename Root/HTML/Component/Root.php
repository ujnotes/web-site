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
		<div class="home-menu-node">
			<button class="home-menu-toggle" type="button" aria-expanded="true" aria-controls="home-world-children" aria-label="Collapse World descendants" data-home-menu-toggle data-home-menu-label="World descendants"><span aria-hidden="true"></span></button>
			<?php group_image('page-list home-menu-level home-menu-level-0', 0, ['world', 'World']); ?>
		</div>
		<div class="home-menu-subtree" id="home-world-children">
			<div class="home-menu-node">
				<button class="home-menu-toggle" type="button" aria-expanded="true" aria-controls="home-world-grandchildren" aria-label="Collapse Philosophy articles" data-home-menu-toggle data-home-menu-label="Philosophy articles"><span aria-hidden="true"></span></button>
				<?php group_image('page-list home-menu-level home-menu-level-1', 0, ['world/philosophy', 'Philosophy']); ?>
			</div>
			<div class="home-menu-subtree" id="home-world-grandchildren">
				<?php group_image('page-list home-menu-level home-menu-level-2', 0, ...getSubComponents('world/philosophy')); ?>
			</div>
		</div>
	</section>
	<section class="home-menu-branch" aria-label="Computer">
		<div class="home-menu-node">
			<button class="home-menu-toggle" type="button" aria-expanded="true" aria-controls="home-computer-children" aria-label="Collapse Computer descendants" data-home-menu-toggle data-home-menu-label="Computer descendants"><span aria-hidden="true"></span></button>
			<?php group_image('page-list home-menu-level home-menu-level-0', 0, ['computer', 'Computer']); ?>
		</div>
		<div class="home-menu-subtree" id="home-computer-children">
			<div class="home-menu-node">
				<button class="home-menu-toggle" type="button" aria-expanded="true" aria-controls="home-computer-grandchildren" aria-label="Collapse Game articles" data-home-menu-toggle data-home-menu-label="Game articles"><span aria-hidden="true"></span></button>
				<?php group_image('page-list home-menu-level home-menu-level-1', 1, ['computer/os', 'OS', '//ujnotes.com/computer/os'], ['computer/program', 'Program', '//ujnotes.com/computer/program'], ['computer/programming', 'Programming', '//ujnotes.com/computer/programming'], ['computer/game', 'Game']); ?>
			</div>
			<div class="home-menu-subtree" id="home-computer-grandchildren">
				<?php group_image('page-list home-menu-level home-menu-level-2', 0, ...getSubComponents('computer/game')); ?>
			</div>
		</div>
	</section>
</div>
<div id='fb_components'>
	<?php require('../HTML/Fragment/Component_FB_buttons.php') ?>
</div>
