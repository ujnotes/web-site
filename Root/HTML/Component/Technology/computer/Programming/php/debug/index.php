<div id='message'>
	<p>
		<strong>echo "File.</strong> {$frame['file']} - Line: {$frame['line']} - Function: {$frame['function']}\n";.
	</p>
	<pre class='indent-c'><code class='block'>$trace = debug_backtrace();</code></pre>
	<pre class='indent-c'><code class='block'>foreach ($trace as $frame)</code></pre>
	<pre class='indent-c'><code class='block'>**echo "File.** {$frame['file']} - Line: {$frame['line']} - Function: {$frame['function']}\n";.</code></pre>
	<pre class='indent-c'><code class='block'>}.</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
