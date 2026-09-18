<div id='message'>
	<p>
		Show tables.
	</p>
	<pre class='indent-c'><code class='block'>list tables [for schema &lt;Schema_Name&gt;];</code></pre>
	<p>
		Describe table.
	</p>
	<pre class='indent-c'><code class='block'>describe &lt;table&gt;</code></pre>
	<p>
		Show schemas.
	</p>
	<p>
		Select schemaname from syscat.schemata;.
	</p>
	<p>
		Current schema.
	</p>
	<p>
		Values current schema.
	</p>
	<p>
		<strong>NOTE.</strong> A typo in schema name - will not cause alarm.
	</p>
	<p>
		That is, you can change schema into a new one without having to create it first.
	</p>
	<p>
		Change schema.
	</p>
	<pre class='indent-c'><code class='block'>set schema &lt;SchemaName&gt;</code></pre>
	<p>
		Set current schema to be used.
	</p>
	<pre class='indent-c'><code class='block'>SET CURRENT SQLID=’&lt;SchemaName&gt;’;</code></pre>
	<p>
		?need to check how is it different.
	</p>
	<p>
		Create.
	</p>
	<pre class='indent-c'><code class='block'>create schema &lt;SchemaName&gt; authorization db2inst2</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
