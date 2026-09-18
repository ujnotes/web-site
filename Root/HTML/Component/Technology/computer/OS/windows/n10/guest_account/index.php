<div id='message'>
	<p>
		See [how to create a guest account in Windows 10](https://www.howtogeek.com/280527/how-to-create-a-guest-account-in-windows-10/).
	</p>
	<pre class='indent-c'><code class='block'>net user Visitor /add /active:yes
net localgroup users Visitor /delete
net localgroup guests Visitor /add</code></pre>
	<p>
		Caution: <code class='inline'>/delete</code> removes <code class='inline'>Visitor</code> from the Users group.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
