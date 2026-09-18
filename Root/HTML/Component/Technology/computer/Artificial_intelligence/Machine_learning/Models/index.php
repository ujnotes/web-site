<div id='message'>
		<?php $alt='A machine-learning model learning patterns from examples to make a prediction'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What are models in machine learning?</h3>
	<p>
		In machine learning, a model is the learned program that turns inputs into predictions or generated outputs.
	</p>
	<p>
		It is a special case of a more general idea. In the ordinary sense, a <a class="content-link XURL" href="/philosophy/model" data-target="philosophy/model" data-title="model">model</a> is a simplified representation that keeps selected relationships and leaves other details out.
	</p>
	<p>
		A street map models a city for navigation. A weather forecast models how the atmosphere may change. A machine-learning model represents relationships found in data so that a computer can act on new cases.
	</p>
	<p>
		The map is not the city. The learned model is not the world. Both are useful because they are selective.
	</p>
	<h3>How is this related to the philosophical idea of a model?</h3>
	<p>
		The article on <a class="content-link XURL" href="/philosophy/model" data-target="philosophy/model" data-title="Model">Model</a> asks what a model is in general: why it must leave things out, how it explains and predicts, when it can be wrong yet useful, and how overfitting and underfitting fail.
	</p>
	<p>
		Those questions still apply here. A machine-learning model preserves patterns that helped on its training examples. It omits almost everything else about the situations those examples came from.
	</p>
	<p>
		So this page does not replace that broader account. It asks what the word means inside machine learning, how such models are made, and how they are used in systems such as <a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning/models/llm" data-target="technology/computer/artificial_intelligence/machine_learning/models/llm" data-title="large language models">large language models</a>.
	</p>
	<h3>How do they fit under machine learning?</h3>
	<p>
		<a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning" data-target="technology/computer/artificial_intelligence/machine_learning" data-title="Machine learning">Machine learning</a> is a method for making a computer program in which data helps determine the rules the program follows.
	</p>
	<p>
		People still choose the goal, the learning process, the data and the tests. Training then adjusts the model so that its behaviour better fits the examples or feedback.
	</p>
	<p>
		In short:
	</p>
	<p>
		Human-written learning process + training data → learned program (the model)
	</p>
	<p>
		Later:
	</p>
	<p>
		Model + new inputs → answers
	</p>
	<p>
		Machine learning is the method. The model is what that method produces and later uses.
	</p>
	<h3>Is a machine-learning model the same as the program?</h3>
	<p>
		No, though they belong together.
	</p>
	<p>
		The surrounding program receives data, runs training or inference, calls tools, checks outputs and presents results. The model contains the adjustable relationships learnt from data.
	</p>
	<p>
		Two runs of the same training program can produce different models when the examples differ. The program provides the learning procedure. The model is what that procedure has learnt.
	</p>
	<p>
		This is the same distinction drawn in the general account of a <a class="content-link XURL" href="/philosophy/model" data-target="philosophy/model" data-title="model">model</a>: procedure and learnt representation are related, but not identical.
	</p>
	<h3>What does the model contain?</h3>
	<p>
		Usually not a neat list of human-readable rules, and not a book of facts with clear source notes.
	</p>
	<p>
		It contains parameters: large numbers of values that shape how an input is turned into an output. Training adjusts those values.
	</p>
	<p>
		Together they encode statistical regularities found in the training data. That is why a model can be fluent or accurate on familiar kinds of case, and still fail on a new one.
	</p>
	<h3>What kinds of machine-learning model are there?</h3>
	<p>
		Models differ by what they are built to handle and by how they are structured:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Classifiers — </strong>assign an input to a category, such as spam or not spam.</div></li>
		<li><div><strong>Regressors — </strong>predict a quantity, such as a price or a temperature.</div></li>
		<li><div><strong>Vision models — </strong>work with images or video, for example recognising objects.</div></li>
		<li><div><strong>Language models — </strong>predict and generate text; large language models are the scaled form used in many assistants.</div></li>
		<li><div><strong>Other generative models — </strong>produce images, audio or other structured outputs from a prompt or a latent description.</div></li>
	</ul>
	<p>
		The forms differ, but each is still a selective representation trained for a purpose.
	</p>
	<h3>When is a model useful, and when is it misleading?</h3>
	<p>
		A model can be wrong in detail and still useful within a limited range. A flat map is not a complete description of the Earth, yet it helps you walk across a neighbourhood.
	</p>
	<p>
		The same caution applies to machine learning. A model that matches its training data closely may still fail on new cases if it has fitted accidents rather than the wider pattern. That failure is <a class="content-link XURL" href="/philosophy/model" data-target="philosophy/model" data-title="overfitting">overfitting</a>. A model that is too simple to capture an important pattern underfits.
	</p>
	<p>
		Useful questions are therefore practical:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Purpose — </strong>What decision or prediction is this model for?</div></li>
		<li><div><strong>Evidence — </strong>What data shaped it, and what was left out?</div></li>
		<li><div><strong>Range — </strong>Under what conditions has it been tested?</div></li>
		<li><div><strong>Check — </strong>How will a wrong answer be noticed before it causes harm?</div></li>
	</ul>
	<h3>What belongs in this section?</h3>
	<p>
		This section gathers notes on learned models inside machine learning.
	</p>
	<p>
		It begins with <a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning/models/llm" data-target="technology/computer/artificial_intelligence/machine_learning/models/llm" data-title="large language models">large language models</a> and <a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning/models/transformer" data-target="technology/computer/artificial_intelligence/machine_learning/models/transformer" data-title="Transformers">Transformers</a>. An LLM is a kind of model; a Transformer is an architecture used to build many LLMs. Related pages under <a class="content-link XURL" href="/technology/computer/artificial_intelligence" data-target="technology/computer/artificial_intelligence" data-title="artificial intelligence">artificial intelligence</a> and <a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning" data-target="technology/computer/artificial_intelligence/machine_learning" data-title="machine learning">machine learning</a> describe the wider methods those models depend on.
	</p>
	<p>
		For the general idea of representation, prediction, explanation and the limits of any model, start from <a class="content-link XURL" href="/philosophy/model" data-target="philosophy/model" data-title="Model">Model</a>.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		Ai disclosure: written with the help of AI (ChatGPT &amp; Grok). You are encouraged to point out errors and omissions.
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>