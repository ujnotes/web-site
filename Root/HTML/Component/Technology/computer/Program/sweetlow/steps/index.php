<div id='message'>
	<ul class="list-bullet content-list">
		<li><div>Follow all steps in sequence.</div></li>
	</ul>
	<h2>1. Install filter driver</h2>
	<pre class='indent-c'><code class='block'>Setup.exe</code></pre>
	<p>
		<strong>Default.</strong> ‘Mice only`.
	</p>
	<h4>check <code class='inline'>Filter On Device</code></h4>
	<p>
		A. Downclock to verify (say 62).
	</p>
	<p>
		<code class='inline'>Install service</code>.
	</p>
	<p>
		<code class='inline'>Restart</code> (option in app).
	</p>
	<h2>2. Atsiv - execute patch driver</h2>
	<pre class='indent-c'><code class='block'>C:\Programs\Atsiv\Atsiv.exe -f C:\Programs\Atsiv\hidusbfp.sys</code></pre>
	<p>
		Will say failed - which is fine.
	</p>
	<h2>3. restart</h2>
	<pre class='indent-c'><code class='block'>C:\Programs\Atsiv\devcon restart *VID_046D*</code></pre>
	<p>
		Or you could use setup.exe - ‘restart’.
	</p>
	<ul class="list-bullet content-list">
		<li><div>verify.</div></li>
	</ul>
	<p>
		https://zowie.benq.com/en/support/mouse-rate-checker.html
	</p>
	<p>
		In case of failure (later on) - uninstall mouse driver (from device manager).
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
