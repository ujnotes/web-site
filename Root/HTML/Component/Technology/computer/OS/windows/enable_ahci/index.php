<div id='message'>
	<h2>Windows 10</h2>
	<p>
		Enable safe mode:
	</p>
	<pre class='indent-c'><code class='block'>bcdedit /set {current} safeboot minimal</code></pre>
	<p>
		or:
	</p>
	<pre class='indent-c'><code class='block'>bcdedit /set safeboot minimal</code></pre>
	<p>
		Enable AHCI in the BIOS. Boot into safe mode. Clear the safemode boot:
	</p>
	<pre class='indent-c'><code class='block'>bcdedit /deletevalue {current} safeboot</code></pre>
	<p>
		or:
	</p>
	<pre class='indent-c'><code class='block'>bcdedit /deletevalue safeboot</code></pre>
	<p>
		Reboot normally.
	</p>
	<p>
		Caution: <code class='inline'>bcdedit</code> changes the boot configuration.
	</p>
	<h2>Windows XP</h2>
	<p>
		To test. See [how to enable AHCI mode for SATA in the BIOS without reinstalling Windows](https://hetmanrecovery.com/recovery_news/how-to-enable-ahci-mode-for-sata-in-the-bios-without-reinstalling-windows.htm).
	</p>
	<p>
		Under <code class='inline'>HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\</code>:
	</p>
	<h4>iaStorV</h4>
	<p>
		<code class='inline'>start</code> <code class='inline'>0</code>. Under <code class='inline'>StartOverride</code>, value <code class='inline'>0</code> is <code class='inline'>0</code>.
	</p>
	<h4>storahci</h4>
	<p>
		<code class='inline'>start</code> <code class='inline'>0</code>. Under <code class='inline'>StartOverride</code>, value <code class='inline'>0</code> is <code class='inline'>0</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
