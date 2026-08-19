<div id='message'>
	<p>
		Setup shell variables using awk.
	</p>
	<h2>eval command</h2>
	<pre class='indent-c'><code class='block'>eval $(awk 'BEGIN{ print "vech=Bus"}' &lt; /dev/null)</code></pre>
	<h2>Sample outputs</h2>
	<p>
		Echo $vech.
	</p>
	<p>
		Bus.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
