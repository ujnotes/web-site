<div id='message'>
	<h2>Install desktop</h2>
	<pre class='indent-c'><code class='block'>apt-get install ubuntu-desktop</code></pre>
	<p>
		May require installing <code class='inline'>build-essential</code>.
	</p>
	<h2>Start desktop</h2>
	<pre class='indent-c'><code class='block'>startx</code></pre>
	<h2>Firewall</h2>
	<p>
		<code class='inline'>ufw</code> subcommands: <code class='inline'>status</code>, <code class='inline'>disable</code>, <code class='inline'>enable</code>, <code class='inline'>reset</code>, <code class='inline'>allow</code>.
	</p>
	<pre class='indent-c'><code class='block'>ufw status
ufw disable
ufw enable
ufw reset
ufw allow</code></pre>
	<p>
		Allow TCP:
	</p>
	<pre class='indent-c'><code class='block'>proto tcp from any to any port __</code></pre>
	<p>
		<code class='inline'>&lt;Samba&gt;</code> as an allow target.
	</p>
	<h4>iptables</h4>
	<p>
		<code class='inline'>-F</code> will flush the firewall rules.
	</p>
	<pre class='indent-c'><code class='block'>iptables -F</code></pre>
	<p>
		Caution: <code class='inline'>ufw reset</code> and <code class='inline'>iptables -F</code> drop firewall rules.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
