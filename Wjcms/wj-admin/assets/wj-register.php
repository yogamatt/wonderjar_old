<?php

/**
 * Wonderjar Register Page
 * @author Matt
 * @since 1.0
 *
 */


//Returning with variables? If not, print page
if ($_POST['user']) {

	// Include functions
	require ($_SERVER['DOCUMENT_ROOT'].'/functions.php');

	//Connect to database
	wj_connect();


	$user = $_POST['user'];
	$password = $_POST['password'];
	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql = "INSERT INTO users (username, password) VALUES ('$user', '$password')";

	if (!$conn->query($sql) === TRUE) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	} else {
		include ($_SERVER['DOCUMENT_ROOT'].'/header.php');
	    echo '<div class="main-content">New record created successfully</div>';
	    include ($_SERVER['DOCUMENT_ROOT'].'/footer.php');
	}

	$conn->close();

} else {

?>

	<!-- Include Header -->
	<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

	<div class="main-content wj-admin">
		<section class="main-section admin-section">
			<div class="inner-container">
				<div class="section-content">

					<form action="/wj-admin/wj-register.php" method="post" class="login">
						<div class="form-row">
							<div class="form-input">
								<label for="user">Username:</label>
								<input type="text" name="user">
							</div>
							<div class="form-input">
								<label for="password">Password:</label>
								<input type="password" name="password">
							</div>
							<div class="form-submit">
								<input type="submit" value="Submit">
							</div>
						</div><!-- form-row -->
					</form>


				</div><!-- section-content -->
			</div><!-- inner-container -->
		</section><!-- end section -->
	</div><!-- main-content -->

	<!-- Include Footer -->
	<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>

<?php 

//Endif
}

?>