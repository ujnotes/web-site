<div id='message'>
	<p>
		Formula.
	</p>
	<p>
		For fn.
	</p>
	<h2>Reference data from sheet</h2>
	<pre class='indent-c'><code class='block'>=&lt;Sheet&gt;!&lt;Row&gt;&lt;Column&gt;</code></pre>
	<h2>Reference data from workbook</h2>
	<pre class='indent-c'><code class='block'>=importrange("&lt;key&gt;", "[&lt;sheet1&gt;!]&lt;&lt;A1&gt;[:C10]&gt;")</code></pre>
	<pre class='indent-c'><code class='block'>=&lt;SHEET&gt;!&lt;COLUMN&gt;&lt;ROW&gt;</code></pre>
	<p>
		=Left(Concatenate(Sheet1!A2, " ", Sheet1!B2, Sheet1!C2), 16).
	</p>
	<h2>=importrange(spreadsheet-key, range)</h2>
	<p>
		Quote enclose both params.
	</p>
	<p>
		=getCurrentSheetName() after Installing script -.
	</p>
	<p>
		“Tools &gt; Script gallery.... Search for sheet name”.
	</p>
	<h2>=text(A1,”0000”)</h2>
	<pre class='indent-c'><code class='block'>min 4 digits with leading zeroes when needed</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
