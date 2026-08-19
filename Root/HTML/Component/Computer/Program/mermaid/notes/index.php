<div id='message'>
	<p>
		Mermaid - code to diagram.
	</p>
	<p>
		Open source + free.
	</p>
	<h2>Theme</h2>
	<p>
		Set of available themes.
	</p>
	<p>
		Only base theme can be overridden.
	</p>
	<pre class='indent-c'><code class='block'>%%{init: {'theme': 'forest', "flowchart" : { "curve" : "basis" } } }%%</code></pre>
	<p>
		<strong>'themeVariables'.</strong> {.
	</p>
	<p>
		<strong>'primaryColor'.</strong> '#BB2528',.
	</p>
	<p>
		<strong>'primaryTextColor'.</strong> '#fff',.
	</p>
	<p>
		<strong>'primaryBorderColor'.</strong> '#7C0000',.
	</p>
	<p>
		<strong>'lineColor'.</strong> '#F8B229',.
	</p>
	<p>
		<strong>'secondaryColor'.</strong> '#006100',.
	</p>
	<p>
		<strong>'tertiaryColor'.</strong> '#fff'.
	</p>
	<p>
		}.
	</p>
	<p>
		Not all styles can be overridden.
	</p>
	<h2>Style</h2>
	<pre class='indent-c'><code class='block'>Style reference using :::&lt;&gt;</code></pre>
	<p>
		Define style block inside diagram block.
	</p>
	<pre class='indent-c'><code class='block'>%%{init: { 'line-height':'24px'} }%%</code></pre>
	<p>
		Flowchart TD.
	</p>
	<h2>classDef big font-size:100px,fill:#fc6b03</h2>
	<p>
		A:::big --&gt; B{Let me think}.
	</p>
	<h2>Documentation</h2>
	<p>
		https://mermaid.js.org/config/theming.html
	</p>
	<p>
		https://mermaid.live/edit
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
