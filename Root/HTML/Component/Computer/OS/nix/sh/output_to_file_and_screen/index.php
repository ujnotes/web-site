<div id='message'>
	<p>
		Merge stderr into stdout, then pipe to <code class='inline'>tee -a</code> so the stream is appended to a file and still shown on screen.
	</p>
	<pre class='indent-c'><code class='block'>2&gt;&amp;1 | tee -a &lt;output_file&gt;</code></pre>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>2</code> — stderr.</div></li>
		<li><div><code class='inline'>&gt;</code> — redirect.</div></li>
		<li><div><code class='inline'>&amp;1</code> — stdout.</div></li>
		<li><div><code class='inline'>|</code> — pipe.</div></li>
		<li><div><code class='inline'>tee</code> — write to file and to the screen.</div></li>
		<li><div><code class='inline'>-a</code> — append.</div></li>
		<li><div><code class='inline'>&lt;output_file&gt;</code> — destination file</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
