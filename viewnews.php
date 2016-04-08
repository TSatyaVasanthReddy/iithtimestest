<?php 
include 'helperfunctions.php';
$head='<!DOCTYPE html>
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
	<nav class="navbar-inverse  navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
				<a class="navbar-brand" href="postlogin.php">IITH Times Admin</a>
			<div class="navbar-header navbar-right">
				<ul class="nav navbar-nav">

					<li><a href="#">View News</a></li>
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
	</nav>';
	
	echo "<br/><br/>";
$mainbody='<div  id="accordion" role="tablist" aria-multiselectable="true" >';
$x = 1; 
$sql="select * from testtabf1";
$conn=connecttodb();
$return=mysql_query( $sql,$conn);
$cnt=0;
if (mysql_num_rows($return) > 0) {
    while($row = mysql_fetch_assoc($return)) {
    	$idcss='column_'.$cnt;
    	$cnt++;
        $id= $row["id"];
        $user=$row["user"];
        $hl=$row["headline"];
        $mainbody=$mainbody.'<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#'.$idcss.'">'.$hl.'</a>
			</h4>
			</div>
			<div id="'.$idcss.'" class="panel-collapse collapse ">
				<div class="panel-body"> Added by:'.$user.'</div>
			</div>
		</div>';

    }
} else {
    echo "0 results";
}


$mainbody=$mainbody.'</div>';
echo $head.$mainbody."</body></html>";


?>