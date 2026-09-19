<div id='message'>
		<?php $alt='Many processors cooperating on separate parts of one problem.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is parallel computing?</h3>
	<p>
		Parallel computing divides a problem into tasks or data pieces that can be processed at the same time.
	</p>
	<p>
		Parallelism can use multiple CPU cores, GPUs, clusters, vector units, FPGAs or specialized accelerators.
	</p>
	<h3>Why is it powerful?</h3>
	<p>
		Some computations contain thousands or millions of independent operations. Parallel execution can reduce elapsed time, enable larger simulations and process streams such as images or scientific measurements.
	</p>
	<h3>What makes it difficult?</h3>
	<p>
		Tasks may depend on one another. Communication, synchronization, load imbalance, memory bandwidth and failures can erase the expected speedup.
	</p>
	<p>
		Amdahl's law reminds us that a serial fraction limits total acceleration.
	</p>
	<h3>Models and future</h3>
	<p>
		Shared-memory threads, distributed message passing, vectorization and data-parallel kernels are different ways to express parallel work.
	</p>
	<p>
		Future systems will combine heterogeneous processors and high-speed interconnects. Good algorithms must consider energy, data movement, reproducibility and the cost of coordinating workers.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>