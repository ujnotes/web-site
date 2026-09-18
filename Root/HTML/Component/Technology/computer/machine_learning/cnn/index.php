<div id='message'>
	<p>
		CNNs learn features from raw pixels: input feature map (width, height, RGB depth) and a stack of convolution, ReLU, pooling.
	</p>
	<p>
		Intro to CNN.
	</p>
	<p>
		https://developers.google.com/machine-learning/practica/image-classification/convolutional-neural-networks
	</p>
	<p>
		Convoluted Neural Network. Breakthrough: progressively extract higher- and higher-level representations of the image content.
	</p>
	<p>
		Instead of preprocessing the data to derive features like textures and shapes, a CNN takes just the image's raw pixel data as input and "learns" how to extract these features, and ultimately infer what object they constitute.
	</p>
	<h2>Input feature map</h2>
	<p>
		Matrix:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Width: image width.</div></li>
		<li><div>Height: image height.</div></li>
		<li><div>Depth: R, G, B.</div></li>
	</ul>
	<h2>Modules</h2>
	<p>
		A CNN comprises a stack of modules. Each module performs 3 tasks:
	</p>
	<ol class="list-number content-list">
		<li><div>Convolution.</div></li>
		<li><div>ReLU.</div></li>
		<li><div>Pooling.</div></li>
	</ol>
	<h2>Convoluted map</h2>
	<p>
		Convolution extracts tiles of the input feature map and applies filters. Two factors:
	</p>
	<ol class="list-number content-list">
		<li><div>Size of tile — typically 3x3 or 5x5.</div></li>
		<li><div>Depth: number of filters.</div></li>
	</ol>
	<p>
		Application of filter:
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
