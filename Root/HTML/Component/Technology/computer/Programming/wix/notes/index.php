<div id='message'>
	<p>
		If modifying Sequence.
	</p>
	<p>
		Rename original by prefixing with c.
	</p>
	<p>
		CWixUI_Mondo.
	</p>
	<p>
		WixUI_Advanced.
	</p>
	<p>
		________________.
	</p>
	<p>
		Copy all .WXS files.
	</p>
	<h2>Get PrintEULA.dll</h2>
	<p>
		<strong>(Build from source.</strong> Src\ext\Wixui\ .build).
	</p>
	<p>
		Refer to the CustomAction Binary in a WXS file.
	</p>
	<p>
		Add variables to wix project.
	</p>
	<pre class='indent-c'><code class='block'>First property group with &lt;name&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;DefineConstants&gt;</code></pre>
	<pre class='indent-c'><code class='block'>$(DefineConstants);</code></pre>
	<pre class='indent-c'><code class='block'>bannerBmp=$(MSBuildProjectDirectory)\Resource\Banner.bmp;</code></pre>
	<pre class='indent-c'><code class='block'>dialogBmp=$(MSBuildProjectDirectory)\Resource\Dialog.bmp;</code></pre>
	<pre class='indent-c'><code class='block'>exclamationIco=$(MSBuildProjectDirectory)\Resource\exclamic.ico;</code></pre>
	<pre class='indent-c'><code class='block'>infoIco=$(MSBuildProjectDirectory)\Resource\info.ico;</code></pre>
	<pre class='indent-c'><code class='block'>licenseRtf=$(MSBuildProjectDirectory)\Resource\License.rtf;</code></pre>
	<pre class='indent-c'><code class='block'>newIco=$(MSBuildProjectDirectory)\Resource\new.ico;</code></pre>
	<pre class='indent-c'><code class='block'>upIco=$(MSBuildProjectDirectory)\Resource\up.ico;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;DefineConstants&gt; &lt;/DefineConstants&gt;</code></pre>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>Error: ICE69 Mismatched component reference. Entry &lt;component&gt; references in different features</code></pre>
	<p>
		Adds ‘Primary=yes’ to ‘componentRef’ in feature.
	</p>
	<p>
		Should actually be referenced by multiple features.
	</p>
	<p>
		The one feature that has it will be the one actually installing it.
	</p>
	<p>
		First disable ICE69 warning.
	</p>
	<p>
		________________.
	</p>
	<p>
		Feature@Absent="disallow".
	</p>
	<p>
		To keep a feature immutable.
	</p>
	<ul class="list-bullet content-list">
		<li><div>Applicable even when not visible.</div></li>
	</ul>
	<ul class="list-bullet content-list">
		<li><div>Title (required) to be added explicitly.</div></li>
	</ul>
	<p>
		*.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
