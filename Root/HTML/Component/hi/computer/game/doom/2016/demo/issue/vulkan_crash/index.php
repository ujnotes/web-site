<div id='message'>
		<h3>समस्या</h3>
	<p>
		Vulkan रेंडरर चुनने पर गेम शुरू नहीं होता।
	</p>
	<p>
		यह <strong>DOOM Unhandled Exception</strong> शीर्षक वाले संवाद के साथ क्रैश होता है और लॉग में <code class='inline'>** UNKNOWN **(** FUNC_PARAM_ERROR **)</code> दिखाता है।
	</p>
	<h3>कारण</h3>
	<p>
		Vulkan की DLL ड्राइवर फ़ाइल का संस्करण मेल नहीं खाता।
	</p>
	<p>
		संभव है कि Doom के एक्जीक्यूटेबल में इसका पथ <code class='inline'>%WinDir%\System32\vulkan.dll</code> स्थायी रूप से लिखा हो। यहाँ <code class='inline'>%WinDir%</code> सामान्यतः <code class='inline'>C:\Windows</code> होता है।
	</p>
	<h3>समाधान</h3>
	<p>
		<code class='inline'>%WinDir%\System32</code> में मौजूदा <code class='inline'>vulkan.dll</code> को नए और संगत संस्करण से बदलें।
	</p>
	<p>
		RX-480 AMD ग्राफिक्स कार्ड और ड्राइवर संस्करण <code class='inline'>17.3.1</code> के साथ मुझे <code class='inline'>vulkan-1-1-0-21-0.dll</code> सही संस्करण मिला।
	</p>
	<p>
		NVIDIA या Intel कार्ड के लिए सही फ़ाइल अलग हो सकती है।
	</p>
	<p>
		आप <code class='inline'>vulkan.dll</code> को <code class='inline'>vulkan-1-1-0-21-0.dll</code> से हाथ से बदल सकते हैं या <em>प्रशासक अधिकारों</em> वाले कंसोल से उपयुक्त आदेश चला सकते हैं।
	</p>
	<h3>सावधानी</h3>
	<p>
		Windows की सिस्टम डायरेक्टरी की फ़ाइलें महत्त्वपूर्ण हैं। उन्हें गलत ढंग से बदलने पर अनचाहे परिणाम हो सकते हैं।
	</p>
	<p>
		सावधान रहें और तभी आगे बढ़ें जब आप समझते हों कि आप क्या कर रहे हैं। अपने डेटा का अद्यतन बैकअप रखना अत्यधिक अनुशंसित है।
	</p>
	<h3>आवश्यकताएँ</h3>
	<ul class="list-bullet content-list">
		<li><div>Vulkan-संगत ग्राफिक्स ड्राइवर</div></li>
		<li><div>प्रशासक अधिकार</div></li>
	</ul>
	<h3>वैकल्पिक समाधान</h3>
	<p>
		यदि Vulkan-संगत ड्राइवर उपलब्ध नहीं है या Vulkan रेंडरर काम नहीं करता, तो OpenGL रेंडरर प्रयोग करें।
	</p>
	<p>
		<code class='inline'>%UserProfile%\Saved Games\id Software\DOOM_SPDemo\base</code> में स्थित <code class='inline'>DOOMConfig.cfg</code> फ़ाइल संपादित करें। यहाँ <code class='inline'>%UserProfile%</code> सामान्यतः <code class='inline'>C:\Users\&lt;account_name&gt;</code> होता है।
	</p>
	<p>
		इसमें <code class='inline'>r_renderAPI</code> का मान <code class='inline'>1</code> से बदलकर <code class='inline'>0</code> कर दें।
	</p>
	<h3>संस्करण</h3>
	<table>
		<tr><td>विवरण</td><td>मान</td></tr>
		<tr><td>शीर्षक</td><td>DOOM 2016 - Demo</td></tr>
		<tr><td>स्रोत</td><td>Steam</td></tr>
		<tr><td>बिल्ड</td><td>20160720-180331-purple-razzmatazz</td></tr>
		<tr><td>तिथि</td><td>15 मार्च 2017</td></tr>
	</table>
	<h3>अस्वीकरण</h3>
	<p>
		यह जानकारी जैसी है वैसी ही, बिना किसी वारंटी के दी गई है।
	</p>
	<p>
		इससे अनजाने में होने वाली किसी भी क्षति के लिए आप स्वयं जिम्मेदार होंगे, मैं नहीं।
	</p>
	<p>
		सभी ट्रेडमार्क उनके संबंधित स्वामियों की संपत्ति हैं।
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
