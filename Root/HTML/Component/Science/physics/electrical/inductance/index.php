<div id='message'>
		<?php $alt='A coil opposing current change through a magnetic field.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is inductance?</h3>
	<p>
		Inductance is the property of an electrical conductor or circuit that opposes any change in electric current passing through it: <strong>V = L (dI/dt)</strong>.
	</p>
	<p>
		It is measured in henrys. An inductor is an electrical component designed to provide concentrated inductance, usually formed by coiling conductive wire around a magnetic core. Stray inductance also exists in every wire, trace and component lead.
	</p>
	<h3>How does it work?</h3>
	<p>
		When current flows through a conductor, it generates a magnetic field around it. If the current changes, that magnetic field expands or collapses.
	</p>
	<p>
		By Faraday's law of induction and Lenz's law, a changing magnetic flux induces an electromotive force (voltage) that directly opposes the change in current that produced it. Because of this, current through an inductor cannot change instantaneously.
	</p>
	<h3>What determines it?</h3>
	<p>
		For a simple coil, inductance increases with the square of the number of turns and the cross-sectional area, and decreases with the coil's length.
	</p>
	<p>
		The core material has a decisive effect: a ferromagnetic core (such as iron or ferrite) concentrates magnetic flux and dramatically multiplies inductance compared to an air core, though magnetic cores can saturate when current becomes too high.
	</p>
	<h3>Why is it important?</h3>
	<p>
		Inductance is fundamental to managing energy and electrical signals.
	</p>
	<p>
		Together with resistance it sets a characteristic time scale <strong>τ = L / R</strong>. Together with capacitance it forms resonant <strong>LC</strong> circuits that can select frequencies, filter unwanted noise and sustain oscillations.
	</p>
	<p>
		Inductors store energy in their magnetic field. That makes them indispensable in transformers, switch-mode power converters, motors and chokes that block high-frequency electromagnetic interference while allowing direct current to pass.
	</p>
	<h3>Limits and non-ideal effects</h3>
	<p>
		Real inductors are never pure inductance. The coiled wire introduces series resistance, adjacent turns create parasitic capacitance, and magnetic cores incur hysteresis and eddy current losses.
	</p>
	<p>
		In high-speed digital circuits, rapid switching causes sudden current transients (<strong>dI/dt</strong>). This generates inductive voltage spikes and ground bounce across traces and power pins that circuit designers must carefully suppress.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>