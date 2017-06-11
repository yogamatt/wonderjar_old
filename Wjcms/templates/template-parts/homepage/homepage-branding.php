<?php
/**
 * Wonderjar Template Part - Homepage Branding
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */

 ?>


 <section class="first-section">
	<div class="inner-container">
		<div class="col-6">
			<?php return_tagline(); echo $tagline_content; ?>
		</div>
		<div class="col-6 full-image">
			<img src="../images/uploads/interior/manthinking.png" width="300" height="400" />
		</div>
	</div>
</section>
<section class="second-section">
	<div class="inner-container">
		<?php return_promo(); echo $promo_content; ?>
	</div>
</section>