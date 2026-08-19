<div id='message'>
	<p>
		See which process is bound to a port with isof and netstat.
	</p>
	<pre class='indent-c'><code class='block'>isof -i -P | grep :&lt;port&gt;
netstat -nlt | grep &lt;port&gt;
netstat -tulpn</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
