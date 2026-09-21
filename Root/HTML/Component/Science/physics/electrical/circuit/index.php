<div id='message'>
		<?php $alt='A closed loop connecting an electrical energy source, conductors and a load.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is an electric circuit?</h3>
	<p>
		An electric circuit is an unbroken conductive loop that allows electric charge to flow continuously from a power source, through one or more components, and back to the source.
	</p>
	<p>
		If the loop is broken at any point, charges cannot complete the path, the electric field collapses, and current stops everywhere along that branch.
	</p>
	<h3>What does a circuit need to work?</h3>
	<p>
		Every functional circuit requires at least three essential elements:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>A source of electromotive force</strong>: a battery, generator, or solar cell that maintains an electrical potential difference (voltage) across its terminals.</div></li>
		<li><div><strong>A conductive path</strong>: copper wires, printed circuit board traces, or metallic tracks that provide mobile charge carriers with low resistance.</div></li>
		<li><div><strong>A load</strong>: a component such as a resistor, lamp, heating element, or motor that converts electrical energy into heat, light, or mechanical work.</div></li>
	</ul>
	<p>
		Most practical circuits also incorporate a switch or control element to open and close the conductive loop safely without disconnecting wires.
	</p>
	<h3>Closed, open, and short circuits</h3>
	<p>
		When a circuit is operating normally, it is a <strong>closed circuit</strong>: charges circulate steadily, potential drops across the load, and energy transfers smoothly from the source to the load.
	</p>
	<p>
		When a connection is severed or a switch is turned off, it becomes an <strong>open circuit</strong>. Air has extremely high resistance, so current drops to zero immediately, even though the power source continues to maintain voltage across the gap.
	</p>
	<p>
		A <strong>short circuit</strong> occurs when an unintended low-resistance connection bypasses the load entirely. Because circuit resistance plunges close to zero, Ohm's law (<strong>I = V / R</strong>) dictates that current surges to dangerous levels, melting insulation, blowing fuses, or starting electrical fires.
	</p>
	<h3>Series and parallel connections</h3>
	<p>
		Components connect together in two fundamental configurations:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Series circuits</strong>: components are arranged along a single continuous path. The identical current flows through each component sequentially, while the total supply voltage divides across them. If any single component fails or disconnects, the entire loop opens and all components turn off.</div></li>
		<li><div><strong>Parallel circuits</strong>: components connect across shared common junctions. Every branch experiences the full source voltage, while total current divides among the branches according to their individual resistance. If one branch is disconnected, all other branches continue operating without interruption.</div></li>
	</ul>
	<p>
		Household electrical wiring is wired almost exclusively in parallel so that switching off a desk lamp does not shut down the computer or the refrigerator.
	</p>
	<h3>How is electrical energy actually transferred?</h3>
	<p>
		It is tempting to imagine electrons marching like marbles through a pipe from the battery to the load, but individual electrons drift through metallic conductors at less than a millimetre per second.
	</p>
	<p>
		Energy does not travel through the slow mechanical motion of individual particles. It travels through the electromagnetic field established in the space surrounding the conductors. The field forms along the loop at nearly the speed of light, exerting force on charges throughout the entire circuit almost instantaneously.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>