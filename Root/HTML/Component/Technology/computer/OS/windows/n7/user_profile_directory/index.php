<div id='message'>
	<p>
		User profile directories are listed under:
	</p>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\ProfileList</code></pre>
	<p>
		Each account is a subkey named like <code class='inline'>S-1-5..</code>.
	</p>
	<p>
		<code class='inline'>ProfileImagePath</code> (<code class='inline'>Reg_Expand_SZ</code>) is the profile directory.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
