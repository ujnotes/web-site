<div id='message'>
	<p>
		CMD ["npm", "run", "dev"].
	</p>
	<p>
		CMD ["/bin/sh", "start.sh"].
	</p>
	<p>
		–.
	</p>
	<pre class='indent-c'><code class='block'>script.sh</code></pre>
	<p>
		#!/bin/sh.
	</p>
	<p>
		FLAG_FILE="./first_run.flag".
	</p>
	<pre class='indent-c'><code class='block'>if [ ! -f "$FLAG_FILE" ]; then</code></pre>
	<h3>First run.</h3>
	<p>
		Touch "$FLAG_FILE".
	</p>
	<pre class='indent-c'><code class='block'>tail -f /dev/null</code></pre>
	<h2>else</h2>
	<h3>Subsequent runs.</h3>
	<p>
		Npm run dev.
	</p>
	<p>
		Fi.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
