<?php
	require_once 'Fragment/Item_text.php';
	require_once 'Fragment/Item_image.php';
	require_once __DIR__.'/../../../Fragment/Home_menu.php';
?>
<div id='message'>
	<div>
		<div id='home-message'>
			<p>नमस्ते,</p>
			<p>
				मैं <?php link_xurl('about_me', 'उज्ज्वल सिंह') ?> हूँ।
			</p>
			<p>
				यहाँ मैं अपने विचार, निष्कर्ष और सुझाव साझा करता हूँ।
			</p>
			<p>
				मैं उन्हें अधिक सही और उपयोगी बनाने का प्रयास करता हूँ।
			</p>
			<p>
				नई जानकारी मिलने पर इनमें बदलाव हो सकते हैं।
			</p>
			<p>
				मैं <?php link_xurl('world/philosophy/life', 'जीवन') ?>, <?php link_xurl('world/philosophy/death', 'मृत्यु') ?> और <?php link_xurl('world/philosophy/god', 'ईश्वर') ?> से लेकर समसामयिक विषयों तक लिखता हूँ।
			</p>
			<p>
				मैं कंप्यूटर और तकनीक के बारे में भी लिखता हूँ।
			</p>
			<p>
				नीचे दिए गए सामाजिक माध्यमों पर ‘Ujnotes’ को फ़ॉलो करें।
			</p>
		</div>
		<div id='profile-image-container' class='message_leave'>
			<a id='profile-image' href='#'>
				<img src='/photo.jpg' alt='लेखक की तस्वीर'>
			</a>
		</div>
	</div>
</div>
<div class='center' id='content-body-separator'></div>
<div class='message_center_div' id='home-menu'>
	<section class="home-menu-branch" aria-label="<?php echo htmlspecialchars(getComponentLabel('world')) ?>">
		<?php home_menu_render_branch('world'); ?>
	</section>
	<section class="home-menu-branch" aria-label="<?php echo htmlspecialchars(getComponentLabel('computer')) ?>">
		<?php home_menu_render_branch('computer'); ?>
	</section>
	<p id='home-image-disclaimer'>
		इस पृष्ठ की कुछ छवियाँ उनके संबंधित स्वामियों की कॉपीराइट हैं। वे सीमित, गैर-व्यावसायिक, सूचनात्मक संदर्भ में उचित उपयोग (fair use) के अंतर्गत यहाँ दी गई हैं। कोई स्वामित्व दावा नहीं किया जाता।
	</p>
</div>
<div id='fb_components'>
	<?php require('../HTML/Fragment/Component_FB_buttons.php') ?>
</div>
