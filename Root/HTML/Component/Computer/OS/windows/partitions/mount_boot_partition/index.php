<div id='message'>
	<h2>Add mapping</h2>
	<pre class='indent-c'><code class='block'>mountvol &lt;drive_letter&gt;: /s</code></pre>
	<p>
		You still need to launch <code class='inline'>explorer.exe</code> with administrative privileges in order to see the mountpoint. Kill <code class='inline'>explorer.exe</code>, then launch one from an elevated command prompt.
	</p>
	<p>
		Caution: this uses administrative privileges and replaces the running Explorer.
	</p>
	<h2>Remove mapping</h2>
	<pre class='indent-c'><code class='block'>mountvol &lt;drive_letter&gt;: /d</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
