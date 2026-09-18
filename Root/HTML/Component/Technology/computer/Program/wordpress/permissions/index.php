<div id='message'>
	<p>
		The root folder is required to be readable by world.
	</p>
	<p>
		https://www.getastra.com/blog/cms/wordpress-security/wordpress-file-permissions
	</p>
	<p>
		Wp-config.php.
	</p>
	<h2>is most sensitive</h2>
	<p>
		Should be 400/444.
	</p>
	<p>
		User &amp; server no right to edit.
	</p>
	<p>
		Others cannot even read.
	</p>
	<h2>Index.php</h2>
	<h4>644/444 (higher security)</h4>
	<p>
		Only admin can write/execute.
	</p>
	<h2>.php</h2>
	<p>
		644.
	</p>
	<p>
		Users can read &amp; write.
	</p>
	<p>
		Groups &amp; others can only read.
	</p>
	<h2>folders</h2>
	<p>
		755.
	</p>
	<p>
		Read, write, execute for user.
	</p>
	<p>
		Reads and execute for group.
	</p>
	<p>
		None for all others.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
