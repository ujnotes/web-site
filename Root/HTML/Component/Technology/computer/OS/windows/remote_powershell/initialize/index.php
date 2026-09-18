<div id='message'>
	<pre class='indent-c'><code class='block'>Enable-PSRemoting</code></pre>
	<pre class='indent-c'><code class='block'>New-PSSession -computerName testMachine2</code></pre>
	<p>
		Or simply:
	</p>
	<pre class='indent-c'><code class='block'>Enter-PSSession -computer testMachine2</code></pre>
	<h2>RemoteRegistry</h2>
	<p>
		Check status (and make sure you have the correct name):
	</p>
	<pre class='indent-c'><code class='block'>get-Service RemoteRegistry</code></pre>
	<p>
		Start it:
	</p>
	<pre class='indent-c'><code class='block'>start-Service RemoteRegistry</code></pre>
	<p>
		For scripting, <code class='inline'>RemoteRegistry</code> is all one word, even though the display name has a space: Remote Registry.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
