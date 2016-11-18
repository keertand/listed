<?php session_start();?>

<?php 

$reviewid = $_POST["flag1"];

$rs = "";

$commenttext = $_POST["flag2"];

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

$commentid = $reviewid . "_comments_" . $timestamp;

$count =0;

$query = "select reviewid from reviewdb where ( reviewid = '$reviewid') ";
$results = mysqli_query($con, $query);
while($row = mysqli_fetch_array($results))
{
$count++;
}

if(checkintruder($commenttext) && $commenttext != "")
{

$query = "insert into commentdb values ('$commentid', '$reviewid', '$username', '$commenttext', '$timestamp') ";
$results = mysqli_query($con, $query);
}



/*
header('content-type: application/json');
echo json_encode($rs);
	*/

?>


