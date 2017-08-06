<?php
/**
 * Wonderjar Admin Template Part - Plugins List
 * @author Matt
 * @category admin, template-part
 * @version 1.0
 * @since 2017-06-06
 *
 */

?>


<?php

// output opening html
wj_before_content($type = 'plain-section');

?>

	<header class="admin-header">
		<h2>Page archive</h2>
	</header>
	<div class="plugins-container">
		<div class="plugins-buttons">
			<button class="wj-admin">
				<a href="/wj-admin/index.php?page=plugins&plug_id=new">New plugin</a>
			</button>
		</div>

		<?php get_plugin_list(); ?>

	</div>

<?php

// output closing html
wj_after_content($type = 'plain-section');