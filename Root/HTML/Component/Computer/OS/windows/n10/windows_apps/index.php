<div id='message'>
	<p>
		Copy WindowsApps with robocopy /E /COPYALL /DCOPY:DAT.
	</p>
	<pre class='indent-c'><code class='block'>robocopy "E:\WindowsApps" "D:\WindowsApps" /E /COPYALL /DCOPY:DAT</code></pre>
	<p>
		Caution: <code class='inline'>robocopy /COPYALL</code> copies security, owner, and auditing on <code class='inline'>WindowsApps</code>.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
