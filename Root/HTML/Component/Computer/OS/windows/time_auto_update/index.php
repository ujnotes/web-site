<div id='message'>
	<p>
		NTP uses UDP 123.
	</p>
	<pre class='indent-c'><code class='block'>nslookup time.nist.gov
net  time  /setsntp:xxx.xxx.xxx.xxx
w32tm /config /update
w32tm /resync /rediscover</code></pre>
	<p>
		<code class='inline'>/setsntp:</code> sets the NTP server. <code class='inline'>w32tm /config /update</code> applies the config. <code class='inline'>/resync /rediscover</code> resyncs and rediscovers sources.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
