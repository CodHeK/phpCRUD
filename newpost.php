<!DOCTYPE html>
<html>
<head>
	<title>NewPostAdded</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Changa:200|Source+Sans+Pro:200" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
	
	$name = $_POST['name'];
	$title = $_POST['title'];
	$summary = $_POST['summary'];
	$body = $_POST['body'];
	$dater = $_POST['dater'];

	if(!empty($name) && !empty($title) && !empty($summary) && !empty($body) && !empty($dater)) {

			$dbc = mysqli_connect('localhost', 'root', '', 'posts')
				or die("Error connecting to DataBase");

			$result = mysqli_query($dbc, "INSERT INTO nposts (name, title, summary, body, dater) VALUES ('$name', '$title', '$summary', '$body', '$dater');")
				or die("Error");

			mysqli_close($dbc);

				echo '<div class="container">', '<br>';
				echo '<div id="content" style="text-align:center;margin: 0 auto;font-family:Source Sans Pro;color:white;">';
				echo '<h3>ThankYou " ', $name,' ", Your post was added Successfully !</h3>', '<br>';
				echo '<h4> You need to login again! </h4>', '<br>';
				echo '<a href="http://localhost/phpcrud/index.html#" class="btn btn-deafult">LOGIN</a>', '</br>';
				echo '</div>';
				echo '</div>';
	}
?>
</body>
</html>

	
	


