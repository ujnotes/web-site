<div id='message'>
	<pre class='indent-c'><code class='block'>&lt;Context&gt;</code></pre>
	<h2>&lt;Resource name="jdbc/postgres" auth="Container"</h2>
	<p>
		Type="javax.sql.DataSource" driverClassName="org.postgresql.Driver".
	</p>
	<p>
		Url="jdbc:postgresql://127.0.0.1:5432/mydb".
	</p>
	<p>
		Username="myuser" password="mypasswd" maxActive="20" maxIdle="10".
	</p>
	<p>
		MaxWait="-1"/&gt;.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/Context&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>web.xml configuration.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>&lt;resource-ref&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;description&gt;postgreSQL Datasource example&lt;/description&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;description&gt;postgreSQL &lt;res-ref-name&gt;jdbc/postgres&lt;/res-ref-name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;res-ref-name&gt;jdbc/postgres&lt;/res-ref-name&gt; &lt;res-type&gt;javax.sql.DataSource&lt;/res-type&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;res-type&gt;javax.sql.DataSource&lt;/res-type&gt; &lt;res-auth&gt;Container&lt;/res-auth&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;resource-ref&gt; &lt;/resource-ref&gt;</code></pre>
	<p>
		________________.
	</p>
	<p>
		InitialContext cxt = new InitialContext();.
	</p>
	<h2>if ( cxt == null ) {</h2>
	<p>
		Throw new Exception("Uh oh -- no context!");.
	</p>
	<p>
		}.
	</p>
	<p>
		DataSource ds = (DataSource) cxt.lookup( "java:/comp/env/jdbc/postgres" );.
	</p>
	<h2>if ( ds == null ) {</h2>
	<p>
		Throw new Exception("Data source not found!");.
	</p>
	<p>
		}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
