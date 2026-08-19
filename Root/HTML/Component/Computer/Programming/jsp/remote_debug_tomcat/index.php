<div id='message'>
	<h2>Win</h2>
	<h2>set your JPDA settings</h2>
	<p>
		Sets JPDA_ADDRESS=8000.
	</p>
	<p>
		Sets JPDA_TRANSPORT=dt_socket.
	</p>
	<pre class='indent-c'><code class='block'>bin/catalina.bat jpda start</code></pre>
	<p>
		*nix.
	</p>
	<p>
		JPDA_OPTS="-agentlib:jdwp=transport=dt_socket,address=8000,server=y,suspend=y".
	</p>
	<pre class='indent-c'><code class='block'>./catalina.sh jpda start</code></pre>
	<p>
		________________.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
