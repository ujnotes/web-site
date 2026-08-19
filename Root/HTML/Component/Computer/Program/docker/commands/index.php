<div id='message'>
	<h2>root terminal</h2>
	<pre class='indent-c'><code class='block'>docker exec -u root -it [container_name_or_id] /bin/bash</code></pre>
	<h2>build image</h2>
	<p>
		Docker build -t my_app .
	</p>
	<h2>run</h2>
	<pre class='indent-c'><code class='block'>docker run -it -p 80:3000 my_app</code></pre>
	<h2>compose</h2>
	<p>
		Docker compose up.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
