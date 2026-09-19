<div id='message'>
		<?php $alt='Scene data passing through stages until a finished frame reaches the display.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a rendering pipeline?</h3>
	<p>
		A rendering pipeline is the ordered set of transformations that turns a scene description into an image.
	</p>
	<p>
		A typical real-time pipeline processes application commands, vertices, primitives, rasterized fragments, shading, depth and blending before presenting a frame.
	</p>
	<h3>Why is it useful?</h3>
	<p>
		Breaking rendering into stages lets hardware parallelize work and lets developers replace selected stages with shaders or specialized techniques.
	</p>
	<p>
		The pipeline also explains why a visual error may come from geometry, coordinates, textures, lighting, sampling, color management or presentation timing.
	</p>
	<h3>Modern pipelines</h3>
	<p>
		Rasterization and ray tracing can cooperate. Compute passes may perform culling, lighting, post-processing or reconstruction.
	</p>
	<p>
		Frames are synchronized with the display through queues and presentation modes.
	</p>
	<h3>Future</h3>
	<p>
		Rendering pipelines will become more heterogeneous and data-driven, with neural reconstruction and increasingly direct control over scheduling and memory.
	</p>
	<p>
		The essential discipline remains making each transformation explicit enough to test and reason about.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>