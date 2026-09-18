<div id='message'>
	<ol class="list-number content-list">
		<li><div>Install node.js.</div></li>
	</ol>
	<h2>2. Download firebase</h2>
	<pre class='indent-c'><code class='block'>1. npm install -g firebase-tools</code></pre>
	<h2>3. Authenticate</h2>
	<ol class="list-number content-list">
		<li><div>firebase login.</div></li>
	</ol>
	<h2>4. Init</h2>
	<ol class="list-number content-list">
		<li><div>firebase init.</div></li>
	</ol>
	<h2>5. Directory structure</h2>
	<h4>1. Project directory</h4>
	<pre class='indent-c'><code class='block'>1. Project directory 1. &lt;public&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>Correct file (index.html, 404.html).</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Correct firebase.json.</div></li>
	</ol>
	<h2>8. Deploy</h2>
	<ol class="list-number content-list">
		<li><div>firebase deploy.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>2. firebase deploy --only hosting</code></pre>
	<h2>Alias</h2>
	<p>
		For environments like ‘staging’.
	</p>
	<pre class='indent-c'><code class='block'>firebase use --add</code></pre>
	<p>
		Prompts to select project.
	</p>
	<h2>Commands</h2>
	<p>
		Login.
	</p>
	<p>
		Logout.
	</p>
	<p>
		https://firebase.google.com/docs/cli
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
