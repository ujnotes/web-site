<div id='message'>
	<pre class='indent-c'><code class='block'>chat = ChatOpenAI(model=ai_model_id, temperature=ai_model_params['temperature'], model_kwargs={"response_format": {"type": "json_object"}})</code></pre>
	<p>
		JSON mode — the prompt must also contain the term <code class='inline'>json</code>.
	</p>
	<h2>If passed directly</h2>
	<pre class='indent-c'><code class='block'>UserWarning: WARNING! response_format is not default parameter. 
                response_format was transferred to model_kwargs.
                Please confirm that response_format is what you intended.</code></pre>
	<p>
		But will work.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
