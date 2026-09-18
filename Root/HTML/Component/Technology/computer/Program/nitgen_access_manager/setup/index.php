<div id='message'>
	<h2>1. Install the prerequisites: (Included in installation media)</h2>
	<p>
		(You may refer to the chart/table given in the manual that specifies what pre-requisites be installed on which OS).
	</p>
	<ol class="list-number content-list">
		<li><div>Install SQL Server 2005.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>The installation dir has a .bat file that contains the initialization parameters.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>copy the content of this.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>this contains a password - that is recommended to be changed.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>3. Run: XXXsql.exe &lt;content from .bat file&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>Install the latest service pack (perhaps sp3).</div></li>
	</ol>
	<h2>- On Win 7 or newer you will be warned of incompatibility thus u must.</h2>
	<ol class="list-number content-list">
		<li><div>Start SQL Management Studio Express.</div></li>
	</ol>
	<p>
		<strong>(You may receive error.</strong> No Process Is on the Other End of the Pipe.
	</p>
	<h2>Then&gt; restart app)</h2>
	<h4>4. Login with</h4>
	<h4>1. Username</h4>
	<p>
		Sa.
	</p>
	<pre class='indent-c'><code class='block'>2. Password:        &lt;what you had put in a.i.1&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>Install Access Manager Server.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>1. SQL Server path: &lt;ComputerName\SQLServer&gt;</code></pre>
	<p>
		Gets from SQL Management Studio.
	</p>
	<pre class='indent-c'><code class='block'>2. Username/Password        &lt;as above&gt;</code></pre>
	<h4>3. When asked for: ids_sql_install_path</h4>
	<p>
		Specify the directory where the Nitgen DB Files will be placed.
	</p>
	<p>
		For example, C:\ProgramData\Nitgen\DB\.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
