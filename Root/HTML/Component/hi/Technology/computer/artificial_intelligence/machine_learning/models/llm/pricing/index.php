<div id='message'>
		<h3>एलएलएम मूल्य निर्धारण क्या है?</h3>
	<p>
		लार्ज लैंग्वेज मॉडल (एलएलएम) मूल्य निर्धारण न्यूरल नेटवर्क पर इनफ़रेंस चलाने की गणना-आधारित लागत है। पारंपरिक सॉफ़्टवेयर के विपरीत जो स्थायी लाइसेंस या निश्चित मासिक शुल्क पर बिकता है, एलएलएम एपीआई केवल उपयोग की गई कंप्यूट क्षमता के लिए शुल्क लेते हैं, जिसे <strong>टोकन (tokens)</strong> में मापा जाता है। एक टोकन आमतौर पर एक अंग्रेज़ी शब्द के लगभग तीन-चौथाई हिस्से के बराबर होता है।
	</p>
	<p>
		एपीआई को भेजे गए प्रत्येक प्रॉम्प्ट में इनपुट टोकन खर्च होते हैं जो संदर्भ को संसाधित करते हैं, और मॉडल द्वारा उत्पन्न प्रत्येक शब्द, वर्ण या विराम चिह्न आउटपुट टोकन के रूप में मापा जाता है। जीपीयू टेन्सर कोर पर नए पाठ को क्रमिक रूप से उत्पन्न करने में अधिक गणना लगती है, इसलिए आउटपुट टोकन आमतौर पर इनपुट टोकन की तुलना में दो से चार गुना अधिक महंगे होते हैं।
	</p>
	<p>
		आधुनिक मूल्य निर्धारण मॉडल में वास्तविक समय के कॉल, पहले से गणना किए गए प्रॉम्प्ट प्रीफ़िक्स (कैशिंग), पृष्ठभूमि बैच अनुरोध, और छिपे हुए तर्क टोकन (रीज़निंग टोकन) के बीच भी अंतर किया जाता है।
	</p>
	<h3>मूल्य निर्धारण संरचनाओं में क्या अंतर है?</h3>
	<p>
		विभिन्न प्रदाताओं के बीच मॉडल लागत का मूल्यांकन करते समय पाँच मुख्य पहलुओं को समझना आवश्यक है:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>इनपुट बनाम आउटपुट टोकन</strong>: इनपुट टोकन में प्रॉम्प्ट, सिस्टम निर्देश, उदाहरण और संदर्भ शामिल होते हैं। आउटपुट टोकन में मॉडल द्वारा उत्पन्न प्रतिक्रियाएँ और संरचित आउटपुट शामिल होते हैं।</div></li>
		<li><div><strong>रीज़निंग टोकन (Reasoning Tokens)</strong>: फ्रंटियर रीज़निंग मॉडल (जैसे ओपनएआई का o1/o3 और डीपसीक-R1) उत्तर देने से पहले आंतरिक विचार प्रक्रिया उत्पन्न करते हैं। इन आंतरिक टोकनों का बिल भी आउटपुट दर पर लिया जाता है, जिससे कुल लागत बढ़ जाती है।</div></li>
		<li><div><strong>प्रॉम्प्ट और संदर्भ कैशिंग (Prompt Caching)</strong>: जब कई अनुरोध एक समान प्रॉम्प्ट प्रीफ़िक्स (जैसे बड़े सिस्टम निर्देश या दस्तावेज़) साझा करते हैं, तो इंजन पहले से गणना किए गए की-वैल्यू (KV) अटेंशन स्टेट्स को सहेजते हैं। कैश्ड टोकन के पुन: उपयोग से इनपुट लागत में 50% से 90% की कमी आती है।</div></li>
		<li><div><strong>संदर्भ सीमा टियर (Context Tiers)</strong>: कई मॉडल मानक सीमा (जैसे 128,000 टोकन) से अधिक लंबे प्रॉम्प्ट के लिए उच्च दरें लागू करते हैं, क्योंकि बड़े अटेंशन मैट्रिक्स को बनाए रखने के लिए अधिक जीपीयू मेमोरी बैंडविड्थ की आवश्यकता होती है।</div></li>
		<li><div><strong>बैच प्रोसेसिंग छूट (Batch API)</strong>: जो कार्य तुरंत वास्तविक समय में आवश्यक नहीं होते और 24 घंटे के भीतर संसाधित किए जा सकते हैं, उन पर स्वचालित रूप से 50% तक की छूट मिलती है।</div></li>
	</ul>
	<h3>प्रमुख प्रदाताओं के मूल्य निर्धारण और मॉडल निर्देशिकाएँ</h3>
	<p>
		अग्रणी एआई प्रयोगशालाएँ आधिकारिक मूल्य निर्धारण पोर्टल, डेवलपर कंसोल और मॉडल कार्ड बनाए रखती हैं जहाँ विनिर्देश और दरें प्रकाशित की जाती हैं:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>गूगल डीपमाइंड और जेमिनी (Gemini)</strong>: जेमिनी परिवार के सभी विनिर्देशों और बेंचमार्क के लिए आधिकारिक <a class="content-link" href="https://deepmind.google/models/model-cards" target="_blank" rel="noopener noreferrer"><strong>DeepMind Model Cards</strong></a> देखें। डेवलपर दरों और कैशिंग छूट की जानकारी <a class="content-link" href="https://ai.google.dev/pricing" target="_blank" rel="noopener noreferrer"><strong>Google AI Studio Pricing</strong></a> पर उपलब्ध है, जबकि एंटरप्राइज़ दरें <a class="content-link" href="https://cloud.google.com/vertex-ai/generative-ai/pricing" target="_blank" rel="noopener noreferrer"><strong>Google Cloud Vertex AI Pricing</strong></a> पर प्रबंधित होती हैं। मॉडल क्षमताओं की सूची <a class="content-link" href="https://ai.google.dev/gemini-api/docs/models/gemini" target="_blank" rel="noopener noreferrer"><strong>Gemini API Models Documentation</strong></a> में है।</div></li>
		<li><div><strong>ओपनएआई (OpenAI)</strong>: GPT-4o, GPT-4o mini, o1, o1-mini और o3-mini की प्रति मिलियन टोकन दरें <a class="content-link" href="https://openai.com/api/pricing/" target="_blank" rel="noopener noreferrer"><strong>OpenAI API Pricing Page</strong></a> पर उपलब्ध हैं। संदर्भ सीमाओं और मॉडल विवरण के लिए <a class="content-link" href="https://platform.openai.com/docs/models" target="_blank" rel="noopener noreferrer"><strong>OpenAI Platform Models Overview</strong></a> देखें।</div></li>
		<li><div><strong>एंथ्रोपिक क्लॉड (Anthropic Claude)</strong>: Claude 3.5 Sonnet, Claude 3.5 Haiku और Claude 3 Opus की आधिकारिक दरें <a class="content-link" href="https://www.anthropic.com/pricing" target="_blank" rel="noopener noreferrer"><strong>Anthropic Pricing Hub</strong></a> पर हैं। प्रॉम्प्ट कैशिंग (90% रीड छूट) और संदेश बैचिंग का विवरण <a class="content-link" href="https://docs.anthropic.com/en/docs/about-claude/models" target="_blank" rel="noopener noreferrer"><strong>Claude Models Overview &amp; Rates</strong></a> में दर्ज है।</div></li>
		<li><div><strong>एक्सएआई ग्रोक (xAI Grok)</strong>: Grok 2 और Grok Vision की एपीआई दरें <a class="content-link" href="https://docs.x.ai/docs/overview#pricing" target="_blank" rel="noopener noreferrer"><strong>xAI API Documentation &amp; Pricing</strong></a> पर सूचीबद्ध हैं। उपयोग और बिलिंग <a class="content-link" href="https://console.x.ai/" target="_blank" rel="noopener noreferrer"><strong>xAI Developer Console</strong></a> से प्रबंधित होती है।</div></li>
		<li><div><strong>डीपसीक (DeepSeek)</strong>: DeepSeek-V3 और DeepSeek-R1 की लागत <a class="content-link" href="https://platform.deepseek.com/api-docs/pricing/" target="_blank" rel="noopener noreferrer"><strong>DeepSeek API Pricing Page</strong></a> पर प्रकाशित है, जिसमें उद्योग की सबसे प्रतिस्पर्धी इनपुट और कैश्ड दरें शामिल हैं। वास्तुकला विवरण <a class="content-link" href="https://api-docs.deepseek.com/" target="_blank" rel="noopener noreferrer"><strong>DeepSeek API Documentation</strong></a> में देखा जा सकता है।</div></li>
	</ul>
	<h3>ओपन-वेट्स और एंटरप्राइज़ प्लेटफ़ॉर्म</h3>
	<p>
		ओपन-वेट्स निर्माता और क्लाउड कंपनियाँ प्रबंधित होस्टिंग और मॉडल कैटलॉग प्रदान करती हैं:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>मिस्ट्रल एआई (Mistral AI)</strong>: Mistral Large, Mistral Small और Codestral की व्यावसायिक दरें <a class="content-link" href="https://mistral.ai/technology/#pricing" target="_blank" rel="noopener noreferrer"><strong>Mistral AI Pricing Directory</strong></a> और गाइड <a class="content-link" href="https://docs.mistral.ai/getting-started/models/" target="_blank" rel="noopener noreferrer"><strong>Mistral Models Platform Guide</strong></a> पर उपलब्ध हैं।</div></li>
		<li><div><strong>कोहियर (Cohere)</strong>: Command R+, Command R और Rerank की कीमतें <a class="content-link" href="https://cohere.com/pricing" target="_blank" rel="noopener noreferrer"><strong>Cohere Pricing</strong></a> पर और तकनीकी दस्तावेज़ <a class="content-link" href="https://docs.cohere.com/docs/models" target="_blank" rel="noopener noreferrer"><strong>Cohere Models Documentation</strong></a> पर हैं।</div></li>
		<li><div><strong>मेटा लामा (Meta Llama)</strong>: Llama 3.3 और 3.1 के ओपन मॉडल <a class="content-link" href="https://llama.meta.com/" target="_blank" rel="noopener noreferrer"><strong>Meta Llama Official Hub</strong></a> पर हैं, और मॉडल कार्ड <a class="content-link" href="https://www.llama.com/docs/model-cards-and-prompt-formats/" target="_blank" rel="noopener noreferrer"><strong>Meta Model Cards &amp; Prompt Formats</strong></a> में हैं।</div></li>
		<li><div><strong>अमेज़ॅन बेडरॉक (Amazon Bedrock)</strong>: एडब्ल्यूएस पर प्रबंधित मॉडल होस्टिंग की दरें <a class="content-link" href="https://aws.amazon.com/bedrock/pricing/" target="_blank" rel="noopener noreferrer"><strong>Amazon Bedrock Pricing</strong></a> पर सूचीबद्ध हैं।</div></li>
		<li><div><strong>माइक्रोसॉफ्ट अज़्योर एआई (Microsoft Azure AI)</strong>: अज़्योर ओपनएआई और सर्वरलेस मॉडल की कीमतें <a class="content-link" href="https://azure.microsoft.com/en-us/pricing/details/cognitive-services/" target="_blank" rel="noopener noreferrer"><strong>Azure AI Services Pricing</strong></a> पर उपलब्ध हैं।</div></li>
	</ul>
	<h3>डायनामिक मूल्य राउटर और विशेष इनफ़रेंस इंजन</h3>
	<p>
		कई मॉडलों के बीच स्वचालित रूटिंग और तुलनात्मक मूल्य देखने के लिए तृतीय-पक्ष प्रदाता उपयोगी हैं:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>ओपनराउटर (OpenRouter)</strong>: 300 से अधिक मॉडलों का वास्तविक समय मूल्य सूचकांक <a class="content-link" href="https://openrouter.ai/models" target="_blank" rel="noopener noreferrer"><strong>OpenRouter Models Directory</strong></a> पर बनाए रखता है।</div></li>
		<li><div><strong>ग्रॉक (Groq)</strong>: कस्टम एलपीयू हार्डवेयर पर अत्यधिक तेज़ इनफ़रेंस दरें <a class="content-link" href="https://groq.com/pricing/" target="_blank" rel="noopener noreferrer"><strong>Groq Pricing</strong></a> पर प्रदान करता है।</div></li>
		<li><div><strong>टुगेदर एआई (Together AI)</strong>: ओपन मॉडलों के लिए सर्वरलेस टोकन दरें <a class="content-link" href="https://www.together.ai/pricing" target="_blank" rel="noopener noreferrer"><strong>Together AI Pricing</strong></a> पर उपलब्ध हैं।</div></li>
		<li><div><strong>फ़ायरवर्क्स एआई (Fireworks AI)</strong>: त्वरित फ़ंक्शन कॉलिंग और इनफ़रेंस दरें <a class="content-link" href="https://fireworks.ai/pricing" target="_blank" rel="noopener noreferrer"><strong>Fireworks AI Pricing</strong></a> पर सूचीबद्ध हैं।</div></li>
	</ul>
	<h3>लागत का अनुमान और प्रबंधन कैसे करें</h3>
	<p>
		उत्पादन प्रणालियों में खर्च को नियंत्रित करने के लिए व्यावहारिक नियम:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>कार्य की जटिलता के अनुसार मॉडल चुनें</strong>: सामान्य वर्गीकरण या निष्कर्षण के लिए महंगे मॉडलों का उपयोग करने से बचें; नियमित कार्यों के लिए छोटे मॉडल (Gemini Flash, GPT-4o mini, Claude Haiku) चुनें।</div></li>
		<li><div><strong>प्रॉम्प्ट कैशिंग के अनुकूल संरचना बनाएँ</strong>: अपरिवर्तनीय सिस्टम निर्देशों और दस्तावेज़ों को प्रॉम्प्ट की शुरुआत में रखें, और गतिशील चर हमेशा अंत में रखें।</div></li>
		<li><div><strong>पृष्ठभूमि कार्यों के लिए बैच एपीआई का उपयोग करें</strong>: गैर-तात्कालिक कार्यों के लिए बैच अनुरोध भेजकर 50% तक लागत बचाएँ।</div></li>
		<li><div><strong>रीज़निंग टोकन की सीमा निर्धारित करें</strong>: रीज़निंग मॉडलों को अनियंत्रित टोकन खर्च करने से रोकने के लिए अधिकतम टोकन सीमा तय करें।</div></li>
		<li><div><strong>आधिकारिक मूल्य पृष्ठों की नियमित समीक्षा करें</strong>: कंप्यूट क्षमता में सुधार के साथ कीमतें अक्सर बदलती हैं; बड़े पैमाने परिनियोजन से पहले आधिकारिक डैशबोर्ड अवश्य देखें।</div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>एआई प्रकटीकरण: एआई (ChatGPT) की सहायता से लिखा गया। आपसे अनुरोध है कि त्रुटियों और चूकों की ओर ध्यान दिलाएँ।</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>