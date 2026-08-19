<div id='message'>
	<h2>Complete on key</h2>
	<p>
		See [http://support.microsoft.com/kb/310530](http://support.microsoft.com/kb/310530).
	</p>
	<p>
		On:
	</p>
	<pre class='indent-c'><code class='block'>cmd /f</code></pre>
	<p>
		Off:
	</p>
	<pre class='indent-c'><code class='block'>cmd /f:off</code></pre>
	<h4>Permanent</h4>
	<pre class='indent-c'><code class='block'>HKEY_LOCAL_MACHINE\Software\Microsoft\Command Processor</code></pre>
	<ul class="list-bullet content-list">
		<li><div><code class='inline'>0x4</code> — Ctrl+D</div></li>
		<li><div><code class='inline'>0x4</code> — Ctrl+D</div></li>
		<li><div><code class='inline'>0x9</code> — Tab</div></li>
	</ul>
	<h2>Multiple commands</h2>
	<p>
		<code class='inline'>/k</code> runs a command and keeps the processor:
	</p>
	<pre class='indent-c'><code class='block'>/k &lt;command-1 ["Arg-1"]&gt;[ &amp; command -2]</code></pre>
	<h2>Start in a specific directory</h2>
	<pre class='indent-c'><code class='block'>start /d &lt;path&gt;</code></pre>
	<h2>Streams</h2>
	<p>
		Redirect stdout to <code class='inline'>a.txt</code> and stderr to stdout:
	</p>
	<pre class='indent-c'><code class='block'>&gt; a.txt 2&gt;&amp;1</code></pre>
	<h2>Comment</h2>
	<pre class='indent-c'><code class='block'>Echo off &amp; REM</code></pre>
	<p>
		<code class='inline'>::</code> is an empty label. It spawns two lines and may break <code class='inline'>goto</code>.
	</p>
	<pre class='indent-c'><code class='block'>::</code></pre>
	<p>
		Same-line comment:
	</p>
	<pre class='indent-c'><code class='block'>%= _ =%</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
