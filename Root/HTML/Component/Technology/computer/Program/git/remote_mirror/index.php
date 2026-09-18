<div id='message'>
	<h2>Note</h2>
	<p>
		Every fetch overrides any local change.
	</p>
	<p>
		Thus this is meant to be in one direction only.
	</p>
	<p>
		Thereby useful only for full backup, and not distributed working repo system.
	</p>
	<p>
		Two types - push and pull.
	</p>
	<h2>So instead</h2>
	<h2>Main</h2>
	<pre class='indent-c'><code class='block'>git remote set-url --push origin &lt;mirrored&gt;</code></pre>
	<h2>Clones</h2>
	<pre class='indent-c'><code class='block'>git clone --bare &lt;ORIGIN_URL&gt;</code></pre>
	<pre class='indent-c'><code class='block'>git remote add --mirror=fetch repo1 &lt;URL&gt;</code></pre>
	<pre class='indent-c'><code class='block'>git fetch origin --tags</code></pre>
	<h2>git fetch origin *:*</h2>
	<p>
		Uses this if fetch is going to FETCH_HEAD instead.
	</p>
	<p>
		Causing git log to stay detached.
	</p>
	<p>
		To update mirrors from original.
	</p>
	<p>
		Add mirrors’ urls to original.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
