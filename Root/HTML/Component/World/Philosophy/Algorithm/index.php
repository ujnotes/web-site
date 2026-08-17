<?php $alt='Close-up of programming code'; require('../HTML/Fragment/Component_cover.php') ?>
<h2 class='center'><?php echo $desc; ?></h2>
<div id='message'>
		<h3>What is an algorithm?</h3>
	<p>
		An algorithm is a definite procedure for performing a task or solving a class of problems.
	</p>
	<p>
		It begins with some input, follows a finite set of rules and produces an output.
	</p>
	<p>
		A recipe, a method of long division and a procedure for finding a name in an ordered list can all be algorithms.
	</p>
	<p>
		An algorithm is not a particular answer. It is a method for reaching answers.
	</p>
	<h3>What makes a procedure an algorithm?</h3>
	<p>
		A useful algorithm has several features:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Clear steps</strong> — each operation is stated precisely enough to be followed</div></li>
		<li><div><strong>Defined inputs</strong> — it is known what information the procedure receives</div></li>
		<li><div><strong>Defined outputs</strong> — it is known what result the procedure should produce</div></li>
		<li><div><strong>Termination</strong> — it finishes for the cases it claims to handle</div></li>
		<li><div><strong>Generality</strong> — it works for a class of cases, not only one memorized example</div></li>
	</ul>
	<p>
		“Find the best answer somehow” is not an algorithm. The work hidden inside “somehow” still needs to be described.
	</p>
	<h3>Is an algorithm the same as a program?</h3>
	<p>
		No.
	</p>
	<p>
		An algorithm describes the method. A <a class="content-link XURL" href="/world/philosophy/program" data-target="world/philosophy/program" data-title="program">program</a> expresses that method in instructions a computer can execute.
	</p>
	<p>
		The same algorithm may be written in different programming languages or carried out by a person with paper and pencil.
	</p>
	<p>
		A program also contains practical details beyond the central method: how input is read, errors are handled, memory is managed and results are shown.
	</p>
	<h3>How does an algorithm use smaller steps?</h3>
	<p>
		A difficult task becomes manageable when divided into simpler operations.
	</p>
	<p>
		To arrange books alphabetically, one procedure might:
	</p>
	<ol class="list-bullet content-list">
		<li><div>Compare two titles.</div></li>
		<li><div>Put the earlier title first.</div></li>
		<li><div>Repeat the comparison across the shelf.</div></li>
		<li><div>Continue until no title needs to move.</div></li>
	</ol>
	<p>
		Each comparison is simple. Their repeated organization produces the larger result.
	</p>
	<p>
		This is a central idea of computation: complex behaviour can be composed from small, precise operations.
	</p>
	<h3>Can two algorithms solve the same problem?</h3>
	<p>
		Yes.
	</p>
	<p>
		Imagine finding a name in a telephone directory.
	</p>
	<p>
		One method begins at the first page and checks every name. Another opens near the middle, decides whether the name must be earlier or later, and repeatedly halves the remaining pages.
	</p>
	<p>
		Both can find the name. The second usually needs far fewer steps because it uses the order already present in the directory.
	</p>
	<p>
		Choosing an algorithm therefore affects how much time, memory and energy the solution requires.
	</p>
	<h3>What is efficiency?</h3>
	<p>
		Efficiency describes the resources an algorithm needs as the problem grows.
	</p>
	<p>
		An approach that works quickly for ten items may become unusable for ten million. The important question is not only how long one example takes, but how the required work grows with the size of the input.
	</p>
	<p>
		Sometimes speed matters most. Sometimes memory, energy, accuracy or simplicity matters more.
	</p>
	<p>
		There is rarely one best algorithm without a purpose and a situation.
	</p>
	<h3>What is correctness?</h3>
	<p>
		An algorithm is correct when it produces the promised result for every valid input covered by its claim.
	</p>
	<p>
		A few successful examples are not enough. A method may work for ordinary values and fail for zero, an empty list or an unusually large number.
	</p>
	<p>
		Correctness can be supported by:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Careful reasoning about every step</div></li>
		<li><div>Proof for clearly defined procedures</div></li>
		<li><div>Tests using normal and difficult cases</div></li>
		<li><div>Comparison with an independent method</div></li>
	</ul>
	<p>
		Testing reveals errors. Reasoning explains why the method should continue to work beyond the examples tested.
	</p>
	<h3>Can an algorithm be biased?</h3>
	<p>
		Yes.
	</p>
	<p>
		An algorithm follows the distinctions, goals and data built into it.
	</p>
	<p>
		A hiring procedure may appear neutral while using past decisions that reflect unfair treatment. A recommendation system may optimize attention even when attention is gained through anger or fear.
	</p>
	<p>
		The steps can be executed exactly and the outcome can still be harmful.
	</p>
	<p>
		We should therefore ask not only whether an algorithm works, but:
	</p>
	<ul class="list-bullet content-list">
		<li><div>What is it trying to achieve?</div></li>
		<li><div>Which information does it use or ignore?</div></li>
		<li><div>Who bears the cost of an error?</div></li>
		<li><div>Can its result be examined and challenged?</div></li>
	</ul>
	<p>
		Precision does not remove judgement. It places judgement into the design.
	</p>
	<h3>Does an algorithm understand its task?</h3>
	<p>
		Not necessarily.
	</p>
	<p>
		A route-finding algorithm can discover a short path without knowing what travel feels like. A chess algorithm can choose a strong move without wanting to win.
	</p>
	<p>
		An algorithm describes a relation between inputs, operations and outputs. Understanding and <a class="content-link XURL" href="/world/philosophy/consciousness" data-target="world/philosophy/consciousness" data-title="consciousness">consciousness</a> are separate questions.
	</p>
	<p>
		We often use human words such as “choose”, “see” or “learn” to describe its operation. These words may describe the function correctly without implying an inner experience.
	</p>
	<h3>Are all problems algorithmic?</h3>
	<p>
		No.
	</p>
	<p>
		Some questions are vague because the desired answer has not been defined. Others depend upon values that cannot be reduced to one agreed measure.
	</p>
	<p>
		There are also precisely stated computational problems for which no algorithm can always produce the answer, and others whose known solutions require impractical amounts of time.
	</p>
	<p>
		A computer is powerful, but computation has limits.
	</p>
	<p>
		Recognizing that a problem is poorly defined, unknowable from the available information or beyond practical computation is itself important.
	</p>
	<h3>How do algorithms relate to intelligence?</h3>
	<p>
		Algorithms provide repeatable methods. <a class="content-link XURL" href="/world/philosophy/intelligence" data-target="world/philosophy/intelligence" data-title="Intelligence">Intelligence</a> includes recognizing which method fits the situation, adapting when it fails and sometimes inventing a better one.
	</p>
	<p>
		An intelligent system may use many algorithms for perception, memory, <a class="content-link XURL" href="/world/philosophy/learning" data-target="world/philosophy/learning" data-title="learning">learning</a>, inference and decision.
	</p>
	<p>
		The algorithms organize the work. Intelligence appears in how effectively the whole system understands and responds.
	</p>
	<h3>So what is an algorithm, finally?</h3>
	<p>
		An algorithm is a precise, repeatable path from input to output.
	</p>
	<p>
		Its quality depends upon correctness, efficiency and suitability for the real purpose. It can make reasoning reliable and scalable, but it cannot decide by itself which goals are worth pursuing.
	</p>
	<p>
		A procedure tells us how to move. Wisdom is still needed to decide where to go.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
