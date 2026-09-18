<div id='message'>
	<p>
		Working notes on Context - parameters: Context.xml, Web.xml, 1. Parameters, and 2. Environment entries.
	</p>
	<p>
		Declare and define.
	</p>
	<h2>Context.xml</h2>
	<p>
		In parameters.
	</p>
	<h2>Web.xml</h2>
	<p>
		In tags.
	</p>
	<h2>1. Parameters</h2>
	<ol class="list-number content-list">
		<li><div>Company.</div></li>
	</ol>
	<h2>2. Environment entries</h2>
	<ol class="list-number content-list">
		<li><div>3. Resource definitions.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>DB.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>&lt;Resource.</div></li>
	</ol>
	<p>
		Name = "jdbc/EmployeeDB".
	</p>
	<p>
		Auth = "Container".
	</p>
	<p>
		Type = "javax.sql.DataSource".
	</p>
	<p>
		Description = "Employees Database for HR Applications".
	</p>
	<p>
		/&gt;.
	</p>
	<p>
		Application.getInitParameter("companyName").
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
