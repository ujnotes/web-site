<div id='message'>
	<p>
		OEM fields live under:
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows\CurrentVersion\OEMInformation</code></pre>
	<p>
		All of these are <code class='inline'>Reg_SZ</code>:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>Logo</code> — path to a BMP, 120x120 pixels.</div></li>
		<li><div><code class='inline'>Manufacturer</code>.</div></li>
		<li><div><code class='inline'>Model</code>.</div></li>
		<li><div><code class='inline'>SupportHours</code>.</div></li>
		<li><div><code class='inline'>SupportPhone</code>.</div></li>
		<li><div><code class='inline'>SupportURL</code>.</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
