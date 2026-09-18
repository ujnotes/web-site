<div id='message'>
	<p>
		HDR: .\ffmpeg.exe -i "&lt;infile&gt;" -c:a copy -c:v libx265 , -ss 250 -t 5, and -ss -ss 30 -t 5.
	</p>
	<p>
		https://superuser.com/questions/1280876/convert-youtube-hdr-vp9-2-video-to-hevc-hdr-with-ffmpeg
	</p>
	<pre class='indent-c'><code class='block'>.\ffmpeg.exe -i "&lt;infile&gt;" -c:a copy -c:v libx265 -tag:v hvc1 -crf 22 -pix_fmt yuv420p10le -x265-params "colorprim=bt2020:transfer=smpte2084:colormatrix=bt2020nc" &lt;outfile&gt;</code></pre>
	<pre class='indent-c'><code class='block'>time 5 sec</code></pre>
	<p>
		A 5 second sample 250 seconds into the video.
	</p>
	<pre class='indent-c'><code class='block'>-ss 250 -t 5</code></pre>
	<pre class='indent-c'><code class='block'>-ss -ss 30 -t 5</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
