<div id='message'>
	<p>
		<code class='inline'>date</code> prints the current date and time. An optional format string follows <code class='inline'>+</code>.
	</p>
	<pre class='indent-c'><code class='block'>date +"&lt;format string&gt;"</code></pre>
	<h2>Format</h2>
	<p>
		Example format and output:
	</p>
	<pre class='indent-c'><code class='block'>%a %b %e %H:%M:$S %Z %Y
Thu Feb 2 03:28: CET 2012</code></pre>
	<h2>Assignment</h2>
	<p>
		When assigning, use command substitution:
	</p>
	<pre class='indent-c'><code class='block'>`date [+&lt;format string&gt;]`</code></pre>
	<p>
		There is no direct assignment. The value must be echoed. <code class='inline'>date</code> echoes when assigned as <code class='inline'>var=&lt;space&gt;date</code> (a space after <code class='inline'>=</code>), because <code class='inline'>date</code> is then run as a command.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
