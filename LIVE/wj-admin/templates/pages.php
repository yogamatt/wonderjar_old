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

// Output opening HTML
wj_before_content($type = 'banner-section');
	
	?>

	<header class="admin-header">
		<h2>Page archive</h2>
	</header>
	<div class="pages-container">
		<div class="pages-helpers">
			<button data-action="new-page">
				<a href="/wj-admin/index.php?page=new-page">New page</a>
			</button>

		</div>
		<ul class="pages">

			<?php 
			
				// While loop to fetch values
				while ($stmt->fetch()) {

					?>

					<li>

						<div class="page-options">
							<a href="<?php echo '/wj-admin/index.php?page=new-page&p_id=' . $page_id . '&action=meta'; ?>">add meta</a>
							<a href="<?php echo '/wj-admin/index.php?page=new-page&p_id=' . $page_id . '&action=delete'; ?>">delete page</a>
						</div>

						<h3><a href="<?php echo '/wj-admin/index.php?page=new-page&p_id=' . $page_id; ?>"><?php echo $page_title; ?></a></h3>

					</li>

					<?php

				}

			?>

		</ul>
	</div>


	<?php

// Close statement
$stmt->close();

// Close connection
$conn->close();

// Output closing HTML
wj_after_content($type = 'banner-section');

?>