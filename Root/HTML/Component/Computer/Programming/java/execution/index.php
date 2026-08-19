<div id='message'>
	<h2>Run Jar</h2>
	<pre class='indent-c'><code class='block'>Run Jar java -jar &lt;path to jar file&gt;</code></pre>
	<p>
		No standard location.
	</p>
	<p>
		Relative path to {CD}.
	</p>
	<h2>Directories not to be preceded by a ‘/’</h2>
	<p>
		Working Directory is {CD}.
	</p>
	<h2>Classpath</h2>
	<pre class='indent-c'><code class='block'>Classpath -cp “&lt;Item[;... ]&gt;”</code></pre>
	<ul class="list-bullet content-list">
		<li><div>jars (does not also include the directory).</div></li>
	</ul>
	<h4>Windows</h4>
	<pre class='indent-c'><code class='block'>./*        All jars in {CD}</code></pre>
	<h2>Linux</h2>
	<pre class='indent-c'><code class='block'>-cp &lt;Item:&gt;</code></pre>
	<h2>Working directory</h2>
	<h4>Get</h4>
	<p>
		System.getProperty("user.dir").
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
