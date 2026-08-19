<div id='message'>
	<h2>ISO version</h2>
	<pre class='indent-c'><code class='block'>dism /Get-WimInfo /WimFile:H:\sources\install.wim /index:1
dism /Get-WimInfo /WimFile:H:\sources\install.esd /index:1
dism /Get-WimInfo /WimFile:.\install.esd /index:1</code></pre>
	<p>
		<code class='inline'>./dism</code> may not have <code class='inline'>/get-wiminfo</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
