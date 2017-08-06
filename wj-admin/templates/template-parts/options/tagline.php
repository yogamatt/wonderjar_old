<?php
/**
 * Wonderjar Admin Template Part - Options Tagline
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */

submit_tagline();
return_tagline();



// output opening html
wj_before_content($type = 'plain-section');

?>

	<div class="new-page-container">
		<header class="admin-header">
			<h2>Site Tagline</h2>
		</header>
		<div class="form-contain">
			<form id="new-tagline-form" method="post">
				<div class="inner-form">
					<div class="inner-left">
						<fieldset>
							<div class="form-group">
								<label class-"label-top" for="tagline-content">Tagline:</label>
								<textarea rows="10" cols="100" name="tagline-content" id="tagline-content" placeholder="Tagline goes here.."><?php echo $tagline_content; ?></textarea>
							</div>
						</fieldset>
					</div>
					<?php wj_sidebar($type = 'options'); ?>
				</div>
				<fieldset class="submit-group">
					<input type="submit" name="tagline" value="submit">
				</fieldset>
			</form>
		</div>
	</div>

	<?php

// output closing html
wj_after_content($type = 'plain-section');

