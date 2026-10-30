<div id='message'>
		<?php $alt='A vernier caliper measuring a cut metal piece on a workbench; an illustrative AI-generated photograph.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is random error?</h3>
	<p>
		<strong>Random error is the component of measurement error that varies unpredictably between repeated measurements.</strong> It contributes to the scatter of readings obtained under stated conditions. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.19.html" target="_blank" rel="noopener noreferrer">VIM: random measurement error</a>.
	</p>
	<p>
		For example, a balance may show slightly different values each time the same stable object is placed on it. Small fluctuations in the measuring system or in its environment can affect the indications.
	</p>
	<h3>Does a changing reading always mean random error?</h3>
	<p>
		No. The quantity itself may be changing.
	</p>
	<p>
		A thermometer in cooling water should show a falling temperature. That change is part of what we intend to measure. Calling the whole change “measurement error” would confuse the behaviour of the water with the behaviour of the instrument.
	</p>
	<p>
		To investigate repeatability, use a sufficiently stable quantity and keep the relevant conditions controlled. Also record the order and time of readings: a steady drift may indicate a trend that a simple average hides.
	</p>
	<h3>What can repeated readings tell us?</h3>
	<p>
		Suppose five illustrative readings of one stable object are:
	</p>
	<p>
		<strong>10.1 g, 9.9 g, 10.0 g, 10.2 g and 9.8 g.</strong>
	</p>
	<p>
		Their mean is <strong>10.0 g</strong>. Their sample standard deviation is approximately <strong>0.16 g</strong>.
	</p>
	<p>
		The mean summarises the observations. The standard deviation describes their spread. Neither establishes that the true mass is exactly 10.0 g. A systematic offset could be present in every reading.
	</p>
	<p>
		In particular, the standard deviation is not the largest possible error, and a random effect does not guarantee a bell-shaped distribution.
	</p>
	<h3>Why can averaging help?</h3>
	<p>
		When observations are independent, refer to the same stable quantity and follow a suitable statistical model, the estimated standard uncertainty of the mean is:
	</p>
	<p>
		<strong>u(mean) = s / √n</strong>
	</p>
	<p>
		Here, <strong>s</strong> is the sample standard deviation and <strong>n</strong> is the number of observations. For the five readings above, the estimate is approximately <strong>0.071 g</strong>.
	</p>
	<p>
		This describes the statistical contribution associated with estimating the mean. It is not the complete measurement uncertainty. Calibration, resolution and other relevant contributions may also need to be included. <a class="content-link" href="https://physics.nist.gov/cuu/Uncertainty/typea.html" target="_blank" rel="noopener noreferrer">NIST: Type A evaluation</a>.
	</p>
	<h3>Does taking more readings always help?</h3>
	<p>
		The formula has conditions. Ten consecutive display updates may not provide ten independent observations if the instrument smooths its output or responds slowly.
	</p>
	<p>
		Repetition also cannot remove a common zero offset. If each indication is high by 0.3 g, their average keeps that offset.
	</p>
	<p>
		Under otherwise comparable conditions, reducing the standard uncertainty of the mean by half requires about four times as many independent observations. Before collecting more data, check whether independence, stability and the chosen method are reasonable.
	</p>
	<h3>How can random variation be reduced?</h3>
	<p>
		Choose a suitable instrument and use a consistent procedure. Where relevant, shield the setup from vibration or draughts, allow it to settle and repeat the complete measurement rather than merely copying an unchanged display.
	</p>
	<p>
		Keep enough observations to assess spread, along with the method and conditions. Investigate unusual results instead of deleting them automatically.
	</p>
	<h3>What follows?</h3>
	<p>
		Repeated measurements help us assess variability. Averaging can improve an estimate when its assumptions hold, but confidence in the result also requires checks for systematic effects.
	</p>
	<p>
		See <a class="content-link XURL" href="/science/measurement/error/systematic_error" data-target="science/measurement/error/systematic_error" data-title="Systematic Error">Systematic Error</a> and the <a class="content-link XURL" href="/science/measurement/error" data-target="science/measurement/error" data-title="Measurement Error">Measurement Error</a> overview.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>