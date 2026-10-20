<div id='message'>
		<?php $alt='प्रमाणपत्र प्राधिकारी का हस्ताक्षर किसी वेबसाइट की पहचान को उसकी सार्वजनिक कुंजी से जोड़ता है।'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>डिजिटल प्रमाणपत्र क्या है?</h3>
	<p>
		डिजिटल प्रमाणपत्र एक हस्ताक्षरित इलेक्ट्रॉनिक अभिलेख है जो सार्वजनिक कुंजी को किसी पहचान से जोड़ता है, जैसे वेबसाइट का नाम, व्यक्ति या संगठन। जारीकर्ता इस सम्बन्ध पर हस्ताक्षर करता है ताकि दूसरे लोग इसकी जाँच कर सकें।
	</p>
	<p>
		मान लीजिए कोई वेबसाइट आपके ब्राउजर को सार्वजनिक कुंजी देती है। कोई भी कुंजी बनाकर दावा कर सकता है कि वह उस वेबसाइट की है। प्रमाणपत्र ब्राउजर को तय करने में सहायता करता है कि दावा स्वीकार करना चाहिए या नहीं।
	</p>
	<p>
		वेबसाइट प्रमाणपत्रों का सामान्य प्रारूप X.509 है। यहाँ “प्रमाणपत्र” का अर्थ सार्वजनिक-कुंजी प्रमाणपत्र है। PDF या NFC टैग पर रखा शैक्षणिक योग्यता-विवरण अलग तरह का अभिलेख है, हालाँकि डिजिटल हस्ताक्षर दोनों को सुरक्षित कर सकते हैं।
	</p>
	<h3>इसमें क्या होता है?</h3>
	<ul class="list-bullet content-list">
		<li><div><strong>विषय और नाम:</strong> प्रमाणपत्र किसकी पहचान करता है। वेबसाइट के नाम सामान्यतः Subject Alternative Name विस्तार में होते हैं।</div></li>
		<li><div><strong>सार्वजनिक कुंजी:</strong> प्रमाणित की जा रही कुंजी और उसके एल्गोरिदम की जानकारी।</div></li>
		<li><div><strong>जारीकर्ता और क्रमांक:</strong> प्रमाणपत्र किसने जारी किया और उस जारीकर्ता के अभिलेख में उसकी पहचान क्या है।</div></li>
		<li><div><strong>वैधता अवधि:</strong> किन तारीखों के बीच उसे स्वीकार किया जा सकता है, बशर्ते बाकी जाँचें भी सफल हों।</div></li>
		<li><div><strong>अनुमत उपयोग:</strong> विस्तार यह सीमित कर सकते हैं कि कुंजी सर्वर प्रमाणीकरण, प्रमाणपत्र हस्ताक्षर या किसी अन्य काम के लिए उपयोग हो सकती है।</div></li>
		<li><div><strong>हस्ताक्षर:</strong> प्रमाणपत्र के हस्ताक्षरित भागों पर जारीकर्ता का हस्ताक्षर।</div></li>
	</ul>
	<p>
		प्रमाणपत्र में सार्वजनिक कुंजी होती है। उससे सम्बन्धित निजी कुंजी गुप्त रहनी चाहिए और प्रमाणपत्र का भाग नहीं होती।
	</p>
	<h3>इस पर विश्वास कैसे किया जाता है?</h3>
	<p>
		प्रमाणपत्र प्राधिकारी, या CA, अपनी जारी करने की नीति के अनुसार अनुरोध जाँचता है और प्रमाणपत्र पर हस्ताक्षर करता है। डोमेन-सत्यापित वेबसाइट प्रमाणपत्र में जाँच डोमेन पर नियन्त्रण की होती है; इससे व्यवसाय का ईमानदार होना सिद्ध नहीं होता।
	</p>
	<p>
		आपका ब्राउजर कुछ विश्वसनीय मूल प्राधिकारियों से शुरुआत करता है। वेबसाइट सामान्यतः अपना प्रमाणपत्र और मध्यवर्ती प्रमाणपत्र देती है, जिससे ब्राउजर किसी विश्वसनीय मूल तक शृंखला बना सके।
	</p>
	<p>
		मूल प्राधिकारी पर विश्वास इसलिए है क्योंकि ब्राउजर या प्रणाली ने उसे विश्वास का आधार स्वीकार किया है। केवल उसका स्व-हस्ताक्षर उसे विश्वसनीय नहीं बनाता। निजी संगठन भी अपना CA चला सकता है और उसका विश्वास स्पष्ट रूप से वितरित कर सकता है।
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" class="crypto-diagram" id="certificate-trust-chain" role="img" aria-labelledby="certificate-trust-chain-title certificate-trust-chain-desc" viewBox="0 0 900 330" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="certificate-trust-chain-title">A certificate binds a name to a public key</title><desc id="certificate-trust-chain-desc">An already trusted root signs an intermediate CA certificate; that CA signs the website certificate binding a name to a public key.</desc><style>#certificate-trust-chain{--ink:#40516f;--note:#465166;--box:#d9ecff;--green:#8fd3c7;--paper:#f6f9fc;--gold:#e8c585}#certificate-trust-chain .box{fill:var(--box);stroke:var(--ink);stroke-width:4}#certificate-trust-chain .green{fill:var(--green);stroke:var(--ink);stroke-width:4}#certificate-trust-chain .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#certificate-trust-chain .line{fill:none;stroke:var(--ink);stroke-width:4;stroke-linecap:round;stroke-linejoin:round}#certificate-trust-chain .key{fill:none;stroke:var(--ink);stroke-width:5;stroke-linecap:round}#certificate-trust-chain text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#certificate-trust-chain .note{fill:var(--note);font:18px system-ui,sans-serif}#certificate-trust-chain .arrow{fill:var(--ink)}@media(prefers-color-scheme:dark){svg:root#certificate-trust-chain{--ink:#d8e4f0;--note:#bdcad9;--box:#243044;--green:#2d6b63;--paper:#1c2636;--gold:#8d6b39}}html.dark-mode #certificate-trust-chain,.dark-mode #certificate-trust-chain{--ink:#d8e4f0;--note:#bdcad9;--box:#243044;--green:#2d6b63;--paper:#1c2636;--gold:#8d6b39}</style><text x="450" y="32">Who does this public key belong to?</text><rect class="green" x="25" y="78" width="235" height="160" rx="18"/><text x="142" y="114">Trusted root</text><text class="note" x="142" y="155">already accepted</text><text class="note" x="142" y="181">by your browser</text><path class="line" d="M278 155h43"/><path class="arrow" d="M321 146l15 9-15 9z"/><rect class="box" x="345" y="78" width="210" height="160" rx="18"/><text x="450" y="114">Intermediate CA</text><text class="note" x="450" y="155">certificate signed</text><text class="note" x="450" y="181">by the root</text><path class="line" d="M574 155h43"/><path class="arrow" d="M617 146l15 9-15 9z"/><rect class="paper" x="640" y="78" width="235" height="160" rx="18"/><text x="757" y="114">Website certificate</text><text class="note" x="757" y="149">example.com + public key</text><text class="note" x="757" y="181">signed by the CA</text><text class="note" x="450" y="277">Arrows show signing relationships. Validation follows the chain back to the root.</text><text class="note" x="450" y="307">The website must also prove it holds the matching private key.</text></svg>
	<h3>सत्यापन में क्या जाँचा जाता है?</h3>
	<ol class="list-bullet content-list">
		<li><div>प्रमाणपत्र के हस्ताक्षर और शृंखला किसी स्वीकार किए गए विश्वास के आधार तक पहुँचते हैं।</div></li>
		<li><div>माँगी गई वेबसाइट का नाम प्रमाणपत्र के अनुमत नाम से मिलता है।</div></li>
		<li><div>प्रमाणपत्र अपनी वैधता अवधि में है और इच्छित उपयोग के लिए अनुमत है।</div></li>
		<li><div>शृंखला लागू प्रतिबन्धों और क्लाइंट की निरस्तीकरण नीति पर खरी उतरती है।</div></li>
	</ol>
	<p>
		दूसरे पक्ष को कनेक्शन प्रोटोकॉल के माध्यम से सम्बन्धित निजी कुंजी अपने पास होने का प्रमाण भी देना होता है। सार्वजनिक प्रमाणपत्र की प्रतिलिपि बना लेना वह प्रमाण नहीं है।
	</p>
	<p>
		प्रमाणपत्र की अवधि समाप्त हो सकती है या वह निरस्त किया जा सकता है, जैसे निजी कुंजी उजागर होने पर। निरस्तीकरण की जानकारी सूचियों या ऑनलाइन स्थिति सेवाओं से मिल सकती है। अलग क्लाइंट इसे अलग तरह से प्राप्त और लागू करते हैं।
	</p>
	<h3>इसका एन्क्रिप्शन से क्या सम्बन्ध है?</h3>
	<p>
		प्रमाणपत्र सार्वजनिक कुंजी की पहचान करता है; वह स्वयं बातचीत एन्क्रिप्ट नहीं करता। सामान्य प्रमाणपत्र-आधारित TLS 1.3 कनेक्शन में प्रमाणपत्र और हस्ताक्षर सर्वर की प्रामाणिकता जाँचते हैं, कुंजी-सहमति साझा रहस्य स्थापित करती है, और सममित प्रमाणीकृत एन्क्रिप्शन संचार सुरक्षित करती है।
	</p>
	<p>
		एन्क्रिप्शन पूछता है “इसे कौन पढ़ सकता है?” हस्ताक्षर पूछने में सहायता करता है “क्या अपेक्षित निजी कुंजी से हस्ताक्षर हुआ और क्या डेटा बदला है?” प्रमाणपत्र पूछने में सहायता करता है “मुझे किसकी सार्वजनिक कुंजी उपयोग करनी चाहिए?”
	</p>
	<h3>क्या इससे NFC टैग पर योग्यता-विवरण जाँचा जा सकता है?</h3>
	<p>
		कल्पना कीजिए कि कोई बोर्ड विद्यार्थी का योग्यता-विवरण जारी करता है। वह पहचान संख्या सहित विवरण के एक तय रूप पर हस्ताक्षर करता है। जाँचकर्ता टैग से विवरण और हस्ताक्षर पढ़कर बोर्ड की विश्वसनीय सार्वजनिक कुंजी से जाँचता है। सार्वजनिक-कुंजी प्रमाणपत्र यह स्थापित करने में सहायता कर सकता है कि कौन-सी कुंजी बोर्ड की है।
	</p>
	<p>
		जरूरी कुंजियाँ, प्रमाणपत्र और विश्वास की जानकारी पहले से होने पर हस्ताक्षर ऑफलाइन जाँचा जा सकता है। केवल ऑफलाइन जाँच से हाल ही में निरस्त प्रमाणपत्र या वापस लिए गए योग्यता-विवरण का पता नहीं चलता।
	</p>
	<p>
		विवरण के साथ रखा साधारण हैश पर्याप्त नहीं है: कोई दोनों बदल सकता है। डिजिटल हस्ताक्षर इस बदलाव का प्रतिरोध करता है और हर जाँचकर्ता को बोर्ड की निजी कुंजी देने की जरूरत नहीं पड़ती।
	</p>
	<p>
		हैश-और-हस्ताक्षर विधि में बोर्ड योग्यता-विवरण के ठीक उसी डेटा का डाइजेस्ट निकालकर निजी कुंजी से उस पर हस्ताक्षर करता है। जाँचकर्ता मिले हुए विवरण का नया डाइजेस्ट निकालकर हस्ताक्षर और बोर्ड की सार्वजनिक कुंजी के साथ जाँच करता है।
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="hash-sign-verify" role="img" aria-labelledby="hash-sign-verify-t hash-sign-verify-d" viewBox="0 0 900 640" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="hash-sign-verify-t">Hash the document, sign the digest, verify independently</title><desc id="hash-sign-verify-d">The signer hashes a document and signs its digest with a private key. The receiver hashes the received document and checks the signature with the public key and that digest.</desc><style>#hash-sign-verify{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#hash-sign-verify .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#hash-sign-verify .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#hash-sign-verify .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#hash-sign-verify .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#hash-sign-verify text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#hash-sign-verify .note{fill:var(--note);font:18px system-ui,sans-serif}#hash-sign-verify .small{font:16px system-ui,sans-serif}#hash-sign-verify .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">Sign a document's fingerprint, then check it</text><text class="note" x="450" y="72">RSA PKCS#1 v1.5: sign the digest, then check it against a fresh hash.</text><text x="100" y="122">SIGNER</text><rect class="paper" x="40" y="145" width="135" height="130" rx="10"/><path class="line" d="M60 181h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="259">Document</text><path class="line" d="M185 208h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="165" width="145" height="90" rx="10"/><text x="317" y="201">Hash</text><text class="small" x="317" y="229">same algorithm</text><path class="line" d="M400 208h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="165" width="145" height="90" rx="10"/><text x="532" y="201">Digest</text><text class="note" x="532" y="229">fingerprint</text><path class="line" d="M615 208h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="165" width="185" height="90" rx="10"/><text x="767" y="201">Sign digest</text><text class="note" x="767" y="229">with private key</text><text class="note" x="450" y="294">Send the original document together with its signature.</text><path class="line" d="M35 318h830"/><text x="107" y="357">VERIFIER</text><rect class="paper" x="40" y="380" width="135" height="130" rx="10"/><path class="line" d="M60 416h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="494">Document</text><path class="line" d="M185 443h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="400" width="145" height="90" rx="10"/><text x="317" y="436">Hash</text><text class="small" x="317" y="464">same algorithm</text><path class="line" d="M400 443h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="400" width="145" height="90" rx="10"/><text x="532" y="436">New digest</text><text class="note" x="532" y="464">of received data</text><path class="line" d="M615 443h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="400" width="185" height="90" rx="10"/><text x="767" y="436">Verify</text><text class="note" x="767" y="464">valid or invalid</text><text class="note" x="767" y="365">Signature + public key</text><path class="line" d="M767 374v18m-8-10 8 10 8-10"/><text class="note" x="450" y="548">The public key lets the verifier recover the signed digest.</text><text class="note" x="450" y="583">The verifier also calculates a fresh hash of the received document.</text><text class="note" x="450" y="616">The recovered digest and the freshly calculated hash must match exactly.</text></svg>
	<p>
		साथ लगी फिंगरप्रिन्ट पर्ची की कल्पना कीजिए: फिंगरप्रिन्ट हैश को दर्शाता है और जारीकर्ता का हस्ताक्षर उसे प्रमाणित करता है। योग्यता-विवरण बदलने पर फिंगरप्रिन्ट बदल जाता है और मूल हस्ताक्षर की जाँच विफल होती है। निजी कुंजी के बिना वैध नया हस्ताक्षर न बना सकने वाले हमलावर को केवल हैश बदलने से लाभ नहीं होता।
	</p>
	<p>
		RSA PKCS#1 v1.5 उदाहरण में जाँचकर्ता सार्वजनिक कुंजी से हस्ताक्षरित डाइजेस्ट प्राप्त करता है और मिले हुए विवरण के नए हैश से तुलना करता है। दोनों बिल्कुल समान होने चाहिए। सार्वजनिक-कुंजी प्रमाणपत्र जाँचने देता है कि सत्यापन के लिए किसकी कुंजी उपयोग हो रही है। देखें <a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8017.html#section-8.2.2" target="_blank" rel="noopener noreferrer">RFC 8017, खण्ड 8.2.2</a>।
	</p>
	<p>
		हस्ताक्षर विद्यार्थी का विवरण छिपाता नहीं है। यह पूरे अभिलेख को दूसरे टैग पर नकल करने से भी नहीं रोकता। नकल रोकने या यह सिद्ध करने के लिए कि प्रस्तुतकर्ता वही विद्यार्थी है, अतिरिक्त उपाय चाहिए।
	</p>
	<h3>वैध प्रमाणपत्र क्या सिद्ध करता है?</h3>
	<p>
		वैध प्रमाणपत्र किसी खास विश्वास नीति के अन्तर्गत पहचान और कुंजी के सम्बन्ध का समर्थन करता है। यह गारंटी नहीं देता कि वेबसाइट सुरक्षित है, हस्ताक्षरित बातें सच हैं या निजी कुंजी कभी चोरी नहीं हुई।
	</p>
	<p>
		खानों के क्रम के लिए देखें <a class="content-link XURL" href="/hi/technology/computer/digital_certificate/structure" data-target="technology/computer/digital_certificate/structure" data-title="प्रमाणपत्र की संरचना">प्रमाणपत्र की संरचना</a>।
	</p>
	<h3>सन्दर्भ</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc5280.html" target="_blank" rel="noopener noreferrer">RFC 5280: X.509 प्रमाणपत्र और शृंखला जाँच</a></div></li>
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8446.html" target="_blank" rel="noopener noreferrer">RFC 8446: TLS 1.3</a></div></li>
		<li><div><a class="content-link" href="https://csrc.nist.gov/glossary/term/digital_signature" target="_blank" rel="noopener noreferrer">NIST: डिजिटल हस्ताक्षर</a></div></li>
	</ul>
	<p>
		NFC का उदाहरण मेरी पुरानी दस्तावेज-प्रमाणीकरण रूपरेखा से लिया गया है; यह अभिलेख की प्रामाणिकता जाँचने और उसकी नकल रोकने का अन्तर समझाता है।
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>AI प्रकटीकरण: यह लेख AI (ChatGPT) की सहायता से लिखा गया है। त्रुटियों और छूटी हुई बातों की ओर ध्यान दिलाने के लिए आपका स्वागत है।</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>