<div id='message'>
	<p>
		Repair the EFI bootloader after migrating Windows to an SSD. Walkthrough:
	</p>
	<pre class='indent-c'><code class='block'>http://www.fixedbyvonnie.com/2013/12/how-to-repair-the-efi-bootloader-in-windows-8/</code></pre>
	<p>
		Caution: this rewrites the boot record and replaces the BCD store.
	</p>
	<h2>Assign the drive letter</h2>
	<p>
		Give the small FAT EFI volume a letter (<code class='inline'>v:</code> here):
	</p>
	<pre class='indent-c'><code class='block'>diskpart
sel disk 0
list vol
sel vol &lt;FAT_~260 MB&gt;
assign letter=v:
exit</code></pre>
	<h2>Repair the boot record</h2>
	<pre class='indent-c'><code class='block'>cd /d v:\EFI\Microsoft\Boot\
bootrec /fixboot</code></pre>
	<h2>Rebuild the BCD store</h2>
	<p>
		Rename the existing BCD, then rebuild for <code class='inline'>c:\Windows</code> with locale <code class='inline'>en-us</code>, system volume <code class='inline'>v:</code>, firmware ALL:
	</p>
	<pre class='indent-c'><code class='block'>ren BCD BCD.old
bcdboot c:\Windows /l en-us /s v: /f ALL</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
