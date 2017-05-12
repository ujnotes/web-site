<?php
	require_once '../API/Config.php';
	$config = loadConfig();
	$webMasterId = 'webmaster'.'@'.$config['site_domain'];
	if( isset($_GET['mode']) && ($_GET['mode'] === 'publish') )
		$bPublish = TRUE;
	else
		$bPublish = FALSE;
?>
<!doctype html>
<html>
<head>
	<title>Page Not Found<?php echo ' - '.$config['project_title'] ?></title>
	<?php
		if($bPublish) {
			require '../JS/Fragment/GA_headScript.php';
		}
	?>
	<style>
	@font-face {
		font-family: 'Abel';
		font-style: normal;
		font-weight: 400;
		src: local('Abel'), local('Abel-Regular'), url(//fonts.gstatic.com/s/abel/v6/brdGGFwqYJxjg2CD1E9o7g.woff2) format('woff2');
		unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
	}
	body {
		margin: 0 auto;
		padding: 1em;
		font-family: Abel;
		font-size: 1.1em;
		color: #474747;
	}
	@media screen and (min-width: 40em) {
		body {
		  width: 40em;
		}
	}
	h1 {
		margin: 1em 0;
		padding: 0 0 0.25em 0;
		border-bottom: 1px dotted #ccc;
		text-align: center;
		font-size: 3em;
		line-height: 1.1em;
		color: #7F7F7F;
	}
	p {
		margin-left: auto;
		margin-right: auto;
		line-height: 1.8em;
	}
	#logo {
		display: block;
		margin: 3em 0;
		text-align: center;
	}
	#url {
		text-align: center;
		color: #69B7CF;
		font-size: x-large;
		display: block;
	}
	#mail-link {
		text-decoration: none;
		color: #69b7cf !important;
		text-align: right;
		margin-left: auto;
		margin-right: auto;
		display: block;
	}
	</style>
</head>
<body>
	<h1>Page Not Found</h1>
	<p>
		This specified file was not found on this website:
		<span id='url'></span>
	</p>
	<p>
		Please check the URL for mistakes and try again.
	</p>
	<p>
		Or,
	</p>
	<p>
		continue to the homepage:
	</p>
	<a id='header-logo-href' href='/'>
		<span id='logo'>
			<?php require '../../Resource/Logo_Full.svg' ?>
		</span>
	</a>
	<a id='mail-link' href='mailto:<?php echo $webMasterId ?>?subject=<?php echo $config['project_title'] ?>-404'><?php echo $webMasterId ?></a>
	<script language='JavaScript'>
		document.getElementById('url').innerHTML = window.location.href;
	</script>
</body>
</html>
