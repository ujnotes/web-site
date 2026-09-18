<div id='message'>
		<p>
		Scope: distributed computing and database systems.
	</p>
	<h2>Statement</h2>
	<p>
		It is impossible for a distributed computing / database system to simultaneously provide the three:
	</p>
	<h4>Consistency</h4>
	<p>
		Every read receives the most recent write or an error. This means that the system appears as if there is a single copy of the data, and all reads will return the same value.
	</p>
	<h4>Availability</h4>
	<p>
		Every request receives a (non-error) response — without the guarantee that it contains the most recent write. This ensures that the system is always up and running, and every query receives a reply.
	</p>
	<h4>Partition tolerance</h4>
	<p>
		The system continues to operate despite an arbitrary number of messages being dropped (or delayed) by the network between nodes. In essence, the system can withstand network failures.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>