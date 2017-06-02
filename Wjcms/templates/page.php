<?php
/**
 * Wonderjar Page Template
 * @author Matt
 * @category template
 * @version 1.0
 * @since 2017-03-29
 *
 */


// Non-homepage template
// Connect to database
wj_connect();

// Grab pages
// SQL

$sql = "SELECT * FROM `pages` WHERE `page_id` = ?";

if ($stmt = $conn->prepare($sql)) {

	// Bind paramaters
	$stmt->bind_param("s", $page_id);

	// Set variable paramaters
	$page_id = $_GET['p_id'];

	// Execute
	$stmt->execute();

	// Bind result paramaters
	$stmt->bind_result($page_id, $page_time, $page_special, $page_title, $page_content, $page_permalink);

	// Fetch
	$stmt->fetch();

	$stmt->close();

}

$conn->close();


// Include header
include ($_SERVER['DOCUMENT_ROOT'].'/header.php');
echo '<!-- End Header -->';


// Output opening HTML
wj_before_content($type = 'main-section');

?>

	<header class="content-header">
		<h1><?php echo $page_title; ?></h1>
	</header>

	<?php echo $page_content; ?>


<?php

// Output closing HTML
wj_after_content($type = 'main-section');


// Include Footer
include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');
echo '<!-- End Footer -->';

?>
