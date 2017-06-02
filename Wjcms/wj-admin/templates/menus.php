<?php
/**
 * Wonderjar Admin Menus Template
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-29
 *
 */

// Grab submitted current-menu
if (isset($_POST['submit'])):
	current_menu_submit();

elseif (isset($_GET['action'])):
	delete_menu_item();

endif;


// Output opening HTML
wj_before_content($type = 'plain-section');

?>
	<header class="admin-header">
		<h2>Menus</h2>
	</header>

	<?php
		
		// Get menus sidebar
		wj_sidebar($type = 'menus');

	?>

	<div class="main-form">
		<div class="form-contain">
			<form id="current-menu" name="current-menu" method="post" action="/wj-admin/index.php?page=menus">
				<h3 class="form-title">Current Menu</h3>
				<div class="inner-form">
					<?php

						// Insert current menus
						current_menu();
					?>
				</div>
			</form>
		</div>
		<div class="submit-group">
			<button form="current-menu" type="submit" name="submit" value="submit">Submit</button>
		</div>
	</div>

<?php

// Output closing HTML
wj_after_content($type = 'plain-section');

?>