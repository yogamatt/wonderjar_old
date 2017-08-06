<?php

/**
 * Wonderjar Admin Template - Index
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-17
 *
 */

// Output opening HTML
wj_before_content($type = 'banner-section');

?>

<header class="admin-header">
	<h2>Wonderjar Admin Page</h2>
</header>

<h3>Check out <a href="/wj-admin/index.php?page=options">options</a> and <a href="/wj-admin/index.php?page=plugins">plugins</a></h3>

<?php

// Output closing HTML
wj_after_content($type = 'banner-section');

?>