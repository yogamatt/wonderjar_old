<?php
/**
 * Wonderjar Admin Template - Options
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-17
 *
 */


if (!empty($_GET['theme_option'])):

	switch($_GET['theme_option']) {

		case 'tagline':
			include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/template-parts/options/tagline.php');
			break;
		
		case 'promo':
			include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/template-parts/options/promo.php');
			break;
		
		default:
			echo '';

	}

else:

	// original layout
	include ($_SERVER['DOCUMENT_ROOT'] . '/wj-admin/templates/template-parts/options/layout.php');

endif;

