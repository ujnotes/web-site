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
		<strong>चित्र श्रेय:</strong> तृतीय-पक्ष छवियाँ उनकी संबंधित अनुज्ञप्तियों या लागू कॉपीराइट अपवादों के अंतर्गत उपयोग की गई हैं। कॉपीराइट संबंधित स्वामियों के पास रहता है। जहाँ आवश्यक है, श्रेय और अनुज्ञप्ति जानकारी छवि के साथ या उसके <a class='content-link XURL' href='/license' data-target='license' data-title='License'>स्रोत लिंक</a> पर दी गई है।
	</p>
</div>
<div id='fb_components'>
	<?php require('../HTML/Fragment/Component_FB_buttons.php') ?>
</div>
