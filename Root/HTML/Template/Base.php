<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' itemscope='' itemtype='http://schema.org/'>
<head>
	<meta http-equiv='X-UA-Compatible' content='chrome=1' >
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' >
	<meta name='title' content="<?php echo $config['project_title'] ?>" >
	<meta name='author' content="<?php echo $config['author'] ?>" >
	<meta name='viewport' content="width=device-width, minimum-scale=1.0" >
	<?php require '../HTML/Fragment/Google_plus_meta.php' ?>
	<?php require '../HTML/Fragment/OG_meta.php' ?>
	<?php require '../HTML/Fragment/FB_meta.php' ?>
	<?php require '../HTML/Fragment/Twitter_meta.php' ?>
	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' >
	<link rel='apple-touch-icon' type='image/png' href='/apple-touch-icon.png' >
	<link rel='manifest' href='/manifest.json' >
	<link href="<?php echo $config['base_url']; if($id != 'root') echo '/'.$id ?>" rel='canonical' >
	<title>
<?php
		echo $desc.' - '.$config['project_title'];
?>
	</title>
<?php
	if($bPublish) {
		require '../JS/Fragment/GA_HeadScript.php';
	}
	require '../JS/Fragment/GTranslate.php';
	require '../JS/Fragment/GCSE.php';
	require '../JS/Fragment/Project_title.php';
	require '../CSS/Fragment/CSS.php';
?>
</head>
<body>
<?php
	if($bPublish) {
		require '../JS/Fragment/GA_track.js';
		require '../JS/Fragment/BodyBegin_FB.php';
?>
	<script async src='//apis.google.com/js/platform.js' defer></script>
	<script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>
<?php
	}
?>
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
							<div id='path-container' class="<?php echo ($id == 'root'? 'hide_scale' : '') ?>"><div id=path><?php require '../HTML/Fragment/Path.php' ?></div></div>
							<div id='title-container' class="<?php echo ($id == 'root'? 'hide_scale' : '') ?>"><h1 id='title'><?php echo ($id == 'root'? '&nbsp;' : $title) ?></h1></div>
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
	<?php
		if($bPublish) {
	?>
			<script src='https://cdn.ravenjs.com/3.22.2/raven.min.js' crossorigin='anonymous'></script>
			<script><?php require '../JS/Fragment/Sentry.php' ?></script>
	<?php
		}
		require '../JS/Fragment/JS.php';
	?>
</body>
</html>
