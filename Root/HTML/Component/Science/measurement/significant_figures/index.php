<div id='message'>
		<?php $alt='A vernier caliper measuring a cut metal piece on a workbench; an illustrative AI-generated photograph.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What are significant figures?</h3>
	<p>
		<strong>Significant figures</strong>, also called significant digits, are the digits retained to communicate the numerical detail of a value.
	</p>
	<p>
		For measured values, they should be consistent with the available measurement information. They do not, by themselves, specify an uncertainty, guarantee accuracy or establish repeatability.
	</p>
	<p>
		For example, 5.010001 cm contains seven significant figures and six decimal places. Its written form alone does not establish that the length is known to the last displayed digit.
	</p>
	<h3>How are significant figures counted?</h3>
	<table>
		<tr><td>Written value</td><td>Significant figures</td><td>Decimal places</td></tr>
		<tr><td>5.01 cm</td><td>3</td><td>2</td></tr>
		<tr><td>5.010 cm</td><td>4</td><td>3</td></tr>
		<tr><td>0.005010 m</td><td>4</td><td>6</td></tr>
		<tr><td>50.100 mm</td><td>5</td><td>3</td></tr>
		<tr><td>5.010001 cm</td><td>7</td><td>6</td></tr>
	</table>
	<p>
		Non-zero digits count. Zeros between significant digits count. Leading zeros locate the decimal point and do not count. Trailing zeros after a decimal point indicate retained significant figures.
	</p>
	<p>
		Trailing zeros in a whole number can be ambiguous without context. Scientific notation makes the intended representation explicit: <strong>5 × 10¹ mm</strong> has one significant figure; <strong>5.000 × 10¹ mm</strong> has four. <a class="content-link" href="https://chemed.chem.purdue.edu/genchem/topicreview/bp/ch1/sigfigs.php" target="_blank" rel="noopener noreferrer">Purdue: significant figures</a>.
	</p>
	<h3>How do significant figures differ from decimal places?</h3>
	<p>
		Decimal places count digits after the decimal point. Significant figures count retained digits beginning with the first non-zero digit.
	</p>
	<p>
		The same measured length can be written as:
	</p>
	<p>
		<strong>5.0100 cm = 50.100 mm = 0.050100 m.</strong>
	</p>
	<p>
		All three forms retain five significant figures. Their decimal places differ because their units differ.
	</p>
	<p>
		An exact unit conversion changes the numerical scale without adding measurement information. The factor <strong>10 mm per centimetre is exact</strong>.
	</p>
	<h3>Are design dimensions limited by significant figures?</h3>
	<p>
		A design dimension is a requirement rather than a measurement.
	</p>
	<p>
		Writing a target as “5 cm” does not, by itself, establish a ±0.5 cm tolerance or restrict the design to one significant figure. Drawings may use explicit tolerances, general tolerance notes or documented conventions.
	</p>
	<p>
		For an unambiguous requirement, write the nominal dimension and its limits, such as <strong>50.00 ± 0.10 mm</strong>, and state the applicable reference conditions where needed.
	</p>
	<p>
		Exact counts and defined conversion factors also differ from measured values. The count of two identified pieces is exact; their measured lengths have uncertainty.
	</p>
	<h3>Does the last digit give the uncertainty?</h3>
	<p>
		No. The last digit identifies a reporting increment, not the full measurement uncertainty.
	</p>
	<p>
		A value rounded to the nearest 0.01 mm has a rounding difference of at most 0.005 mm relative to its unrounded numerical value. This is a statement about rounding. It is not a bound on the difference between the measured value and the true length.
	</p>
	<p>
		Calibration uncertainty, noise, environmental effects and other contributions may be larger than the reporting increment.
	</p>
	<p>
		Likewise, printing 5.010001 cm uses a last-place increment of <strong>0.000001 cm = 0.00001 mm = 10 nm</strong>. The printed digits alone cannot substantiate that level of measurement performance.
	</p>
	<h3>How should measured values be rounded?</h3>
	<p>
		Retain sufficient digits during calculations. Round the final result to a level consistent with its evaluated uncertainty.
	</p>
	<p>
		A common practice is to report uncertainty with one or two significant figures and round the result to the same decimal position. Requirements of a particular method or application take precedence. <a class="content-link" href="https://www.iso.org/sites/JCGM/GUM/JCGM100/C045315e-html/C045315e_FILES/MAIN_C045315e/07_e.html" target="_blank" rel="noopener noreferrer">GUM: reporting uncertainty, section 7.2.6</a>.
	</p>
	<p>
		For example, suppose a separate measurement evaluation gives an unrounded estimate of 50.100035 mm and expanded uncertainty of 0.01236 mm.
	</p>
	<p>
		With the uncertainty rounded to two significant figures, the report becomes:
	</p>
	<p>
		<strong>Length = (50.100 ± 0.012) mm.</strong>
	</p>
	<p>
		The value and uncertainty both end at the 0.001 mm position. The coverage factor and coverage basis must also be stated. This is a reporting illustration, not an uncertainty calculated from two cut-piece readings.
	</p>
	<h3>What happens when the discarded digit is 5?</h3>
	<p>
		The rounding convention should be stated when it matters.
	</p>
	<p>
		With <strong>round to nearest, ties to even</strong>, an exact halfway value is rounded so the final retained digit is even:
	</p>
	<table>
		<tr><td>Input</td><td>To two decimal places</td></tr>
		<tr><td>5.014</td><td>5.01</td></tr>
		<tr><td>5.016</td><td>5.02</td></tr>
		<tr><td>5.025, exactly</td><td>5.02</td></tr>
		<tr><td>5.035, exactly</td><td>5.04</td></tr>
		<tr><td>5.0251</td><td>5.03</td></tr>
	</table>
	<p>
		The ties-to-even rule applies only at an exact halfway point. For the positive numbers shown here, a value greater than the halfway point rounds to the higher of the two neighbouring values.
	</p>
	<p>
		Some procedures require a different convention, including rounding uncertainties upwards. Use the applicable procedure consistently. <a class="content-link" href="https://www.nist.gov/system/files/documents/2019/05/14/glp-9-rounding-20190506.pdf" target="_blank" rel="noopener noreferrer">NIST: rounding expanded uncertainties and calibration values</a>.
	</p>
	<h3>What about calculations with measured values?</h3>
	<p>
		Elementary significant-figure rules provide rough reporting guidance:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Addition and subtraction:</strong> the coarsest decimal position commonly limits the reported result.</div></li>
		<li><div><strong>Multiplication and division:</strong> the smallest significant-figure count commonly limits the reported result.</div></li>
		<li><div><strong>Exact counts and exact conversion factors:</strong> these do not limit measurement significant figures.</div></li>
	</ul>
	<p>
		These shortcuts do not replace uncertainty propagation. They can be inadequate when quantities are correlated, errors cancel in a difference or an average is calculated from repeated observations.
	</p>
	<p>
		An average may legitimately be reported more finely than a single observation when the measurement analysis supports it. The added digits must follow from that analysis, rather than from the calculator's display.
	</p>
	<h3>What follows?</h3>
	<p>
		Use digits to communicate supported numerical detail. Preserve useful working digits, apply exact unit conversions correctly, and round the reported result in accordance with its uncertainty.
	</p>
	<h3>Where can I read more?</h3>
	<p>
		<a class="content-link XURL" href="/science/measurement" data-target="science/measurement" data-title="Measurement, resolution and uncertainty">Measurement, resolution and uncertainty</a> explains the information behind a reported value. <a class="content-link XURL" href="/science/measurement/accuracy_and_precision" data-target="science/measurement/accuracy_and_precision" data-title="Accuracy, precision and tolerance">Accuracy, precision and tolerance</a> distinguishes agreement with a reference from consistency between results.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>