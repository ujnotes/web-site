<div id='message'>
		<?php $alt='Cover placeholder: a row of text tokens connected by attention links, with stacked Transformer blocks behind them.'; require('../HTML/Fragment/Component_cover.php') ?>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>What is a Transformer?</h3>
	<p>
		A Transformer is a neural-network architecture that uses attention to combine information from different parts of its input.
	</p>
	<p>
		An architecture is the arrangement of the model's parts and the connections between them. Training adjusts the numbers within that arrangement.
	</p>
	<p>
		Think of a recipe and a prepared dish. The recipe describes how to put things together; the dish is a particular result. Similarly, two models can share a Transformer architecture yet behave differently because they were trained differently.
	</p>
	<h3>Where does it fit?</h3>
	<p>
		<a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning" data-target="technology/computer/artificial_intelligence/machine_learning" data-title="Machine learning">Machine learning</a> is the method of learning from data. A <a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning/models" data-target="technology/computer/artificial_intelligence/machine_learning/models" data-title="model">model</a> is what we train and use. Transformer describes one way to organise that model.
	</p>
	<p>
		The <a class="content-link XURL" href="/technology/computer/artificial_intelligence/machine_learning/models/llm" data-target="technology/computer/artificial_intelligence/machine_learning/models/llm" data-title="large language model">large language model</a> article describes models that work with language. Here we look at an architecture used to build many of them.
	</p>
	<p>
		Transformer and LLM describe different things: the construction and the kind of model. A Transformer can also work with images. The Vision Transformer, for example, represents an image as a sequence of patches.
	</p>
	<h3>Why does context matter?</h3>
	<p>
		Consider these two sentences:
	</p>
	<p>
		“The bank approved my loan.”
	</p>
	<p>
		“We sat on the bank beside the river.”
	</p>
	<p>
		The word “bank” is the same, but its meaning changes. “Loan” points towards a financial institution; “river” points towards the edge of a waterway.
	</p>
	<p>
		A useful representation of a word must therefore depend on more than the word alone. It needs information from the surrounding text.
	</p>
	<?php $img_title='context'; $img_dark_title='context-dark'; $ext='jpg'; $alt='The two bank sentences, with bank highlighted and links to loan and river. The links illustrate context, not measured model attention.'; $center='center'; require('Fragment/Component_image.php'); unset($img_dark_title) ?>
	<p>
		This picture would illustrate the problem the model must solve. It would not prove that a particular model uses those exact links.
	</p>
	<h3>What is attention?</h3>
	<p>
		Attention is a calculation that gives different weights to different pieces of information, then mixes that information using the weights.
	</p>
	<p>
		For a rough analogy, imagine asking a group which bus goes to the railway station. You would give more weight to the person familiar with that route than to someone discussing a different journey.
	</p>
	<p>
		The model does not consciously ask or listen. It compares numerical representations. In self-attention, the information being compared comes from positions within the same sequence.
	</p>
	<p>
		The standard calculation uses three learnt representations:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Query:</strong> what is being matched at this position.</div></li>
		<li><div><strong>Key:</strong> what each available position offers for matching.</div></li>
		<li><div><strong>Value:</strong> the information each position contributes to the mixture.</div></li>
	</ul>
	<p>
		Query–key comparisons produce scores. The model converts these into weights and uses them to combine the values. Several attention heads perform different learnt comparisons; their results are combined.
	</p>
	<p>
		A head is not necessarily a neatly labelled specialist in grammar or facts. These roles are learnt numerical patterns, rather than jobs assigned by a programmer.
	</p>
	<h3>How does text pass through it?</h3>
	<p>
		For a language Transformer, the broad sequence is:
	</p>
	<ol class="list-bullet content-list">
		<li><div><strong>Split the text into tokens.</strong> These may be words, parts of words or punctuation.</div></li>
		<li><div><strong>Represent the tokens with numbers.</strong> Each token becomes a vector: a list of numerical values.</div></li>
		<li><div><strong>Include position information.</strong> Word order matters. “The dog chased the boy” and “The boy chased the dog” contain the same words but describe different events.</div></li>
		<li><div><strong>Mix and process information.</strong> Attention combines information across permitted positions. A feed-forward network processes each position's representation.</div></li>
		<li><div><strong>Repeat through layers.</strong> Later layers work with representations produced by earlier ones.</div></li>
		<li><div><strong>Produce the task's output.</strong> In a next-token language model, an output layer produces probabilities for possible next tokens.</div></li>
	</ol>
	<?php $img_title='processing'; $img_dark_title='processing-dark'; $ext='jpg'; $alt='Text becomes tokens, then numerical representations plus position information, repeated attention and feed-forward blocks, and next-token probabilities. Residual connections and normalisation are labelled.'; $center='center'; require('Fragment/Component_image.php'); unset($img_dark_title) ?>
	<p>
		Residual connections carry information around the sublayers, while normalisation helps keep training stable. Attention is a central component, but it is not the whole network.
	</p>
	<h3>Why was it an important change?</h3>
	<p>
		Vaswani and colleagues introduced the Transformer in 2017 in <em>Attention Is All You Need</em>, demonstrating it on translation tasks.
	</p>
	<p>
		Recurrent networks pass a changing internal state along a sequence. Transformers allow much more of the work across sequence positions to happen in parallel during training. Attention also gives distant positions a direct way to exchange information.
	</p>
	<p>
		This helped make larger-scale training practical. It did not mean that generating a reply became a single simultaneous operation.
	</p>
	<p>
		In ordinary autoregressive generation, the model produces a next token, adds it to the available text and repeats. Parallel training and token-by-token generation can both be true.
	</p>
	<h3>Are all Transformers alike?</h3>
	<p>
		Three common arrangements help explain the differences:
	</p>
	<ul class="list-bullet content-list">
		<li><div><strong>Encoder-only:</strong> builds representations using context on both sides within the supplied input. BERT is an example; it can be adapted for tasks such as classification and extracting answers.</div></li>
		<li><div><strong>Decoder-only:</strong> uses a causal mask so a position cannot access later tokens. GPT-style language models use this arrangement to continue text.</div></li>
		<li><div><strong>Encoder–decoder:</strong> an encoder processes the input, and a decoder generates output while attending to the encoder's representations. This was the original Transformer's arrangement.</div></li>
	</ul>
	<?php $img_title='variants'; $img_dark_title='variants-dark'; $ext='jpg'; $alt='Three labelled panels for encoder-only, decoder-only and encoder-decoder Transformers. They show bidirectional input attention, a causal mask, and a separate encoder-to-decoder connection.'; $center='center'; require('Fragment/Component_image.php'); unset($img_dark_title) ?>
	<p>
		A causal mask prevents a next-token model from looking ahead at the answer during training. In an encoder–decoder model, attention to the separate encoder output is called cross-attention.
	</p>
	<h3>What are its limits?</h3>
	<p>
		Full self-attention compares pairs of positions. Doubling the sequence length gives roughly four times as many pairs, so long inputs can be expensive. This describes the attention calculation, not a promise that the whole system's cost always rises by exactly four times.
	</p>
	<p>
		The architecture also does not decide whether a statement is true. A model can use context effectively and still give a wrong answer. Training data, the learning objective and the surrounding software all matter.
	</p>
	<p>
		Nor does the word “attention” establish human awareness. Here it names a mathematical operation.
	</p>
	<h3>What follows?</h3>
	<p>
		A Transformer gives a model a way to represent each part of an input in relation to other parts.
	</p>
	<p>
		That is the useful idea to remember: the representation changes with the context. The architecture makes these relationships computable; training determines which patterns the model learns.
	</p>
	<h3>References</h3>
	<p>
		<a class="content-link" href="https://arxiv.org/abs/1706.03762" target="_blank" rel="noopener noreferrer">Vaswani and colleagues — Attention Is All You Need (2017)</a>: the original architecture, attention calculation and training comparison.
	</p>
	<p>
		<a class="content-link" href="https://developers.google.com/machine-learning/crash-course/llm/transformers" target="_blank" rel="noopener noreferrer">Google Machine Learning Crash Course — Transformers</a>: an introduction to language models and Transformer components.
	</p>
	<p>
		<a class="content-link" href="https://arxiv.org/abs/1810.04805" target="_blank" rel="noopener noreferrer">Devlin and colleagues — BERT (2018)</a>: an encoder model using context on both sides.
	</p>
	<p>
		<a class="content-link" href="https://arxiv.org/abs/2010.11929" target="_blank" rel="noopener noreferrer">Dosovitskiy and colleagues — An Image is Worth 16x16 Words (2020)</a>: applying Transformers to image patches.
	</p>
	<div id='content-body-separator' class='center'></div>
	<p>
		<em>Ai disclosure: written with the help of AI (ChatGPT). You are encouraged to point out errors and omissions.</em>
	</p>

</div>
<?php require('../HTML/Fragment/Component_bottom.php') ?>
