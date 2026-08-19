<div id='message'>
	<p>
		Send mail using wordpress mail - via gmail.
	</p>
	<p>
		https://postmansmtp.com/how-to-configure-post-smtp-with-gmailgsuite-using-oauth
	</p>
	<p>
		<strong>Post SMTP.</strong> Google API.
	</p>
	<h2>1. Create google oauth client</h2>
	<ol class="list-number content-list">
		<li><div>get client secret.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>get client key.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>add redirect uri - get from wordpress console.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Add keys to the Post SMTP config in WP.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Authorise the client.</div></li>
	</ol>
	<h2>4. It may be possible to use alias email addresses as the send address</h2>
	<ol class="list-number content-list">
		<li><div>- if they have been added to the parent gmail address as alias.</div></li>
	</ol>
	<h2>In case of Error 400: redirect_uri_mismatch - on oauth sign up</h2>
	<p>
		Fix the redirect url - by referencing url presented in the detailed error page (.
	</p>
	<p>
		Send test mail to check.
	</p>
	<p>
		In the end - check the to address - to view the mail sent from the system.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
