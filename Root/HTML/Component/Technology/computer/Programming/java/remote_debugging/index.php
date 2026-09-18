<div id='message'>
	<pre class='indent-c'><code class='block'>java myapp -Xdebug -Xrunjdwp:server=y, transport=dt_socket,address=4000, suspend=n</code></pre>
	<p>
		No spaces in the runjdwp option.
	</p>
	<p>
		Options come before the class name. Any arguments you have after the class name are arguments to your program!
	</p>
	<h2>suspend = y</h2>
	<p>
		Wait for debugger attach.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
