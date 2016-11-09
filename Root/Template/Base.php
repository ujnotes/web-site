<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" itemscope="" itemtype="http://schema.org/">
	<head>
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="title" content="<?php echo $config['project_title'] ?>" />
		<meta itemprop="name" content="<?php echo $config['project_title'] ?>" />
		<meta itemprop="image" content="<?php echo $config['base_url'] ?>/icon-social.png" />
		<?php require 'Fragment\OG_Meta.php' ?>
		<?php require 'Fragment\FB_Meta.php' ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon.png" />
		<!--link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'-->
		<style>
			/* latin */
			@font-face {
			  font-family: 'Abel';
			  font-style: normal;
			  font-weight: 400;
			  src: local('Abel'), local('Abel-Regular'), url(//fonts.gstatic.com/s/abel/v6/brdGGFwqYJxjg2CD1E9o7g.woff2) format('woff2');
			  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
			}
		</style>
<?php
	if($bPublish) {
?>
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<script type="text/javascript" src="/script.js" defer></script>
<?php
	}
	else {
?>
		<script type="text/javascript">
			var PROJECT_TITLE = '<?php echo $config['project_title']; ?>';
		</script>
		<link rel="stylesheet" type="text/css" href="/Framework/CSS/Style.css" />
		<link rel="stylesheet" type="text/css" href="/Framework/CSS/Menu.css" />
		<link rel="stylesheet" type="text/css" href="/Framework/CSS/Content.css" />
		<script type="text/javascript" src="/JS/PageAJAX.js"></script>
		<script type="text/javascript" src="/Framework/JS/script.js"></script>
		<script type="text/javascript" src="/Framework/JS/AJAXLoad.js"></script>
		<script type="text/javascript" src="/Framework/JS/API.js"></script>
		<script type="text/javascript" src="/Framework/JS/ClassList.js"></script>
		<script type="text/javascript" src="/Framework/JS/Classie.js"></script>
<?php
	}
?>
		<title>
<?php
			if($id === "root")
				echo $config['project_title']." : ".$desc;
			else {
				if($desc)
					echo $config['project_title']." - ".$title." : ".$desc;
				else
					echo $config['project_title']." - ".$title;
			}
?>
		</title>
		<?php
			if($bPublish) {
				require "../Framework/Fragment/HeadScript_GA.php";
			}
		?>
	</head>
	<body>
		<?php if($bPublish) {
			require "../Framework/Fragment/BodyBegin_FB.php";
		?>
			<script async src="//apis.google.com/js/platform.js" defer></script>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		<?php
			}
		?>
		<script>
/**
* Function that tracks a click on an outbound link in Analytics.
* This function takes a valid URL string as an argument, and uses that URL string
* as the event label. Setting the transport method to 'beacon' lets the hit be sent
* using 'navigator.sendBeacon' in browser that support it.
*/
var trackOutboundLink = function(url) {
	 ga('send', 'event', 'outbound', 'click', url, {
		 'transport': 'beacon',
		 'hitCallback': function(){document.location = url;}
	 });
}
</script>
		<div id="main-wrapper">
			<div id="content-wrapper">
			<?php require "../Fragment/Header.php"; ?>
			<div id="wrapper">
				<div id="main">
					<div class="container">
						<div id="content-wrapper-inside">
							<div class="shadow-scroll-top"></div>
							<div id="canvas-wrapper" class="<?php echo $menu_active_class ?>">
								<div id="path"><?php require "Fragment\Path.php" ?></div>
								<div id="title"><?php echo ($id === "root"? "" : $title) ?></div>
								<div id="canvas-wrapper-inner-container">
									<?php require "../Fragment/Menu.html"; ?>
									<div id="canvas-main">
										<?php require (getComponentPath($id)) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<?php require "../Fragment/Footer.php"; ?>
		</div>
	</body>
</html>