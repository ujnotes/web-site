<div id='message'>
		<?php $alt='A readable message becomes ciphertext; the correct key allows its recipient to recover it.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is encryption?</h3>
	<p>
		Encryption transforms readable information, called plaintext, into ciphertext using an algorithm and a key. Decryption uses the appropriate key to recover the plaintext.
	</p>
	<p>
		The purpose is confidentiality: someone who obtains the ciphertext should not be able to read the original information without the required secret.
	</p>
	<p>
		Think of sending a letter in a locked box. The box may pass through many hands, but only someone with the right key can open it. The analogy explains access; real encryption works on data through mathematics.
	</p>
	<h3>What is an encryption key?</h3>
	<p>
		A key is a value that controls a cryptographic operation. The algorithm can be public while the necessary key remains secret. Security should depend on protecting keys and using a sound scheme correctly.
	</p>
	<p>
		A password is not usually used directly as an encryption key. Software can derive a key from it using a password-based key derivation function. A weak password can still be guessed, even when the underlying cipher is strong.
	</p>
	<h3>What is symmetric encryption?</h3>
	<p>
		Symmetric encryption uses the same secret key to encrypt and decrypt. Both sides must protect that secret.
	</p>
	<p>
		For example, two people sharing an encrypted archive need access to its secret key. Sending the key alongside the archive through the same exposed channel defeats the protection.
	</p>
	<p>
		Symmetric encryption is efficient for large amounts of data. AES is a widely used symmetric cipher. A complete encryption scheme also specifies how the cipher is used and how related values are managed.
	</p>
	<h3>What is asymmetric encryption?</h3>
	<p>
		Asymmetric, or public-key, encryption uses a related pair of keys: a public key that can be shared and a private key that must remain secret.
	</p>
	<p>
		Suppose Alice wants to send Bob a confidential message:
	</p>
	<ol class="list-bullet content-list">
		<li><div>Bob generates a suitable key pair and keeps his private key secret.</div></li>
		<li><div>Alice obtains Bob's public key and checks that it really belongs to him.</div></li>
		<li><div>Alice encrypts using that public key through a suitable encryption scheme.</div></li>
		<li><div>Bob decrypts using his private key.</div></li>
	</ol>
	<p>
		Sharing the public key does not enable someone to derive the private key feasibly when the scheme and key sizes are secure.
	</p>
	<p>
		The identity check matters. If an attacker substitutes their public key, Alice may encrypt a message that the attacker can read. A trusted fingerprint or a <a class="content-link XURL" href="/technology/computer/digital_certificate" data-target="technology/computer/digital_certificate" data-title="digital certificate">digital certificate</a> can help authenticate a key.
	</p>
	<p>
		RSA can be used in encryption schemes such as RSA-OAEP. Other public-key algorithms serve different purposes: some establish shared secrets, while others create signatures. A public/private key pair is not automatically suitable for every operation.
	</p>
	<h3>How does the box example work?</h3>
	<p>
		Imagine Bob wants Alice to send him a private letter in a box.
	</p>
	<p>
		With a shared secret key, Alice locks the box and Bob opens it with a copy of the same key. They must first arrange to share that key safely. Anyone who gets a copy can open the box.
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="shared-key-box" role="img" aria-labelledby="shared-key-box-t shared-key-box-d" viewBox="0 0 900 530" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="shared-key-box-t">A wooden box locked with a shared secret key</title><desc id="shared-key-box-d">A locked wooden chest hides a letter. Alice and Bob have copies of the same secret key.</desc><style>#shared-key-box{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#shared-key-box .mount{fill:#8c98aa;stroke:var(--ink);stroke-width:3}#shared-key-box .neutral-lock{fill:var(--paper);stroke:var(--ink);stroke-width:3}#shared-key-box .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#shared-key-box .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#shared-key-box .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#shared-key-box .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#shared-key-box .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#shared-key-box .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#shared-key-box .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#shared-key-box text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#shared-key-box .note{fill:var(--note);font:18px system-ui,sans-serif}#shared-key-box .small{font:16px system-ui,sans-serif}#shared-key-box .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#shared-key-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #shared-key-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">One box. Two copies of the same secret key.</text><text class="note" x="450" y="72">Symmetric encryption</text><path class="edge" d="M600 200l65-52v180l-65 55z"/><path class="wood" d="M280 200h320v183H280z"/><path class="top" d="M280 200l65-52h320l-65 52z"/><path class="line" d="M280 238h320l65-52"/><path class="line" d="M315 250v116m250-116v116"/><path class="mount" d="M421 228h38v64h-38z"/><path class="line" d="M429 271v-13a11 11 0 0 1 22 0v13"/><rect class="neutral-lock" x="425" y="271" width="30" height="28" rx="4"/><path class="line" d="M440 281v7"/><text x="122" y="177">Alice</text><g transform="translate(95 217)"><circle class="line" r="13"/><path class="line" d="M13 0h55m-13 0v13m-15-13v10"/></g><text class="note" x="122" y="267">locks the box</text><text class="note" x="122" y="294">with her key</text><path class="line" d="M178 220h65m-12-9 12 9-12 9"/><text x="776" y="177">Bob</text><g transform="translate(749 217)"><circle class="line" r="13"/><path class="line" d="M13 0h55m-13 0v13m-15-13v10"/></g><text class="note" x="776" y="267">opens the box</text><text class="note" x="776" y="294">with the same key</text><path class="line" d="M701 220h-24m12-9-12 9 12 9"/><text class="note" x="450" y="427">The letter is inside the opaque box: people passing it along cannot read it.</text><text class="note" x="450" y="461">Alice and Bob must share the key safely and keep both copies secret.</text></svg>
	<p>
		For a public/private key pair, imagine a special box lock with two different keys. Bob gives everyone copies of the key that can only lock it, while keeping the key that can only unlock it.
	</p>
	<p>
		Alice puts her letter in the box and uses Bob's public locking key. She cannot use that key to unlock the box again. Bob uses his private unlocking key to read the letter.
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="public-padlock-box" role="img" aria-labelledby="public-padlock-box-t public-padlock-box-d" viewBox="0 0 900 530" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="public-padlock-box-t">A box with a locking key and an unlocking key</title><desc id="public-padlock-box-d">A special lock has two different keys. Bob shares the key that locks the box and keeps the key that unlocks it.</desc><style>#public-padlock-box{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#public-padlock-box .mount{fill:#8c98aa;stroke:var(--ink);stroke-width:3}#public-padlock-box .neutral-lock{fill:var(--paper);stroke:var(--ink);stroke-width:3}#public-padlock-box .lock{fill:#c5554f;stroke:var(--ink);stroke-width:3}#public-padlock-box .hole{fill:var(--ink)}#public-padlock-box .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#public-padlock-box .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#public-padlock-box .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#public-padlock-box .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#public-padlock-box .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#public-padlock-box .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#public-padlock-box .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#public-padlock-box text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#public-padlock-box .note{fill:var(--note);font:18px system-ui,sans-serif}#public-padlock-box .small{font:16px system-ui,sans-serif}#public-padlock-box .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#public-padlock-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #public-padlock-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">Two different keys: one locks, the other unlocks.</text><text class="note" x="450" y="72">Public-key encryption</text><path class="edge" d="M600 200l65-52v180l-65 55z"/><path class="wood" d="M280 200h320v183H280z"/><path class="top" d="M280 200l65-52h320l-65 52z"/><path class="line" d="M280 238h320l65-52"/><path class="line" d="M315 250v116m250-116v116"/><path class="mount" d="M421 228h38v64h-38z"/><path class="line" d="M414 267v-13a26 26 0 0 1 52 0v13"/><rect class="neutral-lock" x="396" y="267" width="88" height="65" rx="7"/><circle cx="419" cy="299" r="20" fill="var(--green)"/><circle cx="461" cy="299" r="20" fill="#c5554f"/><circle class="hole" cx="419" cy="290" r="4"/><path class="hole" d="m417 292-2 8h8l-2-8z"/><circle class="hole" cx="461" cy="290" r="4"/><path class="hole" d="m459 292-2 8h8l-2-8z"/><text class="small" x="419" y="315">L</text><text class="small" x="461" y="315">U</text><text x="120" y="158">Alice</text><g transform="translate(92 212)"><circle class="green" r="13"/><path class="line" d="M13 0h55M38 0v14M55 0v8"/></g><text class="note" x="120" y="277">public key</text><text class="note" x="120" y="304">locks; cannot unlock</text><path class="line" d="M170 220h73m-12-9 12 9-12 9"/><text x="776" y="158">Bob</text><g transform="translate(749 212)"><circle class="lock" r="13"/><path class="line" d="M13 0h55m-13 0v13m-15-13v10"/></g><text class="note" x="776" y="277">private key</text><text class="note" x="776" y="304">unlocks only</text><path class="line" d="M701 220h-24m12-9-12 9 12 9"/><text class="note" x="450" y="427">Two keyholes: L = lock with the public key; U = unlock with the private key.</text><text class="note" x="450" y="461">Alice checks the public key belongs to Bob. Bob keeps the private key secret.</text></svg>
	<p>
		The public locking key represents the public encryption key, and the private unlocking key represents the private decryption key. This is an imagined lock with two different capabilities, not how an ordinary door lock works. Real encryption performs those operations on data mathematically.
	</p>
	<p>
		Alice must check that the public key really belongs to Bob before using it. A key supplied by an attacker would protect the message for the attacker instead.
	</p>
	<h3>Why use both kinds together?</h3>
	<p>
		Many systems combine public-key cryptography with symmetric encryption.
	</p>
	<p>
		Public-key methods establish or protect a shared secret, and symmetric encryption handles the bulk data. This avoids requiring people to share a secret beforehand while retaining efficient data protection.
	</p>
	<p>
		In a typical certificate-based TLS 1.3 connection, the server authenticates with a certificate and signature, the parties establish shared secrets through key agreement, and symmetric authenticated encryption protects their traffic. Key agreement is a way to derive shared secrets, rather than simply sending the conversation encrypted with a certificate's public key.
	</p>
	<h3>Is signing the same as encryption?</h3>
	<p>
		No. Encryption protects confidentiality. A digital signature lets others check that data was signed with a particular private key and has not changed.
	</p>
	<p>
		For signatures, the signer uses a private signing key and the verifier uses the corresponding public key. Signing is a distinct operation, not a general instruction to “encrypt with the private key”.
	</p>
	<p>
		A signed qualification on an NFC tag can remain readable to everyone. Its signature protects authenticity and integrity, not secrecy. Encrypting it would address a separate question: who may read the qualification?
	</p>
	<h3>How is a document's hash signed?</h3>
	<p>
		Think of a qualification sheet with a small fingerprint slip attached. A cryptographic hash produces that fingerprint, called a digest, from the exact document data. In a hash-and-sign scheme, the issuer signs the digest with its private key and sends the document together with the resulting signature.
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="hash-sign-verify" role="img" aria-labelledby="hash-sign-verify-t hash-sign-verify-d" viewBox="0 0 900 640" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="hash-sign-verify-t">Hash the document, sign the digest, verify independently</title><desc id="hash-sign-verify-d">The signer hashes a document and signs its digest with a private key. The receiver hashes the received document and checks the signature with the public key and that digest.</desc><style>#hash-sign-verify{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#hash-sign-verify .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#hash-sign-verify .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#hash-sign-verify .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#hash-sign-verify .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#hash-sign-verify text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#hash-sign-verify .note{fill:var(--note);font:18px system-ui,sans-serif}#hash-sign-verify .small{font:16px system-ui,sans-serif}#hash-sign-verify .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">Sign a document's fingerprint, then check it</text><text class="note" x="450" y="72">RSA PKCS#1 v1.5: sign the digest, then check it against a fresh hash.</text><text x="100" y="122">SIGNER</text><rect class="paper" x="40" y="145" width="135" height="130" rx="10"/><path class="line" d="M60 181h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="259">Document</text><path class="line" d="M185 208h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="165" width="145" height="90" rx="10"/><text x="317" y="201">Hash</text><text class="small" x="317" y="229">same algorithm</text><path class="line" d="M400 208h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="165" width="145" height="90" rx="10"/><text x="532" y="201">Digest</text><text class="note" x="532" y="229">fingerprint</text><path class="line" d="M615 208h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="165" width="185" height="90" rx="10"/><text x="767" y="201">Sign digest</text><text class="note" x="767" y="229">with private key</text><text class="note" x="450" y="294">Send the original document together with its signature.</text><path class="line" d="M35 318h830"/><text x="107" y="357">VERIFIER</text><rect class="paper" x="40" y="380" width="135" height="130" rx="10"/><path class="line" d="M60 416h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="494">Document</text><path class="line" d="M185 443h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="400" width="145" height="90" rx="10"/><text x="317" y="436">Hash</text><text class="small" x="317" y="464">same algorithm</text><path class="line" d="M400 443h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="400" width="145" height="90" rx="10"/><text x="532" y="436">New digest</text><text class="note" x="532" y="464">of received data</text><path class="line" d="M615 443h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="400" width="185" height="90" rx="10"/><text x="767" y="436">Verify</text><text class="note" x="767" y="464">valid or invalid</text><text class="note" x="767" y="365">Signature + public key</text><path class="line" d="M767 374v18m-8-10 8 10 8-10"/><text class="note" x="450" y="548">The public key lets the verifier recover the signed digest.</text><text class="note" x="450" y="583">The verifier also calculates a fresh hash of the received document.</text><text class="note" x="450" y="616">The recovered digest and the freshly calculated hash must match exactly.</text></svg>
	<p>
		For this RSA PKCS#1 v1.5 example, the verifier uses the public key to recover the signed digest and independently calculates a fresh hash of the received document. The two hashes must match exactly. If the document changes, its fresh hash no longer matches the signed digest and verification fails.
	</p>
	<p>
		For example, changing “Result: Passed” to “Result: Failed” changes the document's digest. The signature made for the original digest will fail verification against the altered document. An attacker can calculate a new hash, but cannot create a valid replacement signature without the private key, assuming the scheme remains secure.
	</p>
	<h3>Does RSA verification compare the hashes exactly?</h3>
	<p>
		Yes. In this RSA PKCS#1 v1.5 example, verification requires an exact match between the recovered digest and the freshly calculated hash. The document itself remains readable; the signature authenticates its digest. Other signature schemes perform their checks differently.
	</p>
	<p>
		See <a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8017.html#section-8.2.2" target="_blank" rel="noopener noreferrer">RFC 8017, section 8.2.2</a>.
	</p>
	<p>
		The qualification can remain fully readable. The signature detects alteration rather than preventing someone from editing or copying the data. Software normally performs the hashing inside its signing and verification functions; do not add an extra hashing step unless the API requires it.
	</p>
	<h3>How do hashing and encoding differ?</h3>
	<ul class="list-bullet content-list">
		<li><div><strong>Encoding</strong> changes representation so data can be stored or transmitted. Base64 is reversible without a secret and provides no confidentiality.</div></li>
		<li><div><strong>Hashing</strong> produces a digest of data. A cryptographic hash is designed to resist recovering an input from its digest and finding collisions. It is not reversible encryption; predictable inputs can still be guessed and checked.</div></li>
		<li><div><strong>Encryption</strong> is designed to be reversed with the appropriate key.</div></li>
	</ul>
	<p>
		A hash alone does not authenticate a message: an attacker who can replace the message may also replace its hash.
	</p>
	<h3>Does encryption detect tampering?</h3>
	<p>
		Encryption alone does not necessarily detect changes. Authenticated encryption combines confidentiality with a check that rejects altered protected data. Examples include AES-GCM and ChaCha20-Poly1305.
	</p>
	<p>
		Such schemes also require correct handling of values such as nonces. Reusing a nonce where uniqueness is required can break security. Use maintained cryptographic libraries and established protocols that manage these requirements.
	</p>
	<h3>What can encryption not protect?</h3>
	<p>
		Encryption cannot stop a recipient from copying decrypted information. It cannot protect plaintext already exposed by an infected device, a screenshot or a stolen unlocked session.
	</p>
	<p>
		It may also leave metadata visible, such as who is communicating, when and approximately how much data is sent. Transport encryption protects a connection; end-to-end encryption aims to keep message contents readable only at the communicating endpoints.
	</p>
	<p>
		If the necessary decryption key is lost and there is no recovery mechanism, the data may be unrecoverable. Key storage, backup and access control are therefore part of the design.
	</p>
	<p>
		Encryption is useful wherever information must remain private, but its protection depends on the whole system: the scheme, the keys, the devices and the people allowed to read the result.
	</p>
	<h3>References</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://csrc.nist.gov/glossary/term/asymmetric_cryptography" target="_blank" rel="noopener noreferrer">NIST: asymmetric cryptography</a></div></li>
		<li><div><a class="content-link" href="https://www.nist.gov/publications/advanced-encryption-standard-aes" target="_blank" rel="noopener noreferrer">NIST: Advanced Encryption Standard</a></div></li>
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc5116" target="_blank" rel="noopener noreferrer">RFC 5116: authenticated encryption</a></div></li>
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8446.html" target="_blank" rel="noopener noreferrer">RFC 8446: TLS 1.3</a></div></li>
		<li><div><a class="content-link" href="https://csrc.nist.gov/glossary/term/digital_signature" target="_blank" rel="noopener noreferrer">NIST: digital signatures</a></div></li>
	</ul>
	<p>
		The distinction between signing and secrecy also draws on my earlier NFC document-authentication notes.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>