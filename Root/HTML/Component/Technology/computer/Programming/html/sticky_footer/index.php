<div id='message'>
	<h2>Features</h2>
	<ol class="list-number content-list">
		<li><div>Sticks to the bottom.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>No JS.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>is pushed below current view if content is longer.</div></li>
	</ol>
	<h2>HTML</h2>
	<h2>html</h2>
	<p>
		Height:100%.
	</p>
	<h4>body</h4>
	<p>
		Height:100%.
	</p>
	<p>
		<strong>Main-Wrapper height.</strong> 100% margin-bottom: [height of footer] | Padding-bottom.
	</p>
	<p>
		<strong>Footer-Wrapper height.</strong> [height of footer].
	</p>
	<p>
		<strong>html, body{height.</strong> 100%;}.
	</p>
	<pre class='indent-c'><code class='block'>#body-wrapper {overflow: hidden; height: 100% !important; margin: 0 auto -36px;}</code></pre>
	<p>
		<strong>#footer-wrapper{clear.</strong> Both; height: 30px;}.
	</p>
	<p>
		________________.
	</p>
	<p>
		The basic premise is that the main body page is stretched to a 100% of the page. With a min-height of 100% too.
	</p>
	<h2>The footer is then given the following rules</h2>
	<p>
		#footer {.
	</p>
	<p>
		<strong>clear.</strong> Both;.
	</p>
	<p>
		<strong>position.</strong> Relative;.
	</p>
	<p>
		<strong>z-index.</strong> 10;.
	</p>
	<p>
		<strong>height.</strong> 3em;.
	</p>
	<pre class='indent-c'><code class='block'>margin-top: -3em;</code></pre>
	<p>
		}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
