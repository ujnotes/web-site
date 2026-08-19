<div id='message'>
	<h2>Block IP</h2>
	<p>
		Caution: this is an admin change to packet filtering.
	</p>
	<pre class='indent-c'><code class='block'>iptables -A INPUT -s &lt;ip&gt; -j DROP</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
