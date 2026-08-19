<div id='message'>
	<p>
		Prepare USB media to install Windows.
	</p>
	<ol class="list-number content-list">
		<li><div>Ensure the target media is NTFS formatted.</div></li>
		<li><div>And has enough space.</div></li>
	</ol>
	<p>
		Caution: <code class='inline'>bootsect</code> with <code class='inline'>/force /mbr</code> rewrites the boot code on the target.
	</p>
	<h2>BootSect</h2>
	<p>
		Run BootSect from a drive other than the target media:
	</p>
	<pre class='indent-c'><code class='block'>bootsect.exe /nt60 _: /force /mbr</code></pre>
	<p>
		<code class='inline'>/nt60</code> writes NT6.0+ boot code. <code class='inline'>_:</code> is the target volume. <code class='inline'>/force</code> forces the dismount. <code class='inline'>/mbr</code> updates the master boot record.
	</p>
	<h2>Copy</h2>
	<p>
		Copy the installation files onto the USB.
	</p>
	<h2>Booting</h2>
	<p>
		For booting, use Create recovery disc, then replace the files.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
