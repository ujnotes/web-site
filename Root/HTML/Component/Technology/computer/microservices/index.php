<div id='message'>
		<p>
		Working notes on Microservices: Architecture Types, Components, Event Sourcing, and Saga.
	</p>
	<h2>Topics</h2>
	<h4>Architecture Types</h4>
	<p>
		Effectively two applications living in their own domain spaces. The new service slowly "strangles" the old one. The client has to be updated to use the new service.
	</p>
	<h4>Components</h4>
	<p>
		A microservices architecture composes one application from a suite of small services, each running in its own process and communicating with lightweight mechanisms. Services are built around business capabilities and are independently deployable by fully automated deployment machinery.
	</p>
	<h4>Event Sourcing</h4>
	<p>
		Event Sourcing is a design pattern used in software architecture, particularly in systems where maintaining a complete history of state changes is essential. Instead of storing just the current state of the data in a domain, Event Sourcing stores all changes as a series of events. These events can then be replayed to reconstruct the system's state at any point in time.
	</p>
	<h4>Saga</h4>
	<p>
		In distributed systems, especially in microservices architectures, managing transactions across multiple services can be complex. Unlike monolithic systems where a single database transaction can handle operations, each microservice might have its own database. Ensuring data consistency across these services is where the Saga pattern comes in.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>