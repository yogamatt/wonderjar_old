<?php
/**
 * Wonderjar Homepage Template
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


// include header
include ($_SERVER['DOCUMENT_ROOT'].'/header.php');
echo '<!-- End Header -->';

?>


<div class="homepage-content">

	<div class="homepage-branding">
		<?php include ($_SERVER['DOCUMENT_ROOT'] . '/templates/template-parts/homepage/homepage-branding.php'); ?>
	</div>

	<div class="homepage-plug">
		
	</div>

	<div class="homepage-mce-content">
		<?php echo $page_content; ?>
	</div>

</div>


<?php

// include footer
include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');
echo '<!-- End Footer -->';

?>