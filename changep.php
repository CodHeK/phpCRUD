<!DOCTYPE html>
<html>
<head>
	<title>ChangePassword</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Changa:200|Source+Sans+Pro:200" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<style type="text/css">
		body {
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>
	<?php 

		$opass = $_POST['opassword'];
		$npass = $_POST['npassword'];

		if(!empty($opass) && !empty($npass)) {
			$dbc = mysqli_connect('localhost', 'root', '', 'login');
			$query = mysqli_query($dbc, "SELECT * FROM userDetails WHERE password = '$opass'")
			or die("Error fetching user");

			$row1 = mysqli_fetch_array($query);

			if($row1['password'] == $opass) {
					$result = mysqli_query($dbc, "UPDATE userDetails SET password = '$npass' WHERE password = '$opass'")
					or die("Error");

				?>
					
					<?php
					mysqli_close($dbc);
					echo '<div class="container">', '<br>';
				echo '<div id="content" style="text-align:center;margin: 0 auto;font-family:Source Sans Pro;">';
				echo '<h3>You Have Changed Password Successfully !</h3>', '<br>';
				echo '<h4> Please, Login Again to proceed !</h4>', '<br>';
				echo '<a href="http://localhost/phpcrud/index.html#" class="btn btn-deafult">LOG IN</a>', '</br>';
				echo '</div>';
				echo '</div>';
			}
			else {
					?>
					<script type="text/javascript">
						alert("Old Password Doesnt Match !");
					</script>
					<?php
			}
		}
		else {
			?>
			<script type="text/javascript">
				alert("Enter All Fields");
			</script>
			<?php

		}
		?>
</body>
</html>

