<div id='message'>
	<h2>Package lists and upgrades</h2>
	<pre class='indent-c'><code class='block'>apt-get update</code></pre>
	<p>
		Gets the update list.
	</p>
	<pre class='indent-c'><code class='block'>apt-get upgrade</code></pre>
	<p>
		Applies the update.
	</p>
	<pre class='indent-c'><code class='block'>apt-get dist-upgrade</code></pre>
	<p>
		Upgrades packages. Dangerous: it will force installation of new packages and remove old packages. For non-auto-updating packages, it intelligently updates dependency packages.
	</p>
	<pre class='indent-c'><code class='block'>apt full upgrade</code></pre>
	<p>
		Performs all of the above.
	</p>
	<pre class='indent-c'><code class='block'>apt autoremove</code></pre>
	<p>
		Removes lingering packages.
	</p>
	<pre class='indent-c'><code class='block'>apt --fix-broken install</code></pre>
	<pre class='indent-c'><code class='block'>apt-get update &amp;&amp; apt-get upgrade</code></pre>
	<p>
		Caution: <code class='inline'>dist-upgrade</code> can install new packages and remove old ones.
	</p>
	<h2>Major update</h2>
	<p>
		Example: 12 &gt; 14.
	</p>
	<pre class='indent-c'><code class='block'>do-release-upgrade</code></pre>
	<pre class='indent-c'><code class='block'>apt-get install update-manager-core</code></pre>
	<p>
		Alternate SSH — open port 1022:
	</p>
	<pre class='indent-c'><code class='block'>iptables -I INPUT -p tcp --dport 1022 -j ACCEPT</code></pre>
	<p>
		May throw: bad network or server error.
	</p>
	<h2>Repair lists</h2>
	<pre class='indent-c'><code class='block'>apt-get clean
cd /var/lib/apt
mv lists lists.old
mkdir -p lists/partial
apt-get clean
apt-get update</code></pre>
	<h2>Release upgrades file</h2>
	<p>
		<code class='inline'>/etc/update-manager/release-upgrades</code> values: <code class='inline'>normal</code> | <code class='inline'>lts</code> | <code class='inline'>off</code>.
	</p>
	<h2>Message</h2>
	<pre class='indent-c'><code class='block'>/var/lib/ubuntu-release-upgrader/release-upgrade-available</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
