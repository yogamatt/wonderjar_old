<?php
/**
 * Wonderjar Template Part - Homepage Sections
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */

 ?>


<?php if (is_array(get_homepage('homepage-section-1'))): ?>
	<!-- section 1 -->
	<section class="homepage-mce-content homepage-section-1">
		<header class="homepage-header">
			<?php show_homepage_title('homepage-section-1'); ?>
		</header>
		<main class="homepage-main">
			<?php show_homepage_content('homepage-section-1'); ?>
		</main>
	</section>
	<!-- end section 1 -->
<?php endif; ?>


<?php if (is_array(get_homepage('homepage-section-2'))): ?>
	<!-- section 2 -->
	<section class="homepage-mce-content homepage-section-2">
		<header class="homepage-header">
			<?php show_homepage_title('homepage-section-2'); ?>
		</header>
		<main class="homepage-main">
			<?php show_homepage_content('homepage-section-2'); ?>
		</main>
	</section>
	<!-- end section 2 -->
<?php endif; ?>

<?php if (is_array(get_homepage('homepage-section-3'))): ?>
	<!-- section 2 -->
	<section class="homepage-mce-content homepage-section-3">
		<header class="homepage-header">
			<?php show_homepage_title('homepage-section-3'); ?>
		</header>
		<main class="homepage-main">
			<?php show_homepage_content('homepage-section-3'); ?>
		</main>
	</section>
	<!-- end section 2 -->
<?php endif; ?>

<?php if (is_array(get_homepage('homepage-section-4'))): ?>
	<!-- section 2 -->
	<section class="homepage-mce-content homepage-section-4">
		<header class="homepage-header">
			<?php show_homepage_title('homepage-section-4'); ?>
		</header>
		<main class="homepage-main">
			<?php show_homepage_content('homepage-section-4'); ?>
		</main>
	</section>
	<!-- end section 2 -->
<?php endif; ?>


