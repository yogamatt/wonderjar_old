<?php
/**
 * Wonderjar Login Page
 * @author Matt
 * @since 1.0
 *
 */

//Got variables? If not, print page
if (isset($_POST['user'])) {

	// Include functions
	require ($_SERVER['DOCUMENT_ROOT'].'/functions.php');

	//Connect to database
	wj_connect();

		
	$user = $_POST['user'];
	$password = $_POST['password'];

	if ($stmt = $conn->prepare("SELECT `password` FROM `users` WHERE `username` = ? LIMIT 1")) {
		
		$stmt->bind_param('s', $user);
		$stmt->execute();

		//Get Result and Bind it
		$stmt->bind_result($hashedpass);
		$stmt->fetch();

		if (password_verify($password,$hashedpass)) {
			echo '<div class="main-content">' . $user . ' has logged in.';
			$_SESSION['admin'] = $user;
		} else {
			echo '<div class="main-content">Your terrible password attempt of ' . $password . ' failed, ' . $user . '.';
		}

		//Close Statement
		$stmt->close();

	} else {
		echo 'SQL Failed';
	}

	//Close Connection
	$conn->close();

	//Close Div
	echo '</div>';

	header('Refresh: 1; URL=http://wonderjarcreative.com/wj-admin/');

} else {


?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<div class="main-content wj-admin">
	<section class="main-section admin-section">
		<div class="inner-container">
			<div class="section-content">

				<form action="/wj-admin/" method="post" class="login">
					<div class="form-row">
						<div class="form-input">
							<label for="user">Username:</label>
							<input type="text" name="user" placeholder="User">
						</div>
						<div class="form-input">
							<label for="password">Password:</label>
							<input type="password" name="password" placeholder="Password">
						</div>
						<div class="form-submit">
							<input type="submit" name="submit" placeholder="Submit">
						</div>
					</div>
				</form>

			</div><!-- section-content -->
		</div><!-- inner-container -->
	</section><!-- end section -->
</div><!-- main-content -->

<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>

<?php

//Endif
}

?>