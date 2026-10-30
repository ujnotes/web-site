<div id='message'>
		<?php $alt='A vernier caliper measuring a cut metal piece on a workbench; an illustrative AI-generated photograph.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is measurement?</h3>
	<p>
		Measurement is the process of finding a value for a quantity through an experiment. We measure a table's length, a bag's mass, water temperature or the time taken to run a race.
	</p>
	<p>
		A number needs a unit to make sense: 2 metres, 5 kilograms or 10 seconds. It also needs context. “The temperature is 25 °C” leaves a question: the temperature of what, where and when?
	</p>
	<p>
		The quantity we intend to measure is called the <strong>measurand</strong>. Defining it clearly is the first step towards a useful result.
	</p>
	<h3>How does measurement work?</h3>
	<p>
		We choose a method that relates the quantity to an established unit. Sometimes the comparison is direct, as when we place a ruler beside a table. Sometimes we calculate the result from other measurements, as when we divide distance by elapsed time to find average speed.
	</p>
	<table>
		<tr><td>Quantity</td><td>An ordinary method</td><td>Unit</td></tr>
		<tr><td>Length</td><td>Compare a table with a ruler</td><td>metre (m)</td></tr>
		<tr><td>Mass</td><td>Place rice on a balance</td><td>kilogram (kg)</td></tr>
		<tr><td>Temperature</td><td>Put a suitable thermometer in water</td><td>degree Celsius (°C)</td></tr>
		<tr><td>Time interval</td><td>Time a race with a stopwatch</td><td>second (s)</td></tr>
	</table>
	<p>
		An instrument gives an <strong>indication</strong>, such as a display reading. Obtaining a measurement result may also require a calculation, a correction and an assessment of uncertainty. <a class="content-link" href="https://physics.nist.gov/cuu/Uncertainty/basic.html" target="_blank" rel="noopener noreferrer">NIST: measurement equations</a>.
	</p>
	<h3>Does measuring tell us the exact value?</h3>
	<p>
		An ordinary measurement gives an estimate. Its usefulness depends on how well the method supports the decision we want to make.
	</p>
	<p>
		A kitchen balance may be suitable for weighing rice for dinner. The same balance may be unsuitable for weighing a very small laboratory sample. More displayed digits cannot make an unsuitable method adequate.
	</p>
	<p>
		Several ideas help us judge a result:
	</p>
	<table>
		<tr><td>Term</td><td>The question it answers</td></tr>
		<tr><td>Resolution</td><td>What small change can the instrument distinguish?</td></tr>
		<tr><td>Accuracy</td><td>How close is the measured value to the true value?</td></tr>
		<tr><td>Precision</td><td>How closely do repeated results agree under stated conditions?</td></tr>
		<tr><td>Error</td><td>What is the measured value minus a reference value?</td></tr>
		<tr><td>Uncertainty</td><td>What dispersion of values is attributable to the quantity, given the available information?</td></tr>
	</table>
	<p>
		These terms describe different aspects of measurement. <a class="content-link XURL" href="/science/measurement/accuracy_and_precision" data-target="science/measurement/accuracy_and_precision" data-title="Accuracy and precision">Accuracy and precision</a> need to be considered together.
	</p>
	<h3>What is resolution?</h3>
	<p>
		<strong>Resolution</strong> is the smallest change in the quantity that produces a perceptible change in the indication.
	</p>
	<p>
		A thermometer displaying 0.01 °C increments does not thereby establish accuracy to 0.01 °C. Calibration, noise, placement and the instrument's response also matter. In some conditions, useful resolution is poorer than the last displayed digit suggests. <a class="content-link" href="https://jcgm.bipm.org/vim/en/4.14.html" target="_blank" rel="noopener noreferrer">VIM: resolution</a>.
	</p>
	<h3>What is measurement error?</h3>
	<p>
		<strong>Measurement error = measured value − reference value.</strong>
	</p>
	<p>
		Suppose a length standard has an assigned value of 50.000 mm. An instrument reads 50.020 mm. Its indicated error relative to that reference is <strong>+0.020 mm</strong>. The reference and the comparison also have uncertainty.
	</p>
	<p>
		For an ordinary object, the exact true value is generally unknown. We cannot find its exact measurement error merely by looking at the display.
	</p>
	<p>
		Error can include <strong>systematic</strong> and <strong>random</strong> components. Their differences, and the distinction between an error and a mistake, are explained in <a class="content-link XURL" href="/science/measurement/error" data-target="science/measurement/error" data-title="Measurement Error">Measurement Error</a>.
	</p>
	<h3>What is measurement uncertainty?</h3>
	<p>
		<strong>Uncertainty</strong> describes the dispersion of values attributable to the quantity, based on the information available.
	</p>
	<p>
		It may include contributions from calibration, resolution, repeated readings, temperature, alignment and the way the measurand is defined. Contributions associated with systematic effects matter alongside those associated with random variation. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.26.html" target="_blank" rel="noopener noreferrer">VIM: measurement uncertainty</a>.
	</p>
	<table>
		<tr><td>Term</td><td>Meaning</td></tr>
		<tr><td>Standard uncertainty, u</td><td>Uncertainty expressed as a standard deviation</td></tr>
		<tr><td>Combined standard uncertainty, u_c</td><td>The standard uncertainty obtained by combining relevant contributions</td></tr>
		<tr><td>Expanded uncertainty, U</td><td>A stated multiple of the combined standard uncertainty: U = k × u_c</td></tr>
		<tr><td>Coverage factor, k</td><td>The multiplier used to obtain expanded uncertainty</td></tr>
	</table>
	<p>
		<strong>Type A</strong> evaluations use statistical analysis of observations. <strong>Type B</strong> evaluations use other information, such as a calibration certificate. These labels describe methods of evaluating uncertainty; they do not mean “random error” and “systematic error”. <a class="content-link" href="https://physics.nist.gov/cuu/Uncertainty/glossary.html" target="_blank" rel="noopener noreferrer">NIST: uncertainty glossary</a>.
	</p>
	<h3>How should a result be reported?</h3>
	<p>
		An illustrative report is:
	</p>
	<p>
		<strong>Length = (50.100 ± 0.010) mm</strong>, with expanded uncertainty <strong>U = 0.010 mm</strong> and coverage factor <strong>k = 2</strong>.
	</p>
	<p>
		The ± term describes expanded uncertainty. It is not a manufacturing tolerance or a guaranteed limit on the error. A factor of 2 may support approximately 95% coverage when the distribution and uncertainty evaluation justify it.
	</p>
	<p>
		A useful report identifies the quantity, method and relevant conditions, explains the uncertainty and states its coverage basis. The numbers above illustrate a reporting format; they were not calculated from the two-piece example in the accuracy article. <a class="content-link" href="https://www.iso.org/sites/JCGM/GUM/JCGM100/C045315e-html/C045315e_FILES/MAIN_C045315e/07_e.html" target="_blank" rel="noopener noreferrer">GUM: reporting uncertainty</a>.
	</p>
	<p>
		Keep useful digits during calculation, then round the reported value consistently with its uncertainty. See <a class="content-link XURL" href="/science/measurement/significant_figures" data-target="science/measurement/significant_figures" data-title="Significant Figures and Rounding">Significant Figures and Rounding</a>.
	</p>
	<h3>Why can repeated readings differ?</h3>
	<p>
		The quantity itself may change, or the measurement may vary. These possibilities need separate investigation.
	</p>
	<p>
		Repeatedly measuring the <strong>same stable quantity</strong> helps assess measurement repeatability. Measuring different objects also includes real differences between those objects.
	</p>
	<p>
		For example, cutting metal produces pieces whose lengths may vary. Repeated measurements of one stable piece investigate the measuring method. Measurements of many pieces also reflect production variation. A 50 mm design target is a requirement; it is not a reference standard for testing the instrument.
	</p>
	<p>
		Averaging independent repeated measurements can reduce the contribution from random variation. The standard uncertainty of the mean is estimated by <strong>s/√n</strong>, where s is the sample standard deviation and n is the number of observations. Averaging does not remove a common measurement offset. <a class="content-link" href="https://physics.nist.gov/cuu/Uncertainty/typea.html" target="_blank" rel="noopener noreferrer">NIST: Type A evaluation</a>.
	</p>
	<h3>What makes a measurement useful?</h3>
	<p>
		Define the quantity, choose a suitable method and ask how much uncertainty the decision can tolerate. Report what the evidence supports.
	</p>
	<p>
		For a production decision, keep the measurement result separate from the design tolerance. Whether an item passes near a limit also depends on the uncertainty and the agreed decision rule.
	</p>
	<h3>Explore measurement</h3>
	<ul class="list-bullet content-list">
		<li><div><a class="content-link XURL" href="/science/measurement/error" data-target="science/measurement/error" data-title="Measurement Error">Measurement Error</a>: errors, their components and common mistakes.</div></li>
		<li><div><a class="content-link XURL" href="/science/measurement/accuracy_and_precision" data-target="science/measurement/accuracy_and_precision" data-title="Accuracy and Precision">Accuracy and Precision</a>: closeness, consistency and tolerance.</div></li>
		<li><div><a class="content-link XURL" href="/science/measurement/significant_figures" data-target="science/measurement/significant_figures" data-title="Significant Figures">Significant Figures</a>: reporting digits and rounding.</div></li>
	</ul>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>