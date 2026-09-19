<div id='message'>
		<?php $alt='Program code launching many threads on a graphics processor.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is CUDA?</h3>
	<p>
		CUDA is NVIDIA's platform for using compatible GPUs for general-purpose computation as well as graphics.
	</p>
	<p>
		It includes a programming model, compiler tools, libraries, runtime APIs and hardware execution concepts.
	</p>
	<h3>How does it work?</h3>
	<p>
		A program launches a kernel over many threads. Threads are grouped into blocks, and blocks run on streaming multiprocessors.
	</p>
	<p>
		Threads can share fast local memory within a block, while larger global memory is shared across the device.
	</p>
	<h3>Why is it important?</h3>
	<p>
		CUDA made GPU acceleration accessible to scientific computing, simulation, image processing, data analytics and machine learning.
	</p>
	<p>
		Libraries for linear algebra, deep learning and communication let users benefit without writing every low-level operation.
	</p>
	<h3>Limits</h3>
	<p>
		A problem must contain enough parallel work to offset data transfer, synchronization and programming overhead.
	</p>
	<p>
		Performance depends heavily on memory access, branching, precision and hardware generation. CUDA is powerful but tied to a vendor ecosystem, so portability and long-term access matter.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>