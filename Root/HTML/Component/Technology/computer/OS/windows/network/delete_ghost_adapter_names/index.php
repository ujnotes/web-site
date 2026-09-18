<div id='message'>
	<p>
		Delete ghosted / non-existent network adapter entries.
	</p>
	<p>
		Delete registry GUIDs with a <code class='inline'>connection</code> subkey whose name looks like <code class='inline'>Local area …</code>. Record them first. Delete the matching GUIDs <strong>together</strong> from all of these locations.
	</p>
	<h2>Control\Network</h2>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Network\{4D36E972-E325-11CE-BFC1-08002BE10318}</code></pre>
	<h2>Tcpip adapters and interfaces</h2>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\services\Tcpip\Parameters\Adapters
HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\services\Tcpip\Parameters\Interfaces</code></pre>
	<p>
		If they are not deleted together, they will remain.
	</p>
	<p>
		Caution: this deletes registry keys for network adapters.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
