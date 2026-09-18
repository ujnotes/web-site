<div id='message'>
		<?php $alt='A programmable computer receiving information, processing it through connected modules, and producing an action'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a computer?</h3>
	<p>
		Our world has been transformed by machines that can calculate, remember, communicate and control other machines with extraordinary speed.
	</p>
	<p>
		They can show us distant places, create virtual worlds, guide aircraft, connect people across continents and perform billions of small operations before we notice that any time has passed.
	</p>
	<p>
		But what is a computer?
	</p>
	<p>
		<strong>The word can be separated into 'compute' + 'er'.</strong>
	</p>
	<p>
		Just as a teacher is one who teaches, a computer is one that computes.
	</p>
	<p>
		The word originally described people who performed calculations. A computer can also be mechanical, chemical or electronic. What matters is not what it is made of, but what it does.
	</p>
	<p>
		A computer is a system that receives information, transforms it according to rules and produces a result.
	</p>
	<h3>What does it mean to compute?</h3>
	<p>
		To compute is to determine something by following a definite process.
	</p>
	<p>
		The problem may be numerical:
	</p>
	<ul class="list-bullet content-list">
		<li><div>What is 27 multiplied by 14?</div></li>
		<li><div>How much electrical energy has been used?</div></li>
		<li><div>Where will a moving object be after ten seconds?</div></li>
	</ul>
	<p>
		Or it may be logical:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Are these two values equal?</div></li>
		<li><div>Is the door open?</div></li>
		<li><div>Which of these possibilities satisfies the given conditions?</div></li>
	</ul>
	<p>
		Computation turns given information into new information.
	</p>
	<p>
		A computer is therefore an <strong>information processor</strong>. Its physical parts are necessary, but the purpose of those parts is to represent, carry, store and transform information.
	</p>
	<h3>Can a simple object be a computer?</h3>
	<p>
		Consider a beam balance.
	</p>
	<p>
		Place one object on each side. The balance will lean left, lean right or remain horizontal. From its position we learn whether the first object is heavier, lighter or equal in weight to the second.
	</p>
	<p>
		The balance has received two physical inputs, compared them and produced an output.
	</p>
	<p>
		In this broad sense, it is a simple mechanical computer—a comparator.
	</p>
	<?php $img_title='mechanical-computer'; $ext='svg'; $alt='A beam balance using two weights as inputs and its position as the result'; $center='true'; require('Fragment/Component_image.php') ?>
	<p>
		Its computation may be described as:
	</p>
	<pre class='indent-c'><code class='block'>if the left side is heavier:
    lean left
else if the right side is heavier:
    lean right
else:
    remain horizontal</code></pre>
	<p>
		The balance does not use electronic circuits, binary numbers or written code. Yet its physical arrangement performs a definite logical operation.
	</p>
	<h3>What are input, processing and output?</h3>
	<p>
		Every computation needs some information to begin with. This is the <strong>input</strong>.
	</p>
	<p>
		The computer then changes, compares, combines or stores that information. This is the <strong>processing</strong>.
	</p>
	<p>
		The result is the <strong>output</strong>.
	</p>
	<p>
		In a balance:
	</p>
	<ul class="list-bullet content-list">
		<li><div>The objects and their weights provide the input.</div></li>
		<li><div>The beam and pivot perform the comparison.</div></li>
		<li><div>The direction of the beam provides the output.</div></li>
	</ul>
	<p>
		In a digital calculator:
	</p>
	<ul class="list-bullet content-list">
		<li><div>The pressed keys provide the input.</div></li>
		<li><div>Electronic circuits perform the arithmetic.</div></li>
		<li><div>The display provides the output.</div></li>
	</ul>
	<p>
		The forms differ, but the relationship remains:
	</p>
	<blockquote>
		input → processing → output
	</blockquote>
	<?php $img_title='input-processing-output'; $ext='svg'; $alt='Information flowing from input through processing to output'; $center='true'; require('Fragment/Component_image.php') ?>
	<h3>What makes a computer fixed or programmable?</h3>
	<p>
		Some computers perform one built-in procedure. Others can be given different procedures.
	</p>
	<p>
		A <strong>fixed computer</strong> has its procedure built into its physical structure. A beam balance always compares weights. Changing its task requires changing the mechanism itself.
	</p>
	<p>
		A <strong>programmable computer</strong> receives its instructions as information, from a separate unit. Changing those instructions changes the task without rebuilding the machine.
	</p>
	<p>
		The Jacquard loom showed this principle with punched cards that controlled different woven patterns. The loom remained the same, but changing the cards changed what it produced.
	</p>
	<p>
		This is the difference between a machine made for one procedure and a machine that can follow many programs.
	</p>
	<?php $img_title='fixed-and-programmable'; $ext='svg'; $alt='A fixed computer must be rebuilt to change its task, while a programmable computer changes task when its instructions change'; $center='true'; require('Fragment/Component_image.php') ?>
	<h3>What is hardware?</h3>
	<p>
		Hardware is what the computer is physically.
	</p>
	<p>
		It includes every material part through which information is represented and transformed.
	</p>
	<p>
		In the beam balance, the beam, pivot and pans are hardware. In an electronic computer, hardware includes the processor, memory, storage, wires, screen, keyboard and countless tiny switches.
	</p>
	<p>
		Hardware determines which physical operations are possible. But hardware alone does not explain which particular task the machine is performing.
	</p>
	<h3>What is software?</h3>
	<p>
		Software describes what a programmable computer does logically.
	</p>
	<p>
		It is a collection of instructions and associated information represented within hardware. It is not independent of the physical world—the instructions must always exist in some physical form—but the same logical software can be represented by different physical arrangements.
	</p>
	<p>
		This is why the same program can be copied from one compatible computer to another. The material carrying it changes, while the pattern and meaning of its instructions are preserved.
	</p>
	<p>
		Hardware is the machine's physical arrangement. Software is the organized information that directs its operation.
	</p>
	<h3>What is an algorithm?</h3>
	<p>
		An algorithm is a definite procedure for solving a problem or performing a task.
	</p>
	<p>
		It describes what must be done and in what order. An algorithm may include:
	</p>
	<ul class="list-bullet content-list">
		<li><div>A sequence of steps</div></li>
		<li><div>A choice between alternatives</div></li>
		<li><div>The repetition of steps until a condition is met</div></li>
		<li><div>The storage and reuse of intermediate results</div></li>
	</ul>
	<p>
		The algorithm is not necessarily a computer program. A cooking recipe, a method of long division and directions for finding a place can all be algorithms.
	</p>
	<p>
		A program is an algorithm expressed in a form that a particular computer can follow.
	</p>
	<h3>How are complex computations built?</h3>
	<p>
		Large tasks can usually be broken into smaller tasks.
	</p>
	<p>
		A simple unit may compare two values. Another may add numbers. Another may remember a result. Another may choose which operation happens next.
	</p>
	<p>
		The output of one unit becomes the input of another. By connecting many simple operations, a computer can perform a far more complex operation.
	</p>
	<p>
		An electrical energy meter provides a useful example. It measures voltage and current, uses them to determine power, and accumulates that power over time to determine energy use.
	</p>
	<p>
		What appears to be one computation is actually a coordinated collection of smaller computations.
	</p>
	<p>
		This modularity is fundamental. A complex computer is not one mysterious mechanism. It is an organization of simpler mechanisms whose information channels are connected.
	</p>
	<h3>Why does a computer need memory?</h3>
	<p>
		Many computations cannot be completed in a single step.
	</p>
	<p>
		An intermediate result must be preserved so that a later operation can use it. Memory is the ability to maintain information well enough for it to affect a future step.
	</p>
	<p>
		Small temporary locations inside a processor are called registers. A commonly used register for accumulated results has historically been called an accumulator.
	</p>
	<p>
		Larger memories preserve programs and data for longer periods.
	</p>
	<p>
		Memory allows operations separated in time to cooperate. One operation leaves a result; another finds it and continues the work.
	</p>
	<h3>What are instructions and programs?</h3>
	<p>
		An instruction tells a computer to perform one of the operations available to it: add, compare, copy, store, jump or communicate.
	</p>
	<p>
		A sequence of instructions is a program.
	</p>
	<p>
		A program is like the musical score followed by an orchestra. The individual instruments can produce only certain sounds, but the score coordinates them into something much larger.
	</p>
	<p>
		The same physical computer can follow different programs. One program makes it behave like a calculator. Another makes it a word processor. Another helps control an aircraft.
	</p>
	<h3>Can a computer perform an operation it was not directly built for?</h3>
	<p>
		Suppose a simple computer can add, subtract, store a value and repeat instructions, but has no direct multiplication operation.
	</p>
	<p>
		Multiplication can be performed through repeated addition:
	</p>
	<pre class='indent-c'><code class='block'>receive n
receive x
set result to 0

repeat n times:
    result = result + x

show result</code></pre>
	<p>
		The hardware did not contain a separate multiplier. A program composed operations the machine already possessed and created the new ability.
	</p>
	<p>
		That program can then be reused as a larger instruction inside other programs.
	</p>
	<p>
		This is how computers become extendable. New layers of software turn earlier capabilities into building blocks for still more complex capabilities.
	</p>
	<h3>Why are modern computers electronic?</h3>
	<p>
		A computer can be made from many physical materials. Electronic systems became dominant because electrical states can be changed, transmitted and copied rapidly; electronic components can also be made extremely small and produced reliably in enormous numbers.
	</p>
	<p>
		Sensors convert changes in the world—such as light, pressure, sound or temperature—into electrical signals.
	</p>
	<p>
		Actuators perform the reverse journey. They use electrical signals to produce physical effects such as movement, sound, heat or light.
	</p>
	<p>
		Through sensors and actuators, a computer's information-processing world remains connected to the physical world.
	</p>
	<h3>Why are modern computers digital?</h3>
	<p>
		An analogue computer represents a quantity through another continuously varying quantity. A digital computer represents information using distinct states.
	</p>
	<p>
		Modern computers usually use two states, written as <strong>0</strong> and <strong>1</strong>, because two reliably distinguishable electrical conditions are comparatively easy to build, copy and protect from small disturbances.
	</p>
	<p>
		These digits do not inherently mean numbers. A pattern of bits may represent a number, letter, colour, sound, instruction or almost anything else, depending on the agreed method of interpretation.
	</p>
	<p>
		At its lowest level, a digital computer manipulates physical states. At higher levels, those states become symbols, instructions, images and worlds.
	</p>
	<h3>Why do computers appear so powerful?</h3>
	<p>
		Their power comes from two properties: <strong>generality</strong> and <strong>speed</strong>.
	</p>
	<p>
		A general-purpose computer can reduce many different tasks to sequences of simple operations. Faster hardware can perform more of those operations in a useful amount of time.
	</p>
	<p>
		Computers are not magical because each small operation is profound. They are powerful because simple, precise operations can be combined, repeated and performed extraordinarily quickly.
	</p>
	<p>
		Given enough time and memory, computers with the same general computational capability can in principle perform the same kinds of computable operations. In practice, speed, memory, energy and access to information determine what is actually useful.
	</p>
	<h3>Does a computer understand what it processes?</h3>
	<p>
		Not necessarily.
	</p>
	<p>
		A calculator can correctly manipulate numbers without knowing what a number means to a person. A computer can store a photograph without seeing it and process words without experiencing their meaning.
	</p>
	<p>
		The machine operates upon representations according to rules. Whether a particular computer also builds useful models, learns, understands or becomes intelligent requires additional abilities.
	</p>
	<p>
		Computation is a foundation of artificial intelligence, but computation and intelligence are not identical.
	</p>
	<h3>So what is a computer, finally?</h3>
	<p>
		A computer is a physical system that receives information, represents it, transforms it according to rules, may store intermediate results and produces information or action as output.
	</p>
	<p>
		It can be simple or complex, fixed or programmable, mechanical or electronic or chemical, analogue or digital.
	</p>
	<p>
		The modern computer's extraordinary versatility comes from treating both data and instructions as information. The same machine can therefore perform many different tasks merely by changing the program it follows.
	</p>
	<p>
		A computer is, finally, an engine for transforming information.
	</p>
	<p>
		<em>Written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>
	<div id='content-body-separator' class='center'></div>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>