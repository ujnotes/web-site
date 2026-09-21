<div id='message'>
		<?php $alt='An induced magnetic field resisting the motion of an approaching magnet.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is Lenz's law?</h3>
	<p>
		Lenz's law states that the direction of an induced electric current always opposes the change in magnetic flux that created it.
	</p>
	<p>
		Formulated in 1834 by Russian physicist Heinrich Lenz, it provides the physical direction behind Faraday's law of induction and explains the negative sign in Faraday's equation: <strong>E = -dΦ_B / dt</strong>.
	</p>
	<h3>How does the opposition work?</h3>
	<p>
		When an external magnetic field changes through a conductive loop, the loop responds by resisting that change:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>If magnetic flux is increasing</strong>: the induced current flows in a direction whose own generated magnetic field points opposite to the external field, attempting to cancel out the increase.</div></li>
		<li><div><strong>If magnetic flux is decreasing</strong>: the induced current flows in a direction whose own magnetic field reinforces the fading field, attempting to sustain it.</div></li>
	</ul>
	<p>
		If you push the north pole of a permanent bar magnet toward a wire coil, the coil induces a current that establishes an opposing north pole facing the magnet, repelling your push. If you pull the magnet away, the coil reverses its current to create an attractive south pole, pulling back against your motion.
	</p>
	<h3>Conservation of energy in disguise</h3>
	<p>
		Lenz's law is not an arbitrary magnetic preference; it is a strict requirement imposed by the conservation of energy.
	</p>
	<p>
		Suppose nature worked the opposite way: pushing a magnet toward a coil created an attractive pole. The magnet would accelerate automatically into the coil, which would increase the induced current, pulling the magnet even faster, generating endless kinetic and electrical energy out of nowhere.
	</p>
	<p>
		Because perpetual energy creation is impossible, you must do real mechanical work against the repelling magnetic force to push the magnet forward. That mechanical work is the exact physical source of the electrical energy generated in the wire.
	</p>
	<h3>Everyday demonstrations: eddy currents and braking</h3>
	<p>
		Lenz's law produces visible, counterintuitive physical phenomena:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Magnet in a copper pipe</strong>: drop a strong neodymium magnet through an ordinary plastic tube, and it falls in a fraction of a second. Drop the same magnet through a non-magnetic vertical copper pipe, and it drifts downward slowly like a feather in honey. The falling magnet induces swirling circular currents (<strong>eddy currents</strong>) in the copper walls whose magnetic fields push upward against the magnet's descent.</div></li>
		<li><div><strong>Eddy current braking</strong>: high-speed trains, rollercoasters, and modern gym rowers use electromagnets mounted beside spinning copper or aluminium discs. Activating the magnet creates opposing eddy currents that decelerate the vehicle smoothly and silently, without friction pads, mechanical wear, or brake dust.</div></li>
	</ul>
	<h3>Back-EMF in inductors and motors</h3>
	<p>
		Lenz's law explains why inductors resist sudden changes in current and why electric motors draw far less power once they spin up to full speed.
	</p>
	<p>
		As an electric motor rotates, its spinning coils cut through internal magnetic fields, inducing an opposing voltage called <strong>back-electromotive force (back-EMF)</strong>. This back-EMF pushes directly against the incoming supply voltage, limiting operating current. If the motor is mechanically jammed, back-EMF collapses, current surges unchecked, and the coils can quickly overheat and burn out.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>