<div id='message'>
	<p>
		pg_dump -U postgres -t &lt;old_table&gt; &lt;old_database&gt; | psql -U postgres -d &lt;new_database&gt;.
	</p>
	<pre class='indent-c'><code class='block'>pg_dump -U postgres -t &lt;old_table&gt; &lt;old_database&gt; | psql -U postgres -d &lt;new_database&gt;</code></pre>
	<pre class='indent-c'><code class='block'>pg_dump -s</code></pre>
	<p>
		Schema only.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
