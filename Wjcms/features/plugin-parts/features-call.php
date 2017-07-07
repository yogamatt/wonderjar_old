<?php
/**
 * Features Plugin Part - call
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 */


?>

<div class="feature-container">

	<?php

	// @vars: $plugin_dir, $dir
	//		  $fc_order, $fc_title, $fc_image, $fc_excrept, $fc_content

	$c = 0;

	while ($stmt->fetch()):

		// feature image src
		$fc_image_src = $dir . '/assets/images/icons/' . $fc_image;

		// number is even if the count is divisible by 2 with no remainder
		if ($c % 2 == 0): ?>

			<section class="feature-section feature-section-<?php echo $c; ?> feature-id-<?php echo $fc_id; ?>">	
				<div class="feature-row top-row">
					<div class="inner-container">
						<div class="feature-col-12 top-row-container">
							<div class="feature-image-container">
								<a class="feature-image-link">
									<img src="<?php echo $fc_image_src; ?>">
								</a>
							</div>
							<header class="feature-header">
								<h2 class="feature-title"><?php echo $fc_title; ?></h2>
							</header>
						</div>
					</div>
				</div>
				<div class="feature-row bottom-row">
					<div class="inner-container">
						<div class="feature-col-6 feature-excerpt">
							<?php echo $fc_excrept; ?>
						</div>
						<div class="feature-col-6 feature-content">
							<?php echo $fc_content; ?>
						</div>
					</div>
				</div>
			</section>

		<?php else: ?>

			<section class="feature-section feature-section-<?php echo $c; ?> feature-id-<?php echo $fc_id; ?> feature-odd">	
				<div class="feature-row top-row">
					<div class="inner-container">
						<div class="feature-col-12 top-row-container">
							<header class="feature-header">
								<h2 class="feature-title"><?php echo $fc_title; ?></h2>
							</header>
							<div class="feature-image-container">
								<a class="feature-image-link">
									<img src="<?php echo $fc_image_src; ?>">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="feature-row bottom-row">
					<div class="inner-container">
						<div class="feature-col-6 feature-content">
							<?php echo $fc_content; ?>
						</div>
						<div class="feature-col-6 feature-excerpt">
							<?php echo $fc_excrept; ?>
						</div>
					</div>
				</div>
			</section>

		<?php endif; ?>

	<?php

		$c++;
		endwhile;
	?>

</div>