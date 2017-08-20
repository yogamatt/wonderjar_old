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


 <div class="homepage-tagline">
	<div class="inner-container">
		<div class="tagline">
			<?php return_tagline(); echo $tagline_content; ?>
		</div>
		<div class="tag-image">
			<img src="../images/uploads/tagline/manthinking.png" width="300" height="400" />
		</div>

	</div>
</div>
<div class="homepage-promo">
	<div class="inner-container">
		<div class="small-container">
			<?php return_promo(); echo $promo_content; ?>
		</div>
	</div>
</div>