<nav class="main-nav">
	<ul class="main-nav-ul">
		<li class="section-link">
			<a href="/#solutions">Solutions</a>
		</li>
		<li class="section-link">
			<a href="/#portfolio">Portfolio</a>
		</li>
		<li class="connect social">
			<?php

			//Is this an admin?
			if (isset($_SESSION['admin'])) {

			?>

				<a href="/wj-admin/logout.php">Logout</a>
								
			<?php

			//No?, What else
			} else {

			?>

				<a href="#">Social</a>

			<?php

			//Endif
			}

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