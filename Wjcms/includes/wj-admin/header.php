<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Find your new website development solutions. Specialized in innovative and modern styles.">
	<meta name="keywords" content="Website Development, Website Design, Denver Website Development, Denver Website Design">
	<meta name="author" content="Matthew Ediger">
	<title>Wonderjar Creative Admin</title>
	<link rel="shortcut icon" href="/favicon.ico?v2">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=fqhsjzfokm37l2nbloqm58b7r692cf1f23izojenn42260ws"></script>
	<link rel="stylesheet" href="/style.css">
	<link rel="stylesheet" href="/wj-admin/includes/css/admin-style.css">
	<link rel="stylesheet" href="/includes/css/responsive.css">
	<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/functions.php'); ?>
	<script>
	  tinymce.init({
	    selector: 'textarea'
	  });
  </script>
</head>
<body class="<?php wj_body_classes($bodyclass); ?>">
	<header class="main-header" id="top" role="header">
		<div class="inner-container">
			<div class="main-contain">
				<div class="main-logo-contain contain">
					<a href="/" class="main-logo-link">
						<img src="/images/logo/wjmagicwand.png" alt="plc" class="main-logo logo">
					</a>
				</div>
				<div class="main-navigation contain">
					<!-- Header-menu admin-->
					<?php include ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/templates/template-parts/header/menu.php'); ?>
					<!-- End header-menu admin -->
					<nav class="main-connect">
						<ul class="main-connect-ul">
							<li class="connect social">
								<a href="/wj-admin/logout.php" class="table"><span class="cell">Logout</span></a>
							</li>
							<li class="connect contact">
								<a href="/wj-admin/index.php?page=index" class="table"><span class="cell">WJ-Admin</span></a>
							</li>
						</ul>
					</nav><!-- connect -->
				</div><!-- main-navigation -->
			</div><!-- link-nav-contain -->
		</div><!-- inner-container -->
	</header>
	<div class="main-content">
