<?php
/**
 * Features Plugin Part - Features
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_id, $plugin_name, $plugin_dir, $dir, 
 *			$fc_id, $fc_order, $fc_title, $fc_image, $fc_excrept, $fc_content
 */


?>

<div id="plugin-<?php echo $plugin_id; ?>" class="features-container">
	<div class="inner-container">
		<header class="plugin-header">
			<h2 class="plugin-title"><?php echo $plugin_name; ?></h2>
		</header>
		<ul class="features-list">

			<?php

			// start count
			$c = 0;

			while ($stmt->fetch()):

				// feature image src
				$fc_image_src = $dir . '/assets/images/icons/' . $fc_image;

				?>
					
					<li class="feature-item feature-id-<?php echo $fc_id; ?> item-<?php echo $c; ?>">

						<div class="item-blurb">
							<span class="feature-bar feature-bar-top"></span>

								<div class="feature-image-container">
									<a href="#<?php echo $fc_title; ?>" class="feature-image-link">
										<img src="<?php echo $fc_image_src; ?>" class="feature-image">
									</a>
								</div>

								<h3 class="feature-title">
									<a href="#<?php echo $fc_title; ?>">
										<?php echo $fc_title; ?>
									</a>
								</h3>

								<div class="feature-excerpt">
									<?php echo $fc_excrept; ?>
								</div>
							
							<span class="feature-bar feature-bar-bottom"></span>
						</div>
						<div class="item-content">

							<?php echo $fc_content; ?>

						</div>
					</li>

			<?php $c++; ?>

			<?php endwhile; ?>

		</ul>
	</div>
</div>


