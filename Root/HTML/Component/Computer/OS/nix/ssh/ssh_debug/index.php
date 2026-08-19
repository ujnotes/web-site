<div id='message'>
	<h2>Server</h2>
	<h4>Effective SSHD config</h4>
	<pre class='indent-c'><code class='block'>grep -v "^#" /etc/ssh/sshd_config | grep -v "^$"</code></pre>
	<h4>Test mode</h4>
	<p>
		<code class='inline'>-t</code> only checks the validity of the configuration file and sanity of the keys. This is useful for updating sshd reliably as configuration options may change.
	</p>
	<p>
		Try a parallel version of sshd on a different (open) port with debugging enabled:
	</p>
	<pre class='indent-c'><code class='block'>/usr/sbin/sshd -ddd -p &lt;listening port&gt; [-h ~/.ssh/id_rsa] [-f /dev/null]</code></pre>
	<pre class='indent-c'><code class='block'>/bin/sshd -p &lt;listening port&gt; -D -d -e</code></pre>
	<p>
		<code class='inline'>-d</code> is debug level. <code class='inline'>-dd</code> is debug1, debug2. Messages will tail to the screen. Post-login details like environment variables will show up on the client.
	</p>
	<h2>Client</h2>
	<pre class='indent-c'><code class='block'>ssh -vvv -p &lt;listening port&gt; server-name</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
