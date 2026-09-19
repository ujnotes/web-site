<div id='message'>
		<?php $alt='A small program transforming vertices, geometry or fragments on a GPU.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a shader?</h3>
	<p>
		A shader is a program executed by graphics hardware to calculate part of a rendering or compute task.
	</p>
	<p>
		Vertex shaders transform geometry. Fragment or pixel shaders calculate surface color. Other stages may process tessellation, geometry, mesh data or ray intersections.
	</p>
	<h3>Why are shaders powerful?</h3>
	<p>
		Shaders make a rendering pipeline programmable. The same GPU can draw a realistic material, a scientific field, a post-processing effect or a user interface through different shader code.
	</p>
	<h3>What makes them difficult?</h3>
	<p>
		A shader runs many times and must respect limits on memory, precision, branching and synchronization.
	</p>
	<p>
		Visual correctness also depends on coordinate systems, color spaces, sampling, lighting and numerical stability.
	</p>
	<h3>Future</h3>
	<p>
		Shader systems will combine graphics, compute and machine-learning operations. Better tools will make performance, portability and debugging easier without hiding the physical cost of every instruction.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>