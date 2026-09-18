<div id='message'>
	<pre class='indent-c'><code class='block'>/etc/init.d/&lt;service_name&gt;</code></pre>
	<h2>Install</h2>
	<pre class='indent-c'><code class='block'>sudo update-rc.d &lt;service_name&gt; defaults &lt;n:60&gt;</code></pre>
	<p>
		<code class='inline'>&lt;n:60&gt;</code> is the sequence number.
	</p>
	<h2>Uninstall</h2>
	<pre class='indent-c'><code class='block'>update-rc.d &lt;service_name&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
