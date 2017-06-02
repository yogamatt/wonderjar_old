<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Find your new website development solutions. Specialized in innovative and modern styles.">
	<meta name="keywords" content="Website Development, Website Design, Denver Website Development, Denver Website Design">
	<meta name="author" content="Matthew Ediger">
	<title>WJ Administrations</title>
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
	    selector: 'textarea#page-content',
	    plugins: [
	    		'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
  				'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
  				'save table contextmenu directionality emoticons template paste textcolor'
  			],
  		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
	  	protect: [
	  		/<\?php.*?\?>/g
	  	]
	  });
  </script>
</head>
<body class="<?php wj_body_classes($bodyclass); ?>">
	<header class="main-header" id="top" role="header">
		<div class="inner-container">
			<div class="header-container">
				<div class="logo-container">
					<a href="/" class="logo-link">
						<img src="/images/uploads/logo/wjmagicwand.png" alt="wonderjar-logo" class="logo">
					</a>
				</div>
				<div class="navigation-container">
					<!-- Header-menu admin-->
					<?php include ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/templates/template-parts/header/menu.php'); ?>
					<!-- End header-menu admin -->
				</div><!-- navigation-container -->
				<div class="connection">
				</div><!-- connection -->
			</div><!-- header-container -->
		</div><!-- inner-container -->
	</header>
	<div class="main-content">
