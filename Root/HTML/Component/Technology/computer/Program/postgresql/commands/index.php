<div id='message'>
	<h2>Quit</h2>
	<p>
		\q.
	</p>
	<pre class='indent-c'><code class='block'>Login                -U &lt;user&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Password        -P &lt;password&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Connect to db        \c &lt;db&gt;</code></pre>
	<pre class='indent-c'><code class='block'>use &lt;db_name&gt;</code></pre>
	<h2>Import</h2>
	<ol class="list-number content-list">
		<li><div>Create Table.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>2. \copy &lt;Table_Name&gt; from &lt;path&gt; Delimiter ‘&lt;delimiter-char&gt;’ [CSV] [Header]</code></pre>
	<p>
		Console.
	</p>
	<p>
		Null \N or.
	</p>
	<pre class='indent-c'><code class='block'>NULL as &lt;‘null string’&gt;</code></pre>
	<p>
		For example, csv WITH NULL AS 'null'.
	</p>
	<pre class='indent-c'><code class='block'>Export                \copy (SQL_Query) to &lt;path&gt; delimiter ‘&lt;delimiter-char&gt;’</code></pre>
	<p>
		List.
	</p>
	<h2>db</h2>
	<p>
		\list.
	</p>
	<h2>tables</h2>
	<p>
		\dt.
	</p>
	<h2>Relations</h2>
	<p>
		\d.
	</p>
	<h2>Insert {\n}</h2>
	<p>
		E’ABC\nXYZ’.
	</p>
	<pre class='indent-c'><code class='block'>Create DB        Create database &lt;name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Describe        \d+ &lt;table-name&gt;</code></pre>
	<p>
		Select column_name from INFORMATION_SCHEMA.COLUMNS where table_name = 'table';.
	</p>
	<h2>Index</h2>
	<p>
		Creates index on Auth_RoleRules (Role);.
	</p>
	<p>
		Must be standalone statement.
	</p>
	<pre class='indent-c'><code class='block'>Truncate        truncate &lt;table&gt;</code></pre>
	<h2>Drop</h2>
	<pre class='indent-c'><code class='block'>Drop dropdb &lt;DB-NAME&gt;</code></pre>
	<p>
		Drop all.
	</p>
	<p>
		Drop schema public cascade;.
	</p>
	<p>
		Creates schema public;.
	</p>
	<h2>Dump database</h2>
	<pre class='indent-c'><code class='block'>Dump database pg_dump -h&lt;IP&gt; -U&lt;User&gt; &lt;DB&gt; &gt; &lt;Path&gt;</code></pre>
	<h2>Push database</h2>
	<pre class='indent-c'><code class='block'>Push database psql &lt;DB&gt; &lt; &lt;Path&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Push database psql -f &lt;Path&gt; &lt;User&gt;</code></pre>
	<pre class='indent-c'><code class='block'>Push database \i &lt;Path&gt;</code></pre>
	<h2>Password change</h2>
	<pre class='indent-c'><code class='block'>Password change alter user &lt;user&gt; UNENCRYPTED password '&lt;password&gt;';</code></pre>
	<h2>Add user</h2>
	<pre class='indent-c'><code class='block'>Add user Create role &lt;name&gt; WITH PASSWORD '&lt;password&gt;’</code></pre>
	<p>
		INHERIT attribute - for Role and Users (like the SQL standard).
	</p>
	<p>
		http://www.postgresql.org/docs/8.1/static/sql-createrole.html
	</p>
	<h2>Set Null</h2>
	<pre class='indent-c'><code class='block'>Set Null set &lt;Column&gt; = NULL</code></pre>
	<h2>Delete duplicates</h2>
	<pre class='indent-c'><code class='block'>Delete duplicates DELETE FROM &lt;Table&gt; WHERE ctid NOT IN</code></pre>
	<pre class='indent-c'><code class='block'>Delete duplicates (SELECT max(ctid) FROM &lt;Table&gt;  GROUP BY &lt;Table&gt;.*) ;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
