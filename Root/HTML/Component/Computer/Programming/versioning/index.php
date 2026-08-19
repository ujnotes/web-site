<div id='message'>
		<p>
		Version scheme Major.Minor.Maintenance.Build, product vs file vs installer version, and the Program Files publisher/product path with a major-version symlink.
	</p>
	<ol class="list-bullet content-list">
		<li><div>Major — major feature.</div></li>
		<li><div>Minor — minor feature.</div></li>
		<li><div>Maintenance only (bug fixes).</div></li>
		<li><div>Build no. (if any).</div></li>
	</ol>
	<p>
		Product version — File version and Installer version.
	</p>
	<pre class='indent-c'><code class='block'>Program files \ &lt;Publisher&gt; \ &lt;Product&gt; [ \ &lt;Version : &lt;no - title&gt;] \ &lt;Content&gt;</code></pre>
	<h2>Subsequent release</h2>
	<p>
		Update to 1, by patch (preferably contained in primary release else in subsequent release).
	</p>
	<p>
		Symlink?
	</p>
	<p>
		Full path to be referred from registry.
	</p>
	<p>
		Sub-version.
	</p>
	<h2>Iteration</h2>
	<pre class='indent-c'><code class='block'>&lt;Product&gt;\&lt;major version&gt; sym-linked&gt; &lt;current version&gt;</code></pre>
	<p>
		Has to be directory level.
	</p>
	<p>
		No redundancy.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>