<div id='message'>
	<p>
		https://pureinfotech.com/create-bootable-windows-11-usb-install-media/
	</p>
	<p>
		Use Command Prompt to create a bootable USB to install Windows 11.
	</p>
	<p>
		Caution: <code class='inline'>diskpart</code> <code class='inline'>clean</code> deletes everything on the selected disk. Run Command Prompt as Administrator. The <code class='inline'>select disk 1</code> value is an example — replace <code class='inline'>1</code> with the flash drive's number from <code class='inline'>list disk</code>.
	</p>
	<h2>Download the ISO</h2>
	<ol class="list-number content-list">
		<li><div>Open Microsoft Support website.</div></li>
		<li><div>Under the "Download Windows 11 Disk Image (ISO)" section, select the Windows 11 option.</div></li>
		<li><div>Click the Download button.</div></li>
		<li><div>Select the installation language.</div></li>
		<li><div>Click the Confirm button.</div></li>
		<li><div>Click the Download button to save the Windows 11 ISO file on the device.</div></li>
	</ol>
	<h2>Prepare the USB</h2>
	<p>
		Open Start. Search for Command Prompt, right-click the top result, and select Run as Administrator.
	</p>
	<p>
		Open Diskpart:
	</p>
	<pre class='indent-c'><code class='block'>diskpart</code></pre>
	<p>
		Determine the USB flash drive:
	</p>
	<pre class='indent-c'><code class='block'>list disk</code></pre>
	<p>
		Select the storage (<code class='inline'>1</code> is an example):
	</p>
	<pre class='indent-c'><code class='block'>select disk 1</code></pre>
	<p>
		Delete everything from the USB flash drive:
	</p>
	<pre class='indent-c'><code class='block'>clean</code></pre>
	<p>
		Create a primary partition:
	</p>
	<pre class='indent-c'><code class='block'>create partition primary</code></pre>
	<p>
		Select the new partition:
	</p>
	<pre class='indent-c'><code class='block'>select partition 1</code></pre>
	<p>
		Make the USB flash drive bootable:
	</p>
	<pre class='indent-c'><code class='block'>format FS=FAT32 quick</code></pre>
	<p>
		Assign a volume and a drive letter (<code class='inline'>X</code> is any available letter):
	</p>
	<pre class='indent-c'><code class='block'>assign letter=X</code></pre>
	<p>
		Quit Diskpart:
	</p>
	<pre class='indent-c'><code class='block'>exit</code></pre>
	<h2>Mount the ISO and copy files</h2>
	<p>
		Mount the Windows 11 ISO (update the path):
	</p>
	<pre class='indent-c'><code class='block'>PowerShell Mount-DiskImage -ImagePath "C:\path\to\Windows11.iso"</code></pre>
	<p>
		Launch Diskpart again:
	</p>
	<pre class='indent-c'><code class='block'>diskpart</code></pre>
	<p>
		Determine the drive letter for the mounted Windows 11 ISO file:
	</p>
	<pre class='indent-c'><code class='block'>list volume</code></pre>
	<p>
		Exit Diskpart:
	</p>
	<pre class='indent-c'><code class='block'>exit</code></pre>
	<p>
		Access the Windows 11 ISO file (<code class='inline'>E:</code> is an example):
	</p>
	<pre class='indent-c'><code class='block'>E:</code></pre>
	<p>
		Enter the boot folder:
	</p>
	<pre class='indent-c'><code class='block'>cd boot</code></pre>
	<p>
		Update the volume boot code for the USB flash drive:
	</p>
	<pre class='indent-c'><code class='block'>bootsect /nt60 X:</code></pre>
	<p>
		Copy all the Windows 11 installation files to the USB flash drive. Change <code class='inline'>E</code> and <code class='inline'>X</code> to the ISO and USB letters:
	</p>
	<pre class='indent-c'><code class='block'>xcopy E:\*.* X:\ /E /F /H</code></pre>
	<p>
		After these steps, the bootable flash drive can install Windows 11 on devices using UEFI.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
