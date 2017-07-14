<?php
/**
 * Wonderjar Template - Homepage
 * @author Matt
 * @category template
 * @version 1.0
 * @since 2017-03-29
 *
 */





// add homepage to bodyclass
$bodyclass .= 'homepage ';

// add extra stylesheets for plugins
extra_stylesheets();

// include header
include ($_SERVER['DOCUMENT_ROOT'].'/header.php');
echo '<!-- End Header -->';

?>


<div class="homepage-content">

	<section class="homepage-branding">
		<?php include ($_SERVER['DOCUMENT_ROOT'] . '/templates/template-parts/homepage/homepage-branding.php'); ?>
	</section>

	<section class="homepage-plugin-area">
		<div class="feature-plugin">
			<?php call_shortcode('features'); ?>
		</div>
	</section>

	<section class="homepage-mce-content">

		<header class="homepage-header">
			<?php show_homepage_title(); ?>
		</header>
		<main class="homepage-main">
			<?php show_homepage_content(); ?>
		</main>

	</section>

</div>


<?php

// add extra scripts for plugins
extra_scripts();

// include footer
include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');
echo '<!-- End Footer -->';

?>