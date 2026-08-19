<div id='message'>
	<p>
		Acronym. Design principles. Object-oriented paradigm.
	</p>
	<p>
		Aim: maintainability, reusable, scale, flexibility.
	</p>
	<p>
		The principles are a subset of many principles promoted by American software engineer and instructor Robert C. Martin. Implementing them can help create more maintainable, scalable, and robust systems. Apply them judiciously; too rigid and they over-complicate. They are guidelines, not laws.
	</p>
	<h2>Single Responsibility Principle (SRP)</h2>
	<p>
		A class should have a single responsibility — one "reason to change". Divide at class level.
	</p>
	<p>
		Example: File (read, write) versus a FileRead class and a FileWrite class.
	</p>
	<p>
		A class should have only one job. If a class assumes multiple responsibilities, it becomes more difficult to maintain and understand.
	</p>
	<h2>Open/Closed Principle (OCP)</h2>
	<p>
		Open for extension but closed for modification.
	</p>
	<p>
		Software entities (classes, modules, functions, etc.) should be open for extension but closed for modification. The behavior of a module can be extended without modifying its source code. Typically this is achieved using interfaces or abstract classes.
	</p>
	<h2>Liskov Substitution Principle (LSP)</h2>
	<p>
		Objects in a program should be replaceable with instances of their subtypes without altering the correctness of that program. This extends OCP to subclassing: a subclass can stand in for its parent class without any issues.
	</p>
	<h2>Interface Segregation Principle (ISP)</h2>
	<p>
		No client should be forced to depend on methods it does not use. Interfaces should be specific to the client that uses them, rather than one general-purpose interface. This reduces the side effects of changes and avoids clients implementing methods they don't need.
	</p>
	<h2>Dependency Inversion Principle (DIP)</h2>
	<p>
		High-level modules should not depend on low-level modules. Both should depend on abstractions. Additionally, abstractions should not depend on details; details should depend on abstractions. This reduces the direct dependency between high-level and low-level modules.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
