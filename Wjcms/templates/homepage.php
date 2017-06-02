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


// Add homepage to bodyclass
$bodyclass .= 'homepage ';


// Include header
include ($_SERVER['DOCUMENT_ROOT'].'/header.php');
echo '<!-- End Header -->';

?>


<div class="homepage-content">
	<?php echo $page_content; ?>
</div>


<?php

// Include Footer
include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');
echo '<!-- End Footer -->';

?>