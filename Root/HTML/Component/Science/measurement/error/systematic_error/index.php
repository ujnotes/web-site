<div id='message'>
		<?php $alt='A vernier caliper measuring a cut metal piece on a workbench; an illustrative AI-generated photograph.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is systematic error?</h3>
	<p>
		<strong>Systematic error is the component of measurement error that stays constant or changes predictably in repeated measurements under the stated conditions.</strong> A set of readings can agree closely while all being displaced from a reference. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.17.html" target="_blank" rel="noopener noreferrer">VIM: systematic measurement error</a>.
	</p>
	<p>
		Imagine a balance that reads 0.3 g when its pan is empty. If that uncorrected offset remains constant, it adds 0.3 g to each indication. Weighing the same object repeatedly does not make the offset disappear.
	</p>
	<h3>Must systematic error always be constant?</h3>
	<p>
		No. The effect may depend on the value being measured or on the operating conditions.
	</p>
	<p>
		A zero offset adds a roughly constant amount. A scale-factor error changes readings in proportion to their size. A temperature-dependent effect may change as the instrument warms up.
	</p>
	<p>
		These are examples of possible behaviour, not diagnoses from a single reading. The actual relationship needs evidence across the relevant range and conditions.
	</p>
	<h3>Why does averaging fail to remove an offset?</h3>
	<p>
		Suppose a stable reference is assigned 100.0 g. Three illustrative readings are:
	</p>
	<p>
		<strong>100.2 g, 100.3 g and 100.4 g.</strong>
	</p>
	<p>
		Their mean is <strong>100.3 g</strong>, which is <strong>0.3 g above the reference</strong>. Averaging has summarised the readings; it has not established why their mean is high.
	</p>
	<p>
		If every reading contains the same +0.3 g offset, their mean contains it too. Many readings can give a very stable average that remains displaced. A small sample alone cannot establish the size or persistence of a systematic effect.
	</p>
	<h3>How can a systematic effect be investigated?</h3>
	<p>
		Compare the measuring system with suitable standards and examine its behaviour under the conditions in which it will be used.
	</p>
	<p>
		Useful checks may include:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Zero:</strong> does the instrument indicate correctly at zero?</div></li>
		<li><div><strong>Range:</strong> does the discrepancy change with the value?</div></li>
		<li><div><strong>Conditions:</strong> do temperature, alignment or loading affect the result?</div></li>
		<li><div><strong>Method:</strong> does an independent suitable method reveal a shared problem?</div></li>
	</ul>
	<p>
		Close agreement between two instruments is useful evidence, but both may share a reference or a method that introduces the same effect.
	</p>
	<h3>What is the difference between calibration and adjustment?</h3>
	<p>
		<strong>Calibration</strong> establishes relationships between standards, indications and measurement results, with associated uncertainties. <strong>Adjustment</strong> changes the measuring system so that it gives prescribed indications.
	</p>
	<p>
		A calibration certificate does not necessarily mean the instrument was adjusted. Its information may instead need to be applied as a correction when interpreting a reading. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.39.html" target="_blank" rel="noopener noreferrer">VIM: calibration</a>.
	</p>
	<h3>How does a correction work?</h3>
	<p>
		If a valid calibration establishes that an indication is high by 0.3 g in the relevant conditions, an additive correction is <strong>−0.3 g</strong>.
	</p>
	<p>
		For an indication of 120.8 g:
	</p>
	<p>
		<strong>Corrected value = 120.8 g − 0.3 g = 120.5 g.</strong>
	</p>
	<p>
		That correction is appropriate only where the established relationship applies. Other instruments may require a factor or a calibration curve instead of a constant subtraction. <a class="content-link" href="https://jcgm.bipm.org/vim/en/2.53.html" target="_blank" rel="noopener noreferrer">VIM: correction</a>.
	</p>
	<p>
		The corrected result still has uncertainty, including uncertainty in the correction and any remaining effects.
	</p>
	<h3>What follows?</h3>
	<p>
		A small spread shows consistency under the tested conditions. It cannot establish that a common offset is absent. To investigate systematic effects, use references and comparisons that can reveal what repetition alone may hide.
	</p>
	<p>
		Read <a class="content-link XURL" href="/science/measurement/error" data-target="science/measurement/error" data-title="Measurement Error">Measurement Error</a> for the wider distinction, or <a class="content-link XURL" href="/science/measurement/error/random_error" data-target="science/measurement/error/random_error" data-title="Random Error">Random Error</a> for unpredictable variation.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>