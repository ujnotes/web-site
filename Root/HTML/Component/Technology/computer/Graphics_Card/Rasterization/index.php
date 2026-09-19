<div id='message'>
		<?php $alt='Triangles converted into fragments and then pixels on a display.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is rasterization?</h3>
	<p>
		Rasterization converts geometric primitives such as triangles into fragments that can contribute to screen pixels.
	</p>
	<p>
		The pipeline transforms vertices, determines covered samples, interpolates attributes and runs fragment shaders.
	</p>
	<h3>Why is it important?</h3>
	<p>
		Rasterization is efficient and predictable for real-time graphics. Specialized hardware can process many triangles and pixels in parallel.
	</p>
	<p>
		It powers games, interfaces, visualization and much of interactive 3D.
	</p>
	<h3>What are its limits?</h3>
	<p>
		Rasterization does not directly follow every path of light. Reflections, shadows and indirect illumination need approximations such as shadow maps, probes or screen-space methods.
	</p>
	<p>
		Aliasing can appear when continuous geometry is sampled onto a finite pixel grid.
	</p>
	<h3>Future</h3>
	<p>
		Rasterization will remain important alongside ray tracing. Temporal methods, variable-rate shading and machine-learning reconstruction will help it produce more detail at acceptable cost.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>