<!DOCTYPE html>
<html>
<head>
	<title>ThankYou</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];

	if(!empty($name)) {
		if(!empty($email)) {
			if(!empty($password) && !empty($rpassword)) {
				if($password == $rpassword) {
				$dbc = mysqli_connect('localhost', 'root', '', 'login')
					or die('Error conencting to DataBase1');

				$query = "INSERT INTO userDetails (name, email, password) VALUES ('$name', '$email', '$password');";

				$result = mysqli_query($dbc, $query)
					or die('Error connecting to DataBase2');

				$message = "
					<html>
					<body>
						<h1>Please Click on the link below to verify your email ID</h1>
						<a href='http://localhost/phpLogin/login.html'>http://localhost/phpLogin/login.html</a>
					</body>
					</html>
				";

				$from = "iit2016038@iiita.ac.in";

				$to = $email;

				$subject = "Verification Mail";

				$mail = mail($to,$subject,$message,'From:'.$from);

				if($mail) {
					echo 'Mail Sent';
				}
				else {
					echo 'Mail not Sent';
				}

				mysqli_close($dbc);

				echo '<div class="container">', '<br>';
				echo '<h1>ThankYou " ', $name,' " For Submitting Form</h1>', '<br>';
				echo '<h2> Please, Check your mail and verify it ! :D </h2>', '<br>';
				echo '</div>';

			}
			else {
				echo 'Make Sure both passwords are similar';
			}
		}
		else {
			echo 'Enter Your Password';
		}
	}
	else {
		echo 'Enter Your Email';
	}
	}
	else {
		echo 'Enter Your Name';
	}
?>
</body>
</html>