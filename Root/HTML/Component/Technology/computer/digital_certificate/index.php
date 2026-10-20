<div id='message'>
		<?php $alt='A public key bound to a website identity by a certificate authority\'s signature.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a digital certificate?</h3>
	<p>
		A digital certificate is a signed electronic record that binds a public key to an identity, such as a website name, a person or an organisation. The issuer signs that binding so others can check it.
	</p>
	<p>
		Suppose a website gives your browser a public key. Anyone could generate a key and claim it belongs to that website. A certificate helps your browser decide whether to accept the claim.
	</p>
	<p>
		The common format used for website certificates is X.509. Here, “certificate” means a public-key certificate. A school qualification stored as a PDF or on an NFC tag is a different kind of record, although digital signatures can protect both.
	</p>
	<h3>What does it contain?</h3>
	<ul class="list-bullet content-list">
		<li><div><strong>Subject and names:</strong> who or what the certificate identifies. Website names are normally listed in the Subject Alternative Name extension.</div></li>
		<li><div><strong>Public key:</strong> the key being certified, together with information about its algorithm.</div></li>
		<li><div><strong>Issuer and serial number:</strong> who issued the certificate and its identifier within that issuer's records.</div></li>
		<li><div><strong>Validity period:</strong> the dates between which it may be accepted, subject to the other checks.</div></li>
		<li><div><strong>Permitted uses:</strong> extensions can restrict whether the key may authenticate a server, sign certificates or serve another purpose.</div></li>
		<li><div><strong>Signature:</strong> the issuer's signature over the certificate's signed fields.</div></li>
	</ul>
	<p>
		A certificate contains the public key. Its matching private key must stay secret and is not part of the certificate.
	</p>
	<h3>How is it trusted?</h3>
	<p>
		A certificate authority, or CA, checks a request according to its issuance policy and signs a certificate. For a domain-validated website certificate, the check concerns control of the domain; it does not establish that the business is honest.
	</p>
	<p>
		Your browser starts with trusted root authorities. A website usually supplies its own certificate and intermediate certificates, allowing the browser to build a chain back to a trusted root.
	</p>
	<p>
		A root is trusted because the browser or system has accepted it as a trust anchor. Its self-signature alone does not make it trustworthy. A private organisation can also operate its own CA and distribute that trust explicitly.
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" class="crypto-diagram" id="certificate-trust-chain" role="img" aria-labelledby="certificate-trust-chain-title certificate-trust-chain-desc" viewBox="0 0 900 330" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="certificate-trust-chain-title">A certificate binds a name to a public key</title><desc id="certificate-trust-chain-desc">An already trusted root signs an intermediate CA certificate; that CA signs the website certificate binding a name to a public key.</desc><style>#certificate-trust-chain{--ink:#40516f;--note:#465166;--box:#d9ecff;--green:#8fd3c7;--paper:#f6f9fc;--gold:#e8c585}#certificate-trust-chain .box{fill:var(--box);stroke:var(--ink);stroke-width:4}#certificate-trust-chain .green{fill:var(--green);stroke:var(--ink);stroke-width:4}#certificate-trust-chain .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#certificate-trust-chain .line{fill:none;stroke:var(--ink);stroke-width:4;stroke-linecap:round;stroke-linejoin:round}#certificate-trust-chain .key{fill:none;stroke:var(--ink);stroke-width:5;stroke-linecap:round}#certificate-trust-chain text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#certificate-trust-chain .note{fill:var(--note);font:18px system-ui,sans-serif}#certificate-trust-chain .arrow{fill:var(--ink)}@media(prefers-color-scheme:dark){svg:root#certificate-trust-chain{--ink:#d8e4f0;--note:#bdcad9;--box:#243044;--green:#2d6b63;--paper:#1c2636;--gold:#8d6b39}}html.dark-mode #certificate-trust-chain,.dark-mode #certificate-trust-chain{--ink:#d8e4f0;--note:#bdcad9;--box:#243044;--green:#2d6b63;--paper:#1c2636;--gold:#8d6b39}</style><text x="450" y="32">Who does this public key belong to?</text><rect class="green" x="25" y="78" width="235" height="160" rx="18"/><text x="142" y="114">Trusted root</text><text class="note" x="142" y="155">already accepted</text><text class="note" x="142" y="181">by your browser</text><path class="line" d="M278 155h43"/><path class="arrow" d="M321 146l15 9-15 9z"/><rect class="box" x="345" y="78" width="210" height="160" rx="18"/><text x="450" y="114">Intermediate CA</text><text class="note" x="450" y="155">certificate signed</text><text class="note" x="450" y="181">by the root</text><path class="line" d="M574 155h43"/><path class="arrow" d="M617 146l15 9-15 9z"/><rect class="paper" x="640" y="78" width="235" height="160" rx="18"/><text x="757" y="114">Website certificate</text><text class="note" x="757" y="149">example.com + public key</text><text class="note" x="757" y="181">signed by the CA</text><text class="note" x="450" y="277">Arrows show signing relationships. Validation follows the chain back to the root.</text><text class="note" x="450" y="307">The website must also prove it holds the matching private key.</text></svg>
	<h3>What does verification check?</h3>
	<ol class="list-bullet content-list">
		<li><div>The certificate's signatures and chain lead to an accepted trust anchor.</div></li>
		<li><div>The requested website name matches an allowed name in the certificate.</div></li>
		<li><div>The certificate is within its validity period and allowed for the intended use.</div></li>
		<li><div>The chain satisfies applicable constraints and the client's revocation policy.</div></li>
	</ol>
	<p>
		The peer must also prove possession of the corresponding private key through the connection protocol. Copying a public certificate does not provide that proof.
	</p>
	<p>
		Certificates can expire or be revoked, for example after a private key is exposed. Revocation information may be distributed through certificate revocation lists or online status services. Clients differ in how they obtain and enforce it.
	</p>
	<h3>How does this relate to encryption?</h3>
	<p>
		A certificate identifies a public key; it does not itself encrypt a conversation. In a typical certificate-based TLS 1.3 connection, certificates and signatures authenticate the server, key agreement establishes shared secrets, and symmetric authenticated encryption protects the traffic.
	</p>
	<p>
		Encryption answers “who can read this?” A signature helps answer “was this signed with the expected private key, and has it changed?” A certificate helps answer “whose public key should I use?”
	</p>
	<h3>Can it verify a qualification on an NFC tag?</h3>
	<p>
		Imagine a board issuing a student's qualification. It signs an agreed representation of the qualification details, including an identifier. A verifier reads the details and signature from the tag and checks them using the board's trusted public key. A public-key certificate can help establish which key belongs to the board.
	</p>
	<p>
		The signature can be checked offline if the verifier already has the required keys, certificates and trust information. Offline checking cannot by itself reveal a newly revoked certificate or a recently withdrawn qualification.
	</p>
	<p>
		A plain hash stored beside the details is insufficient: someone could replace both. A digital signature resists that substitution without requiring every verifier to hold the board's private key.
	</p>
	<p>
		In a hash-and-sign scheme, the board computes a digest of the exact qualification data and signs that digest with its private key. The verifier computes a fresh digest from the received qualification and checks it with the signature and the board's public key.
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="hash-sign-verify" role="img" aria-labelledby="hash-sign-verify-t hash-sign-verify-d" viewBox="0 0 900 640" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="hash-sign-verify-t">Hash the document, sign the digest, verify independently</title><desc id="hash-sign-verify-d">The signer hashes a document and signs its digest with a private key. The receiver hashes the received document and checks the signature with the public key and that digest.</desc><style>#hash-sign-verify{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#hash-sign-verify .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#hash-sign-verify .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#hash-sign-verify .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#hash-sign-verify .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#hash-sign-verify text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#hash-sign-verify .note{fill:var(--note);font:18px system-ui,sans-serif}#hash-sign-verify .small{font:16px system-ui,sans-serif}#hash-sign-verify .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">Sign a document's fingerprint, then check it</text><text class="note" x="450" y="72">RSA PKCS#1 v1.5: sign the digest, then check it against a fresh hash.</text><text x="100" y="122">SIGNER</text><rect class="paper" x="40" y="145" width="135" height="130" rx="10"/><path class="line" d="M60 181h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="259">Document</text><path class="line" d="M185 208h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="165" width="145" height="90" rx="10"/><text x="317" y="201">Hash</text><text class="small" x="317" y="229">same algorithm</text><path class="line" d="M400 208h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="165" width="145" height="90" rx="10"/><text x="532" y="201">Digest</text><text class="note" x="532" y="229">fingerprint</text><path class="line" d="M615 208h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="165" width="185" height="90" rx="10"/><text x="767" y="201">Sign digest</text><text class="note" x="767" y="229">with private key</text><text class="note" x="450" y="294">Send the original document together with its signature.</text><path class="line" d="M35 318h830"/><text x="107" y="357">VERIFIER</text><rect class="paper" x="40" y="380" width="135" height="130" rx="10"/><path class="line" d="M60 416h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="494">Document</text><path class="line" d="M185 443h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="400" width="145" height="90" rx="10"/><text x="317" y="436">Hash</text><text class="small" x="317" y="464">same algorithm</text><path class="line" d="M400 443h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="400" width="145" height="90" rx="10"/><text x="532" y="436">New digest</text><text class="note" x="532" y="464">of received data</text><path class="line" d="M615 443h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="400" width="185" height="90" rx="10"/><text x="767" y="436">Verify</text><text class="note" x="767" y="464">valid or invalid</text><text class="note" x="767" y="365">Signature + public key</text><path class="line" d="M767 374v18m-8-10 8 10 8-10"/><text class="note" x="450" y="548">The public key lets the verifier recover the signed digest.</text><text class="note" x="450" y="583">The verifier also calculates a fresh hash of the received document.</text><text class="note" x="450" y="616">The recovered digest and the freshly calculated hash must match exactly.</text></svg>
	<p>
		Imagine an attached fingerprint slip: the fingerprint represents the hash, and the issuer's signature authenticates it. Changing the qualification changes its fingerprint, so the original signature fails verification. Merely replacing the hash does not help an attacker who cannot produce a valid new signature.
	</p>
	<p>
		For the RSA PKCS#1 v1.5 example, the verifier uses the public key to recover the signed digest and compares it with a fresh hash of the received qualification. They must match exactly. A public-key certificate lets the verifier check whose verification key it is using. See <a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8017.html#section-8.2.2" target="_blank" rel="noopener noreferrer">RFC 8017, section 8.2.2</a>.
	</p>
	<p>
		Signing does not hide the student's details. It also does not prevent copying the whole record to another tag. Preventing cloning or proving that the bearer is the named student requires additional measures.
	</p>
	<h3>What does a valid certificate prove?</h3>
	<p>
		A valid certificate supports a particular identity-to-key binding under a particular trust policy. It does not guarantee that a website is safe, that signed statements are true, or that a private key has never been stolen.
	</p>
	<p>
		For the field layout, see <a class="content-link XURL" href="/technology/computer/digital_certificate/structure" data-target="technology/computer/digital_certificate/structure" data-title="certificate structure">certificate structure</a>.
	</p>
	<h3>References</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc5280.html" target="_blank" rel="noopener noreferrer">RFC 5280: X.509 certificates and path validation</a></div></li>
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8446.html" target="_blank" rel="noopener noreferrer">RFC 8446: TLS 1.3</a></div></li>
		<li><div><a class="content-link" href="https://csrc.nist.gov/glossary/term/digital_signature" target="_blank" rel="noopener noreferrer">NIST: digital signatures</a></div></li>
	</ul>
	<p>
		The NFC example is adapted from my earlier document-authentication design notes; it illustrates the distinction between authenticating a record and preventing its copying.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>