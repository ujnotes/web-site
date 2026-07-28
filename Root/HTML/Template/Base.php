<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en' itemscope='' itemtype='http://schema.org/WebPage'>
<script>(function(){try{var t=localStorage.getItem('cutie-dark-mode');t=t==='true'?'dark':t==='false'?'light':t;if(t!=='system'&&t!=='light'&&t!=='dark')t='system';var r=t==='system'&&window.matchMedia&&window.matchMedia('(prefers-color-scheme: dark)').matches?'dark':t==='system'?'light':t;document.documentElement.setAttribute('data-theme-preference',t);document.documentElement.setAttribute('data-theme-resolved',r);if(r==='dark')document.documentElement.classList.add('dark-mode');document.documentElement.style.colorScheme=r}catch(e){document.documentElement.setAttribute('data-theme-preference','system');document.documentElement.setAttribute('data-theme-resolved','light')}})()</script>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge' >
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >
	<meta name='title' content="<?php echo $desc.' - '.$config['project_title'] ?>" >
	<meta name='author' content="<?php echo $config['author'] ?>" >
	<meta name='viewport' content="width=device-width, initial-scale=1.0, viewport-fit=cover" >
	<meta name='theme-color' content='#ffffff' >
	<?php require __DIR__.'/../../Framework/HTML/Fragment/Google_Plus_meta.php' ?>
	<?php require __DIR__.'/../../Framework/HTML/Fragment/OG_meta.php' ?>
	<?php require __DIR__.'/../../Framework/HTML/Fragment/FB_meta.php' ?>
	<?php require __DIR__.'/../../Framework/HTML/Fragment/Twitter_meta.php' ?>
	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' >
	<link rel='apple-touch-icon' type='image/png' href='/apple-touch-icon.png' >
	<link rel='manifest' href='/manifest.json' >
	<link href="<?php echo $config['base_url']; if($id != 'root') echo '/'.$id ?>" rel='canonical' >
	<title><?php echo $desc.' - '.$config['project_title']; ?></title>
<?php if($bPublish) {
		if(!empty($config['google_tag_id']))
			require '../JS/Fragment/GA_HeadScript.php';
		require '../JS/Fragment/GA_track.js';
		// require '../JS/Fragment/Adsense_auto.php';
?>
		<script <?php require '../JS/Fragment/Sentry_version.php' ?>></script>
		<script><?php require '../JS/Fragment/Sentry_exec.php' ?></script>
		<script src='//apis.google.com/js/platform.js' async defer></script>
		<script src='//platform.twitter.com/widgets.js' async></script>
<?php	}
	require '../JS/Fragment/JS.php';
	require '../JS/Fragment/GTranslate.php';
	require '../JS/Fragment/GCSE.php';
	require '../JS/Fragment/Project_title.php';
	require '../CSS/Fragment/CSS.php';
?>
</head>
<body>
	<?php if($bPublish) { require '../JS/Fragment/BodyBegin_FB.php'; } ?>
	<div id='wait_loader' class='hide'></div>
	<div id='main-wrapper' class="<?php echo $menu_active_class; echo ($id == 'root'? ' '.'hide_path_title_updated' : ' ') ?>">
		<div id='content-wrapper'>
		<?php require '../../HTML/Fragment/Header.php'; ?>
		<div id='wrapper'>
			<div id='main'>
				<div class='container'>
					<div id='content-wrapper-inside'>
						<div class='shadow-scroll-top'></div>
						<div id='google_translate_element'></div>
						<?php require '../HTML/Fragment/GCSE.php' ?>
						<div id='canvas-wrapper'>
							<div id='path-container' class="<?php echo ($id == 'root'? 'hide_scale' : '') ?>"><div id='path'><?php require '../HTML/Fragment/Path.php' ?></div></div>
							<?php
								$prev_article_id = getPrevArticleId($id);
								$next_article_id = getNextArticleId($id);
							?>
							<div id='title-container' class="<?php echo ($id == 'root'? 'hide_scale' : '') ?>">
								<a id='article-prev' class='article-title-nav XURL<?php echo ($prev_article_id == '' ? ' article-title-nav-disabled' : '') ?>'
									<?php if($prev_article_id != '') { ?> href='<?php echo getComponentURL($prev_article_id) ?>' data-target='<?php echo $prev_article_id ?>' data-title='<?php echo htmlspecialchars(getComponentLabel($prev_article_id), ENT_QUOTES, 'UTF-8') ?>' title='Previous article' aria-label='Previous article'
									<?php } else { ?> aria-label='No previous article' aria-disabled='true' tabindex='-1'<?php } ?>>
									<span class='image'><?php includeSVG('', 'Previous'); ?></span>
								</a>
								<h1 id='title'><?php echo ($id == 'root'? '&nbsp;' : $label) ?></h1>
								<a id='article-next' class='article-title-nav XURL<?php echo ($next_article_id == '' ? ' article-title-nav-disabled' : '') ?>'
									<?php if($next_article_id != '') { ?> href='<?php echo getComponentURL($next_article_id) ?>' data-target='<?php echo $next_article_id ?>' data-title='<?php echo htmlspecialchars(getComponentLabel($next_article_id), ENT_QUOTES, 'UTF-8') ?>' title='Next article' aria-label='Next article'
									<?php } else { ?> aria-label='No next article' aria-disabled='true' tabindex='-1'<?php } ?>>
									<span class='image'><?php includeSVG('', 'Next'); ?></span>
								</a>
							</div>
							<div id='canvas-wrapper-inner-container'>
								<?php require '../../HTML/Fragment/Menu.php'; ?>
								<div id='canvas-main'>
									<div id='content'>
										<?php require (getComponentPath($id)) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<?php require '../../HTML/Fragment/Footer.php'; ?>
	</div>
</body>
</html>
