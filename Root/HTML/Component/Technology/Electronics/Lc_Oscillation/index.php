<div id='message'>
		<?php $alt='An inductor and capacitor exchanging energy at a resonant frequency.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is LC oscillation?</h3>
	<p>
		An LC circuit contains an inductor and a capacitor. Energy moves back and forth between the capacitor's electric field and the inductor's magnetic field.
	</p>
	<p>
		That exchange creates an electrical oscillation whose ideal angular frequency is determined by the inductance and capacitance:
	</p>
	<p>
		Real circuits lose energy through resistance, so an amplifier or other source may be needed to sustain oscillation.
	</p>
	<h3>Why does it matter?</h3>
	<p>
		Resonance lets a circuit select a narrow band of frequencies, create a stable carrier or measure a physical change.
	</p>
	<p>
		LC networks appear in radio tuners, oscillators, filters, impedance matching, clocks and power converters.
	</p>
	<h3>Intuition</h3>
	<p>
		At one moment the capacitor stores most of the energy. Current then flows through the inductor, building a magnetic field. The capacitor discharges, the current reaches a maximum and the magnetic field collapses, charging the capacitor with opposite polarity. The cycle repeats.
	</p>
	<h3>History and practice</h3>
	<p>
		Resonant circuits helped make wireless telegraphy and radio tuning practical. Modern systems use integrated inductors, varactors and digital control, but the same energy exchange remains.
	</p>
	<p>
		Real design must consider parasitic capacitance, coil resistance, component tolerance, temperature, loading and electromagnetic coupling.
	</p>
	<h3>Future</h3>
	<p>
		Resonance will remain important in wireless power, sensors, filters, medical imaging and high-frequency computing.
	</p>
	<p>
		Its lesson is general: useful signals often emerge when energy, timing and feedback are shaped instead of merely increased.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>