<div id='message'>
		<p>
		Working notes on MS SQL: Case, Column condition, Datediff as time, Function, Procedure, and Temprorary Tables.
	</p>
	<h2>Topics</h2>
	<h4>Case</h4>
	<p>
		IS NULL Then "Absent" else "" end as _B_.
	</p>
	<h4>Column condition</h4>
	<p>
		Case when Z.xDate IS NULL Then "Absent" else "Present" end as _B_.
	</p>
	<h4>Datediff as time</h4>
	<p>
		CONVERT(varchar(12), DATEADD(ms, DATEDIFF(ms, @dt1, @dt2), 0), 114).
	</p>
	<h4>Function</h4>
	<p>
		Must be stored in db.
	</p>
	<h4>Procedure</h4>
	<p>
		Create Procedure @Present (@dateX datetime).
	</p>
	<h4>Temprorary Tables</h4>
	<p>
		Global.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>