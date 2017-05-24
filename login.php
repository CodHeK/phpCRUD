<!DOCTYPE html>
<html>
<head>
	<title>MyProfile</title>
	<link rel="icon" href="fav.jpg" type="image/x-icon"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/css?family=Changa:200|Source+Sans+Pro:200" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<style type="text/css">
		body {
			background-color: black;
			color: white;
			font-family: Changa;
		}

		.nav-wrapper {
				background-color: black;
			}
			a {
				text-decoration: none;
			}

			#logo {
				margin-left: 5%;
				color: #304352;
				text-decoration: none;
			}


	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#AllP, #myp, #changep").hide();

			$("#changepass").click(function() {
				$("#AllP, #myp").hide();
				$("#changep").fadeIn(2000);
			});

			$("#mypost").click(function() {
				$("#AllP, #changep").hide();
				$("#myp").fadeIn(2000);
			});
		});
	</script>
</head>
<body>
<div class="navbar-fixed">
	<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo" id="logo" style="text-decoration: none;color: white;">phpCRUD</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 5%;">
         <li><a href="http://localhost/phpcrud/index.html#" id="out">LOG OUT</a></li>
        <li><a href="#" id="two" style="border: 0.5px solid #c0c0c0;">
        	<?php
				$name = $_POST['firstname'];
				$password = $_POST['password'];

				echo $name;
			?>



			</a>
        </li>
      </ul>
    </div>
  </nav>
  </div>

  <nav style="margin-left: 5%;">
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#" class="breadcrumb" id="allpost" style="font-weight: 700;color: white;">All Posts</a>
        <a href="#" class="breadcrumb" id="mypost" style="font-weight: 700;color: white;">New Post</a>
        <a href="#" class="breadcrumb" id="changepass" style="font-weight: 700;color: white;">Change Password</a>
      </div>
    </div>
  </nav>
  <hr style="margin-left: 5%;width: 80%; ">
          
          <div id="AllP"></div>
          <div id="myp">
          	<h3 style="font-family: 'Source Sans Pro', sans-serif;color: white;text-align: center;">Create a new post</h3><br>
          	<form method="POST" class="col s12" action="newpost.php">
          	<div class="row">
        <div class="input-field col s6" style="margin-left: 27%;">
          <input id="title" type="text" name="title" class="validate">
          <label for="title" data-error="wrong" data-success="right">Add you post title</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6" style="margin-left: 27%;">
          <textarea id="textarea1" name="body" class="materialize-textarea"></textarea>
          <label for="textarea1">Body of your post</label>
        </div>
      </div>
      <div class="row">
      	<input type="submit" class="waves-effect waves-light btn" name="submit" value="SUBMIT POST" style="background-color: black; border: 1px solid white;color: white;font-weight: 700;margin-left: 44%;">
      </div>
      </form>
      </div>
  </div>
      </div>
          </div>

          <div id="changep">
          		<h3 style="font-family: 'Source Sans Pro', sans-serif;color: white;text-align: center;">Change Password</h3><br>
          		<form method="POST" class="col s12" action="changep.php">
      <div class="row">
      <div class="input-field col s4"></div>
        <div class="input-field col s4">
          <input id="icon_prefix" type="password" name="opassword" class="validate">
          <label for="icon_prefix">Old Password</label>
        </div>
        <div class="input-field col s4"></div>
      </div>
      <div class="row">
      <div class="input-field col s4"></div>
        <div class="input-field col s4">
          <input id="icon_prefix" type="password" name="npassword" class="validate">
          <label for="icon_prefix">New Password</label>
        </div>
        <div class="input-field col s4"></div>
      </div>
      <div class="row">
      	<input type="submit" class="waves-effect waves-light btn" name="submit" value="SAVE" style="background-color: black; border: 1px solid white;color: white;font-weight: 700;margin-left: 46%;">
      </div>
    </form>
          </div>
		<?php

	if(!empty($name) && !empty($password)) {
		$dbc = mysqli_connect('localhost', 'root', '', 'login');

		$result = mysqli_query($dbc, "SELECT * FROM userDetails WHERE name = '$name' AND password = '$password'")
			or die("Error Connecting to DataBase");

		$row = mysqli_fetch_array($result);

		if($row['name'] == $name && $row['password'] == $password) {
			// 
			?>
		<!-- 	<script type="text/javascript">
				alert("Logged in Succesfully !");
			</script> -->
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
	?>

	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>




