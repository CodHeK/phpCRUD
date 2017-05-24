<!DOCTYPE html>
<html>
<head>
	<title>MyProfile</title>
	<link rel="icon" href="fav.jpg" type="image/x-icon"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

			.like {
				color: white;
			}




	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#AllP, #myp, #changep").hide();

			$("#changepass").click(function() {
				$("#AllP, #myp, #allmyp").hide();
				$("#changep").fadeIn(2000);

			});

			$("#mypost").click(function() {
				$("#AllP, #changep, #allmyp").hide();
				$("#myp").fadeIn(2000);
				
			});

			 $('.datepicker').pickadate({
    			selectMonths: true, // Creates a dropdown to control month
    			selectYears: 15 // Creates a dropdown of 15 years to control year
 			 });
       
			$("#allpost").click(function() {
				$("#changep, #myp, #allmyp").hide();
				$("#AllP").fadeIn(2000);
				
			});

			$("#allmypost").click(function() {
				$("#changep, #myp, #AllP").hide();
				$("#allmyp").fadeIn(2000);
				
			});

			$(".like").click(function() {
				$(".like").css("color", "rgb(207,0,15)");
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
        <a href="#" class="breadcrumb" id="allmypost" style="font-weight: 700;color: white;">My Posts</a>
        <a href="#" class="breadcrumb" id="mypost" style="font-weight: 700;color: white;">New Post</a>
        <a href="#" class="breadcrumb" id="changepass" style="font-weight: 700;color: white;">Change Password</a>
      </div>
    </div>
  </nav>
  <hr style="margin-left: 5%;width: 80%; ">
          

          <div id="allmyp">
          	<h3 style="font-family: Source Sans Pro;margin-left: 5%;color: white;">My Posts :</h3>
          	<hr style="margin-left: 5%;width: 80%;">
          	<?php

          		$db = mysqli_connect('localhost', 'root', '', 'posts')
          			or die("Error connecting db");

          		$q = mysqli_query($db, "SELECT * FROM nposts ORDER BY dater DESC;")
          			or die("Error");


				while($rows = mysqli_fetch_array($q)) {
					if($rows['name'] == $name) {
					echo '<br>';
					echo '<div class = "col s12" id="posts" style="border: 0.5px solid #c0c0c0;margin-left:5%;width:80%;">';
					echo '<h3 style="font-family: Source Sans Pro;font-weight: 700;color: white;margin-left:5%;">', $rows['title'], '</h3>';
					echo '<hr style="margin-left:5%;width:90%;">', '<br>';
					echo '<h5 style = "font-family: Source Sans Pro;color: white;margin-left:5%;">By,  <b> ',$rows['name'],'</b> on  <b>',$rows['dater'], '</b>', '<br>';
					echo '<p style="font-family: Source Sans Pro;color:white;">',$rows['body'],'</p>';
					// echo '<a href="#" style="text-decoration:none;" class="like"><i class="fa fa-heart" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp', $rows['likes'] , '<br>';
					echo '</div>', '<br>';

				}
			}


          		?>
          </div>
          <div id="AllP">
          <h3 style="font-family: Source Sans Pro;margin-left: 5%;color: white;">All Posts :</h3>
          	<hr style="margin-left: 5%;width: 80%;">
          	<?php

          		$db = mysqli_connect('localhost', 'root', '', 'posts')
          			or die("Error connecting db");

          		$q = mysqli_query($db, "SELECT * FROM nposts ORDER BY dater DESC;")
          			or die("Error");


				while($rows = mysqli_fetch_array($q)) {
					echo '<br>';
					echo '<div class = "col s12" id="posts" style="border: 0.5px solid #c0c0c0;margin-left:5%;width:80%;">';
					echo '<h3 style="font-family: Source Sans Pro;font-weight: 700;color: white;margin-left:5%;">', $rows['title'], '</h3>';
					echo '<hr style="margin-left:5%;width:90%;">', '<br>';
					echo '<h5 style = "font-family: Source Sans Pro;color: white;margin-left:5%;">By,  <b> ',$rows['name'],'</b> on  <b>',$rows['dater'], '</b>', '<br>';
					echo '<p style="font-family: Source Sans Pro;color:white;">',$rows['body'],'</p>';
					// echo '<a href="#" style="text-decoration:none;" class="like"><i class="fa fa-heart" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp', $rows['likes'] , '<br>';
					echo '</div>', '<br>';

				}


          		?>
          </div>
          <div id="myp">
          	<h3 style="font-family: 'Source Sans Pro', sans-serif;color: white;text-align: center;">Create a new post</h3><br>
          	<form method="POST" class="col s12" action="newpost.php">
          	<div class="row">
          	<div class="row">
        <div class="input-field col s6" style="margin-left: 27%;">
          <input id="name" type="text" name="name" class="validate">
          <label for="name" data-error="wrong" data-success="right">Author's name</label>
        </div>
        </div>
        <div class="input-field col s3" style="margin-left: 27%;">
          <input id="title" type="text" name="title" class="validate">
          <label for="title" data-error="wrong" data-success="right">Add your post title</label>
        </div>
        <div class="input-field col s3">
        	<input id="dater" name="dater" type="date" class="datepicker"> 
        	<label for="dater" data-error="wrong" data-success="right">Date of post</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6" style="margin-left: 27%;">
          <input id="summary" type="text" name="summary" class="validate">
          <label for="title" data-error="wrong" data-success="right">Summary of your post</label>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s6" style="margin-left: 27%;">
          <textarea id="body" name="body" class="materialize-textarea"></textarea>
          <label for="body">Body of your post</label>
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




