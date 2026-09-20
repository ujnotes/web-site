<div id='message'>
		<?php $alt='A wire-wound passive component storing energy in a magnetic field.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is an inductor?</h3>
	<p>
		An inductor is a passive two-terminal electrical component designed to store energy in a magnetic field when electric current flows through it.
	</p>
	<p>
		The stored magnetic energy is given by <strong>E = ½ L I²</strong>, where L is inductance in henrys and I is current in amperes.
	</p>
	<h3>How does it behave?</h3>
	<p>
		An inductor resists changes in current. Voltage across the inductor is proportional to how fast current changes: <strong>V = L (dI/dt)</strong>.
	</p>
	<p>
		It allows direct current (DC) to pass freely with only minimal resistance, but presents high impedance to alternating current (AC) as frequency increases: <strong>X_L = 2π f L</strong>.
	</p>
	<h3>Types and construction</h3>
	<p>
		Inductors come in diverse form factors tailored to specific applications:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Air-core inductors</strong>: coils with no magnetic core, offering zero core loss and high stability for high-frequency radio circuits.</div></li>
		<li><div><strong>Ferrite and iron-core inductors</strong>: coils wound around high-permeability cores to achieve large inductance in a small volume for power supplies.</div></li>
		<li><div><strong>Toroidal inductors</strong>: donut-shaped cores that contain magnetic flux within the ring, minimizing electromagnetic radiation and noise.</div></li>
		<li><div><strong>Surface-mount chip inductors</strong>: compact multi-layer or wire-wound packages soldered directly onto printed circuit boards.</div></li>
	</ul>
	<h3>Where are they used?</h3>
	<p>
		Inductors are essential across modern electronic systems:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Power conversion</strong>: buck, boost, and flyback DC-DC converters rely on inductors to store and transfer energy smoothly between different voltage levels.</div></li>
		<li><div><strong>Filtering and EMI suppression</strong>: choke inductors block high-frequency noise on power rails and communication cables while letting DC pass.</div></li>
		<li><div><strong>Tuned circuits and resonance</strong>: paired with capacitors, inductors form resonant tanks for radio transmitters, receivers, and oscillators.</div></li>
	</ul>
	<h3>Non-ideal limits</h3>
	<p>
		Every practical inductor has limitations. The copper wire has DC resistance that produces heat. High currents cause magnetic cores to saturate, collapsing inductance. Parasitic capacitance between wire turns creates a self-resonant frequency above which the inductor behaves as a capacitor.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>