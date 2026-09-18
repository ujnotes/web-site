<div id='message'>
	<pre class='indent-c'><code class='block'>HKLM\SYSTEM\CurrentControlSet\Control\SecurePipeServers</code></pre>
	<p>
		WinVer. Permission on this key determines access. Absence makes it accessible to all.
	</p>
	<p>
		Local Service should have at least read access. Local System on Win 2000 — causes issues in case of an upgrade.
	</p>
	<p>
		The Remote Registry service must be running on both machines.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Name: Description</div></li>
		<li><div>Type: <code class='inline'>REG_SZ</code></div></li>
		<li><div>Value: Registry Server</div></li>
	</ul>
	<p>
		Ports: TCP/UDP 135, 137, 138, 139, 445.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
