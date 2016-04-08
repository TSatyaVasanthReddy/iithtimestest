<?php session_start(); 
if(isset($_SESSION['login_user']))
{
header("location: postlogin.php");}
?>

<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/mystyles.css">
		<title>IITH Times Admin</title>
	</head>
	<body>
	<script src="bootstrap/js/jquery.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<nav class="navbar navbar-inverse navbar-fixed-top" >
		<div class="container-fluid">
			<h1><a class="navbar-brand" href="#">HiIITH Times Admin</a>
			</h1>
		</div>
	</nav>
	<div class="jumbotron ">
		<div class="container">
		<img src="images/rsz_banner.png" style= "width:100% " class="img-responsive">
		</div>
	</div>
	<div class="container" style="background-color: #318DDE;border-radius:3px;">
		<br/><div class="jumbotron">
			<form action="checklogin.php" name="loginform"  method="post" >
				<div class="form-group">
					<input type="text" name="username" placeholder="User name"/>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password"/>
				</div>
				<div class="form-group">
					<input name="submit" type="submit" class="btn btn-primary" value="Submit"/>
				</div>
			</form>
		</div>
	</div>
	</body>
</html>