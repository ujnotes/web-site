<div id='message'>
	<p>
		Cygwin home is not the Windows user profile by default. Set <code class='inline'>db_home</code> in <code class='inline'>/etc/nsswitch.conf</code> so Cygwin uses the Windows home directory.
	</p>
	<p>
		http://stackoverflow.com/questions/1494658/how-can-i-change-my-cygwin-home-folder-after-installation
	</p>
	<h2>nsswitch.conf</h2>
	<p>
		In <code class='inline'>/etc/nsswitch.conf</code>:
	</p>
	<pre class='indent-c'><code class='block'>db_home: &lt;dir&gt;</code></pre>
	<p>
		Values:
	</p>
	<pre class='indent-c'><code class='block'>windows
/%H
/%H/cygwin</code></pre>
	<p>
		<code class='inline'>windows</code> uses the Windows home. <code class='inline'>/%H</code> is that home path. <code class='inline'>/%H/cygwin</code> puts Cygwin home under a <code class='inline'>cygwin</code> subdirectory of Windows home.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
