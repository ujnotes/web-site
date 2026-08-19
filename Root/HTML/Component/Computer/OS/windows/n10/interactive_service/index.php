<div id='message'>
	<p>
		A system service can be made to display on the parallel session screen via:
	</p>
	<pre class='indent-c'><code class='block'>HKLM\System\CurrentControlSet\Control\Windows
NoInteractiveServices : 1</code></pre>
	<p>
		It cannot receive any input. Even Ctrl+Alt+Del will not work. It automatically leads to the login screen after some time, about 1 minute.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
