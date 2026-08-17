<?php $alt='A robotic hand interacting with a digital network'; require('../HTML/Fragment/Component_cover.php') ?>
<h2 class='center'><?php echo $desc; ?></h2>
<div id='message'>
		<h3>What is artificial intelligence?</h3>
	<p>
		Artificial intelligence is the ability of a human-made system to perform tasks that require intelligence when people do them.
	</p>
	<p>
		Such tasks include recognizing speech, interpreting images, translating language, finding patterns, predicting outcomes, solving problems and selecting actions.
	</p>
	<p>
		The word <em>artificial</em> describes the origin of the system, not whether its behaviour is real. An artificial light produces real light. An artificial intelligence can produce genuinely useful predictions and decisions.
	</p>
	<p>
		But performing an intelligent task does not by itself prove human-like understanding or experience.
	</p>
	<h3>Is artificial intelligence a computer program?</h3>
	<p>
		Yes, but it is more than a fixed list of hand-written responses.
	</p>
	<p>
		An AI system is built from <a class="content-link XURL" href="/world/philosophy/program" data-target="world/philosophy/program" data-title="programs">programs</a>, <a class="content-link XURL" href="/world/philosophy/algorithm" data-target="world/philosophy/algorithm" data-title="algorithms">algorithms</a>, data and one or more <a class="content-link XURL" href="/world/philosophy/model" data-target="world/philosophy/model" data-title="models">models</a>.
	</p>
	<p>
		The program defines how information enters, how the model is trained and how outputs are produced. The model contains relationships that may have been learnt from many examples.
	</p>
	<p>
		The system remains physical computation carried out by a <a class="content-link XURL" href="/computer" data-target="computer" data-title="computer">computer</a>, even when its behaviour appears conversational or creative.
	</p>
	<h3>How is AI different from ordinary software?</h3>
	<p>
		Ordinary software often uses rules written directly by a programmer.
	</p>
	<p>
		A tax calculator may be told exactly how to apply each rate. A traditional spam filter may be given a list of forbidden phrases.
	</p>
	<p>
		Machine-learning systems are instead given a method for adjusting a model from examples. The programmer does not specify every useful pattern. The training process discovers relationships that help reduce error or increase reward.
	</p>
	<p>
		The boundary is not sharp. Most practical AI systems combine learnt models with ordinary software and human-written rules.
	</p>
	<h3>How does machine learning work?</h3>
	<p>
		Machine <a class="content-link XURL" href="/world/philosophy/learning" data-target="world/philosophy/learning" data-title="learning">learning</a> changes a model through experience represented as data.
	</p>
	<p>
		A system may be shown many images labelled “cat” or “not cat”. It makes predictions, compares them with the labels and adjusts internal values to reduce future error.
	</p>
	<p>
		After many examples, the model may recognize patterns that help with images it has never seen.
	</p>
	<p>
		It has not stored a verbal definition of a cat in the way a dictionary does. It has acquired a structure that connects features of an input with a likely output.
	</p>
	<h3>What is training?</h3>
	<p>
		Training is the process of adjusting a model.
	</p>
	<p>
		It requires:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Training data</strong> — examples or experiences</div></li>
		<li><div><strong>An objective</strong> — a measure of what counts as better</div></li>
		<li><div><strong>An algorithm</strong> — a procedure for changing the model</div></li>
		<li><div><strong>Computation</strong> — the physical work of making those changes</div></li>
	</ul>
	<p>
		The trained model is then evaluated on new data.
	</p>
	<p>
		Success on the training examples alone is not enough. A useful system must generalize beyond what it has already seen.
	</p>
	<h3>What does a generative AI system do?</h3>
	<p>
		Generative AI produces new arrangements such as text, images, sound, video or computer code.
	</p>
	<p>
		A language model learns patterns in sequences of symbols. Given some text, it estimates what continuation would fit the learnt pattern and the present instruction.
	</p>
	<p>
		Repeated prediction can produce an answer, story, explanation or conversation.
	</p>
	<p>
		The result may be original as an arrangement even though the ability was learnt from earlier examples. It may also be fluent and wrong. Plausibility is what the generation process directly supports; truth requires grounding and checking.
	</p>
	<h3>Does AI understand?</h3>
	<p>
		It depends upon what we mean by understanding.
	</p>
	<p>
		If understanding means using a model to answer questions, connect ideas and act successfully in new situations, some AI systems display forms of it.
	</p>
	<p>
		If understanding means possessing human concepts grounded in a living body, social life and conscious experience, the claim is much less certain.
	</p>
	<p>
		We should separate observed ability from assumptions about an inner life.
	</p>
	<p>
		A system may describe grief convincingly without grieving. It may also find a relationship that a person failed to see. Neither fact settles the other.
	</p>
	<h3>Is AI conscious?</h3>
	<p>
		There is no good reason to assume that present AI systems are <a class="content-link XURL" href="/world/philosophy/consciousness" data-target="world/philosophy/consciousness" data-title="conscious">conscious</a> merely because they use language or speak about themselves.
	</p>
	<p>
		Language can report experience, but it can also be generated by learnt relationships between words.
	</p>
	<p>
		Consciousness concerns whether there is something it is like to be the system—whether any experience is present.
	</p>
	<p>
		Behaviour provides evidence, but words alone are weak evidence when producing words is the task for which the system was trained.
	</p>
	<p>
		We should remain open to future evidence without pretending that uncertainty is knowledge.
	</p>
	<h3>Can AI reason?</h3>
	<p>
		AI systems can perform many forms of <a class="content-link XURL" href="/world/philosophy/inference" data-target="world/philosophy/inference" data-title="inference">inference</a>.
	</p>
	<p>
		They can apply rules, compare possibilities, connect facts and generate intermediate steps. They can also make confident mistakes, follow misleading patterns or fail when a familiar-looking problem changes slightly.
	</p>
	<p>
		Reasoning ability is therefore not all-or-nothing.
	</p>
	<p>
		It should be judged by accuracy, robustness, the ability to use relevant evidence and the willingness of the surrounding system to detect uncertainty.
	</p>
	<h3>Why can AI be wrong?</h3>
	<p>
		An AI system works through limited models built from limited information.
	</p>
	<p>
		It may fail because:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Its training data was incomplete, incorrect or biased</div></li>
		<li><div>The new situation differs from its training experience</div></li>
		<li><div>Its objective rewarded the wrong behaviour</div></li>
		<li><div>The prompt or input was ambiguous</div></li>
		<li><div>It generated a plausible pattern without checking reality</div></li>
		<li><div>People used its output beyond the purpose for which it was tested</div></li>
	</ul>
	<p>
		Errors are not mysterious exceptions. They follow from the gap between the model and the world.
	</p>
	<h3>Can AI be biased?</h3>
	<p>
		Yes.
	</p>
	<p>
		Data records human choices and social conditions. A model trained upon it can preserve unfair patterns.
	</p>
	<p>
		Bias can also enter through the selection of data, the definition of success, the categories available and the decision about where a system is deployed.
	</p>
	<p>
		Removing a sensitive word does not necessarily remove the pattern. Other information may act as a substitute.
	</p>
	<p>
		Fairness therefore requires examination of outcomes, not only good intentions or technically neutral language.
	</p>
	<h3>Will AI replace people?</h3>
	<p>
		AI will replace some tasks, change many jobs and create new kinds of work. It will not affect everyone equally.
	</p>
	<p>
		A job is usually a collection of tasks. Some may be automated while others—trust, responsibility, physical care, judgement or human relationship—remain.
	</p>
	<p>
		The important question is not only what technology can replace, but who receives the benefit, who bears the disruption and who has a voice in the change.
	</p>
	<p>
		A society can use greater productivity to reduce drudgery. It can also use it to concentrate power. Technology does not make that choice by itself.
	</p>
	<h3>Who is responsible for AI?</h3>
	<p>
		People are.
	</p>
	<p>
		Developers choose methods. Organizations choose goals and deployment. Governments establish rights and duties. Users decide when to rely upon an output.
	</p>
	<p>
		An AI system can contribute causally to a <a class="content-link XURL" href="/world/philosophy/decision" data-target="world/philosophy/decision" data-title="decision">decision</a>, but it does not remove responsibility from the humans who place it in the world.
	</p>
	<p>
		Responsibility should follow power: those able to design, deploy, profit from or stop a system must also answer for its effects.
	</p>
	<h3>What would good AI require?</h3>
	<p>
		Useful AI should be accurate enough for its purpose, honest about uncertainty and open to correction.
	</p>
	<p>
		The safeguards should match the possible harm. A music recommendation and a medical diagnosis do not require the same level of evidence or oversight.
	</p>
	<p>
		Good use also requires:
	</p>
	<ul class="list-bullet content-list">
		<li><div>Clear responsibility</div></li>
		<li><div>Protection of privacy and security</div></li>
		<li><div>Testing beyond favourable demonstrations</div></li>
		<li><div>Ways to question and appeal important outcomes</div></li>
		<li><div>Human control where consequences are serious</div></li>
		<li><div>Benefits shared beyond those who own the system</div></li>
	</ul>
	<p>
		Intelligence without direction is only capability.
	</p>
	<h3>Is artificial intelligence the same as intelligence?</h3>
	<p>
		Artificial intelligence describes intelligence produced through human-made systems.
	</p>
	<p>
		<a class="content-link XURL" href="/world/philosophy/intelligence" data-target="world/philosophy/intelligence" data-title="Intelligence">Intelligence</a> is the broader ability to build useful models, learn, reason and act effectively. It can appear in people, other animals and perhaps many kinds of machines.
	</p>
	<p>
		The adjective tells us where the system came from. It does not by itself tell us how general, wise, conscious or trustworthy it is.
	</p>
	<h3>So what is artificial intelligence, finally?</h3>
	<p>
		Artificial intelligence is human-made information processing that can learn patterns, form useful representations, draw inferences and select or recommend actions.
	</p>
	<p>
		Its achievements are real. So are its limits.
	</p>
	<p>
		AI is neither magic nor merely an illusion. It is a powerful class of tools whose behaviour emerges from programs, data, models, objectives and human choices.
	</p>
	<p>
		The central question is not only how intelligent our machines can become, but whether we will use that intelligence with truth, responsibility and compassion.
	</p>

</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
