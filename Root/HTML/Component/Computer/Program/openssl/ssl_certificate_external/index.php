<div id='message'>
	<h2>1. Generate Private key</h2>
	<pre class='indent-c'><code class='block'>openssl genrsa -out san_domain.com.key 2048</code></pre>
	<p>
		?not protected - no passphrase?
	</p>
	<h2>2. Create the CSR file</h2>
	<h2>1. Provide details on prompt</h2>
	<pre class='indent-c'><code class='block'>1. openssl req -new -newkey rsa:2048 -nodes -keyout server.key -out server.csr</code></pre>
	<pre class='indent-c'><code class='block'>2. Provide details file &lt;openssl.cnf&gt;</code></pre>
	<pre class='indent-c'><code class='block'>1. openssl req -new -out san_domain.com.csr -key san_domain.com.key -config openssl.cnf</code></pre>
	<p>
		If prompt=yes.
	</p>
	<p>
		Value (from key=value) is taken as title for that key at the prompt.
	</p>
	<p>
		DefaultValue is used.
	</p>
	<pre class='indent-c'><code class='block'>openssl req -new -newkey rsa:2048 -nodes -out &lt;Sub-domain&gt;_&lt;Domain&gt;.&lt;TLD&gt;.csr -keyout &lt;Sub-domain&gt;_&lt;Domain&gt;.&lt;TLD&gt;.key -subj "/C=&lt;Country_Code&gt;/ST=&lt;State&gt;/L=&lt;City&gt;/O=&lt;Organization&gt;/CN=&lt;Sub-domain&gt;_&lt;Domain&gt;_&lt;TLD&gt;"</code></pre>
	<h2>The output content of CSR file can be verified using</h2>
	<pre class='indent-c'><code class='block'>openssl req -text -noout -in &lt;file.csr&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>Send CSR &gt; Authenticate &gt; Obtain cert chain files.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Generate bundle file by concatenating the CA files.</div></li>
	</ol>
	<h2>5. Create certificate file</h2>
	<pre class='indent-c'><code class='block'>openssl pkcs12 -export -in Sub.Domain.TLD.crt -inkey Sub.Domain.TLD.key -out Sub.Domain.TLD.p12 -name tomcat -CAfile Sub.Domain.TLD.ca-bundle -caname root -chain</code></pre>
	<p>
		SAN - Subject Alternative Names.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
