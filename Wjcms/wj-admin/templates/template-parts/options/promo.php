<?php
/**
 * Wonderjar Admin Template Part - Options Promo
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */

submit_promo();
return_promo();



// output opening html
wj_before_content($type = 'plain-section');

?>

	<div class="new-page-container">
		<header class="admin-header">
			<h2>Site Promotion</h2>
		</header>
		<div class="form-contain">
			<form id="new-promo-form" method="post">
				<div class="inner-form">
					<div class="inner-left">
						<fieldset>
							<div class="form-group">
								<label class-"label-top" for="promo-content">Promotion:</label>
								<textarea rows="10" cols="100" name="promo-content" id="promo-content" placeholder="Tagline goes here.."><?php echo $promo_content; ?></textarea>
							</div>
						</fieldset>
					</div>
					<?php wj_sidebar($type = 'options'); ?>
				</div>
				<fieldset class="submit-group">
					<input type="submit" name="promo" value="submit">
				</fieldset>
			</form>
		</div>
	</div>

	<?php

// output closing html
wj_after_content($type = 'plain-section');

