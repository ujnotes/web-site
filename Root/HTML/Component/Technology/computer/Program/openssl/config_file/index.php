<div id='message'>
	<p>
		[req].
	</p>
	<p>
		Distinguished_name = req_distinguished_name.
	</p>
	<p>
		Req_extensions = v3_req.
	</p>
	<p>
		?for v1.
	</p>
	<p>
		X509_extensions.
	</p>
	<p>
		?for v3.
	</p>
	<p>
		Prompt = no.
	</p>
	<p>
		[ req_distinguished_name ].
	</p>
	<p>
		CountryName = Country Name (2 letter code).
	</p>
	<p>
		StateOrProvinceName = State or Province Name (full name).
	</p>
	<p>
		LocalityName = Locality Name (eg, city).
	</p>
	<p>
		OrganizationName = Organization Name (eg, company).
	</p>
	<p>
		OrganizationalUnitName = Organizational Unit Name (eg, section).
	</p>
	<p>
		CommonName = CN.
	</p>
	<p>
		EmailAddress =.
	</p>
	<p>
		[ v3_req ].
	</p>
	<p>
		BasicConstraints = CA:FALSE.
	</p>
	<h2>keyUsage = digitalSignature, keyEncipherment</h2>
	<p>
		Does not work in v3.
	</p>
	<h2>keyUsage = nonRepudiation, digitalSignature, keyEncipherment</h2>
	<p>
		Works in v3.
	</p>
	<p>
		SubjectAltName = @alt_names.
	</p>
	<p>
		[ alt_names ].
	</p>
	<p>
		DNS.1 = ..com.
	</p>
	<p>
		DNS.2 = ..com.
	</p>
	<p>
		sub of sub domain not covered by *. So *.&lt;foo&gt;.&lt;domain&gt;
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
