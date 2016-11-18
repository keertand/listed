

<?php session_start();?>

<?php 

$reviewtext = $_POST["flag1"];

$category = 0;
$rating = $_POST["flag2"];
$productid = $_POST["flag3"];

if($comment="") $comment = "NULL";

include "db.php";

function checkintruder($query)
{
	if (preg_match('/[\'}{@#~?><>/', $query))
	{
		return false;
	}
	else
	{
		return true;
	}
}




$timestamp = time(); 

$username = $_SESSION['username'];
$reviewid = $productid.'_review_'.$timestamp;

$count =0;

$query = "select reviewid from reviewdb where ( productid = '$productid' and username = '$username') ";
$results = mysqli_query($con, $query);
while($row = mysqli_fetch_array($results))
{
$count++;
$reviewid = $row['reviewid'];
}

if(checkintruder($reviewtext))
{
if($count==0)
{
$query = "insert into reviewdb values ('$reviewid', '$productid', '$username', '$rating' , '$reviewtext', '$timestamp') ";
$results = mysqli_query($con, $query);
}
else
{

if($reviewtext!="") $query = "update reviewdb set rating = '$rating' , reviewtext = '$reviewtext', timestamp = '$timestamp' where reviewid = '$reviewid' ";
else $query = "update reviewdb set rating = '$rating' , timestamp = '$timestamp' where reviewid = '$reviewid' ";

$results = mysqli_query($con, $query);	
}
}
else
{
	//not allowed on sql
}


/*
header('content-type: application/json');
echo json_encode($rs);
	*/

?>