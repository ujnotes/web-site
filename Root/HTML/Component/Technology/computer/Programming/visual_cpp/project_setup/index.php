<div id='message'>
	<p>
		{Project} Property Pages.
	</p>
	<h2>Configuration Properties</h2>
	<h4>General</h4>
	<h2>1. Single Project - Solution</h2>
	<p>
		<strong>Platform.</strong> Win32.
	</p>
	<h2>Output Directory</h2>
	<pre class='indent-c'><code class='block'>$(SolutionDir)\x86\$(ConfigurationName)\$(ProjectName)</code></pre>
	<p>
		<strong>Platform.</strong> X64.
	</p>
	<h2>Output Directory</h2>
	<pre class='indent-c'><code class='block'>$(SolutionDir)\$(PlatformName)\$(ConfigurationName)\$(ProjectName)</code></pre>
	<h2>2. Multi Project - Solution</h2>
	<p>
		<strong>Platform.</strong> Win32.
	</p>
	<h2>Output Directory</h2>
	<pre class='indent-c'><code class='block'>$(SolutionDir)\x86\$(ConfigurationName)\[Container]\$(ProjectName)</code></pre>
	<p>
		<strong>Platform.</strong> X64.
	</p>
	<h2>Output Directory</h2>
	<pre class='indent-c'><code class='block'>$(SolutionDir)\$(PlatformName)\$(ConfigurationName)\[Container]\$(ProjectName)</code></pre>
	<ul class="list-bullet content-list">
		<li><div>All entries to be ‘\’ separated.</div></li>
	</ul>
	<h2>Intermediate Directory</h2>
	<pre class='indent-c'><code class='block'>$(OutDir)\Interim</code></pre>
	<p>
		C/C++.
	</p>
	<h2>Additional Include Directory</h2>
	<pre class='indent-c'><code class='block'>$(ProjectDir)\..; $(ProjectDir)</code></pre>
	<p>
		[Resource DLL].
	</p>
	<h2>Linker</h2>
	<p>
		General.
	</p>
	<h2>Output File</h2>
	<pre class='indent-c'><code class='block'>$(OutDir)\Engine\Lang\$(ProjectName).DLL.mui</code></pre>
	<p>
		Renaming Platform ‘Win32’ to ‘x86’ not feasible.
	</p>
	<p>
		All Projects get their Individual Directories.
	</p>
	<p>
		Multi Solution Projects - under Container.
	</p>
	<p>
		Run dependencies to be provided by sym-links.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
