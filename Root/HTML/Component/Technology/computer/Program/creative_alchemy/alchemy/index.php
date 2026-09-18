<div id='message'>
	<h2>Buffers</h2>
	<p>
		[2, 10].
	</p>
	<p>
		<strong>Default.</strong> 4.
	</p>
	<p>
		Number of audio buffers used internally. The default value of 4 should be fine for most applications.
	</p>
	<h2>Duration</h2>
	<p>
		[5, 50].
	</p>
	<p>
		<strong>Default.</strong> 25ms.
	</p>
	<p>
		Length in milliseconds of each of the audio buffers. The default value is 25ms.
	</p>
	<p>
		The total duration of the audio queue used internally is equal to Buffers * Duration (i.e. 00ms by default). Experimenting with Duration values may be necessary in order to find the best performance vs. quality trade-off for each game. In addition, some games require smaller values than the default of 25ms because they use very small DirectSound Buffers for streaming, or they require faster playback position updates. Reducing the ?Duration? value can prevent audio glitches, pops and clicks.
	</p>
	<p>
		However, lower values mean that there is more chance of the audio breaking up during CPU intensive moments (e.g. lots of disc access during level loading). The recommended approach is to try the default settings, and if audio artifacts are regularly heard then try lowering Duration by 5ms and trying again. If the problem still occurs try dropping the value by another 5ms and so on (minimum allowed value is 5ms).
	</p>
	<h2>Maximum Voice Count</h2>
	<p>
		[32, 128].
	</p>
	<p>
		<strong>Default.</strong> 28.
	</p>
	<p>
		Maximum number of hardware voices that will be used by ALchemy. The number of voices used will be the lesser of, the hardware voice count limit and this setting. The default is 28 which is the highest number of voices available on SB X-Fi cards. By lowering this value, hardware voices can be reserved for another application to use, or, to improve performance by streaming less audio channels.
	</p>
	<h2>Disable Direct Music</h2>
	<p>
		[0, 1].
	</p>
	<p>
		<strong>Default.</strong> 0.
	</p>
	<p>
		Disable DirectMusic support. The default is false (unchecked), meaning DirectMusic support is enabled. At this time no known problems have been caused by combining ALchemy with games, such as TRON 2.0, that use DirectMusic.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
