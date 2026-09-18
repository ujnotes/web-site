<div id='message'>
	<p>
		http://www.cyberciti.biz/faq/unix-linux-mysqld-server-bind-to-more-than-one-ip-address
	</p>
	<p>
		Ubuntu.
	</p>
	<p>
		Bind to ipaddress.
	</p>
	<pre class='indent-c'><code class='block'>/etc//mysql/my.cnf</code></pre>
	<pre class='indent-c'><code class='block'>bind-address =</code></pre>
	<p>
		Xxx.xxx.xxx.xxx.
	</p>
	<h2>0.0.0.0</h2>
	<p>
		Any.
	</p>
	<p>
		Restart MySQL.
	</p>
	<h2>verify</h2>
	<pre class='indent-c'><code class='block'>lsof -i -P | grep :3306</code></pre>
	<pre class='indent-c'><code class='block'>netstat -nlt | grep 3306</code></pre>
	<pre class='indent-c'><code class='block'>netstat -tulpn</code></pre>
	<pre class='indent-c'><code class='block'>Create user (user@&lt;guest&gt;)</code></pre>
	<p>
		Else.
	</p>
	<p>
		<strong>Error.</strong> User not allowed to.
	</p>
	<p>
		CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';.
	</p>
	<p>
		GRANT ALL PRIVILEGES ON *.* TO 'username'@'localhost' WITH GRANT OPTION;.
	</p>
	<p>
		CREATE USER 'username'@'%' IDENTIFIED BY 'password';.
	</p>
	<p>
		GRANT ALL PRIVILEGES ON *.* TO 'username'@'%' WITH GRANT OPTION;.
	</p>
	<p>
		FLUSH PRIVILEGES;.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
