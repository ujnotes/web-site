<div id='message'>
		<?php $alt='A vernier caliper measuring a cut metal piece on a workbench; an illustrative AI-generated photograph.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What are accuracy and precision?</h3>
	<p>
		<strong>Accuracy</strong> concerns closeness to a true or relevant reference value. <strong>Precision</strong> concerns agreement among repeated results under specified conditions.
	</p>
	<p>
		For manufacturing, agreement with a design target is often described as cutting accuracy. For measurement, accuracy concerns agreement between a measured value and the true value of the quantity being measured. The design target and the actual length of a finished piece are separate values.
	</p>
	<p>
		Formal measurement accuracy is a qualitative concept. Numerical statements are made about error, bias, uncertainty or specified performance limits. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.13.html" target="_blank" rel="noopener noreferrer">VIM: measurement accuracy</a>.
	</p>
	<h3>How do the terms differ?</h3>
	<table>
		<tr><td>Term</td><td>Meaning</td><td>Example for a 50 mm target</td></tr>
		<tr><td>Accuracy</td><td>Closeness to the relevant true or reference value</td><td>How closely the produced length agrees with the target, or a measurement agrees with the piece's actual length</td></tr>
		<tr><td>Precision</td><td>Agreement among repeated results under stated conditions</td><td>Repeated readings of the same stable piece cluster closely; readings across different pieces also include production variation</td></tr>
		<tr><td>Tolerance</td><td>Limits of acceptable variation specified by the design</td><td>50 ± 0.10 mm permits 49.90–50.10 mm</td></tr>
		<tr><td>Repeatability</td><td>Precision under specified repeatability conditions</td><td>Consistency during a short run with the same setup</td></tr>
		<tr><td>Trueness</td><td>Agreement of the long-run measurement average with a reference value</td><td>Whether repeated measurements are centred on a reference</td></tr>
		<tr><td>Bias</td><td>An estimate of systematic measurement error; by extension, a systematic process offset when discussing production</td><td>A measuring instrument reads high, or a cutting process tends to cut long</td></tr>
	</table>
	<p>
		Measurement precision is commonly described using measures of spread, such as standard deviation. A smaller spread indicates better precision under the stated conditions. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.15.html" target="_blank" rel="noopener noreferrer">VIM: measurement precision</a>.
	</p>
	<p>
		Repeatability conditions normally keep the procedure, operator, measuring system, location and relevant operating conditions the same over a short period. Consistency across days, operators or systems requires the changed conditions to be stated. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.21.html" target="_blank" rel="noopener noreferrer">VIM: repeatability</a>.
	</p>
	<h3>Is a correct average enough?</h3>
	<p>
		A set of widely scattered results can have an average close to the reference. This does not establish that individual results are accurate.
	</p>
	<p>
		For repeated measurements, <strong>trueness</strong> concerns the limiting average relative to a reference; <strong>precision</strong> concerns scatter. A small sample's average is an estimate and can be close to the reference by chance. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.14.html" target="_blank" rel="noopener noreferrer">VIM: trueness</a>.
	</p>
	<p>
		Likewise, a tightly grouped set can be systematically displaced. Bias and spread describe different features. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.18.html" target="_blank" rel="noopener noreferrer">VIM: measurement bias</a>.
	</p>
	<h3>What is intended precision?</h3>
	<p>
		<strong>Intended or design precision</strong> describes required or claimed consistency. <strong>Observed or achieved precision</strong> describes consistency supported by observations.
	</p>
	<p>
		These are useful descriptive phrases. They are not two additional formal metrology quantities.
	</p>
	<table>
		<tr><td>Statement</td><td>More explicit interpretation</td></tr>
		<tr><td>“Each piece must be within 0.10 mm of 50 mm.”</td><td>A dimensional tolerance</td></tr>
		<tr><td>“The standard deviation of cut lengths must not exceed 0.02 mm under the specified test.”</td><td>A process precision requirement</td></tr>
		<tr><td>“The machine adjusts in 0.01 mm increments.”</td><td>A command or positioning increment</td></tr>
		<tr><td>“The sampled readings have a standard deviation of 0.015 mm.”</td><td>An observed sample spread, subject to sampling and measurement limitations</td></tr>
	</table>
	<p>
		A specification states what is required. A manufacturer's claim states expected performance under stated conditions. Observations provide evidence of what was achieved.
	</p>
	<p>
		A tolerance alone does not predict the distribution of results. A precision requirement alone does not establish agreement with the target.
	</p>
	<h3>What does 1 mm mean in centimetres?</h3>
	<p>
		<strong>1 cm = 10 mm</strong>, so <strong>1 mm = 0.1 cm</strong>.
	</p>
	<p>
		A tolerance of ±1 mm around 5 cm therefore gives limits of <strong>4.9 cm and 5.1 cm</strong>.
	</p>
	<p>
		The values 4.999 cm and 5.001 cm are only <strong>±0.001 cm = ±0.01 mm = ±10 µm</strong> from the target.
	</p>
	<p>
		“Precision of 1 mm” is incomplete. The specification must identify whether 1 mm refers to a standard deviation, a range, a maximum deviation, a positioning increment or another quantity. A claim about “most pieces” also needs a defined proportion and supporting distributional evidence.
	</p>
	<h3>What do two very similar readings show?</h3>
	<p>
		Suppose two pieces give readings of <strong>5.010001 cm</strong> and <strong>5.010006 cm</strong>.
	</p>
	<p>
		The following arithmetic treats the stated readings as numerical inputs. The extra digits are retained to explain their relationships; they do not establish the capabilities of a real measuring instrument.
	</p>
	<table>
		<tr><td>Quantity</td><td>Centimetres</td><td>Millimetres</td></tr>
		<tr><td>Design target</td><td>5.000000</td><td>50.000000</td></tr>
		<tr><td>Piece A reading</td><td>5.010001</td><td>50.100010</td></tr>
		<tr><td>Piece B reading</td><td>5.010006</td><td>50.100060</td></tr>
		<tr><td>Mean reading</td><td>5.0100035</td><td>50.100035</td></tr>
		<tr><td>Mean minus target</td><td>+0.0100035</td><td>+0.100035</td></tr>
		<tr><td>Difference between readings</td><td>0.000005</td><td>0.000050</td></tr>
		<tr><td>Sample standard deviation, using n − 1</td><td>≈0.00000354</td><td>≈0.0000354</td></tr>
	</table>
	<p>
		For two readings, the sample standard deviation is their absolute difference divided by √2.
	</p>
	<p>
		The readings differ by <strong>0.000050 mm = 0.050 µm = 50 nm</strong>. Their mean is <strong>0.100035 mm</strong> above the target.
	</p>
	<p>
		The supported description is: <strong>these two readings agree closely with one another and both lie above the target</strong>.
	</p>
	<h3>What cannot be inferred from two pieces?</h3>
	<p>
		Two readings provide a very weak estimate of continuing process variation. The sample standard deviation has only one degree of freedom.
	</p>
	<p>
		They do not establish long-term repeatability, process stability, a systematic cutting bias or the proportion of future pieces that will meet a tolerance. One measurement per piece also cannot separate measurement variation from actual variation between pieces.
	</p>
	<p>
		The positive mean offset may reflect a cutting offset, a measurement offset, other effects or a combination. Repeated sampling and a characterised measuring system are needed to investigate the cause.
	</p>
	<p>
		A 50 nm difference over approximately 50 mm is demanding to substantiate for cut metal. Suitable resolution alone is insufficient; the measurement method and uncertainty must support the comparison.
	</p>
	<h3>Are the pieces acceptable?</h3>
	<p>
		Acceptance depends on the tolerance and the decision rule.
	</p>
	<p>
		Against ±1 mm limits, both indicated values lie inside the permitted interval. Against ±0.01 mm limits, both lie outside it.
	</p>
	<p>
		Against ±0.10 mm limits, the upper limit is 50.100000 mm. The readings exceed it by only 10 nm and 60 nm respectively. Their numerical positions are clear, but a defensible acceptance decision requires measurement uncertainty and an agreed rule for decisions near the boundary.
	</p>
	<h3>What follows?</h3>
	<p>
		Specify the target, acceptable limits and required consistency separately. Report observed spread with its conditions and sample size. Keep statements about the cutting process distinct from statements about the measuring system.
	</p>
	<h3>Where can I read more?</h3>
	<p>
		<a class="content-link XURL" href="/science/measurement" data-target="science/measurement" data-title="Measurement, resolution and uncertainty">Measurement, resolution and uncertainty</a> explains what a reading tells us about a piece. <a class="content-link XURL" href="/science/measurement/significant_figures" data-target="science/measurement/significant_figures" data-title="Significant figures and rounding">Significant figures and rounding</a> explains how many digits to retain.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>