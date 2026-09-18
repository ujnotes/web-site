<div id='message'>
	<h2>tag</h2>
	<p>
		Shows current tags.
	</p>
	<p>
		Adds.
	</p>
	<pre class='indent-c'><code class='block'>-a &lt;tag_title&gt;</code></pre>
	<pre class='indent-c'><code class='block'>-m &lt;message&gt;</code></pre>
	<p>
		Deletes.
	</p>
	<pre class='indent-c'><code class='block'>-d &lt;tag_title&gt;</code></pre>
	<p>
		Deletes from remote.
	</p>
	<pre class='indent-c'><code class='block'>push origin :refs/tags/&lt;tag&gt;</code></pre>
	<p>
		To retag first delete &gt; delete from server &gt; add &gt; push.
	</p>
	<p>
		Commit &gt; tag &gt; push &gt; push tags.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
