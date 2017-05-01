<?php
/**
 * Wonderjar Admin Menus Template
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-29
 *
 */

// Output opening HTML
wj_before_content($type = 'plain-section');

?>
	<header class="admin-header">
		<h2>Menus</h2>
	</header>

	<?php
		
		// Get menus sidebar - @function wj_sidebar($type)
		wj_sidebar($type = 'menus');

	?>

	<div class="main-form">
		<div class="form-contain">
			<form id="admin-menus-form" method="post" action="/wj-admin/index.php?page=menus">
				<h3 class="form-title">Set Menu</h3>
				<div class="inner-form">
					<?php

						// Get the current menu - @function get_current_menu()
						get_current_menu();

					?>
				</div>
			</form>
		</div>
		<div class="submit-group">
			<button form="admin-menus-form" type="submit" name="submit" value="submit">Submit</button>
		</div>
	</div>

<?php

// Output closing HTML
wj_after_content($type = 'plain-section');