<div id='message'>
	<h2>1. Line Ending CRLF</h2>
	<h4>1. core.autocrlf true</h4>
	<ol class="list-number content-list">
		<li><div>input is modified - to LF.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>output is modified - to CRLF on windows.</div></li>
	</ol>
	<h4>2. core.autocrlf input</h4>
	<ol class="list-number content-list">
		<li><div>input is modified - to LF.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>output is kept as it is.</div></li>
	</ol>
	<h4>3. core.autocrlf off</h4>
	<ol class="list-number content-list">
		<li><div>input not modified.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>output not modified.</div></li>
	</ol>
	<h2>2. File mode</h2>
	<ol class="list-number content-list">
		<li><div>git diff .\middleware.ts.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>2. diff --git a/middleware.ts b/middleware.ts</code></pre>
	<ol class="list-number content-list">
		<li><div>old mode 100755.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>new mode 100644.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>git config core.fileMode false.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
