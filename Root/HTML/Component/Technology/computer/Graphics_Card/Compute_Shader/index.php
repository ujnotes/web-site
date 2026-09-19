<div id='message'>
		<?php $alt='A GPU program performing general computation without drawing ordinary pixels.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a compute shader?</h3>
	<p>
		A compute shader is a GPU program launched over a grid of work items for tasks such as simulation, image processing, filtering, particle systems or machine learning.
	</p>
	<p>
		It uses the same broad hardware as graphics shaders but is not tied to the traditional vertex-to-pixel pipeline.
	</p>
	<h3>How does it work?</h3>
	<p>
		Work items are grouped into local groups or blocks. Threads can cooperate through shared memory and synchronization, while global memory holds larger datasets.
	</p>
	<p>
		Correctness and speed depend on access patterns, occupancy, barriers and the amount of parallel work.
	</p>
	<h3>Why is it important?</h3>
	<p>
		Compute shaders let a graphics application use the GPU for physics, post-processing, culling, video work and other algorithms without a separate compute device.
	</p>
	<p>
		They also provide a bridge between graphics APIs and general-purpose GPU computing.
	</p>
	<h3>Limits and future</h3>
	<p>
		Irregular algorithms and communication-heavy tasks may run better on a CPU or another accelerator.
	</p>
	<p>
		Future APIs will make heterogeneous compute more portable, while programmers still need to reason about memory movement and numerical accuracy.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>