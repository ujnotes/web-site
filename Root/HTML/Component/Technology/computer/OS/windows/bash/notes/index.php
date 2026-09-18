<div id='message'>
	<h2>lxrun</h2>
	<pre class='indent-c'><code class='block'>lxrun /setdefaultuser &lt;user_name&gt;</code></pre>
	<p>
		<code class='inline'>root</code> boots into that account directly.
	</p>
	<pre class='indent-c'><code class='block'>lxrun /update</code></pre>
	<p>
		Updates package indexes.
	</p>
	<h2>Location</h2>
	<pre class='indent-c'><code class='block'>%localAppData%\lxss</code></pre>
	<h2>Reset password</h2>
	<p>
		Log in as root:
	</p>
	<pre class='indent-c'><code class='block'>lxrun /setdefaultuser root</code></pre>
	<p>
		Then set the user password:
	</p>
	<pre class='indent-c'><code class='block'>passwd &lt;user&gt;</code></pre>
	<h2>Paths</h2>
	<p>
		C drive:
	</p>
	<pre class='indent-c'><code class='block'>/mnt/c</code></pre>
	<p>
		User files:
	</p>
	<pre class='indent-c'><code class='block'>/mnt/c/Users/&lt;user&gt;/</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
