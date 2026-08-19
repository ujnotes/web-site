<div id='message'>
	<h2>Generate keys</h2>
	<pre class='indent-c'><code class='block'>ssh-keygen -t rsa</code></pre>
	<p>
		Specify the path when prompted. It does not take it by default.
	</p>
	<h2>Remove a host key</h2>
	<pre class='indent-c'><code class='block'>ssh-keygen -R &lt;host&gt;</code></pre>
	<p>
		Removes the key from <code class='inline'>known_hosts</code>.
	</p>
	<h2>Add a key file</h2>
	<pre class='indent-c'><code class='block'>ssh-add &lt;file.pem&gt;</code></pre>
	<p>
		Adds the key file to the global store, for direct login without having to specify the key file.
	</p>
	<h2>Verbose</h2>
	<pre class='indent-c'><code class='block'>ssh -v</code></pre>
	<h2>Input key file</h2>
	<pre class='indent-c'><code class='block'>-i &lt;input file&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
