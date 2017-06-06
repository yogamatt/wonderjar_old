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

		<section class="first-section">
		<div class="inner-container">
		<div class="col-6" style="float: left; width: 50%;">
		<h1>Lets get creative.</h1>
		<h4>Reinvent your web presence</h4>
		</div>
		<div class="col-6 full-image" style="float: left; width: 50%;"><img src="../images/uploads/interior/manthinking.png" width="300" height="400" /></div>
		<div style="clear: both;">&nbsp;</div>
		</div>
		</section>
		<section class="second-section" style="background: #78e8b4;">
		<div class="inner-container">
		<div class="col-12" style="float: left; width: 100%; text-align: center;">
		<h3>We offer free website audits.</h3>
		<button class="mce-button"><a href="#">Click here for more info.</a></button></div>
		<div style="clear: both;">&nbsp;</div>
		</div>
		</section>
		<section class="third-section">
			<div class="inner-container">
				<div class="col-6" style="float: left; width: 50%;">
					<h2 style="text-align: center;">3 Left</h2>
					<p style="text-align: center;">Lorem ipsum dolor sit amet, aliquam eu, justo id. Sociis eget, blandit vehicula, taciti quam. Laoreet ut at, maecenas magna. Lorem auctor nonummy. Pede tellus ligula, cras vitae.</p>
				</div>
				<div class="col-6" style="float: left; width: 50%;">
					<h2 style="text-align: center;">3 RIGHT</h2>
					<p style="text-align: center;">Lorem ipsum dolor sit amet, aliquam eu, justo id. Sociis eget, blandit vehicula, taciti quam. Laoreet ut at, maecenas magna. Lorem auctor nonummy. Pede tellus ligula, cras vitae.</p>
				</div>
				<div style="clear: both;">&nbsp;</div>
			</div>
		</section>

	<div class="homepage-mce-content">
		<?php echo $page_content; ?>
	</div>
</div>


<?php

// Include Footer
include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');
echo '<!-- End Footer -->';

?>