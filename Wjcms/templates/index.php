<?php
/**
 * Wonderjar Template - Index 
 * @author Matt
 * @category template
 * @version 1.0
 * @since 2017-03-17
 *
 */


if (empty($_GET['p_id'])) {

	// Include homepage template
	include ($_SERVER['DOCUMENT_ROOT'] . '/templates/homepage.php');

} else {

	// Include page template
	include ($_SERVER['DOCUMENT_ROOT'] . '/templates/page.php');
	
}

