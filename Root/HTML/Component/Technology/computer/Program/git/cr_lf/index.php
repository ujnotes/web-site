<div id='message'>
	<p>
		Working notes on cr-lf: Here are the different settings and their effects, * core.autocrlf true (change for both - local and remote automatically), * core.autocrlf input (change only to input i.e. for remote), and * core.autocrlf off (change nothing).
	</p>
	<p>
		Git core.autocrlf.
	</p>
	<p>
		The core.autocrlf configuration in Git manages how line endings (CRLF for Windows and LF for Unix/macOS) are handled when committing and checking out files.
	</p>
	<h2>Here are the different settings and their effects</h2>
	<pre class='indent-c'><code class='block'>* core.autocrlf true (change for both - local and remote automatically)</code></pre>
	<ul class="list-bullet content-list">
		<li><div>On commit (input), line endings are modified to LF (Unix-style).</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>On checkout (output), line endings are modified to CRLF (Windows-style) on Windows systems.</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>* core.autocrlf input (change only to input i.e. for remote)</code></pre>
	<ul class="list-bullet content-list">
		<li><div>On commit (input), line endings are modified to LF.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>On checkout (output), line endings are kept as they are, meaning there is no alteration on checkout.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>This changes line endings to LF only for the remote repository.</div></li>
	</ul>
	<pre class='indent-c'><code class='block'>* core.autocrlf off (change nothing)</code></pre>
	<ul class="list-bullet content-list">
		<li><div>On commit (input), line endings are not modified.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>On checkout (output), line endings are not modified.</div></li>
	</ul>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
