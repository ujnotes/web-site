<div id='message'>
	<p>
		Event Sourcing is a design pattern used in software architecture, particularly in systems where maintaining a complete history of state changes is essential. Instead of storing just the current state of the data in a domain, Event Sourcing stores all changes as a series of events. These events can then be replayed to reconstruct the system's state at any point in time.
	</p>
	<h2>Concept</h2>
	<p>
		<strong>Events over state.</strong> Rather than storing the current state of entities, the system stores a stream of events that have occurred over time. Each event represents a change to the state.
	</p>
	<p>
		<strong>Reconstructing state.</strong> By replaying these events, you can reconstruct the current state or any previous state of an entity. This replay can happen on-demand, or the system can periodically generate snapshots to optimize retrieval times.
	</p>
	<h2>Key components</h2>
	<ul class="list-bullet content-list">
		<li><div><strong>Event Store</strong> — storage optimized for append-only operations where events are stored.</div></li>
		<li><div><strong>Aggregates</strong> — domain-driven design (DDD) concept. In event sourcing, an aggregate loads its state by replaying events from the event store.</div></li>
		<li><div><strong>Snapshots</strong> — periodically create snapshots of an entity's state. Reconstruction starts from the latest snapshot and then applies only the events since that snapshot.</div></li>
	</ul>
	<h2>Benefits</h2>
	<ul class="list-bullet content-list">
		<li><div><strong>Complete audit trail</strong> — a complete history of all changes; useful where auditing is essential.</div></li>
		<li><div><strong>Temporal queries</strong> — the state of the system at any point in time.</div></li>
		<li><div><strong>Event-driven architectures</strong> — fits naturally with CQRS (Command Query Responsibility Segregation) and event stream processors.</div></li>
		<li><div><strong>Rebuild state</strong> — if there's a bug, fix it and rebuild the state from events.</div></li>
	</ul>
	<h2>Challenges</h2>
	<ul class="list-bullet content-list">
		<li><div><strong>Event versioning</strong> — the structure of events might change, which makes processing older events harder.</div></li>
		<li><div><strong>Event volume</strong> — high volumes of events can lead to storage and performance challenges.</div></li>
		<li><div><strong>Complexity</strong> — especially where a simpler CRUD model might suffice.</div></li>
		<li><div><strong>Data privacy</strong> — in systems where data may need to be erased (e.g. due to GDPR), removing individual events that contain a user's personal data can be challenging.</div></li>
	</ul>
	<h2>When to use</h2>
	<ul class="list-bullet content-list">
		<li><div><strong>Auditing requirements</strong> — systems that need a detailed audit log, like financial systems.</div></li>
		<li><div><strong>Complex business processes</strong> — intricate business rules that benefit from a detailed history of events.</div></li>
		<li><div><strong>Systems with predictive analysis</strong> — the history of changes as a dataset for analytics and predictions.</div></li>
	</ul>
	<h2>Best practices</h2>
	<ul class="list-bullet content-list">
		<li><div><strong>Versioning</strong> — a strategy for event versioning to handle changes in event structure over time.</div></li>
		<li><div><strong>Snapshotting</strong> — snapshots to optimize recreation of state from long event streams.</div></li>
		<li><div><strong>Integration with CQRS</strong> — combining Event Sourcing with CQRS can separate reads and writes.</div></li>
	</ul>
	<p>
		Event Sourcing persists events as the primary source of truth, then reconstructs state from those events.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
