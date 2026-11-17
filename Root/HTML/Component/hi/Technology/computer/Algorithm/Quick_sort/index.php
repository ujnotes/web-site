<div id='message'>
		<h3>क्विक सॉर्ट क्या है?</h3>
	<p>
		क्विक सॉर्ट एक क्रमबद्ध करने की विधि है। यह एक पिवट चुनती है, उसके आसपास मानों को बाँटती है और फिर बने हुए हिस्सों को इसी तरह क्रम में लगाती है।
	</p>
	<h3>पिवट के आसपास बाँटना क्यों ज़रूरी है?</h3>
	<p>
		मान लें सूची <code class='inline'>[6, 2, 8, 3, 1]</code> है और पिवट <strong>6</strong> है। तीन मान उससे छोटे हैं, इसलिए शून्य से गिनने पर <code class='inline'>6</code> का स्थान इंडेक्स <code class='inline'>3</code> है। पर केवल <code class='inline'>6</code> को वहाँ रख देने से <code class='inline'>[3, 2, 8, 6, 1]</code> मिल सकता है। इसमें <code class='inline'>8</code> बाईं ओर और <code class='inline'>1</code> दाईं ओर रह गया है।
	</p>
	<p>
		[2, 3, 1, 6, 8] एक सही विभाजन है: 6 से छोटे मान बाईं ओर हैं और बड़ा मान दाईं ओर है। दोनों हिस्सों को अभी अलग से क्रम में लगाना होगा।
	</p>
	<h3>लोमुटो विभाजन कैसे काम करता है?</h3>
	<p>
		इस विधि में वर्तमान हिस्से का अंतिम मान पिवट है। इंडेक्स i उस स्थान को दिखाता है जहाँ अगला छोटा मान रखा जाएगा। हर मान को पिवट से तुलना करके, छोटा होने पर i वाले मान से बदलें और i आगे बढ़ाएँ। अंत में पिवट को i वाले मान से बदलें।
	</p>
	<p>
		उदाहरण के लिए <code class='inline'>[5, 3, 1, 8, 7]</code> में पिवट <strong>7</strong> है। <code class='inline'>5</code>, <code class='inline'>3</code> और <code class='inline'>1</code> छोटे हैं, इसलिए <code class='inline'>i</code> उनके बाद पहुँचता है। <code class='inline'>8</code> छोटा नहीं है। अंत में <strong>7</strong> और <code class='inline'>8</code> बदलते हैं और <code class='inline'>[5, 3, 1, 7, 8]</code> मिलता है। बराबर मान इस संस्करण में पिवट के दाईं ओर रहते हैं।
	</p>
	<h3>चरणों के साथ अभ्यास करें</h3>
	<p>
		उदाहरण बदलने के लिए उसके नाम के पास वाले तीर दबाएँ। चरण वाले बटन आपको एक उदाहरण में आगे या पीछे ले जाते हैं। देखें कि <code class='inline'>j</code> मानों को एक-एक करके जाँचता है, जबकि <code class='inline'>i</code> पिवट से छोटे अगले मान की जगह दिखाता है।
	</p>
	<p>
		अभ्यास में वर्तमान मान की तुलना पिवट से करें, तय करें कि अदला-बदली करनी है या नहीं, और इंडेक्स खुद आगे बढ़ाएँ। हर क्रिया तालिका में जुड़ती है। अपना काम देखने के बाद सही चरणों से उसकी तुलना करें।
	</p>
<section lang="hi" class="frontend-component no-auto-cover" data-component="quick-sort" data-source="/resource/data/quick-sort.json" data-component-script="/resource/components/quick-sort.js" data-component-style="/resource/components/quick-sort.css"><p data-component-status role="status">तुलना लोड हो रही है…</p><noscript><p>इस तुलना उपकरण का उपयोग करने के लिए JavaScript चालू करें।</p></noscript></section>
	<h3>पूरी सूची कैसे क्रम में आती है?</h3>
	<ol class="list-bullet content-list">
		<li><div>वर्तमान हिस्से में पिवट चुनें।</div></li>
		<li><div>मानों को पिवट के आसपास बाँटें।</div></li>
		<li><div>दोनों हिस्सों पर यही प्रक्रिया दोहराएँ।</div></li>
	</ol>
	<p>
		खाली या एक मान वाला हिस्सा पहले से क्रम में है। लोमुटो में पिवट अपने अंतिम स्थान पर पहुँचता है; होआर जैसी अन्य विभाजन विधियाँ अलग सीमा लौटाती हैं।
	</p>
	<p>
		लोमुटो में पिवट लौटाए गए इंडेक्स पर सही जगह बैठ चुका है। इसलिए उस इंडेक्स को छोड़कर दोनों हिस्सों को क्रम में लगाएँ।
	</p>
	<pre class='indent-c'><code class='block'>quick_sort(values, low, high)
    if low &gt;= high
        return

    pivot_index = lomuto_partition(values, low, high)
    quick_sort(values, low, pivot_index - 1)
    quick_sort(values, pivot_index + 1, high)</code></pre>
	<h3>कितना समय लगता है?</h3>
	<p>
		लगभग संतुलित विभाजनों में हर स्तर पर कुल काम <code class='inline'>O(n)</code> होता है और लगभग <code class='inline'>log n</code> स्तर होते हैं। इसलिए कुल समय <code class='inline'>O(n log n)</code> होता है। बार-बार असंतुलित विभाजन हों तो समय <code class='inline'>O(n²)</code> तक जा सकता है।
	</p>
	<p>
		लोमुटो उसी सूची में अदला-बदली करता है। रिकर्सिव कॉल का स्टैक संतुलित विभाजनों में लगभग <code class='inline'>O(log n)</code> जगह और बहुत असंतुलित विभाजनों में <code class='inline'>O(n)</code> तक जगह ले सकता है।
	</p>
	<h3>मुख्य बात</h3>
	<p>
		पिवट से छोटे मानों की संख्या उसका स्थान बताती है। विभाजन दूसरे मानों को सही तरफ भी ले जाता है। फिर दोनों छोटे हिस्सों को स्वतंत्र रूप से क्रम में लगाया जा सकता है।
	</p>
	<h3>संदर्भ</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://www.cs.ox.ac.uk/files/6226/H2006%20-%20Historic%20Quicksort.pdf" target="_blank" rel="noopener noreferrer">सी. ए. आर. होआर, “Quicksort” (1962)</a></div></li>
		<li><div><a class="content-link" href="https://xlinux.nist.gov/dads/HTML/quicksort.html" target="_blank" rel="noopener noreferrer">NIST: quicksort</a></div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>एआई प्रकटीकरण: यह लेख एआई (ChatGPT) की सहायता से लिखा गया है। आपसे त्रुटियों और छूटी हुई बातों की ओर ध्यान दिलाने का अनुरोध है।</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>
