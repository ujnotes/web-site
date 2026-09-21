<div id='message'>
		<?php $alt='A magnet moving through a wire coil inducing an electric current.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is Faraday's law of induction?</h3>
	<p>
		Faraday's law of induction states that whenever the magnetic flux passing through a conductive loop changes over time, an electromotive force (voltage) is induced in that loop.
	</p>
	<p>
		Discovered by English scientist Michael Faraday in 1831, it demonstrated that electricity and magnetism are not independent forces, but two sides of a single physical interaction: a changing magnetic field actively creates an electric field.
	</p>
	<h3>What is magnetic flux?</h3>
	<p>
		Magnetic flux (<strong>Φ_B</strong>) measures the total quantity of magnetic field lines passing perpendicularly through a given surface area: <strong>Φ_B = B · A = B A cos(θ)</strong>, where B is the magnetic field strength, A is the surface area, and θ is the angle between the field lines and the surface normal.
	</p>
	<p>
		Think of a wire loop as an open net held in a flowing stream. The total water passing through the net depends on how swiftly the stream moves, how large the net opening is, and whether the net faces the current squarely or is tilted on an angle.
	</p>
	<h3>How is voltage induced?</h3>
	<p>
		The induced electromotive force is directly proportional to how fast the magnetic flux changes: <strong>E = -N (dΦ_B / dt)</strong>, where N is the number of tightly wound turns in the coil.
	</p>
	<p>
		A stationary, motionless magnet sitting inside a coil produces zero induced voltage, no matter how powerful its magnetic field may be. Voltage appears only while the flux is <strong>changing</strong>. This change can be produced in three distinct ways:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Varying magnetic field strength</strong>: moving a magnet closer or farther from the coil, or changing the current flowing through an adjacent electromagnet.</div></li>
		<li><div><strong>Altering the coil area</strong>: stretching, compressing, or sliding the boundary of the conductive loop within the magnetic field.</div></li>
		<li><div><strong>Rotating the loop</strong>: spinning the coil within a steady magnetic field so that its surface orientation relative to the field lines changes continuously.</div></li>
	</ul>
	<h3>Why did this discovery transform the world?</h3>
	<p>
		Before Faraday's discovery, electrical power came almost exclusively from chemical batteries, which were expensive, bulky, and quick to drain.
	</p>
	<p>
		Faraday's law proved that mechanical energy—from falling water in hydroelectric dams, steam turbines powered by coal or nuclear reactions, or spinning wind turbines—could be converted directly into continuous, high-voltage electrical power. Every modern electrical generator, utility power grid, step-up transformer, induction cooktop, and microphone relies on this principle.
	</p>
	<h3>The Maxwell-Faraday equation</h3>
	<p>
		James Clerk Maxwell expressed Faraday's experimental discovery in mathematical differential form as the third of his four fundamental equations: <strong>∇ × E = -∂B/∂t</strong>.
	</p>
	<p>
		This equation revealed something revolutionary: a changing magnetic field produces an electric field in empty space even if no physical wire or loop is present. When combined with Maxwell's fourth equation (a changing electric field produces a magnetic field), it proved that electromagnetic disturbances propagate through space as self-sustaining waves—unveiling the true physical nature of light.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>