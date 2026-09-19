<div id='message'>
		<?php $alt='Software commands traveling through an API to a graphics processor.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a graphics API?</h3>
	<p>
		A graphics API is a set of commands, data structures and rules through which software asks graphics hardware to create images or perform related computation.
	</p>
	<p>
		It defines how applications describe resources, pipelines, synchronization, shaders and display output.
	</p>
	<h3>Why is it needed?</h3>
	<p>
		Graphics hardware changes faster than individual applications can be rewritten for every device. An API provides a contract between software, drivers and hardware.
	</p>
	<p>
		Different APIs emphasize different trade-offs. Higher-level systems simplify common tasks. Lower-level systems expose more control over memory, scheduling and synchronization.
	</p>
	<h3>Examples</h3>
	<p>
		OpenGL emphasizes portability and a long-lived state-based model. DirectX includes graphics and other Windows/Xbox multimedia APIs. Vulkan exposes explicit control and supports multiple platforms.
	</p>
	<p>
		The API is not the image itself. It is a language for describing work that a driver and GPU eventually execute.
	</p>
	<h3>Future</h3>
	<p>
		Graphics APIs will combine rasterization, ray tracing, compute, machine learning, virtual reality and display technologies.
	</p>
	<p>
		The enduring challenge is balancing performance, portability, safety, clarity and access to the hardware's capabilities.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>