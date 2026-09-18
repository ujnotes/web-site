<div id='message'>
	<p>
		https://serverfault.com/questions/712970/can-i-redirect-route-ip-adress-to-another-ip-address-windows
	</p>
	<p>
		List interfaces:
	</p>
	<pre class='indent-c'><code class='block'>netsh int ip sh int</code></pre>
	<p>
		Identify the loopback IDX (first column).
	</p>
	<h2>Add</h2>
	<pre class='indent-c'><code class='block'>netsh int ip add addr &lt;IDX&gt; &lt;IP&gt;/32 st=ac sk=tr</code></pre>
	<p>
		Example:
	</p>
	<pre class='indent-c'><code class='block'>netsh int ip add addr 1 &lt;ip&gt;/32 st=ac sk=tr</code></pre>
	<h2>Remove</h2>
	<pre class='indent-c'><code class='block'>netsh int ip delete addr &lt;IDX&gt; &lt;IP&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
