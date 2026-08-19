<div id='message'>
	<p>
		<code class='inline'>grep</code> searches for a pattern in a file.
	</p>
	<pre class='indent-c'><code class='block'>grep 'pattern' &lt;file&gt;</code></pre>
	<h2>Flags</h2>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>-v</code> — omit matching lines</div></li>
		<li><div><code class='inline'>-x</code> — exact match</div></li>
		<li><div><code class='inline'>-r</code> — recursive</div></li>
		<li><div><code class='inline'>-n</code> — line numbers</div></li>
		<li><div><code class='inline'>-w</code> — word match</div></li>
	</ul>
	<h2>Context</h2>
	<p>
		<code class='inline'>-A &lt;n&gt;</code> prints n lines after the match.
	</p>
	<p>
		<code class='inline'>-B &lt;n&gt;</code> prints n lines before the match.
	</p>
	<h2>Find file with content</h2>
	<pre class='indent-c'><code class='block'>grep -rnw ['&lt;directory&gt;'] -e &lt;["]pattern["]&gt;</code></pre>
	<h2>Multiple</h2>
	<pre class='indent-c'><code class='block'>&lt;term_1&gt;/|&lt;term_2&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
