<div id='message'>
	<p>
		<code class='inline'>find</code> walks a tree recursively.
	</p>
	<h2>Name and depth</h2>
	<pre class='indent-c'><code class='block'>find &lt;path&gt; -name "&lt;pattern&gt;"</code></pre>
	<p>
		The search is recursive.
	</p>
	<p>
		<code class='inline'>-maxdepth &lt;n&gt;</code> and <code class='inline'>-mindepth &lt;n&gt;</code> limit how deep it goes.
	</p>
	<h2>Empty directories</h2>
	<p>
		Print names of empty directories:
	</p>
	<pre class='indent-c'><code class='block'>find &lt;path&gt; -type d -empty -printf "%f\n"</code></pre>
	<h2>Exec</h2>
	<p>
		Run a command on each match. <code class='inline'>{}</code> is the path; <code class='inline'>\;</code> ends <code class='inline'>-exec</code>.
	</p>
	<pre class='indent-c'><code class='block'>find &lt;path&gt; -type d -maxdepth 1 -exec &lt;command&gt; {} \;</code></pre>
	<p>
		Example <code class='inline'>-exec</code>:
	</p>
	<pre class='indent-c'><code class='block'>-exec ln -s &lt;path&gt;</code></pre>
	<p>
		<code class='inline'>find</code> includes the starting path, e.g. <code class='inline'>./</code>. Use <code class='inline'>basename</code> to get the file name. <code class='inline'>basename</code> cannot be mixed with other commands; it should be the only command of <code class='inline'>-exec</code>.
	</p>
	<p>
		<code class='inline'>-type -f</code> excludes the starting-directory include (self).
	</p>
	<h2>Modified within last period</h2>
	<pre class='indent-c'><code class='block'>find /to/target/directory* -mmin 30</code></pre>
	<p>
		Form:
	</p>
	<pre class='indent-c'><code class='block'>&lt;path&gt; &lt;time-option&gt; &lt;[+/-]&lt;units&gt;&gt;</code></pre>
	<p>
		Time options:
	</p>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>mtime</code> — modified, in days</div></li>
		<li><div><code class='inline'>-cmin</code> — accessed, in minutes</div></li>
		<li><div><code class='inline'>-newermt</code> — newer created</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
