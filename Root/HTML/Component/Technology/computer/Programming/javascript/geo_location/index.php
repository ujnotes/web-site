<div id='message'>
	<p>
		Var x = document.getElementById("demo");.
	</p>
	<h2>function getLocation() {</h2>
	<h4>if (navigator.geolocation) {</h4>
	<p>
		Navigator.geolocation.getCurrentPosition(showPosition);.
	</p>
	<h4>} else {</h4>
	<p>
		X.innerHTML = "Geolocation is not supported by this browser.";.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<h2>function showPosition(position) {</h2>
	<pre class='indent-c'><code class='block'>function showPosition(position) { "&lt;br&gt;Longitude: " + position.coords.longitude;</code></pre>
	<p>
		X.innerHTML = "Latitude: " + position.coords.latitude +.
	</p>
	<p>
		}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
