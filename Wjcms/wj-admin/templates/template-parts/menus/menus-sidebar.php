<?php
/**
 * Wonderjar Admin Menus-Sidebar Template Part
 * @author Matt
 * @category admin, template-part, sidebar, menu
 * @version 1.0
 * @since 2017-03-30
 *
 * Notes: This is the template part for the sidebar in /wj-admin/templates/menus.php
 *		  This template part is used for retreiving and displaying the current pages
 *		  for selection and insertion into the live-menu area.
 *
 */

?>

<aside class="sidebar menus">
	<header class="form-header">
		<h3 class="form-title">Single Page Options</h3>
	</header>
	<div class="form-contain">
		<form id="admin-inputs-sets" method="post" action="/wj-admin/templates/menus.php">
			<div class="inner-form">
				<fieldset>
					<?php
					/*
					 * @function menu_set_inputs()
					 * from: /functions.php:468
					 *
					 */
						menu_set_inputs();
					?>
				</fieldset>
				<fieldset class="submit-group">
					<button type="submit" name="submit" value="submit">Add Page</button>
				</fieldset>
			</div>
		</form>
	</div>
</aside>
