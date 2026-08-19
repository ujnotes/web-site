<div id='message'>
		<p>
		Working notes on MySQL: Authentication, Commands, Export output to file, Function, Import, and Insert, and related topics.
	</p>
	<h2>Topics</h2>
	<h4>Authentication</h4>
	<p>
		Setting the “authentication plugin” to the older one at the user level is not sufficient if the “default authentication plugin” for the server is set to the newer plugin.
	</p>
	<h4>Commands</h4>
	<p>
		Shows databases;.
	</p>
	<h4>Export output to file</h4>
	<ol class="list-bullet content-list">
		<li><div>SELECT order_id,product_name,qty.</div></li>
	</ol>
	<h4>Function</h4>
	<p>
		Escape.
	</p>
	<h4>Import</h4>
	<p>
		Import: -u username -p -h 202.54.1.10 &lt;, and --max_allowed_packet=100M.
	</p>
	<h4>Insert</h4>
	<p>
		Insert: insert into &lt;table&gt; values (‘&lt;value&gt;’|NULL...).
	</p>
	<h4>Mac</h4>
	<p>
		Exports PATH=$PATH:/usr/local/mysql/bin.
	</p>
	<h4>Manage</h4>
	<p>
		MySQL status.
	</p>
	<h4>Password</h4>
	<p>
		UPDATE mysql.user SET Password=PASSWORD('MyNewPass') WHERE User='root';.
	</p>
	<h4>Remote access</h4>
	<p>
		http://www.cyberciti.biz/faq/unix-linux-mysqld-server-bind-to-more-than-one-ip-address.
	</p>
	<h4>Replace</h4>
	<p>
		Replace: UPDATE &lt;table&gt;, and UPDATE SET &lt;column&gt; = REPLACE(&lt;column&gt;, '&lt;existing.
	</p>
	<h4>Security</h4>
	<p>
		https://docs.oracle.com/cd/E17952_01/refman-5.5-en/security-against-attack.html.
	</p>
	<h4>Status</h4>
	<p>
		Status: # mysqladmin -u root -p status.
	</p>
	<h4>Table Information</h4>
	<p>
		Select * from information_schema.tables.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>