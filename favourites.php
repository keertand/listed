<?php session_start(); ?>
<?php

$productid = $_POST["flag1"];


$username = $_SESSION['username'];
include "db.php";

//check if already in favs
$query = "select 1 from actiondb where ( productid = '$productid' and username = '$username' and favourite=1 )";
$results = mysqli_query($con, $query);
$count = 0;
while($row = mysqli_fetch_array($results))
{
$count++;
}

if($count==0)
{
	$query = "insert into actiondb(productid, username, favourite) values ( '$productid', '$username' , 1)";
	$rs = "Added to favourites";
}
else
{
	$query = "delete from actiondb where ( productid = '$productid' and username = '$username' and favourite = 1 )";
	$rs = "Removed from favourites";
}

$results = mysqli_query($con, $query);


	$query = "select 1 from actiondb where( productid = '$productid' and favourite=1 )";
	$results = mysqli_query($con, $query);
	$count=0;
	while($row = mysqli_fetch_array($results))
	{
		$count++;
	}



header('content-type: application/json');
echo json_encode('<b>'.$count.'</b>');



?>