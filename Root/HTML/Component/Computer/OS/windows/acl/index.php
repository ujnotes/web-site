<div id='message'>
	<p>
		Working notes on ACL: ACL, Mirror ACL registry, and takeown.
	</p>
	<h2>Topics</h2>
	<h4>ACL</h4>
	<p>
		icacls grants Full control; CACLS is deprecated; ICACLS does not set or read the owner.
	</p>
	<h4>Mirror ACL registry</h4>
	<p>
		Copy a registry ACL from hkcu:\software\foo onto hkcu:\software\bar with get-acl and set-acl.
	</p>
	<h4>takeown</h4>
	<p>
		takeown takes ownership of a path, recursively, optionally for Administrators.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
