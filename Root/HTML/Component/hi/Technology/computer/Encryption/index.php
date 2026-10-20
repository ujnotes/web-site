<div id='message'>
		<?php $alt='पढ़ने योग्य सन्देश कूटपाठ में बदलता है; सही कुंजी से उसका प्राप्तकर्ता मूल सन्देश पढ़ सकता है।'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>एन्क्रिप्शन क्या है?</h3>
	<p>
		एन्क्रिप्शन एक एल्गोरिदम और कुंजी की सहायता से पढ़ने योग्य जानकारी, जिसे मूलपाठ या plaintext कहते हैं, को कूटपाठ या ciphertext में बदलता है। डिक्रिप्शन उचित कुंजी से मूलपाठ वापस प्राप्त करता है।
	</p>
	<p>
		इसका उद्देश्य गोपनीयता है: कूटपाठ मिल जाने पर भी आवश्यक गुप्त कुंजी के बिना कोई मूल जानकारी न पढ़ सके।
	</p>
	<p>
		कल्पना कीजिए कि आप एक बन्द बक्से में पत्र भेज रहे हैं। बक्सा कई हाथों से गुजर सकता है, लेकिन सही चाबी वाला व्यक्ति ही उसे खोल सकता है। यह उपमा पहुँच को समझाती है; वास्तविक एन्क्रिप्शन गणित से डेटा बदलता है।
	</p>
	<h3>एन्क्रिप्शन कुंजी क्या है?</h3>
	<p>
		कुंजी वह मान है जो क्रिप्टोग्राफिक प्रक्रिया को नियंत्रित करता है। एल्गोरिदम सार्वजनिक हो सकता है, जबकि आवश्यक कुंजी गुप्त रहती है। सुरक्षा का आधार कुंजियों की रक्षा और सुरक्षित विधि का सही उपयोग होना चाहिए।
	</p>
	<p>
		पासवर्ड को सामान्यतः सीधे एन्क्रिप्शन कुंजी नहीं बनाया जाता। सॉफ्टवेयर पासवर्ड-आधारित कुंजी व्युत्पत्ति फलन से उससे कुंजी बना सकता है। कमजोर पासवर्ड का अनुमान लगाया जा सकता है, भले ही मूल सिफर मजबूत हो।
	</p>
	<h3>सममित एन्क्रिप्शन क्या है?</h3>
	<p>
		सममित एन्क्रिप्शन में एन्क्रिप्ट और डिक्रिप्ट करने के लिए एक ही गुप्त कुंजी काम आती है। दोनों पक्षों को उसे सुरक्षित रखना होता है।
	</p>
	<p>
		उदाहरण के लिए, एन्क्रिप्ट की गई आर्काइव साझा करने वाले दो लोगों को उसकी गुप्त कुंजी चाहिए। उसी असुरक्षित माध्यम से आर्काइव के साथ कुंजी भेज देने पर सुरक्षा का उद्देश्य विफल हो जाता है।
	</p>
	<p>
		सममित एन्क्रिप्शन बड़ी मात्रा में डेटा के लिए कुशल है। AES एक प्रचलित सममित सिफर है। पूरी एन्क्रिप्शन विधि यह भी तय करती है कि सिफर और उससे जुड़े मानों का उपयोग कैसे होगा।
	</p>
	<h3>असममित एन्क्रिप्शन क्या है?</h3>
	<p>
		असममित या सार्वजनिक-कुंजी एन्क्रिप्शन में सम्बन्धित कुंजियों की एक जोड़ी होती है: सार्वजनिक कुंजी साझा की जा सकती है, जबकि निजी कुंजी गुप्त रखनी होती है।
	</p>
	<p>
		मान लीजिए ऐलिस बॉब को एक गोपनीय सन्देश भेजना चाहती है:
	</p>
	<ol class="list-bullet content-list">
		<li><div>बॉब उपयुक्त कुंजी-जोड़ी बनाता है और अपनी निजी कुंजी गुप्त रखता है।</div></li>
		<li><div>ऐलिस उसकी सार्वजनिक कुंजी प्राप्त करती है और जाँचती है कि वह वास्तव में बॉब की ही है।</div></li>
		<li><div>ऐलिस उपयुक्त एन्क्रिप्शन विधि से उस सार्वजनिक कुंजी का उपयोग करती है।</div></li>
		<li><div>बॉब अपनी निजी कुंजी से सन्देश डिक्रिप्ट करता है।</div></li>
	</ol>
	<p>
		सुरक्षित विधि और पर्याप्त कुंजी आकार होने पर सार्वजनिक कुंजी से निजी कुंजी निकालना व्यावहारिक रूप से सम्भव नहीं होना चाहिए।
	</p>
	<p>
		पहचान की जाँच जरूरी है। हमलावर अपनी सार्वजनिक कुंजी दे दे, तो ऐलिस ऐसा सन्देश एन्क्रिप्ट कर सकती है जिसे हमलावर पढ़ सके। विश्वसनीय फिंगरप्रिन्ट या <a class="content-link XURL" href="/hi/technology/computer/digital_certificate" data-target="hi/technology/computer/digital_certificate" data-title="डिजिटल प्रमाणपत्र">डिजिटल प्रमाणपत्र</a> कुंजी की प्रामाणिकता जाँचने में सहायता कर सकता है।
	</p>
	<p>
		RSA का उपयोग RSA-OAEP जैसी एन्क्रिप्शन विधियों में हो सकता है। दूसरे सार्वजनिक-कुंजी एल्गोरिदम अलग काम करते हैं: कुछ साझा रहस्य स्थापित करते हैं, कुछ हस्ताक्षर बनाते हैं। हर कुंजी-जोड़ी हर काम के लिए उपयुक्त नहीं होती।
	</p>
	<h3>बक्से का उदाहरण कैसे काम करता है?</h3>
	<p>
		मान लीजिए बॉब चाहता है कि ऐलिस उसे बक्से में एक निजी पत्र भेजे।
	</p>
	<p>
		साझा गुप्त कुंजी होने पर ऐलिस बक्सा बन्द करती है और बॉब उसी चाबी की दूसरी प्रति से उसे खोलता है। पहले उन्हें वह कुंजी सुरक्षित रूप से साझा करनी होगी। उसकी प्रति पाने वाला कोई भी व्यक्ति बक्सा खोल सकता है।
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="shared-key-box" role="img" aria-labelledby="shared-key-box-t shared-key-box-d" viewBox="0 0 900 530" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="shared-key-box-t">A wooden box locked with a shared secret key</title><desc id="shared-key-box-d">A locked wooden chest hides a letter. Alice and Bob have copies of the same secret key.</desc><style>#shared-key-box{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#shared-key-box .mount{fill:#8c98aa;stroke:var(--ink);stroke-width:3}#shared-key-box .neutral-lock{fill:var(--paper);stroke:var(--ink);stroke-width:3}#shared-key-box .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#shared-key-box .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#shared-key-box .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#shared-key-box .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#shared-key-box .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#shared-key-box .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#shared-key-box .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#shared-key-box text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#shared-key-box .note{fill:var(--note);font:18px system-ui,sans-serif}#shared-key-box .small{font:16px system-ui,sans-serif}#shared-key-box .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#shared-key-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #shared-key-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">One box. Two copies of the same secret key.</text><text class="note" x="450" y="72">Symmetric encryption</text><path class="edge" d="M600 200l65-52v180l-65 55z"/><path class="wood" d="M280 200h320v183H280z"/><path class="top" d="M280 200l65-52h320l-65 52z"/><path class="line" d="M280 238h320l65-52"/><path class="line" d="M315 250v116m250-116v116"/><path class="mount" d="M421 228h38v64h-38z"/><path class="line" d="M429 271v-13a11 11 0 0 1 22 0v13"/><rect class="neutral-lock" x="425" y="271" width="30" height="28" rx="4"/><path class="line" d="M440 281v7"/><text x="122" y="177">Alice</text><g transform="translate(95 217)"><circle class="line" r="13"/><path class="line" d="M13 0h55m-13 0v13m-15-13v10"/></g><text class="note" x="122" y="267">locks the box</text><text class="note" x="122" y="294">with her key</text><path class="line" d="M178 220h65m-12-9 12 9-12 9"/><text x="776" y="177">Bob</text><g transform="translate(749 217)"><circle class="line" r="13"/><path class="line" d="M13 0h55m-13 0v13m-15-13v10"/></g><text class="note" x="776" y="267">opens the box</text><text class="note" x="776" y="294">with the same key</text><path class="line" d="M701 220h-24m12-9-12 9 12 9"/><text class="note" x="450" y="427">The letter is inside the opaque box: people passing it along cannot read it.</text><text class="note" x="450" y="461">Alice and Bob must share the key safely and keep both copies secret.</text></svg>
	<p>
		सार्वजनिक और निजी कुंजी की जोड़ी के लिए ऐसे विशेष ताले की कल्पना कीजिए जिसमें दो अलग चाबियाँ हों। बॉब सबको उस चाबी की प्रतियाँ देता है जो केवल ताला बन्द कर सकती है। ताला खोलने वाली चाबी वह अपने पास रखता है।
	</p>
	<p>
		ऐलिस पत्र बक्से में रखकर बॉब की सार्वजनिक बन्द करने वाली चाबी लगाती है। वह उसी चाबी से बक्सा दोबारा नहीं खोल सकती। बॉब अपनी निजी खोलने वाली चाबी से पत्र पढ़ता है।
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="public-padlock-box" role="img" aria-labelledby="public-padlock-box-t public-padlock-box-d" viewBox="0 0 900 530" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="public-padlock-box-t">A box with a locking key and an unlocking key</title><desc id="public-padlock-box-d">A special lock has two different keys. Bob shares the key that locks the box and keeps the key that unlocks it.</desc><style>#public-padlock-box{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#public-padlock-box .mount{fill:#8c98aa;stroke:var(--ink);stroke-width:3}#public-padlock-box .neutral-lock{fill:var(--paper);stroke:var(--ink);stroke-width:3}#public-padlock-box .lock{fill:#c5554f;stroke:var(--ink);stroke-width:3}#public-padlock-box .hole{fill:var(--ink)}#public-padlock-box .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#public-padlock-box .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#public-padlock-box .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#public-padlock-box .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#public-padlock-box .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#public-padlock-box .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#public-padlock-box .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#public-padlock-box text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#public-padlock-box .note{fill:var(--note);font:18px system-ui,sans-serif}#public-padlock-box .small{font:16px system-ui,sans-serif}#public-padlock-box .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#public-padlock-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #public-padlock-box{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">Two different keys: one locks, the other unlocks.</text><text class="note" x="450" y="72">Public-key encryption</text><path class="edge" d="M600 200l65-52v180l-65 55z"/><path class="wood" d="M280 200h320v183H280z"/><path class="top" d="M280 200l65-52h320l-65 52z"/><path class="line" d="M280 238h320l65-52"/><path class="line" d="M315 250v116m250-116v116"/><path class="mount" d="M421 228h38v64h-38z"/><path class="line" d="M414 267v-13a26 26 0 0 1 52 0v13"/><rect class="neutral-lock" x="396" y="267" width="88" height="65" rx="7"/><circle cx="419" cy="299" r="20" fill="var(--green)"/><circle cx="461" cy="299" r="20" fill="#c5554f"/><circle class="hole" cx="419" cy="290" r="4"/><path class="hole" d="m417 292-2 8h8l-2-8z"/><circle class="hole" cx="461" cy="290" r="4"/><path class="hole" d="m459 292-2 8h8l-2-8z"/><text class="small" x="419" y="315">L</text><text class="small" x="461" y="315">U</text><text x="120" y="158">Alice</text><g transform="translate(92 212)"><circle class="green" r="13"/><path class="line" d="M13 0h55M38 0v14M55 0v8"/></g><text class="note" x="120" y="277">public key</text><text class="note" x="120" y="304">locks; cannot unlock</text><path class="line" d="M170 220h73m-12-9 12 9-12 9"/><text x="776" y="158">Bob</text><g transform="translate(749 212)"><circle class="lock" r="13"/><path class="line" d="M13 0h55m-13 0v13m-15-13v10"/></g><text class="note" x="776" y="277">private key</text><text class="note" x="776" y="304">unlocks only</text><path class="line" d="M701 220h-24m12-9-12 9 12 9"/><text class="note" x="450" y="427">Two keyholes: L = lock with the public key; U = unlock with the private key.</text><text class="note" x="450" y="461">Alice checks the public key belongs to Bob. Bob keeps the private key secret.</text></svg>
	<p>
		सार्वजनिक बन्द करने वाली चाबी सार्वजनिक एन्क्रिप्शन कुंजी को दर्शाती है, और निजी खोलने वाली चाबी निजी डिक्रिप्शन कुंजी को। यह दो अलग क्षमताओं वाला काल्पनिक ताला है; साधारण दरवाजे का ताला ऐसा नहीं होता। वास्तविक एन्क्रिप्शन डेटा पर ये प्रक्रियाएँ गणित से करता है।
	</p>
	<p>
		ऐलिस को उपयोग से पहले जाँचना होगा कि सार्वजनिक कुंजी बॉब की ही है। हमलावर की दी हुई कुंजी सन्देश को हमलावर के लिए सुरक्षित करेगी।
	</p>
	<h3>दोनों प्रकार साथ में क्यों काम आते हैं?</h3>
	<p>
		कई प्रणालियाँ सार्वजनिक-कुंजी क्रिप्टोग्राफी और सममित एन्क्रिप्शन को साथ उपयोग करती हैं।
	</p>
	<p>
		सार्वजनिक-कुंजी विधियाँ साझा रहस्य स्थापित या सुरक्षित करती हैं, जबकि सममित एन्क्रिप्शन अधिकांश डेटा सँभालता है। इससे पहले से कोई रहस्य साझा करने की जरूरत घटती है और डेटा की सुरक्षा कुशल रहती है।
	</p>
	<p>
		सामान्य प्रमाणपत्र-आधारित TLS 1.3 कनेक्शन में सर्वर प्रमाणपत्र और हस्ताक्षर से अपनी प्रामाणिकता सिद्ध करता है। दोनों पक्ष कुंजी-सहमति से साझा रहस्य स्थापित करते हैं, फिर सममित प्रमाणीकृत एन्क्रिप्शन से संचार सुरक्षित होता है। कुंजी-सहमति साझा रहस्य निकालती है; यह पूरी बातचीत को प्रमाणपत्र की सार्वजनिक कुंजी से एन्क्रिप्ट करके भेजना नहीं है।
	</p>
	<h3>क्या हस्ताक्षर करना एन्क्रिप्शन के समान है?</h3>
	<p>
		नहीं। एन्क्रिप्शन गोपनीयता सुरक्षित करता है। डिजिटल हस्ताक्षर से दूसरे लोग जाँच सकते हैं कि डेटा सम्बन्धित निजी कुंजी से हस्ताक्षरित हुआ था और बदला नहीं है।
	</p>
	<p>
		हस्ताक्षरकर्ता निजी हस्ताक्षर कुंजी उपयोग करता है, और जाँचकर्ता उसकी सम्बन्धित सार्वजनिक कुंजी। हस्ताक्षर करना अलग प्रक्रिया है; इसका सामान्य अर्थ “निजी कुंजी से एन्क्रिप्ट करना” नहीं है।
	</p>
	<p>
		NFC टैग पर हस्ताक्षरित योग्यता-विवरण सबके लिए पढ़ने योग्य रह सकता है। हस्ताक्षर उसकी प्रामाणिकता और अखण्डता सुरक्षित करता है, गोपनीयता नहीं। उसे एन्क्रिप्ट करना अलग सवाल का उत्तर होगा: विवरण कौन पढ़ सकता है?
	</p>
	<h3>दस्तावेज के हैश पर हस्ताक्षर कैसे होता है?</h3>
	<p>
		योग्यता-विवरण के साथ लगी एक छोटी फिंगरप्रिन्ट पर्ची की कल्पना कीजिए। क्रिप्टोग्राफिक हैश दस्तावेज के ठीक उसी डेटा से यह फिंगरप्रिन्ट बनाता है, जिसे डाइजेस्ट कहते हैं। हैश-और-हस्ताक्षर विधि में जारीकर्ता अपनी निजी कुंजी से डाइजेस्ट पर हस्ताक्षर करता है और दस्तावेज के साथ हस्ताक्षर भेजता है।
	</p>
	<svg xmlns="http://www.w3.org/2000/svg" id="hash-sign-verify" role="img" aria-labelledby="hash-sign-verify-t hash-sign-verify-d" viewBox="0 0 900 640" style="display:block;width:100%;height:auto;margin:1.5em auto"><title id="hash-sign-verify-t">Hash the document, sign the digest, verify independently</title><desc id="hash-sign-verify-d">The signer hashes a document and signs its digest with a private key. The receiver hashes the received document and checks the signature with the public key and that digest.</desc><style>#hash-sign-verify{--ink:#40516f;--note:#465166;--wood:#d7ae7b;--edge:#b98752;--top:#efd2a8;--paper:#fff9eb;--glass:#b9e3ee;--green:#8fd3c7;--seal:#ad624f}#hash-sign-verify .wood{fill:var(--wood);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .edge{fill:var(--edge);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .top{fill:var(--top);stroke:var(--ink);stroke-width:4;stroke-linejoin:round}#hash-sign-verify .paper{fill:var(--paper);stroke:var(--ink);stroke-width:3}#hash-sign-verify .glass{fill:var(--glass);fill-opacity:.28;stroke:var(--ink);stroke-width:3}#hash-sign-verify .green{fill:var(--green);stroke:var(--ink);stroke-width:3}#hash-sign-verify .line{fill:none;stroke:var(--ink);stroke-width:3;stroke-linecap:round;stroke-linejoin:round}#hash-sign-verify text{fill:var(--ink);font:700 23px system-ui,sans-serif;text-anchor:middle}#hash-sign-verify .note{fill:var(--note);font:18px system-ui,sans-serif}#hash-sign-verify .small{font:16px system-ui,sans-serif}#hash-sign-verify .seal{fill:var(--seal);stroke:var(--ink);stroke-width:3}@media(prefers-color-scheme:dark){svg:root#hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}}html.dark-mode #hash-sign-verify{--ink:#d8e4f0;--note:#bdcad9;--wood:#735335;--edge:#4b3525;--top:#8d6a42;--paper:#263348;--glass:#69b7cf;--green:#2d6b63;--seal:#8d4d40}</style><text x="450" y="35">Sign a document's fingerprint, then check it</text><text class="note" x="450" y="72">RSA PKCS#1 v1.5: sign the digest, then check it against a fresh hash.</text><text x="100" y="122">SIGNER</text><rect class="paper" x="40" y="145" width="135" height="130" rx="10"/><path class="line" d="M60 181h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="259">Document</text><path class="line" d="M185 208h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="165" width="145" height="90" rx="10"/><text x="317" y="201">Hash</text><text class="small" x="317" y="229">same algorithm</text><path class="line" d="M400 208h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="165" width="145" height="90" rx="10"/><text x="532" y="201">Digest</text><text class="note" x="532" y="229">fingerprint</text><path class="line" d="M615 208h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="165" width="185" height="90" rx="10"/><text x="767" y="201">Sign digest</text><text class="note" x="767" y="229">with private key</text><text class="note" x="450" y="294">Send the original document together with its signature.</text><path class="line" d="M35 318h830"/><text x="107" y="357">VERIFIER</text><rect class="paper" x="40" y="380" width="135" height="130" rx="10"/><path class="line" d="M60 416h95m-95 22h95m-95 22h72"/><text class="note" x="107" y="494">Document</text><path class="line" d="M185 443h45m-10-8 10 8-10 8"/><rect class="green" x="245" y="400" width="145" height="90" rx="10"/><text x="317" y="436">Hash</text><text class="small" x="317" y="464">same algorithm</text><path class="line" d="M400 443h45m-10-8 10 8-10 8"/><rect class="paper" x="460" y="400" width="145" height="90" rx="10"/><text x="532" y="436">New digest</text><text class="note" x="532" y="464">of received data</text><path class="line" d="M615 443h45m-10-8 10 8-10 8"/><rect class="green" x="675" y="400" width="185" height="90" rx="10"/><text x="767" y="436">Verify</text><text class="note" x="767" y="464">valid or invalid</text><text class="note" x="767" y="365">Signature + public key</text><path class="line" d="M767 374v18m-8-10 8 10 8-10"/><text class="note" x="450" y="548">The public key lets the verifier recover the signed digest.</text><text class="note" x="450" y="583">The verifier also calculates a fresh hash of the received document.</text><text class="note" x="450" y="616">The recovered digest and the freshly calculated hash must match exactly.</text></svg>
	<p>
		इस RSA PKCS#1 v1.5 उदाहरण में जाँचकर्ता सार्वजनिक कुंजी से हस्ताक्षरित डाइजेस्ट प्राप्त करता है और मिले हुए दस्तावेज का नया हैश स्वतंत्र रूप से निकालता है। दोनों हैश बिल्कुल समान होने चाहिए। दस्तावेज बदलने पर नया हैश हस्ताक्षरित डाइजेस्ट से नहीं मिलता और जाँच विफल हो जाती है।
	</p>
	<p>
		उदाहरण के लिए “परिणाम: उत्तीर्ण” को “परिणाम: अनुत्तीर्ण” करने से डाइजेस्ट बदल जाता है। मूल डाइजेस्ट का हस्ताक्षर बदले हुए दस्तावेज की जाँच में विफल होगा। हमलावर नया हैश निकाल सकता है, लेकिन सुरक्षित हस्ताक्षर विधि में निजी कुंजी के बिना वैध नया हस्ताक्षर नहीं बना सकता।
	</p>
	<h3>क्या RSA जाँच में हैश बिल्कुल समान होना चाहिए?</h3>
	<p>
		हाँ। इस RSA PKCS#1 v1.5 उदाहरण में प्राप्त डाइजेस्ट और नए निकाले गए हैश का बिल्कुल समान होना आवश्यक है। दस्तावेज पढ़ने योग्य रहता है; हस्ताक्षर उसके डाइजेस्ट की प्रामाणिकता सिद्ध करता है। दूसरी हस्ताक्षर विधियाँ अलग तरह से जाँच करती हैं।
	</p>
	<p>
		देखें <a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8017.html#section-8.2.2" target="_blank" rel="noopener noreferrer">RFC 8017, खण्ड 8.2.2</a>।
	</p>
	<p>
		योग्यता-विवरण पढ़ने योग्य रह सकता है। हस्ताक्षर डेटा को बदलने या उसकी प्रतिलिपि बनाने से रोकने के बजाय बदलाव का पता लगाता है। सॉफ्टवेयर सामान्यतः हस्ताक्षर और जाँच की प्रक्रियाओं के भीतर हैश निकालता है; API माँगे तभी अलग से अतिरिक्त हैश निकालें।
	</p>
	<h3>हैशिंग और एनकोडिंग में क्या अन्तर है?</h3>
	<ul class="list-bullet content-list">
		<li><div><strong>एनकोडिंग</strong> डेटा का रूप बदलती है ताकि उसे रखा या भेजा जा सके। Base64 बिना किसी रहस्य के उलटी की जा सकती है और गोपनीयता नहीं देती।</div></li>
		<li><div><strong>हैशिंग</strong> डेटा का डाइजेस्ट बनाती है। क्रिप्टोग्राफिक हैश इस तरह बनाया जाता है कि डाइजेस्ट से मूल इनपुट निकालना और समान हैश वाले अलग इनपुट खोजना कठिन हो। यह उलटी की जा सकने वाली एन्क्रिप्शन नहीं है; अनुमान योग्य इनपुट आजमाकर जाँचे जा सकते हैं।</div></li>
		<li><div><strong>एन्क्रिप्शन</strong> उचित कुंजी से उलटी करके मूल डेटा पाने के लिए बनाई जाती है।</div></li>
	</ul>
	<p>
		अकेला हैश सन्देश की प्रामाणिकता सिद्ध नहीं करता: सन्देश बदल सकने वाला हमलावर उसका हैश भी बदल सकता है।
	</p>
	<h3>क्या एन्क्रिप्शन छेड़छाड़ का पता लगाती है?</h3>
	<p>
		केवल एन्क्रिप्शन से हमेशा बदलाव का पता नहीं चलता। प्रमाणीकृत एन्क्रिप्शन गोपनीयता के साथ ऐसी जाँच जोड़ती है जो बदले हुए सुरक्षित डेटा को अस्वीकार कर दे। AES-GCM और ChaCha20-Poly1305 इसके उदाहरण हैं।
	</p>
	<p>
		इन विधियों में nonce जैसे मानों का सही उपयोग भी जरूरी है। जहाँ nonce का अनोखा होना आवश्यक है, वहाँ उसे दोहराने से सुरक्षा टूट सकती है। इन जरूरतों को सँभालने वाली नियमित रूप से अद्यतन क्रिप्टोग्राफिक लाइब्रेरी और स्थापित प्रोटोकॉल उपयोग करें।
	</p>
	<h3>एन्क्रिप्शन क्या सुरक्षित नहीं कर सकती?</h3>
	<p>
		एन्क्रिप्शन प्राप्तकर्ता को डिक्रिप्ट की गई जानकारी की प्रतिलिपि बनाने से नहीं रोक सकती। संक्रमित उपकरण, स्क्रीनशॉट या चोरी हुए खुले सत्र से उजागर मूलपाठ भी इससे नहीं बचता।
	</p>
	<p>
		कौन किससे बात कर रहा है, कब और लगभग कितना डेटा भेज रहा है—ऐसा मेटाडेटा दिख सकता है। परिवहन एन्क्रिप्शन एक कनेक्शन सुरक्षित करती है; शुरू से अन्त तक एन्क्रिप्शन का उद्देश्य सन्देश केवल संवाद के दोनों सिरों पर पढ़ने योग्य रखना है।
	</p>
	<p>
		जरूरी डिक्रिप्शन कुंजी खो जाए और पुनर्प्राप्ति की व्यवस्था न हो, तो डेटा वापस पाना असम्भव हो सकता है। इसलिए कुंजी का सुरक्षित भण्डारण, बैकअप और पहुँच-नियन्त्रण भी व्यवस्था का हिस्सा हैं।
	</p>
	<p>
		जहाँ जानकारी निजी रखनी हो वहाँ एन्क्रिप्शन उपयोगी है, लेकिन उसकी सुरक्षा पूरी व्यवस्था पर निर्भर है: विधि, कुंजियाँ, उपकरण और जानकारी पढ़ने की अनुमति वाले लोग।
	</p>
	<h3>सन्दर्भ</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://csrc.nist.gov/glossary/term/asymmetric_cryptography" target="_blank" rel="noopener noreferrer">NIST: असममित क्रिप्टोग्राफी</a></div></li>
		<li><div><a class="content-link" href="https://www.nist.gov/publications/advanced-encryption-standard-aes" target="_blank" rel="noopener noreferrer">NIST: Advanced Encryption Standard</a></div></li>
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc5116" target="_blank" rel="noopener noreferrer">RFC 5116: प्रमाणीकृत एन्क्रिप्शन</a></div></li>
		<li><div><a class="content-link" href="https://www.rfc-editor.org/rfc/rfc8446.html" target="_blank" rel="noopener noreferrer">RFC 8446: TLS 1.3</a></div></li>
		<li><div><a class="content-link" href="https://csrc.nist.gov/glossary/term/digital_signature" target="_blank" rel="noopener noreferrer">NIST: डिजिटल हस्ताक्षर</a></div></li>
	</ul>
	<p>
		हस्ताक्षर और गोपनीयता का अन्तर समझाने में मेरी पुरानी NFC दस्तावेज-प्रमाणीकरण टिप्पणियों का भी उपयोग हुआ है।
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>AI प्रकटीकरण: यह लेख AI (ChatGPT) की सहायता से लिखा गया है। त्रुटियों और छूटी हुई बातों की ओर ध्यान दिलाने के लिए आपका स्वागत है।</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>