<div id='message'>
	<p>
		Flash procedure.
	</p>
	<p>
		Caution: flashing replaces boot, system, or recovery.
	</p>
	<h2>Unlock bootloader</h2>
	<p>
		Unlock the bootloader first.
	</p>
	<h2>FastBoot</h2>
	<ol class="list-number content-list">
		<li><div>Boot in the FastBoot menu.</div></li>
		<li><div>Flash a partition:</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>fastboot flash [boot|system|recovery]</code></pre>
	<h2>ClockWorks</h2>
	<p>
		Boot in the FastBoot menu &gt; Recovery:
	</p>
	<ol class="list-number content-list">
		<li><div>Clean up.</div></li>
		<li><div>Transfer the zip (<code class='inline'>push</code>).</div></li>
		<li><div>Install from Zip.</div></li>
		<li><div>Alternatively sideload. Perhaps risky since an interruption is more likely.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
