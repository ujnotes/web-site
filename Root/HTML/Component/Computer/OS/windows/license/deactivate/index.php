<div id='message'>
	<p>
		Uninstall a Windows product key with slmgr /dlv and slmgr /upk.
	</p>
	<pre class='indent-c'><code class='block'>slmgr /dlv</code></pre>
	<p>
		Copy the activation id. Then:
	</p>
	<pre class='indent-c'><code class='block'>slmgr /upk &lt;actionvation id&gt;</code></pre>
	<p>
		Caution: <code class='inline'>slmgr /upk</code> uninstalls the product key.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
