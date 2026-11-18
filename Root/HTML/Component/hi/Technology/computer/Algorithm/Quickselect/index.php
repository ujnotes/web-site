<div id='message'>
		<?php $alt='बिखरे, बिना क्रम वाले पत्थरों के बीच धूप से उभरा एक अंबर रंग का चिकना पत्थर।'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>क्विकसिलेक्ट क्या है?</h3>
	<p>
		क्विकसिलेक्ट किसी बिना क्रम वाली सूची में चुने हुए क्रम स्थान का मान ढूँढ़ता है। इससे हम पूरी सूची को क्रमबद्ध किए बिना सबसे छोटा मान, मध्यिका या दसवाँ सबसे छोटा मान पा सकते हैं।
	</p>
	<p>
		यह <a class="content-link XURL" href="/hi/technology/computer/algorithm/quick_sort" data-target="technology/computer/algorithm/quick_sort" data-title="क्विक सॉर्ट">क्विक सॉर्ट</a> की तरह पिवट चुनकर मानों का विभाजन करता है। लेकिन क्विकसिलेक्ट आगे केवल उसी हिस्से में काम करता है जिसमें उत्तर हो सकता है।
	</p>
	<h3>“चौथा सबसे छोटा” किसे कहते हैं?</h3>
	<p>
		क्रम स्थान गिनते समय सबसे छोटा मान पहला होता है। सूची <code class='inline'>9, 2, 7, 4, 1, 8, 3</code> में चौथा सबसे छोटा मान <strong>4</strong> है, जबकि सूची स्वयं क्रमबद्ध नहीं है।
	</p>
	<p>
		यदि प्रोग्राम स्थानों को शून्य से गिनता है, तो चौथा स्थान index तीन होगा। n मानों की सूची में kवाँ सबसे बड़ा मान पाने के लिए, जहाँ k की गिनती एक से शुरू होती है, शून्य-आधारित index <code class='inline'>n - k</code> चुनें।
	</p>
	<p>
		दोहराए गए मान कई क्रम स्थानों पर आ सकते हैं। चयन एल्गोरिद्म को यह स्पष्ट करना चाहिए कि एक ही मान कई स्थानों पर होने पर वह मान लौटाता है या कोई खास वस्तु। क्विकसिलेक्ट आम तौर पर चुने गए क्रम स्थान का मान लौटाता है।
	</p>
	<h3>क्विकसिलेक्ट कैसे काम करता है?</h3>
	<p>
		क्विकसिलेक्ट उन मानों की एक सीमा रखता है जिसमें अभी भी माँगा गया क्रम स्थान मौजूद है:
	</p>
	<ol class="list-bullet content-list">
		<li><div>मौजूदा सीमा में से एक पिवट चुनें।</div></li>
		<li><div>मानों को पिवट से छोटे, उसके बराबर और उससे बड़े हिस्सों में बाँटें।</div></li>
		<li><div>हर हिस्से में आने वाले क्रम स्थान गिनें।</div></li>
		<li><div>यदि माँगा गया क्रम स्थान बराबर वाले हिस्से में है, तो पिवट लौटाएँ।</div></li>
		<li><div>वरना उसी छोटे या बड़े हिस्से में आगे बढ़ें जिसमें माँगा गया स्थान है।</div></li>
	</ol>
	<p>
		उदाहरण की सूची <code class='inline'>9, 2, 7, 4, 1, 8, 3</code> लें और पिवट <strong>4</strong> चुनें। विभाजन के बाद छोटे मान <code class='inline'>2, 1, 3</code>, पिवट <code class='inline'>4</code> और बड़े मान <code class='inline'>9, 7, 8</code> होंगे। 4 से छोटे तीन मान हैं, इसलिए 4 चौथा सबसे छोटा मान है। दोनों हिस्सों को क्रमबद्ध करने की ज़रूरत नहीं।
	</p>
	<p>
		कोई दूसरा पिवट उत्तर तुरंत न बताए। ऐसे में क्विकसिलेक्ट उस हिस्से को हटा देता है जिसमें माँगा गया क्रम स्थान नहीं हो सकता, और बाकी हिस्से पर प्रक्रिया दोहराता है।
	</p>
	<h3>एक सरल रूप</h3>
	<p>
		नीचे दिए गए छद्म-कोड में rank, <code class='inline'>k</code>, शून्य-आधारित है। विभाजन <code class='inline'>less_end</code> लौटाता है, जो पिवट से छोटा न होने वाले पहले मान का index है, और <code class='inline'>equal_end</code>, जो पिवट के बराबर आख़िरी मान का index है।
	</p>
	<pre class='indent-c'><code class='block'>quickselect(values, k)
    low = 0
    high = length(values) - 1

    while low &lt;= high
        pivot = choose_random_value(values, low, high)
        (less_end, equal_end) =
            partition_into_less_equal_greater(values, low, high, pivot)

        if k &lt; less_end
            high = less_end - 1
        else if k &lt;= equal_end
            return values[k]
        else
            low = equal_end + 1</code></pre>
	<p>
		विभाजन की प्रक्रिया पिवट से छोटे मानों को बाईं ओर, बराबर मानों को बीच में और बड़े मानों को दाईं ओर रखती है। सटीक स्थान इस बात पर निर्भर करते हैं कि इसे कैसे लिखा गया है। मुख्य बात यह है कि अगली बार केवल उन्हीं हिस्सों में से एक पर काम होता है।
	</p>
	<h3>तीन उदाहरणों का अभ्यास करें</h3>
	<p>
		उदाहरण नियंत्रणों से तीन स्थितियों के बीच बदलें:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>अलग-अलग मान:</strong> <code class='inline'>[9, 2, 7, 4, 1, 8, 3]</code> में चौथा सबसे छोटा मान ढूँढ़ें। उत्तर <strong>4</strong> है।</div></li>
		<li><div><strong>मध्यिका:</strong> <code class='inline'>[9, 1, 6, 3, 8, 2, 7, 4, 5]</code> का बीच वाला मान ढूँढ़ें। उत्तर <strong>5</strong> है।</div></li>
		<li><div><strong>दोहराए गए मान:</strong> <code class='inline'>[5, 2, 5, 1, 5, 3]</code> में चौथा सबसे छोटा मान ढूँढ़ें। उत्तर <strong>5</strong> है; माँगा गया स्थान बराबर मानों के समूह में आता है।</div></li>
	</ul>
	<p>
		हर उदाहरण के संदर्भ क्रम को चरण-दर-चरण देखें और समझें कि सक्रिय सीमा कैसे छोटी होती जाती है। अभ्यास क्षेत्र में अपनी सूची और क्रम स्थान डालें। विभाजन के फ़ैसले एक-एक करके लें, फिर अपने चरणों की तुलना संदर्भ क्रम से करें।
	</p>
<section lang="hi" class="frontend-component no-auto-cover" data-component="quick-select" data-source="/resource/data/quick-select.json" data-component-script="/resource/components/quick-select.js" data-component-style="/resource/components/quick-select.css"><p data-component-status role="status">तुलना लोड हो रही है…</p><noscript><p>इस तुलना उपकरण का उपयोग करने के लिए JavaScript चालू करें।</p></noscript></section>
	<h3>यह क्रमबद्ध करने से तेज़ क्यों है?</h3>
	<p>
		क्रमबद्ध करने में हर मान को सही जगह रखना पड़ता है। क्विकसिलेक्ट को केवल इतना काम करना होता है कि चुने गए क्रम स्थान का मान पहचाना जा सके।
	</p>
	<p>
		विभाजन का एक चरण मौजूदा सीमा को एक बार देखता है। यदि पिवट यादृच्छिक रूप से चुना जाए, तो n मानों के लिए कुल काम का अपेक्षित समय <strong>O(n)</strong> होता है। फिर भी सबसे ख़राब स्थिति में समय <strong>O(n²)</strong> हो सकता है, यदि हर पिवट के बाद लगभग सभी मान सक्रिय सीमा में ही रह जाएँ।
	</p>
	<p>
		सूची के भीतर ही काम करने वाला रूप, सूची के अतिरिक्त बहुत कम जगह लेता है। कुछ रूप recursion इस्तेमाल करते हैं, जिससे call stack के लिए जगह लगती है; क्रमिक रूप उस अतिरिक्त stack से बचता है।
	</p>
	<h3>क्विकसिलेक्ट कब उपयोगी है?</h3>
	<p>
		जब आपको क्रम स्थान के आधार पर कोई नतीजा चाहिए, पर पूरी सूची क्रमबद्ध नहीं करनी, तब क्विकसिलेक्ट उपयोगी है। उदाहरण के लिए:
	</p>
	<ul class="list-bullet content-list">
		<li><div>मध्यिका या प्रतिशतक ढूँढ़ना</div></li>
		<li><div>सबसे छोटे या सबसे बड़े k मान चुनना</div></li>
		<li><div>आगे की गणना के लिए सीमा मान चुनना</div></li>
	</ul>
	<p>
		यदि कई क्रम स्थान चाहिए या सभी मान क्रम में चाहिए, तो सूची को एक बार क्रमबद्ध करना सरल हो सकता है। क्विकसिलेक्ट मूल सूची का क्रम भी बदल सकता है, इसलिए मूल क्रम बचाना हो तो पहले उसकी प्रति बना लें।
	</p>
	<h3>मुख्य विचार क्या है?</h3>
	<p>
		क्विकसिलेक्ट केवल वहीं काम करता है जहाँ उत्तर अभी भी हो सकता है। पिवट सूची को हिस्सों में बाँटता है, और माँगा गया क्रम स्थान बताता है कि किस हिस्से को रखना है।
	</p>
	<p>
		इसीलिए एक मान चुनने में पूरी सूची क्रमबद्ध करने से कम काम लग सकता है।
	</p>
	<h3>संदर्भ</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link" href="https://dl.acm.org/doi/10.1145/366622.366644" target="_blank" rel="noopener noreferrer">C. A. R. Hoare, “Algorithm 65: Find” (1961)</a></div></li>
		<li><div><a class="content-link" href="https://doi.org/10.1145/321765.321781" target="_blank" rel="noopener noreferrer">R. W. Floyd and R. L. Rivest, “Expected Time Bounds for Selection” (1975)</a></div></li>
		<li><div><a class="content-link" href="https://xlinux.nist.gov/dads/HTML/select.html" target="_blank" rel="noopener noreferrer">NIST Dictionary of Algorithms and Data Structures: Select</a></div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>एआई संबंधी खुलासा: यह लेख AI (ChatGPT) की सहायता से लिखा गया है। त्रुटियों और छूटी हुई बातों की ओर ध्यान दिलाने के लिए आपका स्वागत है।</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>