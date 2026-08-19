<div id='message'>
	<h2>Static IP</h2>
	<p>
		Configure a static address in <code class='inline'>/etc/network/interfaces</code>:
	</p>
	<pre class='indent-c'><code class='block'>auto lo eth0
iface lo inet loopback
iface eth0 inet &lt;static|dynamic&gt;
        address 192.168.1.101
        netmask 255.255.255.0
        gateway 192.168.1.1</code></pre>
	<h2>DNS</h2>
	<p>
		DNS servers are listed in <code class='inline'>/etc/resolv.conf</code>.
	</p>
	<h2>Restart</h2>
	<pre class='indent-c'><code class='block'>/etc/init.d/networking restart</code></pre>
	<p>
		Caution: restarting networking is an admin action.
	</p>
	<h2>Info</h2>
	<pre class='indent-c'><code class='block'>ifconfig</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
