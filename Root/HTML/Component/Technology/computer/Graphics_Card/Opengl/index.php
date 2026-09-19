<div id='message'>
		<?php $alt='An application describing triangles, textures and shaders through a portable graphics interface.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is OpenGL?</h3>
	<p>
		OpenGL is a cross-platform graphics API for rendering 2D and 3D images.
	</p>
	<p>
		Applications submit commands and data. A driver translates them into operations for the graphics processor.
	</p>
	<h3>How does it work?</h3>
	<p>
		The traditional OpenGL model uses objects, state and a rendering pipeline. Modern versions use programmable shaders for geometry, vertices and fragments.
	</p>
	<p>
		Buffers hold data, textures hold sampled images and programs describe transformations and material calculations.
	</p>
	<h3>Why is it important?</h3>
	<p>
		OpenGL made hardware-accelerated graphics available across operating systems and devices. It supported games, visualization, computer-aided design, scientific displays and teaching.
	</p>
	<p>
		It remains common in legacy software, embedded systems and cross-platform tools.
	</p>
	<h3>Limits and legacy</h3>
	<p>
		Its implicit state and driver-managed behavior can make performance and synchronization difficult to predict compared with newer explicit APIs.
	</p>
	<p>
		OpenGL's lasting value is the abstraction: applications can describe images without knowing every detail of a particular GPU.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>