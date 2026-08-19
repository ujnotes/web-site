<div id='message'>
	<pre class='indent-c'><code class='block'>Include code initializer in &lt;head&gt;</code></pre>
	<h2>Ref</h2>
	<p>
		Pageviews &amp; Virtual pageviews (dynamic / AJAX).
	</p>
	<p>
		SPA should not update the window.location as it will interfere with tracking params and result in artifacts like new sessions in tracking report.
	</p>
	<h2>ga.js</h2>
	<h4>if(!(typeof (_gaq) === "undefined")) {</h4>
	<p>
		_gaq.push(['_trackPageview'], "/"+URLid);.
	</p>
	<p>
		}.
	</p>
	<p>
		Analytics.js.
	</p>
	<h2>Ref</h2>
	<p>
		https://developers.google.com/analytics/devguides/collection/analyticsjs/
	</p>
	<p>
		Ga('send', 'event', {.
	</p>
	<h2>'eventCategory': 'download',</h2>
	<p>
		<strong>'eventAction'.</strong> 'click'.
	</p>
	<p>
		});.
	</p>
	<p>
		Non-Interaction Events.
	</p>
	<h2>Bounce rate calculation</h2>
	<p>
		However, when this value is set to true, the type of event hit is not considered an interaction hit.
	</p>
	<h2>ga('send', 'event', 'Videos', 'play', 'Fall Campaign', {</h2>
	<p>
		<strong>nonInteraction.</strong> True.
	</p>
	<p>
		});.
	</p>
	<p>
		If not specified, the default value is false, which implies that the event is AN interaction event and thus should be included in bounce rate calculation. So if the user were to interact with such an event - his session would not be regarded as a ‘bounce’.
	</p>
	<h2>Bounce rate</h2>
	<p>
		At least one interaction.
	</p>
	<p>
		Outbound.
	</p>
	<p>
		Once link is clicked - current page js stops executing.
	</p>
	<h2>function handleOutboundLinkClicks(event) {</h2>
	<h4>ga('send', 'event', {</h4>
	<p>
		<strong>eventCategory.</strong> 'Outbound Link',.
	</p>
	<p>
		<strong>eventAction.</strong> 'click',.
	</p>
	<p>
		<strong>eventLabel.</strong> Event.target.href,.
	</p>
	<p>
		<strong>transport.</strong> 'beacon'.
	</p>
	<p>
		});.
	</p>
	<p>
		}.
	</p>
	<p>
		Transport beacon for supported browser.
	</p>
	<p>
		Non supported, wait till event is transmitted.
	</p>
	<p>
		The onclick should return false, the actual page loading is done by 'hitCallback': function(){document.location = url;}.
	</p>
	<h2>var trackOutboundLink = function(title, url) {</h2>
	<h4>if(!(typeof (ga) === 'undefined')) {</h4>
	<h4>if(!(typeof (title) === 'undefined'))</h4>
	<p>
		Title = url;.
	</p>
	<p>
		Ga('send', 'event', 'outbound', 'click', title, {.
	</p>
	<p>
		<strong>'transport'.</strong> 'beacon',.
	</p>
	<p>
		<strong>'hitCallback'.</strong> Function(){document.location = url;}.
	</p>
	<p>
		});.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<h2>Events</h2>
	<p>
		https://support.google.com/analytics/answer/1033068#Anatomy
	</p>
	<p>
		Extension.
	</p>
	<p>
		https://github.com/googleanalytics/autotrack
	</p>
	<p>
		To centralize common utility code.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
