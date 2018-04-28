<div id='message'>
	<h2 class='center'><?php echo $desc; ?></h2>
	<h3>
		Issue
	</h3>
	<p>
		When Vulkan renderer is selected the game fails to start.<br>
		It crashes with a dialog titled: "<span class='bold'>DOOM Unhandled Exception</span>" and logs: <code class='inline'>** UNKNOWN **(** FUNC_PARAM_ERROR **)</code>
	</p>
	<h3>
		Cause
	</h3>
	<p>
		Mismatched Vulkan dll driver file.
		Perhaps because it is hardcoded to <code class='inline'>%WinDir%\System32\vulkan.dll</code> within the Doom executable.<br>
		(Where, <code class='inline'>%WinDir%</code> usually is <code class='inline'>C:\Windows</code>)
	</p>
	<h3>
		Solution
	</h3>
	<p>
		Replace <code class='inline'>vulkan.dll</code> file in <code class='inline'>%WinDir%\System32</code> directory with the updated compatible version.<br>
	</p>
	<p>
		I found <code class='inline'>vulkan-1-1-0-21-0.dll</code> to be the correct version with the RX-480 AMD Graphics card and its driver version: <code class='inline'>17.3.1</code>.<br>
		If you have an NVIDIA or Intel chip, the correct file may be a different one.
	</p>
	<p>
		You can manually replace <code class='inline'>vulkan.dll</code> file with <code class='inline'>vulkan-1-1-0-21-0.dll</code><br>
		Or use the following commands in a console with <em>administrative rights</em>.
	</p>
	<pre class='indent-20'><code class='block'>cd %windows%\system32
move vulkan-1.dll vulkan-1.dll.bak
copy vulkan-1-1-0-21-0.dll vulkan-1.dll</code></pre>
	* the file version on your computer may be different.
	<h3>
		Caution
	</h3>
	<p>
		The files in the system directory of Windows are important. Altering them in the wrong way can have unintended consequences.<br>
		Be careful and know what you are doing. It is highly recommended to maintain up to date backup of your data.
	</p>
	<h3>
		Requirements
	</h3>
	<ul class="list-bullet content-list">
		<li><div>Vulkan compatible graphics drivers</div></li>
		<li><div>Administrator rights</div></li>
	</ul>
	<h3>
		Fallback solution
	</h3>
	<p>
		If you do not have a Vulkan compatible driver or are unable to get the Vulkan renderer work, you can fallback to the OpenGL renderer.<br>
		By editing the config file <code class='inline'>DOOMConfig.cfg</code> located at: <code class='inline'>%UserProfile%\Saved Games\id Software\DOOM_SPDemo\base</code>.<br>
		(Where, <code class='inline'>%UserProfile%</code> usually is <code class='inline'>C:\Users\&lt;account_name&gt;</code>)<br>
		<br>
		In it change <code class='inline'>r_renderAPI</code> value from <code class='inline'>1</code> to <code class='inline'>0</code>
	</p>
	<h3>
		Version
	</h3>
	<p>
		<table id='table_version' class='indent-20'>
			<tbody>
				<tr>
					<td>Title</td>
					<td>DOOM 2016 - Demo</td>
				</tr>
				<tr>
					<td>Source</td>
					<td>Steam</td>
				</tr>
				<tr>
					<td>Build</td>
					<td>20160720-180331-purple-razzmatazz<br>
				</tr>
				<tr>
					<td>Date</td>
					<td>15 March 2017<td>
				</tr>
			</tbody>
		</table>
	</p>
	<h3>
		Disclaimer
	</h3>
	<p>
		The information provided here is as is, and without any warranties.<br>
		You will be responsible and not me, for any damage caused inadvertently due to it.<br>
		<br>
		All trademarks are properties of their respective owenrs.
	</p>
</div>
<?php require('..\HTML\Fragment\Component_bottom.php') ?>
