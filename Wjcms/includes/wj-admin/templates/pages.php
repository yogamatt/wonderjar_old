<?php

/**
 * Wonderjar Admin Pages Template
 * @author Matt
 * @category admin, template
 * @version 1.0
 * @since 2017-03-17
 *
 */

// Connect to database
wj_connect();

// SQL
$stmt = $conn->prepare("SELECT `page_id`,`page_title` FROM `pages`");

// Execute statement
$stmt->execute();

// Bind result variables
$stmt->bind_result($page_id, $page_title);
	
	?>

	<header class="admin-header">
		<h2>Page archive</h2>
	</header>
	<div class="pages-container">
		<div class="pages-offshoots">
			<a href="/wj-admin/index.php?page=new-page">New page</a>
		</div>
		<ul class="pages">

			<?php 
			
				// While loop to fetch values
				while ($stmt->fetch()) {

					echo '<li><h3><a href="/wj-admin/index.php?page=new-page&p_id=' . $page_id . '&action=edit">' . $page_title . '</a></h3>';

					?>

						<div class="pages-edit">
							<a href="<?php echo '/wj-admin/index.php?page=new-page&p_id=' . $page_id . '&action=delete'; ?>">(delete page)</a>
						</div>

					<?php

					echo '</li>';

				}

			?>

		</ul>
	</div>


	<?php

// Close statement
$stmt->close();

// Close connection
$conn->close();