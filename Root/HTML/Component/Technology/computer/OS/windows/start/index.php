<div id='message'>
	<h2>Processor affinity</h2>
	<pre class='indent-c'><code class='block'>/affinity 1</code></pre>
	<p>
		Bit flags for each processor. Example: <code class='inline'>(11)b</code> = <code class='inline'>(3)d</code>.
	</p>
	<h2>Passing command line parameter</h2>
	<pre class='indent-c'><code class='block'>“&lt;title&gt;” &lt;path&gt; [&lt;param&gt;...]</code></pre>
	<p>
		Example:
	</p>
	<pre class='indent-c'><code class='block'>start “” “executable.exe” param1 param2</code></pre>
	<p>
		The first quoted string is the window title. <code class='inline'>“”</code> is an empty title so the next quoted string is the executable path.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
