<div id='message'>
		<?php $alt='Many small processing units operating on a large stream of data.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a GPU?</h3>
	<p>
		A graphics processing unit is a processor designed to perform many similar operations in parallel.
	</p>
	<p>
		A CPU usually emphasizes flexible, low-latency control. A GPU devotes more hardware to throughput, applying one instruction pattern across many data elements.
	</p>
	<h3>Why is it useful?</h3>
	<p>
		Graphics are naturally parallel: many pixels, vertices and rays can be processed at once.
	</p>
	<p>
		The same structure helps with matrix operations, simulation, image processing, scientific computing and machine learning.
	</p>
	<h3>How is it programmed?</h3>
	<p>
		A GPU contains compute units, registers, caches and memory interfaces. Programs divide work into kernels or shader stages that run across many threads.
	</p>
	<p>
		Performance depends on memory movement, occupancy, branching, precision and the shape of the algorithm—not simply the number of cores.
	</p>
	<h3>Future</h3>
	<p>
		GPUs will become more heterogeneous, working beside CPUs, neural accelerators and specialized interconnects.
	</p>
	<p>
		Their power is substantial, but so are energy use, programming complexity, heat and dependence on proprietary toolchains.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>