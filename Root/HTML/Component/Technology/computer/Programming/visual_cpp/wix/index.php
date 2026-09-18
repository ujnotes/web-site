<div id='message'>
	<p>
		Visual Studio 2008.
	</p>
	<p>
		Editing Intermediate directory not feasible from within IDE - GUI.
	</p>
	<p>
		Edit .wixproj file.
	</p>
	<p>
		MSBuild Variables available in .wixproj.
	</p>
	<ol class="list-number content-list">
		<li><div>Configuration.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Platform.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>SolutionDir.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>SolutionName.</div></li>
	</ol>
	<h2>Not availabe</h2>
	<ol class="list-number content-list">
		<li><div>ProjectName.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>ProjectDir.</div></li>
	</ol>
	<h2>1. Single Project - Solution</h2>
	<h2>OutPath</h2>
	<pre class='indent-c'><code class='block'>$(SolutionDir)\$(Platform)\$(Configuration)\$(SolutionName)</code></pre>
	<h2>2. Multi Project - Solution</h2>
	<h2>OutPath</h2>
	<pre class='indent-c'><code class='block'>$(SolutionDir)\$(Platform)\$(Configuration)\$(SolutionName)</code></pre>
	<p>
		Vars.wxi file for PreCompile header variables.
	</p>
	<pre class='indent-c'><code class='block'>&lt;?if $(var.Platform)=x64 ?&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;?else?&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;?endif?&gt;</code></pre>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;ItemGroup&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Content Include="License.htm" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Content &lt;Content Include="Resources\Banner.bmp" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Content &lt;Content Include="Resources\Dialog.bmp" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Content &lt;Content Include="Resources\License.rtf" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Content &lt;Content Include="Resources\Manual.rtf" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Content &lt;Content Include="Vars.wxi" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;ItemGroup&gt; &lt;/ItemGroup&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/ItemGroup&gt; &lt;ItemGroup&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;Folder Include="Resources" /&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;ItemGroup&gt; &lt;/ItemGroup&gt;</code></pre>
	<p>
		________________.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
