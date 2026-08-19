<div id='message'>
	<p>
		Clear a jammed print queue by recycling the Print Spooler and wiping the spool directory.
	</p>
	<p>
		Caution: this stops the Print Spooler and deletes files under <code class='inline'>spool\printers</code>.
	</p>
	<h2>Stop the Print Spooler service</h2>
	<pre class='indent-c'><code class='block'>net stop spooler</code></pre>
	<h2>Delete spool files</h2>
	<pre class='indent-c'><code class='block'>del %systemroot%\System32\spool\printers\* /Q /F /S</code></pre>
	<h2>Start the service</h2>
	<pre class='indent-c'><code class='block'>net start spooler</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
