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
$stmt = $conn->prepare("SELECT `page_id`,`page_title`,`page_special` FROM `pages`");

// Bind result variables
$stmt->bind_result($page_id, $page_title, $page_special);

// Execute statement
$stmt->execute();

// Output opening HTML
wj_before_content($type = 'plain-section');
	
	?>

	<header class="admin-header">
		<h2>Page archive</h2>
	</header>
	<div class="pages-container">
		<div class="pages-buttons">
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
						<h3>
							<a href="<?php echo '/wj-admin/index.php?page=new-page&p_id=' . $page_id; ?>">

							<?php

							// Get $page_special value
							// MySQL tbl `page_special`

							// Initialize $page_speciality
							$page_speciality = $page_title;

							if ($page_special === 'homepage') {

								$page_speciality .= '<span class="page-special">- Home</span>';
							
							} elseif ($page_special === 'blogpage') {
							
								$page_speciality .= '<span class="page-special">- Blog</span>';
							
							}

							// Echo $page_specialty if set
							echo $page_speciality;

							?>

							</a>
						</h3>


						<div class="page-options">
							<a href="<?php echo '/wj-admin/index.php?page=new-page&p_id=' . $page_id . '&action=meta'; ?>">add meta</a>
							<a href="<?php echo '/wj-admin/index.php?page=new-page&p_id=' . $page_id . '&action=delete'; ?>">delete page</a>
						</div>

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
wj_after_content($type = 'plain-section');

?>