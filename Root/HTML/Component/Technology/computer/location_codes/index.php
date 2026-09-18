<div id='message'>
		<?php $alt='Cover concept: a map grid resolving to a concise location code.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h2>What are location codes?</h2>
	<p>
		A location code is a compact identifier for a geographic position or area. It translates a location expressed through coordinates, an address or a map reference into a code that people and software can exchange.
	</p>
	<p>
		A location code is not the location itself. It is a convention for referring to a place within a particular geographic reference system.
	</p>
	<h2>Why use a location code?</h2>
	<p>
		Addresses can be incomplete, repeated or unavailable. Latitude and longitude are precise but inconvenient to read aloud or enter by hand. A location code can offer a shorter, more usable reference while preserving a defined link to geographic coordinates.
	</p>
	<h2>How does a location code work?</h2>
	<p>
		Most systems divide the Earth's surface into areas and assign each area a code. More characters, words or digits can represent a smaller area and therefore greater precision.
	</p>
	<p>
		For a location code to be dependable, its system must define:
	</p>
	<ul class="list-bullet content-list">
		<li><div>the geographic datum and coordinate reference it uses;</div></li>
		<li><div>the precision represented by each code length;</div></li>
		<li><div>how a code is encoded and decoded;</div></li>
		<li><div>what happens near boundaries, poles and other edge cases.</div></li>
	</ul>
	<h2>Competitors and alternatives</h2>
	<p>
		Location codes are alternatives or complements to street addresses, latitude and longitude, <a class="content-link" href="https://maps.google.com/pluscodes/support/" target="_blank" rel="noopener noreferrer">Plus Codes</a>, geohashes and <a class="content-link" href="https://what3words.com/about" target="_blank" rel="noopener noreferrer">what3words</a>. They differ in their code alphabet, precision, openness, licensing, language support and suitability for speech.
	</p>
	<p>
		A comparison should start with the task. Coordinates are universal and precise; street addresses are familiar where they exist; compact grid codes are useful for digital systems; word-based schemes can be convenient to say and remember. No representation removes the need to identify the reference system and required precision.
	</p>
	<h2>Precision and context</h2>
	<p>
		A code that identifies a city block is useful for directions but may be too broad for a delivery point. A code that identifies a few square metres may be unnecessary for a meeting in a park. The right precision depends on the task.
	</p>
	<p>
		Context also matters. A code should identify its scheme, because the same-looking code can mean different places in different systems.
	</p>
	<h2>Example</h2>
	<p>
		<a class="content-link" href="https://wolo.codes/" target="_blank" rel="noopener noreferrer">Wolo</a> is an example of a project that applies the general idea of location codes. It shows how a readable code can complement coordinates and map interfaces when people need to refer to a place.
	</p>
	<h2>When are location codes useful?</h2>
	<p>
		Location codes are helpful for navigation, emergency response, field work, deliveries, event coordination and any situation where an ordinary address is missing or insufficient. They work best when the code system is clear, stable and easy to convert back to a map position.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>