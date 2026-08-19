<div id='message'>
	<p>
		<strong>XSL.</strong> EXtensible Stylesheet Language or XML Style Sheets.
	</p>
	<p>
		<strong>XSLT.</strong> XSL Transforms.
	</p>
	<p>
		<strong>First.</strong> An Identity transform to copy the XML as it is.
	</p>
	<p>
		Next - Node / Attribute Overrides.
	</p>
	<p>
		Select=”@*” &gt; All attributes.
	</p>
	<p>
		Select=”node()” &gt; All Nodes.
	</p>
	<p>
		Select=”@*|node()” &gt; Combine - All attribute + All Nodes.
	</p>
	<pre class='indent-c'><code class='block'>&lt;xsl:template match='wix:Wix/wix:Fragment/wix:ComponentGroup/wix:Component'&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;xsl:copy&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;xsl:apply-templates select="@*"/&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;xsl:apply-templates &lt;xsl:attribute name="KeyPath"&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;xsl:text&gt;no&lt;/xsl:text&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;xsl:attribute &lt;/xsl:attribute&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/xsl:attribute&gt; &lt;xsl:apply-templates select="node()"/&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;xsl:copy&gt; &lt;/xsl:copy&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;xsl:template &lt;/xsl:template&gt;</code></pre>
	<ol class="list-number content-list">
		<li><div>Copy Attributes.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Add / Override Attribute.</div></li>
	</ol>
	<ol class="list-number content-list">
		<li><div>Copy All Nodes.</div></li>
	</ol>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
