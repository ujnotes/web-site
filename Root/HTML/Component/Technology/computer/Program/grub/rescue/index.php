<div id='message'>
	<p>
		The moral of the story is try each partition until it works =p.
	</p>
	<p>
		<strong>error.</strong> No such partition.
	</p>
	<p>
		Grub rescue&gt; ls /boot.
	</p>
	<p>
		<strong>error.</strong> No such partition.
	</p>
	<p>
		Grub rescue&gt; ls.
	</p>
	<p>
		(hd0) (hd0,msdos3) (hd0,msdos2) (hd0,msdos1).
	</p>
	<h3>This is a comment. The following is choosing the non linux partition by mistake... error unknown filesystem should alert you to the mischoice. Keep choosing until you get the right one!</h3>
	<p>
		Grub rescue&gt; set prefix=(hd0,msdos1)/boot/grub.
	</p>
	<p>
		Grub rescue&gt; set root=(hd0,msdos1).
	</p>
	<p>
		Grub rescue&gt; set.
	</p>
	<p>
		Prefix=(hd0,msdos1)/boot/grub.
	</p>
	<p>
		Root=hd0,msdos1.
	</p>
	<p>
		Grub rescue&gt; ls /boot.
	</p>
	<p>
		<strong>error.</strong> Unknown filesystem.
	</p>
	<h3>Here I choose the correct partition - an ubuntu one. Note that the ls /boot doesn't give an error!</h3>
	<p>
		Grub rescue&gt; set prefix=(hd0,msdos3)/boot/grub.
	</p>
	<p>
		Grub rescue&gt; set root=(hd0,msdos3).
	</p>
	<p>
		Grub rescue&gt; set.
	</p>
	<p>
		Prefix=(hd0,msdos3)/boot/grub.
	</p>
	<p>
		Root=hd0,msdos3.
	</p>
	<p>
		Grub rescue&gt; ls /boot.
	</p>
	<p>
		Blah blah blah loads of stuff, I'm not going to type it all out... its similar to the junk about generic and abi from the blog thing.
	</p>
	<p>
		Grub rescue&gt; insmod /boot/grub/linux.mod.
	</p>
	<p>
		Grub rescue&gt; linux /vmlinuz root=/dev/sda3 defaults.
	</p>
	<p>
		Grub rescue&gt; initrd /initrd.img.
	</p>
	<p>
		Grub rescue&gt; boot.
	</p>
	<p>
		________________.
	</p>
	<p>
		#Booted! Its TERMINAL time! Open your linux terminal and plonk this in. Credit to http://techgage.com/news/repairing_a_broken_grub_2_boot-loader_on_ubuntu/.
	</p>
	<p>
		Sudo update-grub.
	</p>
	<p>
		Sudo grub-install /dev/sda.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
