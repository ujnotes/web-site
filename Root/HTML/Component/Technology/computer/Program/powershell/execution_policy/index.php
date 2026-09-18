<div id='message'>
	<h2>To</h2>
	<p>
		Prevent unintentional execution of scripts.
	</p>
	<p>
		Not to restrict the user’s ability to run as he can bypass.
	</p>
	<p>
		https://docs.microsoft.com/en-us/powershell/module/microsoft.powershell.core/about/about_execution_policies?view=powershell-7
	</p>
	<h2>1. Change execution policy</h2>
	<ol class="list-number content-list">
		<li><div>Default is undefined.</div></li>
	</ol>
	<h4>2. List</h4>
	<pre class='indent-c'><code class='block'>1. Get-ExecutionPolicy -List | Format-Table -AutoSize</code></pre>
	<h4>2. Result</h4>
	<h4>1.</h4>
	<p>
		Scope ExecutionPolicy.
	</p>
	<h4>2.</h4>
	<p>
		----- ---------------.
	</p>
	<h4>3. MachinePolicy</h4>
	<p>
		Undefined.
	</p>
	<h4>4.</h4>
	<p>
		UserPolicy Undefined.
	</p>
	<h4>5.</h4>
	<p>
		Process Undefined.
	</p>
	<h4>6.</h4>
	<p>
		CurrentUser Undefined.
	</p>
	<h4>7.</h4>
	<p>
		LocalMachine AllSigned.
	</p>
	<pre class='indent-c'><code class='block'>3. Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope LocalMachine</code></pre>
	<h2>2. Self Sign</h2>
	<ol class="list-number content-list">
		<li><div>Sits in the file property.</div></li>
	</ol>
	<p>
		https://community.spiceworks.com/how_to/153255-windows-10-signing-a-powershell-script-with-a-self-signed-certificate
	</p>
	<pre class='indent-c'><code class='block'>New-SelfSignedCertificate -CertStoreLocation cert:\currentuser\my `</code></pre>
	<pre class='indent-c'><code class='block'>New-SelfSignedCertificate -Subject "CN=Local Code Signing" `</code></pre>
	<pre class='indent-c'><code class='block'>-Subject -KeyAlgorithm RSA `</code></pre>
	<pre class='indent-c'><code class='block'>-KeyAlgorithm -KeyLength 2048 `</code></pre>
	<pre class='indent-c'><code class='block'>-KeyLength -Provider "Microsoft Enhanced RSA and AES Cryptographic Provider" `</code></pre>
	<pre class='indent-c'><code class='block'>-Provider -KeyExportPolicy Exportable `</code></pre>
	<pre class='indent-c'><code class='block'>-KeyExportPolicy -KeyUsage DigitalSignature `</code></pre>
	<pre class='indent-c'><code class='block'>-KeyUsage -Type CodeSigningCert</code></pre>
	<ol class="list-number content-list">
		<li><div>Copy “Local Code Signing” from personal folder.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>certmgr /s my.</div></li>
	</ol>
	<h4>2. To</h4>
	<ol class="list-number content-list">
		<li><div>"Trusted Root Certification Authorities".</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>"Trusted Publishers".</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Sign.</div></li>
	</ol>
	<pre class='indent-c'><code class='block'>1. $cert = @(Get-ChildItem cert:\CurrentUser\My -CodeSigning)[0]</code></pre>
	<pre class='indent-c'><code class='block'>2. Set-AuthenticodeSignature .\&lt;script&gt;.ps1 $cert</code></pre>
	<ol class="list-number content-list">
		<li><div>Restart shell.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
