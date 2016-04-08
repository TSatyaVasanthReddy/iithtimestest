<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
#echo "hi";
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid ";
}
else
{
// Define $username and $password
$username=$_POST['username'];

$password=$_POST['password'];
#echo "1";
#echo $username;

// Establishing Connection with Server by passing server_name, user_id and password as a parameter

#echo "1";
$connection = mysql_connect("localhost", "***", "***" );
// To protect MySQL injection for Security purpose
#echo "1";
if($connection){
#echo "connection :".mysql_error();
#printf("MySQL host info: %s\n", mysql_get_host_info());
}
#echo "->>";
$db_select=mysql_select_db("iithtimestest", $connection);
if (!$db_select) { 
       die("Database selection failed:: " . mysql_error()); 
   }
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query= "select * from adminuser where passwd='$password' AND uname='$username'";
#echo "\nQuery::\n";
#echo $query;

$result = mysql_query($query,$connection);
if (!$result) {
	echo "1";
    echo 'Invalid query: ' . mysql_error();
}
if($result){
#echo "\nGot result\n";
}
$rows = mysql_num_rows($result);
#echo "rows ".$rows;
if ($rows == 1) {
	#echo "You are admin dear!";
$_SESSION['login_user']=$username; // Initializing Session
header("location: http://hungryowl.co.in/iithtimestest/postlogin.php"); // Redirecting To Other Page
} 
else {

#echo "-->Username or Password is invalid";
#header("location: login.php"); // Redirecting To Other Page

}
mysqli_close($connection); // Closing Connection
}
}
?>