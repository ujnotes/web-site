<div class='message'>
	<span id='home-message'>
		<span>Hello,</span>
		<p>
			I am <a class='content-link XURL' href='/about_me' data-target='about_me' data-title='About me'>Ujjwal Singh</a><br>
			Here I share my thoughts, findings and recommendations.
		</p>
		<p>
			I strive to make them more accurate and relevant.<br>
			As I come across new information, these may evolve.
		</p>
		<p>
			I discuss topics ranging from <?php link_xurl('life', 'Life') ?>, <?php link_xurl('death', 'Death') ?> and <?php link_xurl('god', 'God') ?> to current affairs;<br>
			And computers &amp; tech.
		</p>
		<p>
			Follow and subscribe to 'Ujnotes' via the social links down below.
		</P>
	</span>
	<span id='profile-image-container'>
		<a id='profile-image' href='#'>
			<img src='/photo.jpg' alt="Author's picture">
		</a>
	</span>
</div>
<div class='center' id='content-body-separator'></div>
<div id='home-menu'>
	<div><?php link_xurl('world', 'World') ?></div>
	<div class='sidebar-nav-group'>
		<a class='XURL block' href='/world/philosophy' data-target='world/philosophy' data-title='Philosophy'>
			<div>Philosophy</div>
		</a>
	</div>
	<!--
	'/universe' 'universe'
		'world/reality''Reality'
	-->
	<br>
	<div><?php link_xurl('computer', 'Computer') ?><span>(directory links)</span></div>
	<div class='sidebar-nav-group'>
		<a class='block' href='/computer/os' target='_blank' onclick="trackOutboundLink('OS','https://drive.google.com/folderview?id=0B0pxLafSqCjKQ0tXc281bnJoaTQ'); return false;">
			<div>OS</div>
		</a><a class='block' href='/computer/program' target='_blank' onclick="trackOutboundLink('Program','https://drive.google.com/folderview?id=0B0pxLafSqCjKZkdRZk5ac2p4Zlk'); return false;">
			<div>Program</div>
		</a><a class='block' href='/computer/programming' target='_blank' onclick="trackOutboundLink('Programming','https://drive.google.com/folderview?id=0B0pxLafSqCjKT244VW92b1pGVnM'); return false;">
			<div>Programming</div>
		</a><a class='XURL block' href='/computer/game' data-target='computer/game' data-title='Game'>
			<div>Game</div>
		</a>
	</div>
</div>
<div id='fb_components'>
	<?php require('..\HTML\Fragment\Component_FB_buttons.php') ?>
</div>
