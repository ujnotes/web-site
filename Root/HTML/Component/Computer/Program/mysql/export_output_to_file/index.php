<div id='message'>
	<pre class='indent-c'><code class='block'>1. mysql -u&lt;user&gt; -p&lt;pass&gt; [-h&lt;host&gt;] &lt;database&gt; -e "select cols from table where cols not null" &gt; /tmp/output</code></pre>
	<ol class="list-number content-list">
		<li><div>SELECT order_id,product_name,qty.</div></li>
	</ol>
	<p>
		FROM orders.
	</p>
	<p>
		INTO OUTFILE '/tmp/orders.csv'.
	</p>
	<p>
		FIELDS TERMINATED BY ','.
	</p>
	<p>
		ENCLOSED BY '"'.
	</p>
	<p>
		LINES TERMINATED BY '\n'.
	</p>
	<p>
		/tmp directory works exclusively
	</p>
	<h2>3. MySQL-dump</h2>
	<pre class='indent-c'><code class='block'>3. MySQL-dump Mysqldump &lt;database|--all-databases&gt; -u &lt;user&gt; -p --result-file=&lt;file_name&gt;</code></pre>
	<p>
		http://dev.mysql.com/doc/refman/5.7/en/mysqldump.html
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
