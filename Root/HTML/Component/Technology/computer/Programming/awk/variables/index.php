<div id='message'>
	<h2>FS</h2>
	<p>
		Field separator.
	</p>
	<h2>NR</h2>
	<p>
		Number of records.
	</p>
	<h2>NF</h2>
	<p>
		Number of fields.
	</p>
	<h2>FNR</h2>
	<p>
		File - Number of records.
	</p>
	<p>
		(Relative to current file).
	</p>
	<p>
		$ awk '{print FILENAME, FNR;}' student-marks bookdetails.
	</p>
	<pre class='indent-c'><code class='block'>student-marks 1</code></pre>
	<pre class='indent-c'><code class='block'>student-marks 2</code></pre>
	<pre class='indent-c'><code class='block'>student-marks 3</code></pre>
	<pre class='indent-c'><code class='block'>student-marks 4</code></pre>
	<pre class='indent-c'><code class='block'>student-marks 5</code></pre>
	<pre class='indent-c'><code class='block'>bookdetails 1</code></pre>
	<pre class='indent-c'><code class='block'>bookdetails 2</code></pre>
	<pre class='indent-c'><code class='block'>bookdetails 3</code></pre>
	<pre class='indent-c'><code class='block'>bookdetails 4</code></pre>
	<pre class='indent-c'><code class='block'>bookdetails 5</code></pre>
	<h2>OFS</h2>
	<p>
		Output field separator.
	</p>
	<h2>RS</h2>
	<p>
		Record separator.
	</p>
	<h2>ORS</h2>
	<p>
		Output record separator.
	</p>
	<p>
		FILENAME.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
