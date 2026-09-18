<div id='message'>
	<p>
		Packet filter rules with <code class='inline'>iptables</code>.
	</p>
	<p>
		http://safesrv.net/quick-how-to-denyallow-ip-using-iptables/
	</p>
	<p>
		Caution: these are admin changes to packet filtering.
	</p>
	<h2>Flags</h2>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>-f</code> — flush</div></li>
		<li><div><code class='inline'>-x</code> — clear</div></li>
		<li><div><code class='inline'>-v</code> — show interface name</div></li>
		<li><div><code class='inline'>--line-numbers</code> — include line numbers</div></li>
		<li><div><code class='inline'>-L</code> — list</div></li>
		<li><div><code class='inline'>-n</code> — numeric</div></li>
	</ul>
	<h2>Block</h2>
	<p>
		IP:
	</p>
	<pre class='indent-c'><code class='block'>iptables -A INPUT -s xx.xx.xx.xx -j DROP</code></pre>
	<p>
		IP for a port:
	</p>
	<pre class='indent-c'><code class='block'>iptables -A INPUT -p tcp -s xx.xx.xx.xx --dport PORT -j DROP</code></pre>
	<p>
		Crawler:
	</p>
	<pre class='indent-c'><code class='block'>iptables -I INPUT -p tcp --dport 80 -m string --algo bm --string 'GET /&lt;domain name&gt;' -j DROP</code></pre>
	<h2>Allow</h2>
	<p>
		IP:
	</p>
	<pre class='indent-c'><code class='block'>iptables -A INPUT -s xx.xx.xx.xx -j ACCEPT</code></pre>
	<p>
		IP for a port:
	</p>
	<pre class='indent-c'><code class='block'>iptables -A INPUT -p tcp -s xx.xx.xx.xx --dport PORT -j ACCEPT</code></pre>
	<h2>Clear</h2>
	<pre class='indent-c'><code class='block'>iptables -P INPUT ACCEPT
iptables -P FORWARD ACCEPT
iptables -P OUTPUT ACCEPT
iptables -t nat -F
iptables -t mangle -F</code></pre>
	<h2>Logging</h2>
	<p>
		http://www.thegeekstuff.com/2012/08/iptables-log-packets/
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
