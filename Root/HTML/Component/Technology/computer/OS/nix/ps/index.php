<div id='message'>
	<h2>CPU usage (eater)</h2>
	<pre class='indent-c'><code class='block'>ps -eo pcpu,pid,user,args | sort -r -k1 | less</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
