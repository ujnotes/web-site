<div id='message'>
	<h2>Reset</h2>
	<h2>Create file</h2>
	<p>
		UPDATE mysql.user SET Password=PASSWORD('MyNewPass') WHERE User='root';.
	</p>
	<p>
		FLUSH PRIVILEGES;.
	</p>
	<h2>Set</h2>
	<h4>MySQL 5.7.6 and later</h4>
	<p>
		ALTER USER 'root'@'localhost' IDENTIFIED BY 'MyNewPass';.
	</p>
	<h2>MySQL 5.7.5 and earlier</h2>
	<p>
		SET PASSWORD FOR 'root'@'localhost' = PASSWORD('MyNewPass');.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
