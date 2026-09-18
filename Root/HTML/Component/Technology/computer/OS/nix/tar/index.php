<div id='message'>
	<p>
		http://www.tecmint.com/18-tar-command-examples-in-linux
	</p>
	<p>
		Order of flags matters.
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>f</code> — file</div></li>
		<li><div><code class='inline'>z</code> — compress</div></li>
	</ul>
	<h2>Tar</h2>
	<pre class='indent-c'><code class='block'>tar -cvf &lt;target.tar&gt; &lt;source-path&gt;
env GZIP=-9 tar cvzf file.tar.gz /path</code></pre>
	<h2>Untar</h2>
	<pre class='indent-c'><code class='block'>tar -xvf tar.tar.gz</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
