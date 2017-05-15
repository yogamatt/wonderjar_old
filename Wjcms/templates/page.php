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
	$stmt->bind_result($p_id, $p_time, $p_special, $p_title, $p_content, $p_permalink);

	// Fetch
	$stmt->fetch();

	$stmt->close();

}

$conn->close();

// Output opening HTML
wj_before_content($type = 'main-section');

?>

	<header class="main-header">
		<h1><?php echo $p_title; ?></h1>
	</header>

	<?php echo $p_content; ?>


	<?php

	// Output closing HTML
	wj_after_content($type = 'main-section');



	?>
