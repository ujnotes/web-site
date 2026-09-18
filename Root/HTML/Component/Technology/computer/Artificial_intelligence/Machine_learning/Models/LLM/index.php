<div id='message'>
		<?php $alt='A large language model turning a sequence of tokens into a likely next token'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a large language model?</h3>
	<p>
		A large language model is a machine-learning model trained to predict the next piece of text from the text that came before it.
	</p>
	<p>
		It is a kind of model in the ordinary sense: a simplified representation that preserves useful relationships and leaves other details out. Here the relationships are statistical patterns in language.
	</p>
	<p>
		The word large refers mainly to scale. These models have many internal parameters and are trained on very large collections of text.
	</p>
	<h3>Is an LLM the same as artificial intelligence?</h3>
	<p>
		No.
	</p>
	<p>
		Artificial intelligence is the broader goal of making systems that can perform tasks that require intelligence when people do them.
	</p>
	<p>
		Machine learning is one way to build such systems by adjusting a model from data.
	</p>
	<p>
		An LLM is one kind of machine-learning model. It is specialised for language: reading, completing, summarising, translating, answering and writing text.
	</p>
	<p>
		Many products that people call “AI” use an LLM as one part of a larger program.
	</p>
	<h3>How does it work?</h3>
	<p>
		At a high level, the model turns text into numbers, processes those numbers through many layers, and produces a probability for what may come next.
	</p>
	<p>
		During training, it sees vast amounts of text. It repeatedly guesses the next token, compares that guess with the real next token, and adjusts its parameters to reduce error.
	</p>
	<p>
		A token is a small unit of text, often a word piece rather than a whole word.
	</p>
	<p>
		After training, the same process can be used to generate text. The model proposes likely next tokens. Software around it chooses among those possibilities, feeds the chosen token back in, and continues.
	</p>
	<p>
		The result can be a conversation, an explanation or a worked solution. In a generative LLM, text is still produced token by token. Further training can teach it to follow instructions or work through problems before answering.
	</p>
	<h3>An ordinary example</h3>
	<p>
		Suppose the incomplete sentence is:
	</p>
	<p>
		“Dark clouds often come before …”
	</p>
	<p>
		A trained language model assigns high probability to words such as “rain”.
	</p>
	<p>
		It has not looked out of a window. It has learnt, from many written examples, that this pattern of words is often followed by that kind of continuation.
	</p>
	<p>
		The same mechanism can continue a story, fill in code, or answer a question. In each case it is extending a sequence in a way that fitted the training text.
	</p>
	<h3>What is chain of thought?</h3>
	<p>
		Chain of thought (CoT) is a sequence of intermediate steps that a language model generates before giving an answer. In CoT prompting, examples or instructions encourage the model to work through a problem in this way.
	</p>
	<p>
		Suppose you buy three notebooks at ₹40 each and pay ₹150. A worked solution is: the notebooks cost 3 × ₹40 = ₹120, so the change is ₹150 − ₹120 = ₹30.
	</p>
	<p>
		Writing the intermediate result gives the model something to use in the next step. It is rather like using a scratchpad instead of trying to answer a whole problem at once. This can help with arithmetic, logic and other tasks that need several connected steps. Wei and colleagues demonstrated this in 2022.
	</p>
	<p>
		The model still generates tokens one after another. What changes is what those tokens do: some represent intermediate calculations or possible approaches, which become context for the answer. Next-token generation describes the mechanism; it does not, by itself, tell us how simple or complex the learnt computation is.
	</p>
	<h3>How did this progression happen?</h3>
	<p>
		Several developments came together. These are selected milestones, not a single recipe that every model followed.
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>2017 — A more effective architecture. </strong>The Transformer used attention to relate different parts of a sequence and made training more parallel than recurrent models. It became the basis of many later LLMs.</div></li>
		<li><div><strong>2020 — Learning a task from the prompt. </strong>GPT-3 showed that a large language model could perform many tasks when given instructions or a few examples, without updating its parameters for each task. This made the content of the prompt an important way to guide behaviour.</div></li>
		<li><div><strong>2022 — Following instructions more usefully. </strong>Work such as InstructGPT used demonstrations and human feedback to train models to respond more helpfully to requests. This improved instruction following; it did not make every answer correct.</div></li>
		<li><div><strong>2022 — Showing the working. </strong>Chain-of-thought prompting supplied examples containing intermediate steps, rather than only questions and answers. Separate zero-shot CoT research found that a short instruction to reason step by step could also improve results on several reasoning benchmarks, without worked examples.</div></li>
		<li><div><strong>2022–2023 — Trying more than one route. </strong>Self-consistency, introduced in 2022, sampled several worked solutions and selected the most common final answer. Tree of Thoughts, published in 2023, explored and evaluated alternative intermediate steps, with the option to backtrack. These approaches spent more computation on solving a question, rather than relying on one generated path.</div></li>
		<li><div><strong>2024–2025 — Training models to reason before answering. </strong>OpenAI o1 in September 2024 and DeepSeek-R1 in January 2025 illustrated a further shift towards reinforcement learning for reasoning. Training rewards encouraged successful problem solving, and models could spend additional computation generating intermediate work before answering.</div></li>
	</ul>
	<p>
		The progression was therefore about more than making models bigger. Researchers improved the architecture, how models were trained, how prompts guided them, and how much work they could do while answering. Prompting a model changes its input; training changes its parameters; spending more computation at answer time gives it more opportunity to work through a problem.
	</p>
	<h3>Does CoT make the answer reliable?</h3>
	<p>
		No. A model can make a mistake in an early step and build a convincing explanation on top of it. Several generated solutions can also share the same mistake. More steps cost time and computation, and do not automatically produce a better answer.
	</p>
	<p>
		A written explanation is not a complete record of the model's internal computation. Research on CoT faithfulness found that models sometimes used hints without acknowledging them in their explanations. Some products also show a summary of reasoning rather than the full generated intermediate text.
	</p>
	<p>
		CoT can improve problem solving, but the answer still needs checking. For the notebook example, we can verify the arithmetic directly. For a factual claim, we need a reliable source; for code, we need tests that check its behaviour.
	</p>
	<h3>Can useful relationships emerge without knowing every detail?</h3>
	<p>
		Sometimes a simple constraint helps us find a useful relationship before we work through the full explanation. Dimensional analysis is one example.
	</p>
	<h3>What is dimensional analysis?</h3>
	<p>
		Imagine filling a 12-litre bucket from a tap that delivers 3 litres per minute. How long will it take?
	</p>
	<p>
		You probably already know to divide: 12 ÷ 3 = 4 minutes. The units tell us why that calculation makes sense.
	</p>
	<p>
		<strong>Time = volume ÷ flow rate</strong>
	</p>
	<p>
		<strong>12 litres ÷ (3 litres per minute) = 4 minutes</strong>
	</p>
	<p>
		The litres cancel, leaving minutes: the kind of answer we wanted. Multiplying instead would give litres squared per minute, which cannot describe a filling time.
	</p>
	<?php $img_title='bucket'; $ext='jpg'; $alt='Image placeholder: a 12-litre bucket beneath a tap delivering 3 litres per minute, with a four-minute timer.'; $center='center'; require('Fragment/Component_image.php') ?>
	<p>
		This is the basic idea of dimensional analysis: check that the quantities in an equation combine into the right kind of quantity. A dimension is a kind of measurement, such as length or time; metres and kilometres are different units of the same dimension.
	</p>
	<p>
		The check also reveals a useful pattern. At the same flow rate, a bucket twice as large takes twice as long to fill. For the same bucket, doubling the flow rate halves the time.
	</p>
	<p>
		But the units do not tell us whether the tap actually keeps running at that rate. Our four-minute answer assumes an empty bucket, a steady flow and no leaks. Matching units is a necessary check, not proof that our model fits the situation.
	</p>
	<h3>What does this suggest about LLMs?</h3>
	<p>
		The connection I see is limited but useful. Dimensional analysis shows that recognising the right structure can take us a long way before every detail is derived.
	</p>
	<p>
		An LLM can likewise draw on learnt relationships and, with chain of thought, write intermediate steps that develop a suggestion. A useful answer does not always require reconstructing every underlying detail from first principles.
	</p>
	<p>
		But the strength of the constraint is different. Matching units is a hard requirement for a valid physical equation. An LLM’s likely continuation carries no such guarantee. Even a dimensionally tidy formula can describe the wrong physics, and a fluent model can propose something whose units do not match.
	</p>
	<p>
		So the analogy supports only this point: structure can help before complete derivation. Independent checks still decide which proposed relationship is actually valid.
	</p>
	<h3>What does the model contain?</h3>
	<p>
		It does not contain a neat book of facts with clear source notes.
	</p>
	<p>
		It contains parameters: large numbers of values that shape how input text is transformed into predictions.
	</p>
	<p>
		Those values were adjusted by training. They encode statistical regularities about wording, structure, topics and associations found in the training data.
	</p>
	<p>
		That is why an LLM can sound knowledgeable and still invent a confident wrong answer. Fluency and truth are not the same property.
	</p>
	<h3>What still depends on people?</h3>
	<p>
		An LLM does not become useful by itself. People still decide:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>The goal: </strong>What should the system do with language?</div></li>
		<li><div><strong>The data: </strong>What text is included, excluded or filtered for training?</div></li>
		<li><div><strong>The structure: </strong>What kind of model and training method are used?</div></li>
		<li><div><strong>The surrounding program: </strong>How are prompts formed, tools called, answers checked and limits enforced?</div></li>
		<li><div><strong>The evaluation: </strong>How do we test accuracy, safety, bias and misuse?</div></li>
	</ul>
	<p>
		So it would be misleading to treat the model as the whole system. The product is model plus software plus human choices.
	</p>
	<h3>What follows?</h3>
	<p>
		A large language model learns patterns through training and can use them to generate text and solve some problems. Its ability to produce a worked solution does not establish that it understands or experiences the world as a person does.
	</p>
	<p>
		It can be a useful tool for drafting, searching, translating and exploring ideas. It can also mislead when its fluent output is mistaken for verified knowledge.
	</p>
	<p>
		The practical discipline is simple: use the model for what prediction of language can help with, and verify anything that must be true.
	</p>
	<h3>References</h3>
	<p>
		<a class="content-link" href="https://openstax.org/books/university-physics-volume-1/pages/15-4-pendulums" target="_blank" rel="noopener noreferrer">OpenStax: Pendulums — the ideal model and small-angle period</a>.
	</p>
	<p>
		<a class="content-link" href="https://ocw.mit.edu/courses/res-12-001-topics-in-fluid-dynamics-fall-2024/mitres_12_001_f24_essay2.pdf" target="_blank" rel="noopener noreferrer">MIT: Dimensional Analysis of Models and Data Sets — pendulum scaling and its assumptions</a>.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>