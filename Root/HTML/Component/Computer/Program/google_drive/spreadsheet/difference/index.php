<div id='message'>
	<p>
		Working notes on Difference: Unique.
	</p>
	<p>
		Difference.
	</p>
	<p>
		=FILTER( Total!B2:B, NOT ( COUNTIF('Total-discarded'!B2:B, Total!B2:B) )).
	</p>
	<h2>Unique</h2>
	<p>
		Unique().
	</p>
	<p>
		Not empty.
	</p>
	<p>
		=Sort(F2:F, LEN(TRIM(arrayformula(F2:F)))&gt;0)).
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
