<div id='message'>
	<h2>Strangler</h2>
	<p>
		Effectively two applications living in their own domain spaces. The new service slowly "strangles" the old one. The client has to be updated to use the new service.
	</p>
	<h2>Saga</h2>
	<p>
		Needed when there are many services with their own respective database, and transactions require a long time.
	</p>
	<p>
		Two ways:
	</p>
	<h4>Orchestrated</h4>
	<p>
		Centralised. A central service keeps track and asks others to roll back in case of an error.
	</p>
	<h4>Choreographed</h4>
	<p>
		Each service raises events and listens. In case of an error all roll back.
	</p>
	<h2>Aggregator</h2>
	<p>
		A central service aggregates responses from multiple services. Send this aggregate response to the client.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
