<div id='message'>
		<?php $alt='A circuit passing wanted frequencies and rejecting unwanted ones.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a filter?</h3>
	<p>
		A filter is a circuit or algorithm that selectively passes some parts of a signal and attenuates others.
	</p>
	<p>
		The selected property is often frequency, but filters can also act on time, spatial detail or other features.
	</p>
	<h3>How do filters work?</h3>
	<p>
		Resistors, capacitors and inductors form analog filters. Digital filters calculate new samples from current and previous values.
	</p>
	<p>
		A low-pass filter keeps slow changes and reduces rapid ones. A high-pass filter does the reverse. Band-pass and band-stop filters select or reject a range.
	</p>
	<p>
		The transition is not infinitely sharp. Designers choose a trade-off among bandwidth, attenuation, phase, delay, size and cost.
	</p>
	<h3>Why are they important?</h3>
	<p>
		Filters separate channels, reduce noise, prevent aliasing, shape audio, stabilize power supplies and protect sensitive measurements.
	</p>
	<p>
		Every communication receiver needs to distinguish its intended signal from other energy in the environment.
	</p>
	<h3>Future</h3>
	<p>
		Filters will increasingly combine physical components with adaptive software and machine learning.
	</p>
	<p>
		The basic lesson remains: information becomes usable when a system can distinguish relevant variation from unwanted variation.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>