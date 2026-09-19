<div id='message'>
		<?php $alt='A high-resolution image reconstructed from a lower-resolution render using learned patterns.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is DLSS?</h3>
	<p>
		DLSS, or Deep Learning Super Sampling, is NVIDIA's family of techniques for producing a higher-resolution output from a lower-resolution render.
	</p>
	<p>
		A game renders fewer pixels, and a trained neural network uses current and previous frames, motion data and other inputs to reconstruct detail.
	</p>
	<h3>Why is it useful?</h3>
	<p>
		Rendering fewer pixels can increase frame rate while preserving much of the perceived sharpness.
	</p>
	<p>
		Related techniques can also generate intermediate frames or reduce noise from ray tracing.
	</p>
	<h3>What are the limits?</h3>
	<p>
		Reconstruction can introduce ghosting, flicker, blur or invented detail when motion vectors, history or scene information are poor.
	</p>
	<p>
		Results depend on the game, implementation, input resolution, display and hardware.
	</p>
	<p>
		DLSS is not the same as simply displaying a lower-resolution image, and it is not a guarantee of visual truth.
	</p>
	<h3>Future</h3>
	<p>
		Machine-learning reconstruction will increasingly be part of real-time rendering. Its value depends on transparent quality evaluation, user control and efficient models rather than a single brand name.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>