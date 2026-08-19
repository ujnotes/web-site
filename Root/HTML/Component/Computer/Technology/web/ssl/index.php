<div id='message'>
	<p>
		SSL notes: Let's Encrypt issuance, JKS, testing, and renewal.
	</p>
	<h2>Topics</h2>
	<h4>Let's Encrypt</h4>
	<p>
		Let's Encrypt via gethttpsforfree.com: admin RSA key, server CSR, install on the server; test on SSL Labs; JKS via certbot issue 2920.
	</p>
	<h4>Renewal</h4>
	<p>
		Do not reuse the CSR on renewal; repeat the entire Let's Encrypt process.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
