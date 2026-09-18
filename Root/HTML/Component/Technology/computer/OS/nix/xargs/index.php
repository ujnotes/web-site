<div id='message'>
	<p>
		xargs -n, -l, and -I placeholder replacement, including quoting and ampersand escape.
	</p>
	<p>
		http://offbytwo.com/2011/06/26/things-you-didnt-know-about-xargs.html
	</p>
	<h2>Flags</h2>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>-n &lt;n&gt;</code> — max arguments</div></li>
		<li><div><code class='inline'>-l &lt;l&gt;</code> — max lines</div></li>
		<li><div><code class='inline'>-I &lt;placeholder_char&gt;</code> — replaces <code class='inline'>&lt;placeholder_char&gt;</code> with the argument, irrespective of quoting</div></li>
	</ul>
	<h2>Escape</h2>
	<p>
		Ampersand: escape with <code class='inline'>\</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
