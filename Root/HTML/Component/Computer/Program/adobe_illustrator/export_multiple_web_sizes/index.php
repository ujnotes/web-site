<div id='message'>
	<p>
		Export multiple web sizes.
	</p>
	<p>
		/**.
	</p>
	<p>
		*<strong> Remixer.</strong> @herkulano (http://www.herkulano.com).
	</p>
	<p>
		*<strong> Thanks to.</strong> Niels Bosma (niels.bosma@motorola.com).
	</p>
	<p>
		*/.
	</p>
	<p>
		Var folder = Folder.selectDialog();.
	</p>
	<p>
		Var document = app.activeDocument;.
	</p>
	<pre class='indent-c'><code class='block'>if (document &amp;&amp; folder) {</code></pre>
	<p>
		$.writeln(document.width);.
	</p>
	<p>
		SaveToRes (16, "ldpi");.
	</p>
	<p>
		SaveToRes(32, "mdpi");.
	</p>
	<p>
		SaveToRes(64, "hdpi");.
	</p>
	<p>
		SaveToRes(128, "xhdpi");.
	</p>
	<p>
		SaveToRes(300, "xxhdpi");.
	</p>
	<p>
		SaveToRes(400, "xxxhdpi");.
	</p>
	<p>
		}.
	</p>
	<p>
		Function saveToRes(scaleTo, resFolderName) {.
	</p>
	<h2>scaleTo = scaleTo/document.width*100.0;</h2>
	<p>
		$.writeln(scaleTo);.
	</p>
	<pre class='indent-c'><code class='block'>$.writeln((scaleTo*document.width)/100.0);</code></pre>
	<p>
		Return;.
	</p>
	<h2>var i, layer,</h2>
	<p>
		File, options,.
	</p>
	<p>
		ResFolder;.
	</p>
	<p>
		ResFolder = new Folder(folder.fsName + "/drawable-" + resFolderName);.
	</p>
	<h2>if (!resFolder.exists) {</h2>
	<p>
		ResFolder.create();.
	</p>
	<p>
		}.
	</p>
	<h2>for (i = document.layers.length - 1; i &gt;= 0; i--) {</h2>
	<p>
		Layer = document.layers[i];.
	</p>
	<pre class='indent-c'><code class='block'>if (!layer.locked &amp;&amp; layer.name.indexOf("!") === -1) {</code></pre>
	<p>
		HideAllLayers();.
	</p>
	<p>
		Layer.visible = true;.
	</p>
	<p>
		File = new File(resFolder.fsName+ "/" + layer.name + ".png");.
	</p>
	<p>
		$.writeln(resFolder.fsName);.
	</p>
	<p>
		$.writeln(file.fsName);.
	</p>
	<p>
		$.writeln(layer.name);.
	</p>
	<p>
		Options = new ExportOptionsPNG24();.
	</p>
	<p>
		Options.antiAliasing = true;.
	</p>
	<p>
		Options.transparency = true;.
	</p>
	<p>
		Options.artBoardClipping = true;.
	</p>
	<p>
		Options.verticalScale = scaleTo;.
	</p>
	<p>
		Options.horizontalScale = scaleTo;.
	</p>
	<p>
		Document.exportFile(file, ExportType.PNG24, options);.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<p>
		Function hideAllLayers() {.
	</p>
	<p>
		Var i, layer;.
	</p>
	<h2>for (i = document.layers.length - 1; i &gt;= 0; i--) {</h2>
	<p>
		Layer = document.layers[i];.
	</p>
	<pre class='indent-c'><code class='block'>if (!layer.locked &amp;&amp; layer.name.indexOf("!") === -1) {</code></pre>
	<p>
		Layer.visible = false;.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<p>
		}.
	</p>
	<p>
		http://graphicdesign.stackexchange.com/a/54588/46566
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
