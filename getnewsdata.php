<?php 
include 'helperfunctions.php';
$conn=connecttodb();
#echo "H";
$base=0;
if(isset($_GET['top'])&&isset($_GET['n']))
{
	$base=intval($_GET['top']);
	$n=intval($_GET['n']);
	$querysql="select  * from testtabf1 where time_stamp > $base order by time_stamp desc limit $n";
	#echo $querysql."\n";
	#echo "==\n";
	$result = mysql_query($querysql,$conn);
	if(!$result){
    die('Invalid query: ' . mysql_error());
	}
	$jsondata = array();
	while($r = mysql_fetch_assoc($result)) {
	    $jsondata['to_add_top'][] = $r;
	}
	echo json_encode($jsondata);
	
}
else if(($_GET['down'])&&isset($_GET['n']))
{
	$base=intval($_GET['down']);
	$n=intval($_GET['n']);
	
	$querysql="select * from testtabf1 where time_stamp < $base order by time_stamp desc limit $n";
	#echo $querysql."\n";
	$result = mysql_query($querysql,$conn);
	if(!$result){
    die('Invalid query: ' . mysql_error());
	}
	$jsondata = array();
	while($r = mysql_fetch_assoc($result)) {
	    $jsondata['to_add_bottom'][] = $r;
	}
	echo json_encode($jsondata);
	
}
else if(isset($_GET['desc']))
{
	$key=$_GET['desc'];
	$querysql="select * from testtab2f where id = '$key'";
	#echo $querysql;
	$result = mysql_query($querysql,$conn);
	if(!$result){
    die('Invalid query: ' . mysql_error());
	}
	$jsondata = array();
	while($r = mysql_fetch_assoc($result)) {
	    $jsondata['to_add_bottom'][] = $r;
	}
	echo json_encode($jsondata);

}
?>
