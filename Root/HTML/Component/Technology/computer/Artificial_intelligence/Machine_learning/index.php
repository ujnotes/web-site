<?php $alt='Machine Learning'; require('../HTML/Fragment/Component_cover.php') ?>

<div id='message'>
		<h3>What is machine learning?</h3>
	<p>
		Machine learning is a way of making a computer program in which data helps determine the rules the program follows.
	</p>
	<p>
		In traditional programming:
	</p>
	<p>
		<strong>Human-written rules + data as inputs → answers</strong>
	</p>
	<p>
		In machine learning:
	</p>
	<p>
		<strong>Human-written learning process + training data → learned program (the model)</strong>
	</p>
	<p>
		The model can then be used like this:
	</p>
	<p>
		<strong>Model + new inputs → answers</strong>
	</p>
	<p>
		This is the important shift. A programmer does not have to write every rule that produces the answer. The programmer writes a process that can learn, and the training data shapes what that process becomes.
	</p>
	<h3>Does data really write the program?</h3>
	<p>
		Not in the same way that a person writes source code.
	</p>
	<p>
		During training, the learning process repeatedly compares the model's answers with examples or feedback. It then changes the model's internal numbers, called parameters, so that future answers are more likely to be useful or correct.
	</p>
	<p>
		Those numbers may not look like ordinary instructions such as “if this happens, do that”. Yet together they control the model's behaviour. In that practical sense, the data helps write the learned part of the program.
	</p>
	<p>
		A concise way to say it is:
	</p>
	<blockquote>
		Machine learning is software whose behaviour is programmed partly by people and partly by patterns learnt from data.
	</blockquote>
	<h3>An ordinary example</h3>
	<p>
		Suppose we want a program to recognise whether a photograph contains a cat.
	</p>
	<p>
		In traditional programming, we would try to write rules about ears, eyes, fur, legs and shapes. This becomes difficult because cats can appear in different positions, colours, lighting and surroundings.
	</p>
	<p>
		With machine learning, we give a learning process many examples. Some photographs are labelled “cat” and others “not cat”. During training, the model adjusts itself until it becomes better at separating the two.
	</p>
	<p>
		The finished model is a program for recognising cats, but no person wrote all of its recognition rules one by one. The examples helped form those rules inside the model.
	</p>
	<h3>What do people still decide?</h3>
	<p>
		Data does not create a machine-learning system by itself. People still make important choices:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>The goal:</strong> What should the model predict or produce?</div></li>
		<li><div><strong>The structure:</strong> What kind of model and learning process should be used?</div></li>
		<li><div><strong>The data:</strong> Which examples should be included, removed or labelled?</div></li>
		<li><div><strong>The feedback:</strong> What counts as a good or bad answer?</div></li>
		<li><div><strong>The test:</strong> How will we decide whether the model works safely and reliably?</div></li>
	</ul>
	<p>
		So it would be misleading to say that data is the only programmer. The learned program comes from the interaction of human choices, the learning method and the data.
	</p>
	<h3>Is machine learning the same as artificial intelligence?</h3>
	<p>
		No. <a class="content-link XURL" href="/technology/computer/artificial_intelligence" data-target="technology/computer/artificial_intelligence" data-title="Artificial intelligence"><strong>Artificial intelligence</strong></a><strong> is the broader field, and machine learning is one way of building artificial intelligence.</strong>
	</p>
	<p>
		AI is the attempt to make machines perform tasks that appear to require abilities such as reasoning, planning, perception, language or decision-making. Some AI systems use rules written directly by people. Machine-learning systems instead learn much of their behaviour from data.
	</p>
	<p>
		The usual relationship is:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Artificial intelligence</strong> is the broad field.</div></li>
		<li><div><strong>Machine learning</strong> is a branch of artificial intelligence.</div></li>
		<li><div><strong>Deep learning</strong> is a branch of machine learning that uses neural networks with many layers.</div></li>
		<li><div>Many present-day generative AI systems are built with deep learning.</div></li>
	</ul>
	<p>
		This means AI is not broadly a child of machine learning. It is the other way around: machine learning is a child of AI. However, machine learning has become so important to modern AI that people often use the two terms as if they mean the same thing.
	</p>
	<h3>What does the model actually learn?</h3>
	<p>
		A model learns statistical patterns that help it make predictions or generate outputs. It may learn that certain shapes often occur in photographs of cats, or that certain words often follow other words.
	</p>
	<p>
		This does not automatically mean that the model understands those things as a person does. It means the model has found useful patterns in its training experience.
	</p>
	<p>
		The quality of that experience matters. Incomplete, incorrect or biased data can shape the model in the same direction. A learning process can compress patterns from its data, but it cannot guarantee that those patterns are true, fair or wise.
	</p>
	<h3>What follows from this idea?</h3>
	<p>
		A traditional program mainly contains instructions written explicitly by people. A machine-learning model also contains knowledge formed through training.
	</p>
	<p>
		I find it useful to think of training as a new kind of programming. The source code defines <em>how to learn</em>. The data helps determine <em>what is learnt</em>. The trained model is the resulting program.
	</p>
	<p>
		Data does not write the whole machine-learning system. But it does help write the part that makes the system behave intelligently.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>