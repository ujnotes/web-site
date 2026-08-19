<div id='message'>
	<p>
		Var bb = new BlobBuilder();.
	</p>
	<p>
		Bb.append((new XMLSerializer).serializeToString(document));.
	</p>
	<p>
		Var blob = bb.getBlob("application/xhtml+xml;charset=" + document.characterSet);.
	</p>
	<p>
		SaveAs(blob, "document.xhtml");.
	</p>
	<p>
		Var bb = new BlobBuilder();.
	</p>
	<p>
		Var buffer = new ArrayBuffer(8);.
	</p>
	<p>
		allocates 8 bytes
	</p>
	<p>
		Var data = new DataView(buffer);.
	</p>
	<p>
		You can write (u)int8/16/32s and float32/64s to dataviews.
	</p>
	<p>
		Data.setUint8 (0, 0x01);.
	</p>
	<p>
		Data.setUint16(1, 0x2345);.
	</p>
	<p>
		Data.setUint32(3, 0x6789ABCD);.
	</p>
	<p>
		Data.setUint8 (7, 0xEF);.
	</p>
	<p>
		Bb.append(buffer);.
	</p>
	<p>
		Var blob = bb.getBlob("example/binary");.
	</p>
	<p>
		SaveAs(blob, "data.dat");.
	</p>
	<p>
		The contents of data.dat are &amp;lt;01 23 45 67 89 AB CD EF&amp;gt;.
	</p>
	<p>
		Var filesaver = new FileSaver(blob, "video.webm");.
	</p>
	<h2>abort_button.addEventListener("click", function() {</h2>
	<p>
		Filesaver.abort();.
	</p>
	<p>
		}, false);.
	</p>
	<p>
		________________.
	</p>
	<p>
		Var dataURL = canvas.toDataURL();.
	</p>
	<p>
		Sets canvasImg image src to dataURL.
	</p>
	<p>
		So it can be saved as an image.
	</p>
	<p>
		Document.getElementById('canvasImg').src = dataURL;.
	</p>
	<p>
		________________.
	</p>
	<pre class='indent-c'><code class='block'>&lt;a id="cavasImgAnchor" target="_blank"  download="AwesomeImage.png"&gt;download&lt;/a&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
