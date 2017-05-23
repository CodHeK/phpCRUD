<?php
	$name = $_POST['name'];
	$password = $_POST['password'];

	if(!empty($name) && !empty($password)) {
		$dbc = mysqli_connect('localhost', 'root', '', 'login');

		$result = mysqli_query($dbc, "SELECT * FROM userDetails WHERE name = '$name' AND password = '$password'")
			or die("Error Connecting to DataBase");

		$row = mysqli_fetch_array($result);

		if($row['name'] == $name && $row['password'] == $password) {
			echo '<h1> "', $name, ' " You have logged in Successfully </h1>', '<br>';
		}
		else {
			echo 'Error Logging In !';
		}
	}
	else {
		echo 'Enter All Details first';
	}