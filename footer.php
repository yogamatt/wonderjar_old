<?php

/**
 * Main Footer
 * @author Matt
 * @version 1.0
 * @since 2017-03-18
 *
 */

?>


</div><!-- End main-content -->
<footer class="main-footer">
	<div class="inner-container">
		<div class="footer-copywrite">
			<p>&copy; Wonderjar Creative</p>
	</div><!-- inner-container -->

	<?php include ($_SERVER['DOCUMENT_ROOT'].'/includes/scripts/foot-scripts.php'); ?>
	<?php if (!empty($script)) wj_footer($script); ?>
</footer>