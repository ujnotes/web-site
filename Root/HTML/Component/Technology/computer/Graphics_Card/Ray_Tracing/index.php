<div id='message'>
		<?php $alt='Simulated rays producing reflections, shadows and light transport.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is ray tracing?</h3>
	<p>
		Ray tracing is a rendering method that follows rays through a scene to determine what they hit and how light is reflected, refracted or absorbed.
	</p>
	<p>
		It can model effects that are difficult to approximate with ordinary rasterization.
	</p>
	<h3>What can it produce?</h3>
	<p>
		Ray tracing can create accurate shadows, mirror reflections, transparent materials, ambient occlusion and global illumination.
	</p>
	<p>
		A path tracer may follow many possible light paths, while real-time systems limit and approximate the calculation.
	</p>
	<h3>Why is it important?</h3>
	<p>
		Ray tracing connects computer graphics to geometric optics. It can make images more physically convincing and support design, architecture, simulation and visual effects.
	</p>
	<h3>Trade-offs and future</h3>
	<p>
		Tracing many rays is computationally expensive and noisy. Hardware acceleration, denoising, temporal reuse and machine-learning reconstruction make interactive use possible.
	</p>
	<p>
		Future renderers will combine rasterization and ray tracing rather than treating one as a universal replacement for the other.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>