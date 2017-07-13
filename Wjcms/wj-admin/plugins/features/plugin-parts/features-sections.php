<?php
/**
 * Features Plugin Part - Section
 * @author Matt
 * @category admin, plugin, plugin-part
 * @version 1.0
 * @since 2017-06-10
 *
 * @returned @vars in use: $plugin_id, $plugin_name, $plugin_dir, $dir, 
 *			$fc_id, $fc_order, $fc_title, $fc_image, $fc_excrept, $fc_content
 */


// start the count
$c = 0;

while ($stmt->fetch()): 

?>

		<section id="<?php echo $fc_title; ?>" class="feature-section feature_section-id-<?php echo $fc_id; ?> feature_section-<?php echo $c; ?> <?php if ($c % 2 !== 0) echo 'odd-feature'; ?>">
			<div class="inner-container">
				<header class="feature-section-header">
					<h2 class="feature-section-title">
						<?php echo $fc_title; ?>
					</h2>
				</header>
				<main class="feature-main">
					<?php echo $fc_content; ?>
				</main>
			</div>
		</section>

<?php $c++; ?>

<?php endwhile; ?>