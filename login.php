<?php
	$name = $_POST['firstname'];
	$password = $_POST['password'];

	if(!empty($name) && !empty($password)) {
		$dbc = mysqli_connect('localhost', 'root', '', 'login');

		$result = mysqli_query($dbc, "SELECT * FROM userDetails WHERE name = '$name' AND password = '$password'")
			or die("Error Connecting to DataBase");

		$row = mysqli_fetch_array($result);

		if($row['name'] == $name && $row['password'] == $password) {
			// 
			?>
			<script type="text/javascript">
				alert("Logged in Succesfully !");
			</script>
			<?php
		}
		else {
			// echo 'Error Logging In !';
			?>
			<script type="text/javascript">
				alert("Error Logging In !");
			</script>
			<?php
		}
	}
	else {
		?>
			<script type="text/javascript">
				alert("Enter All details First !");
			</script>
			<?php
	}
