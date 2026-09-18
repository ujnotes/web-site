<div id='message'>
	<p>
		Standard: Intel HD Audio.
	</p>
	<h2>Difference from AC'97</h2>
	<p>
		AC'97 has no jack sensing. Intel HD has jack sensing.
	</p>
	<p>
		Detection: normally open.
	</p>
	<h2>Pinout</h2>
	<p>
		Mic.
	</p>
	<p>
		| Pin | Signal | Pin | Signal | |-----|--------|-----|--------| | 1 | Port 1 L | 2 | GND (Ground) | | 3 | Port 1 R | 4 | Presence# (active low (−)) | | 5 | Port 2 R (Speaker R) | 6 | Sense1_Return (Port 1 sense) | | 7 | Sense_Send (Sense) | 8 | Key (empty) | | 9 | Port 2 L (Speaker L) | 10 | Sense2_Return (Port 2 sense) |
	</p>
	<p>
		Mic bias is listed with the mic pins.
	</p>
	<p>
		<code class='inline'>Sense_Send</code> default open — i.e. when no jack. Can return to any one of port 6 or 10.
	</p>
	<p>
		https://en.wikipedia.org/wiki/Intel_High_Definition_Audio#Front_panel_connector
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
