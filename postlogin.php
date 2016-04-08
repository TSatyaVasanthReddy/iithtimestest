<?php session_start(); 
if(!isset($_SESSION['login_user']))
{
header("location: login.php");}
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
	<script src="bootstrap/js/bootstrapconf.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		function confirmSubmit() {
			var eleform=document.newsform;
			var headl=eleform.headline.value;
			var descr=eleform.description.value;
		  if (confirm("Hey ! Are you sure you want to submit the form?"+"\nThis is what you entered .\nHeadline :"+headl+"\nDescription :"+descr)) {
		  		return true;
		    }
		  return false;
		}


	</script>
	<nav class="navbar-inverse  navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
				<a class="navbar-brand" href="#">IITH Times Admin</a>
			<div class="navbar-header navbar-right">
				<ul class="nav navbar-nav">

					<li><a href="viewnews.php">View News</a></li>
					<li>
					<li><a href=""></a></li>
					<li>
					<li><a href=""></a></li>
					<li>
					<form action="logout.php"><button name="Logout" type="submit" class="btn btn-primary"   value="Logout" ><b>Log Out</b></button>
					</form>
					</li>
				</u/>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="jumbotron ">
			<div class="container">
			<h1>Hello <?php echo $_SESSION['login_user']."! Let's put some news" ;?></h1>
			</div>
		</div>
		<div class="container" style="background-color: #318DDE;border-radius:3px;">
					<br/>
		<div class="jumbotron">

			<form action="addnews2.php" onsubmit="return confirmSubmit(); " enctype="multipart/form-data" id="submitform" name="newsform"  method="post" >
				<h3>Select a Catogery of News</h3>
				<div class="form-group" >
					<select name="category" style="height:70px; width:15%">
						<option value="none">Category</option>
					    <option value="clubs">clubs</option>
					    <option value="events">events</option>
					    <option value="departments">departments</option>
					    <option value="opinions">opinions</option>
					    <option value="placements">placements</option>
					    <option value="archives">archives</option>
					</select>
				</div>
				<h3>Headline</h3>
				<div class="form-group">
					<textarea style="height:50px; width:75%" type="text" name="headline" placeholder="Enter the headline"></textarea>
				</div>
				<div class="form-group">
					<textarea style="height:70px; width:75%" type="text" name="brief" placeholder="Brief of news item"></textarea>
				</div>
				<h3>Description</h3>
				<div class="form-group">
					<textarea style="height:150px; width:75%" type="text" name="description" placeholder="Description of news item"></textarea>
				</div>

				<h3>Add tag/id to the item </h3>
				<div class="form-group">
					<textarea style="height:50px; width:50%" type="text" name="tagid" placeholder="Enter a unique"></textarea>
				</div>
				
				<h4>Add custom image</h4>
				<br/>
				<div class="form-group">
 					<input  name="upfile" type="file" id="fileToUpload" />
				</div>
				<br/>


				<h4>Add thumbnail</h4>
				<br/>
				<div class="form-group">
 					<input  name="thupfile" type="file" id="thfileToUpload" />
				</div>
				<div class="form-group">
					<button  name="submit" type="submit" class="btn btn-primary" data-toggle="confirmation"  value="Submit" >Submit</button>
				</div>
				
			</form>
		</div>
		</div>
	</div>
</body>
</html>