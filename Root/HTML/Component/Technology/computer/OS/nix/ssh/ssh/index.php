<div id='message'>
	<p>
		Configure the SSH server (SSHD).
	</p>
	<h2>Configure server (SSHD)</h2>
	<pre class='indent-c'><code class='block'>/etc/sshd
/etc/ssh/sshd_config</code></pre>
	<h4>Effective SSHD config</h4>
	<pre class='indent-c'><code class='block'>grep -v "^#" /etc/ssh/sshd_config | grep -v "^$"</code></pre>
	<pre class='indent-c'><code class='block'>AuthorizedKeysFile      [%h/].ssh/authorized_keys</code></pre>
	<h2>Place public key</h2>
	<pre class='indent-c'><code class='block'>~/.ssh/authorized_keys</code></pre>
	<p>
		Format, single line:
	</p>
	<pre class='indent-c'><code class='block'>[IP&lt;space&gt;]&lt;sha256&gt;&lt;ssh-rsa&gt;&lt;space&gt;&lt;&lt;key&gt;[=...]&gt;[&lt;space&gt;&lt;Comment&gt;]</code></pre>
	<h2>Restrict permission to user</h2>
	<pre class='indent-c'><code class='block'>chmod 0700 ~/.ssh
chmod 0600 ~/.ssh/authorized_keys</code></pre>
	<h2>Restart SSHD</h2>
	<p>
		On Ubuntu, even though the service is called sshd:
	</p>
	<pre class='indent-c'><code class='block'>sudo service ssh restart</code></pre>
	<h2>Log</h2>
	<pre class='indent-c'><code class='block'>tail -f /var/log/auth.log</code></pre>
	<h2>Lockdown root password login</h2>
	<p>
		In <code class='inline'>/etc/ssh/sshd_config</code>:
	</p>
	<pre class='indent-c'><code class='block'>PermitRootLogin without-password</code></pre>
	<p>
		Reload sshd by PID:
	</p>
	<pre class='indent-c'><code class='block'>ps auxw | grep ssh
kill -HUP &lt;PID&gt;</code></pre>
	<p>
		Caution: <code class='inline'>kill -HUP</code> reloads sshd; a bad config can lock you out.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
