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
 * 
 * From: /functions.php:113
 *
 * Get the homepage page
 * returns: `page_id`, `page_time`, `page_special`, `page_title`, `page_content`
 *
 */

wj_get_homepage();


// Output opening HTML
wj_before_content($type = 'main-section');

?>

<header class="main-header">
	<h1><?php echo $page_title; ?></h1>
</header>

<?php echo $page_content; ?>

<?php

// Output closing HTML
wj_after_content($type = 'main-section');

?>