<div id='message'>
		<?php $alt='A vernier caliper measuring a cut metal piece on a workbench; an illustrative AI-generated photograph.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is measurement error?</h3>
	<p>
		<strong>Measurement error is a measured value minus a reference value.</strong> It tells us the signed difference in a particular comparison. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.16.html" target="_blank" rel="noopener noreferrer">VIM: measurement error</a>.
	</p>
	<p>
		Suppose a reference mass has an assigned value of 100.0 g and a balance indicates 100.3 g:
	</p>
	<p>
		<strong>Error = 100.3 g − 100.0 g = +0.3 g.</strong>
	</p>
	<p>
		The positive sign means the indication is high relative to the reference. A reading of 99.7 g would give an error of −0.3 g. These are illustrative comparisons; the reference and the comparison method also have uncertainty.
	</p>
	<h3>Can we always know the error?</h3>
	<p>
		We need an appropriate reference to assess an error. A display alone cannot tell us its own error.
	</p>
	<p>
		In everyday measurement, the exact true value is generally unknown. A calibration compares indications with measurement standards under specified conditions and provides information for interpreting later readings. Its results also have uncertainty.
	</p>
	<p>
		An instrument's disagreement with a design target is a different matter. If a table should be 2 m long but measures 2.01 m, the 0.01 m difference is a measured departure from the target. It does not establish that the ruler is wrong.
	</p>
	<h3>What are the main components of error?</h3>
	<table>
		<tr><td>Component</td><td>Behaviour in repeated measurements</td><td>An illustrative cause</td></tr>
		<tr><td>Systematic error</td><td>Stays constant or changes predictably under the stated conditions</td><td>A balance has an uncorrected zero offset</td></tr>
		<tr><td>Random error</td><td>Changes unpredictably between repetitions</td><td>Fluctuations in a sensor's readings</td></tr>
	</table>
	<p>
		The distinction describes how an effect behaves in the measurement procedure. “Instrument error” or “human error” names a possible source, not a separate behaviour. An operator can introduce a consistent offset or varying differences.
	</p>
	<p>
		One measurement may contain both components. Repetition can reveal scatter while leaving a shared offset unnoticed. See <a class="content-link XURL" href="/science/measurement/error/systematic_error" data-target="science/measurement/error/systematic_error" data-title="Systematic Error">Systematic Error</a> and <a class="content-link XURL" href="/science/measurement/error/random_error" data-target="science/measurement/error/random_error" data-title="Random Error">Random Error</a>.
	</p>
	<h3>What about gross errors and mistakes?</h3>
	<p>
		Writing 103.0 g when the display says 100.3 g is a recording mistake. Selecting the wrong unit or measuring the wrong object can also invalidate a result.
	</p>
	<p>
		Some introductory texts call such blunders <strong>gross errors</strong>. Treat them as problems to investigate and correct, rather than as a third component to average together with systematic and random error.
	</p>
	<p>
		An unusual reading is a reason to check the procedure, equipment and record. It is not, by itself, proof of a mistake. Do not discard an inconvenient result simply because it is far from the others. The formal vocabulary distinguishes measurement error from a mistake. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.16.html" target="_blank" rel="noopener noreferrer">VIM: measurement error, note 2</a>.
	</p>
	<h3>How can an error be expressed?</h3>
	<p>
		Using the 100.0 g reference example:
	</p>
	<table>
		<tr><td>Expression</td><td>Calculation</td><td>Result</td></tr>
		<tr><td>Signed error</td><td>100.3 g − 100.0 g</td><td>+0.3 g</td></tr>
		<tr><td>Magnitude of error</td><td>Absolute value of +0.3 g</td><td>0.3 g</td></tr>
		<tr><td>Relative error</td><td>+0.3 g / 100.0 g</td><td>+0.003</td></tr>
		<tr><td>Percentage error</td><td>+0.003 × 100%</td><td>+0.3%</td></tr>
	</table>
	<p>
		Terminology around “absolute error” varies, so state whether you mean a signed difference in the original unit or its unsigned magnitude. Relative error requires a non-zero reference and a quantity scale for which the ratio is meaningful; percentages based on Celsius temperatures, for example, can mislead.
	</p>
	<p>
		These are ways of expressing a comparison. They are not additional causes of error.
	</p>
	<h3>Is error the same as uncertainty?</h3>
	<p>
		No. Error concerns a difference from a reference. Uncertainty describes what values can reasonably be attributed to the quantity using the available information.
	</p>
	<p>
		A reported uncertainty of 0.3 g does not mean an error of +0.3 g has been found. A correction for an estimated offset can improve a result, but the correction itself has uncertainty. <a class="content-link" href="https://physics.nist.gov/cuu/Uncertainty/glossary.html" target="_blank" rel="noopener noreferrer">NIST: uncertainty glossary</a>.
	</p>
	<h3>How should we deal with errors?</h3>
	<p>
		Define the quantity and conditions, use suitable standards, repeat measurements where useful and investigate effects that may shift the results. Keep records so another person can understand the comparison.
	</p>
	<p>
		Use the pattern to guide the response: investigate predictable offsets, assess random spread and correct documented mistakes. Report the remaining uncertainty with the result.
	</p>
	<h3>Read next</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link XURL" href="/science/measurement/error/systematic_error" data-target="science/measurement/error/systematic_error" data-title="Systematic Error">Systematic Error</a></div></li>
		<li><div><a class="content-link XURL" href="/science/measurement/error/random_error" data-target="science/measurement/error/random_error" data-title="Random Error">Random Error</a></div></li>
		<li><div><a class="content-link XURL" href="/science/measurement" data-target="science/measurement" data-title="Measurement">Measurement</a></div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>