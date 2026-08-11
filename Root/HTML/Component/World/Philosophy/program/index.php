<?php $alt='Programming code on a computer screen'; require('../HTML/Fragment/Component_cover.php') ?>
<h2 class='center'><?php echo $desc; ?></h2>
<div id='message'>
		<h3>What is a program?</h3>
	<p>
		A program is an organized set of instructions that tells a computer what to do.
	</p>
	<p>
		A computer may be able to add, compare, store, copy and communicate. A program arranges these basic abilities into a particular activity: calculating a bill, displaying a page, guiding a vehicle or generating a sentence.
	</p>
	<p>
		The computer supplies the possible operations. The program selects and orders them.
	</p>
	<p>
		In short, a program turns a general machine into a particular tool.
	</p>
	<h3>Is a program the same as an algorithm?</h3>
	<p>
		No.
	</p>
	<p>
		An <a class="content-link XURL" href="/world/philosophy/algorithm" data-target="world/philosophy/algorithm" data-title="algorithm">algorithm</a> is a definite method for performing a task or solving a problem. A program is an expression of one or more algorithms in a form that a computer can execute.
	</p>
	<p>
		The method for sorting names alphabetically is an algorithm. Its instructions written in Python, JavaScript or machine code form a program.
	</p>
	<p>
		The same algorithm can be expressed through different programs. A single program can also contain many algorithms.
	</p>
	<h3>What is an instruction?</h3>
	<p>
		An instruction asks the computer to perform one available operation.
	</p>
	<p>
		It may tell the computer to:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Load or store some data</div></li>
		<li><div>Add or compare values</div></li>
		<li><div>Choose between two paths</div></li>
		<li><div>Repeat a group of instructions</div></li>
		<li><div>Receive input or produce output</div></li>
	</ul>
	<p>
		Each instruction is small. Useful behaviour appears when many such instructions cooperate.
	</p>
	<p>
		A recipe provides a simple analogy. “Heat the pan” is one instruction. It does little alone, but becomes meaningful as part of an ordered procedure.
	</p>
	<h3>Why does order matter?</h3>
	<p>
		Later instructions often depend upon earlier results.
	</p>
	<p>
		If a program tries to display a total before calculating it, the correct ingredients may all be present while the result is still wrong.
	</p>
	<p>
		Order also matters when the world changes. A navigation program must learn the present location before deciding which turn comes next.
	</p>
	<p>
		A program is therefore not merely a bag of commands. It is a structure of dependencies through time.
	</p>
	<h3>How does a program make choices?</h3>
	<p>
		Programs use conditions.
	</p>
	<p>
		A thermostat might follow a rule such as:
	</p>
	<pre class='indent-c'><code class='block'>if the room is colder than the chosen temperature:
    turn the heater on
else:
    turn the heater off</code></pre>
	<p>
		The condition connects information with action.
	</p>
	<p>
		More complex programs may examine many conditions, estimate uncertainty or compare several possible outcomes. But the basic idea remains: different information can lead the computation along different paths.
	</p>
	<h3>Why do programs repeat steps?</h3>
	<p>
		Many tasks contain the same operation more than once.
	</p>
	<p>
		A program can examine every name in a list, every pixel in an image or every measurement from a sensor by repeating a set of instructions.
	</p>
	<p>
		This repetition is called a loop.
	</p>
	<p>
		Without loops, a programmer would need to write nearly identical instructions again and again. A loop compresses the repeated pattern into a rule: continue until the work is complete or a condition changes.
	</p>
	<h3>What are data and state?</h3>
	<p>
		Data is information represented in a form the program can process.
	</p>
	<p>
		State is the information that describes the program's present situation.
	</p>
	<p>
		In a music player, the audio file is data. The current track, volume and playback position are part of the state.
	</p>
	<p>
		State gives the past a way to affect the future. When a program remembers that you have already signed in, an earlier event changes what it does now.
	</p>
	<h3>What is source code?</h3>
	<p>
		Source code is a program written in a language intended to be read and changed by people.
	</p>
	<p>
		Programming languages provide words, symbols and rules for expressing instructions precisely. They let a programmer name information, divide work into parts and describe choices and repetition.
	</p>
	<p>
		A <a class="content-link XURL" href="/computer" data-target="computer" data-title="computer">computer</a> does not usually execute high-level source code directly. Another program translates or interprets it into operations the machine can perform.
	</p>
	<p>
		This creates layers of meaning: human ideas become source code, source code becomes lower-level instructions, and those instructions become physical changes in hardware.
	</p>
	<h3>What is a bug?</h3>
	<p>
		A bug is a defect that makes a program behave differently from what was intended.
	</p>
	<p>
		The computer may execute every instruction correctly and still produce the wrong result because the instructions themselves are wrong.
	</p>
	<p>
		A program that calculates a discount before checking whether the customer qualifies is not disobeyed by the machine. It faithfully carries out a mistaken procedure.
	</p>
	<p>
		This is why testing matters. A program should be tried with ordinary cases, boundary cases and unexpected input. Testing cannot prove that a large program has no defects, but it can expose failures before they cause harm.
	</p>
	<h3>Can a program change itself?</h3>
	<p>
		A program can change stored data, and that data may influence its later behaviour.
	</p>
	<p>
		A learning system goes further: experience changes its internal <a class="content-link XURL" href="/world/philosophy/model" data-target="world/philosophy/model" data-title="model">model</a>, which changes how future inputs are handled.
	</p>
	<p>
		This is sometimes described loosely as a program rewriting itself. Usually, however, the learning rules remain part of the program while adjustable values within the model change.
	</p>
	<p>
		The distinction matters. A system can acquire new behaviour without becoming free from the rules that govern how it learns.
	</p>
	<h3>Is a program intelligent?</h3>
	<p>
		Not by itself.
	</p>
	<p>
		A short fixed program may follow a clever rule without understanding anything. A larger program may perceive patterns, learn from examples, draw <a class="content-link XURL" href="/world/philosophy/inference" data-target="world/philosophy/inference" data-title="inferences">inferences</a> and make <a class="content-link XURL" href="/world/philosophy/decision" data-target="world/philosophy/decision" data-title="decisions">decisions</a>.
	</p>
	<p>
		Whether that behaviour counts as <a class="content-link XURL" href="/world/philosophy/intelligence" data-target="world/philosophy/intelligence" data-title="intelligence">intelligence</a> depends upon its flexibility, understanding and success across situations—not merely upon the fact that code is running.
	</p>
	<p>
		A program is a means of organizing computation. Intelligence is one possible result.
	</p>
	<h3>So what is a program, finally?</h3>
	<p>
		A program is information that organizes the operations of a computer.
	</p>
	<p>
		It receives data, preserves state, makes choices, repeats work and produces results. Its instructions may express algorithms, use models and change their behaviour through learning.
	</p>
	<p>
		Hardware provides the physical ability to compute. A program gives that ability a temporary purpose.
	</p>
	<p>
		That is why one machine can become many different tools without being rebuilt.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
