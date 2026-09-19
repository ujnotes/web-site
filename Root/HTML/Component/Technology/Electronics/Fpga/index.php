<div id='message'>
		<?php $alt='A reconfigurable silicon fabric implementing custom digital logic.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is an FPGA?</h3>
	<p>
		An FPGA, or field-programmable gate array, is an integrated circuit whose logic and routing can be configured after manufacturing.
	</p>
	<p>
		It contains lookup tables, registers, memory blocks, clock resources and programmable interconnects.
	</p>
	<h3>Why is it useful?</h3>
	<p>
		An FPGA can implement parallel pipelines and precise timing without fabricating a custom chip.
	</p>
	<p>
		It is useful for prototypes, industrial control, signal processing, networking, aerospace and hardware acceleration.
	</p>
	<h3>How is it programmed?</h3>
	<p>
		Hardware descriptions such as VHDL are synthesized into a configuration bitstream. The device then behaves as the designed circuit until it is reconfigured.
	</p>
	<h3>Trade-offs</h3>
	<p>
		FPGAs offer flexibility and parallelism, but usually consume more power and area than an optimized ASIC. Timing closure, verification and hardware debugging can be difficult.
	</p>
	<h3>Future</h3>
	<p>
		FPGAs will increasingly combine processors, high-speed transceivers, AI blocks and adaptive logic. They remain valuable where hardware must be customized but production volume does not justify a new chip.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>