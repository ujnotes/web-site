<div id='message'>
	<p>
		Must be stored in db.
	</p>
	<p>
		Create Procedure Present (@dateX datetime).
	</p>
	<p>
		Returns Varchar.
	</p>
	<p>
		As.
	</p>
	<h2>Begin</h2>
	<p>
		Declare @status varchar.
	</p>
	<h4>If @dateX IS NULL</h4>
	<p>
		Set @status = "Absent".
	</p>
	<h4>else</h4>
	<p>
		Set @status = "Present".
	</p>
	<p>
		Return @status.
	</p>
	<p>
		End.
	</p>
	<p>
		Go.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
