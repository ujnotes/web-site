<div id='message'>
	<pre class='indent-c'><code class='block'>file:////&lt;host&gt;/&lt;share&gt;/&lt;path&gt;</code></pre>
	<p>
		UNC path.
	</p>
	<pre class='indent-c'><code class='block'>\\&lt;network-computer&gt;\&lt;path&gt;</code></pre>
	<pre class='indent-c'><code class='block'>file://&lt;drive&gt;:\&lt;path&gt;</code></pre>
	<h2>1. Remote</h2>
	<h4>1. Create remote directory</h4>
	<pre class='indent-c'><code class='block'>1. git init --bare</code></pre>
	<h2>2. At client</h2>
	<h4>1.</h4>
	<p>
		Should not be a part of a present repo.
	</p>
	<ol class="list-number content-list">
		<li><div>Extract and work on it separately.</div></li>
	</ol>
	<h4>2. Add remote</h4>
	<ol class="list-number content-list">
		<li><div>git remote add origin file:///.</div></li>
	</ol>
	<h4>3. Push</h4>
	<pre class='indent-c'><code class='block'>1. git push --set-upstream origin master</code></pre>
	<pre class='indent-c'><code class='block'>/ -u for --set-upstream</code></pre>
	<pre class='indent-c'><code class='block'>git remote set-url origin file:///d/Personal/Project/&lt;Project&gt;/Repo/&lt;Component&gt;/Project</code></pre>
	<h2>git fetch suffices</h2>
	<p>
		Bares can only fetch, and not pull.
	</p>
	<p>
		Remote cannot fetch from client.
	</p>
	<p>
		Only client can push to origin.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
