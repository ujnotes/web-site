<div id='message'>
	<p>
		Shell <code class='inline'>if</code> tests a condition in <code class='inline'>[ ]</code>. Spaces inside the brackets are required.
	</p>
	<pre class='indent-c'><code class='block'>if [ &lt;condition&gt; ]
        then
        ..
elif
        then
        ..
else
fi</code></pre>
	<p>
		<code class='inline'>elif</code> is else-if. <code class='inline'>else</code> has no <code class='inline'>then</code>. The block ends with <code class='inline'>fi</code>.
	</p>
	<h2>Condition</h2>
	<pre class='indent-c'><code class='block'>"$var" == "value"</code></pre>
	<p>
		On Ubuntu use <code class='inline'>=</code> instead of <code class='inline'>==</code>.
	</p>
	<h2>Numerical</h2>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>-eq</code></div></li>
		<li><div><code class='inline'>-ne</code></div></li>
		<li><div><code class='inline'>-gt</code></div></li>
		<li><div><code class='inline'>-lt</code></div></li>
		<li><div><code class='inline'>-le</code></div></li>
		<li><div><code class='inline'>-ge</code></div></li>
	</ul>
	<h2>String</h2>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>=</code></div></li>
		<li><div><code class='inline'>!=</code></div></li>
		<li><div><code class='inline'>&lt;</code> before alphabetically</div></li>
		<li><div><code class='inline'>&gt;</code> after alphabetically</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
