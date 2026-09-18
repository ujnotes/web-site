<div id='message'>
	<p>
		Unused CSS: Chrome audit (current state only), CSS Scanner, word-based PurifyCSS, and UnCSS on URLs via PhantomJS.
	</p>
	<h2>Audit</h2>
	<p>
		Chrome &gt; inspect &gt; audit.
	</p>
	<p>
		Only current state. No aggregate.
	</p>
	<h2>CSS Scanner</h2>
	<p>
		https://sourceforge.net/projects/cssscanner
	</p>
	<p>
		File based. Generates a report.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Multiple definition.</div></li>
		<li><div>Unused classes.</div></li>
		<li><div>No unused id.</div></li>
		<li><div>Defined but not used.</div></li>
		<li><div>Along with path.</div></li>
	</ul>
	<h2>PurifyCSS</h2>
	<p>
		Dumb — word based, no context. Can be used if the list is known.
	</p>
	<h2>Uncss</h2>
	<p>
		https://github.com/giakki/uncss
	</p>
	<p>
		https://addyosmani.com/blog/removing-unused-css
	</p>
	<p>
		File + URL based. URL preferred. PhantomJS, JavaScript evaluated.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
