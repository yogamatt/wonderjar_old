<?php

/**
 * Wonderjar Main Index Template
 * @author Matt
 * @category template
 * @version 1.0
 * @since 2017-03-17
 *
 */

		require ($_SERVER['DOCUMENT_ROOT'].'/wj-admin/assets/wj-connect.php');

		$conn = new mysqli('localhost', $wj_username, $wj_password, $wj_dbname);

		if ($conn->connect_error) {
	    	die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
		}


		// SQL
		if ($stmt = $conn->prepare("SELECT `option_value` FROM `options` WHERE `option_name` = 'option_homepage' LIMIT 1")) {
		
			$stmt->execute();

			// Bind results to var $options
			$stmt->bind_result($homepage);

		}

		echo $homepage;

		$conn->close();

// If home page - output the banner-section
// else - output main-section
if ($homepage == 'index.php'){

	// Opening HTML tags
	wj_before_content($type = 'banner-section');

	?>

		<div class="banner">
			<img src="/images/banner/istock-643791624.jpg" alt="istock">
		</div>

	<?php

	// End banner-section content
	wj_after_content($type = 'banner-section');


} else {

	// Opening HTML tags
	wj_before_content($type = 'main-section');
	?>

		<div>
			<p>G's up.</p>
		</div>

	<?php
	// Closing HTML tags
	wj_after_content($type = 'main-section');
}

?>