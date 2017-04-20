<?php

/**
 * Wonderjar Admin Template-Part Menu
 * @author Matt
 * @category admin, template-part, menu
 * @version 1.0
 * @since 2017-03-17
 *
 */


?>

<nav class="main-nav">
	<ul class="main-nav-ul">
		<li class="section-link">
			<a href="/wj-admin/index.php?page=options">Options</a>
		</li>
		<li class="section-link">
			<a href="/wj-admin/index.php?page=pages">Pages</a>
		</li>
		<li class="section-link">
			<a href="/wj-admin/index.php?page=plugins">Plugins</a>
		</li>
		<li class="connect social">
			<?php

			//Is this an admin?
			if (isset($_SESSION['admin'])):

			?>
				<a href="/wj-admin/logout.php">Logout</a>
								
								<?php

								//No?, What else
								 else:

								?>

									<a href="#">Social</a>

								<?php

								endif;

								?>
							</li>
							<li class="connect contact">
								<?php

								//Is this an admin?
								if (isset($_SESSION['admin'])) {

								?>
									<a href="/wj-admin/index.php?page=index">WJ-Admin</a>
								
								<?php

								//No?, What else
								} else {

								?>

									<a href="/#contact">Contact</a>

								<?php

								//Endif
								}

				?>
		</li>
	</ul>
</nav><!-- main-nav -->