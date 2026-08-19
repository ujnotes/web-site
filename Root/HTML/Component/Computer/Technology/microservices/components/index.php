<div id='message'>
	<p>
		A microservices architecture composes one application from a suite of small services, each running in its own process and communicating with lightweight mechanisms. Services are built around business capabilities and are independently deployable by fully automated deployment machinery.
	</p>
	<ol class="list-number content-list">
		<li><div><strong>Individual Service Components</strong> — single responsibility: each microservice implements a specific business capability. Independent deployment: each service can be deployed, upgraded, and scaled independently.</div></li>
		<li><div><strong>Service Database</strong> — each microservice can have its own database, so services are loosely coupled and can evolve independently.</div></li>
		<li><div><strong>API Gateway</strong> — entry point for clients. Request dispatching, composition, and protocol translation; can streamline a set of microservices into a single API. Manages request rate limiting, security, caching, etc.</div></li>
		<li><div><strong>Service Discovery</strong> — find and communicate with each other without hardcoding service addresses. Often uses a service registry where services register their locations.</div></li>
		<li><div><strong>Load Balancer</strong> — distributes incoming requests to service instances so no single instance is overwhelmed.</div></li>
		<li><div><strong>Communication Protocols</strong> — HTTP/REST, RPC, or messaging.</div></li>
		<li><div><strong>Centralized Configuration Management</strong> — configuration of service environments separate from the service code and binaries.</div></li>
		<li><div><strong>Circuit Breaker</strong> — detect failures and encapsulate the logic of preventing a failure from constantly recurring. Helps prevent system failures and maintain resilience.</div></li>
		<li><div><strong>Logging and Monitoring</strong> — diagnose and monitor health and performance. Centralized logging can provide an aggregated view of logs across services.</div></li>
		<li><div><strong>Containerization and Orchestration</strong> — package into containers (e.g. Docker) which include everything needed to run them. Orchestration tools like Kubernetes manage and scale these containers.</div></li>
		<li><div><strong>Authentication and Authorization</strong> — only legitimate requests are processed. Can be centralized or managed by individual services.</div></li>
		<li><div><strong>Event-Driven Architecture</strong> — services produce or consume events. Helps decouple services and ensure asynchronous communication.</div></li>
		<li><div><strong>API Composition</strong> — for requests that span multiple services, intermediate layer(s) compose the result from various services.</div></li>
		<li><div><strong>Versioning</strong> — evolve the microservices over time without affecting the consumers.</div></li>
		<li><div><strong>Backup and Replication</strong> — data safety and availability in case of failures.</div></li>
		<li><div><strong>Decentralized Data Management</strong> — each microservice has its own view on data models, which may be different from other services.</div></li>
	</ol>
	<p>
		These components collectively aim at a scalable, maintainable, and resilient architecture. Microservices also introduce complexity; consider the trade-offs against the project's requirements.
	</p>
	<p>
		ChatGPT 4 — 23/10/2023.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
