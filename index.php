<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$age = $_POST['age'];
		

		if(!empty($age))
		{

			//save to database
			$name = $user_data['user_name'];
			$query = "UPDATE usertable
			SET 
				age = $age
			WHERE
			user_name = '$name';";
			//$query = "insert into users (age,DOB,contact) values ('$age','$DOB','$contact') where user_name = $user_data['user_name']";

			mysqli_query($con, $query);

			//header("Location: login.php");
			//die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<br>
	Hello, <?php echo $user_data['user_name']; ?>

	<div>
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			Age:<input type="text" name="age"><br><br>
			

			<input id="button" type="submit" value="Update"><br><br>

		</form>

	</div>
</body>
</html>