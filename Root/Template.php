<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" itemscope="" itemtype="http://schema.org/">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="title" content="WCode" />
		<meta itemprop="name" content="WCode" />
		<meta itemprop="image" content="http://wcodes.org/icon-social.png" />
		<meta property="og:title" content="WCode" />
		<meta property="og:type" content="product" />
		<meta property="og:url" content="http://wcodes.org" />
		<meta property="og:image" content="http://wcodes.org/icon-social.png" />
		<meta property="og:description" content="Convert your mobile number, email-id and address into a bunch of common words like 'cat apple mango tomato'. Encode with words" />
		<meta property="og:site_name" content="WCodes" />
		<meta property="fb:app_id" content="387976024626014" />
		<meta property="fb:admins" content="100000014591845" />
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
			  src: local('Abel'), local('Abel-Regular'), url(http://fonts.gstatic.com/s/abel/v6/brdGGFwqYJxjg2CD1E9o7g.woff2) format('woff2');
			  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
			}
		</style>
<?php
	if($bPublish) {
		require "JS/Head Scripts - GA.html";
?>
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<script type="text/javascript" src="/script.js" defer></script>
<?php
	}
	else {
?>
		<link rel="stylesheet" type="text/css" href="/CSS/Style.css" />
		<link rel="stylesheet" type="text/css" href="/CSS/Menu.css" />
		<link rel="stylesheet" type="text/css" href="/CSS/Content.css" />
		<script type="text/javascript" src="/JS/script.js"></script>
		<script type="text/javascript" src="/JS/AJAXLoad.js"></script>
		<script type="text/javascript" src="/JS/API.js"></script>
		<script type="text/javascript" src="/JS/ClassList.js"></script>
		<script type="text/javascript" src="/JS/Classie.js"></script>
<?php
	}
?>
		<title>
<?php
			if($id === "root")
				echo "Ujnotes"." : ".$desc;
			else {
				if($desc)
					echo "Ujnotes - ".$title." : ".$desc;
				else
					echo "Ujnotes - ".$title;
			}
?>
		</title>
	</head>
	<body>
		<script async src="https://apis.google.com/js/platform.js" defer></script>
		<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		<div id="main-wrapper">
			<div id="content-wrapper">
			<?php require "Header.html"; ?>
			<div id="wrapper">
				<div id="main">
					<div class="container">
						<div id="content-wrapper-inside">
							<div class="shadow-scroll-top"></div>
							<div id="canvas-wrapper" class="<?php echo $menu_active_class ?>">
									<div id="path"><?php if($id !== "root") echo $title; else echo "&nbsp;"?></div>
								<div id="canvas-wrapper-inner-container">
									<?php require "Menu.html"; ?>
									<div id="canvas-main">
										<?php require (GetComponentPath($id)) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<?php require "Footer.html"; ?>
		</div>
	</body>
</html>
