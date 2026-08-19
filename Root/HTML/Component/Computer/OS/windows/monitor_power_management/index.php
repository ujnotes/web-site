<div id='message'>
	<p>
		WM_SYSCOMMAND SC_MONITORPOWER values to put the display in low power, off, or on.
	</p>
	<pre class='indent-c'><code class='block'>NULL NULL 0x0112|WM_SYSCOMMAND 0xF170|SC_MONITORPOWER 2</code></pre>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>1</code> — the display is going to low power.</div></li>
		<li><div><code class='inline'>2</code> — the display is being shut off.</div></li>
		<li><div><code class='inline'>-1</code> — the display is being turned on (undocumented value).</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
