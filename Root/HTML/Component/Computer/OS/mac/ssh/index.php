<div id='message'>
	<h2>Generate</h2>
	<p>
		From <code class='inline'>~/.ssh</code>, write the public key from the private key:
	</p>
	<pre class='indent-c'><code class='block'>cd ~/.ssh
ssh-keygen -y -f id_rsa &gt; id_rsa.pub</code></pre>
	<p>
		<code class='inline'>-y</code> reads the private key and prints the public key. <code class='inline'>-f id_rsa</code> is the private key file. It will prompt for the passphrase.
	</p>
	<p>
		Permission: <code class='inline'>0644</code> for both <code class='inline'>id_rsa</code> and <code class='inline'>id_rsa.pub</code>.
	</p>
	<h2>Add</h2>
	<pre class='indent-c'><code class='block'>ssh-add -K &lt;path&gt;</code></pre>
	<p>
		<code class='inline'>-K</code> adds the key at <code class='inline'>&lt;path&gt;</code>. Permission: <code class='inline'>400</code> for only self access.
	</p>
	<h2>Debug</h2>
	<p>
		<code class='inline'>-vvv</code> is debug:
	</p>
	<pre class='indent-c'><code class='block'>ssh -vvv</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
