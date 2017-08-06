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
$bodyclass .= 'home ';

// add extra stylesheets for plugins
extra_stylesheets();

// include header
include ($_SERVER['DOCUMENT_ROOT'] . '/header.php');

?>


<div class="homepage-content">

	<section class="homepage-branding">
		<?php include ($_SERVER['DOCUMENT_ROOT'] . '/templates/template-parts/homepage/homepage-branding.php'); ?>
	</section>

	<section class="homepage-section homepage-mce-content homepage">
		<div class="inner-container">
			<div class="col-container">
				<div class="col-6">
					<header class="homepage-header">
						<?php show_homepage_title('homepage'); ?>
					</header>
					<main class="homepage-main">
						<?php show_homepage_content('homepage'); ?>
					</main>
				</div>
				<div class="col-6">
					<?php call_shortcode('forms'); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="homepage-section homepage-plugin-area">
		<div class="inner-container">
			<div class="feature-plugin">
				<?php call_shortcode('features'); ?>
			</div>
		</div>
	</section>

	<?php include ($_SERVER['DOCUMENT_ROOT'] . '/templates/template-parts/homepage/homepage-sections.php'); ?>

</div>


<?php

// add extra scripts for plugins
extra_scripts();

// include footer
include ($_SERVER['DOCUMENT_ROOT'] . '/footer.php');

?>