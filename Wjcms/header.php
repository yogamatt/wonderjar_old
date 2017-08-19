<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Find your new website development solutions. Specialized in innovative and modern styles.">
	<meta name="keywords" content="Website Development, Website Design, Denver Website Development, Denver Website Design">
	<meta name="author" content="Matthew Ediger">
	<title>Wonderjar Creative</title>
	<link rel="shortcut icon" href="/favicon.ico?v2">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://use.fontawesome.com/cba49e1fab.js"></script>
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="../includes/css/responsive.css">
	<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/functions.php'); ?>
	<?php if (!empty($load)) wj_head($load); ?>
</head>
<body class="<?php wj_body_classes($bodyclass); ?>">

	<header class="main-header" id="top" role="header">
		<div class="inner-container">
			<div class="header-container">
				<div class="logo-container">
					<a href="/" class="logo-link">
						<img src="/images/uploads/logo/logo-black-sans.png" alt="wjlogo" class="logo">
					</a>
				</div>
				<div class="navigation-container">
					<div class="menu-toggle">
						<span class="top"></span>
						<span class="middle"></span>
						<span class="bottom"></span>
					</div>

					<?php

						// Include main-menu
						include ($_SERVER['DOCUMENT_ROOT'].'/templates/template-parts/header/menu.php');

					?>

				</div><!-- navigation-container -->
			</div><!-- header-container -->
		</div><!-- inner-container -->
	</header>


	<div class="main-content">
		
