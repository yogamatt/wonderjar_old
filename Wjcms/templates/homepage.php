<?php
/**
 * Wonderjar Template - Homepage
 * @author Matt
 * @category template
 * @version 1.0
 * @since 2017-03-29
 *
 */


/*
 * @function wj_get_homepage()
 * returns: `page_id`, `page_time`, `page_special`, `page_title`, `page_content`
 */

wj_get_homepage();


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

	<section class="plugin-area">
		<div class="feature-plugin">
			<?php call_shortcode('feature-01'); ?>
		</div>
	</section>

	<section class="homepage-mce-content">
		<div class="inner-container">
			<div class="col-container">
				<?php echo $page_content; ?>
			</div>
		</div>
	</section>

</div>


<?php

// add extra scripts for plugins
extra_scripts();

// include footer
include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');
echo '<!-- End Footer -->';

?>