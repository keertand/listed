<?php session_start(); ?>
<?php

$reviewid = $_POST["flag1"];

$rs = "";
$username = $_SESSION['username'];
include "db.php";

$query = "select * from commentdb where ( reviewid = '$reviewid' and commenttext != '' )order by timestamp";
$results = mysqli_query($con, $query);

while($row = mysqli_fetch_array($results))
{

$comment = $row["commenttext"];
$commentuser = $row["username"];
$commentid = $row["commentid"];

$rs .= '
<div class="row">
<div class="nestedcomment col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
	<div class="row"><div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"><a href="index.php?pagetype=profile&username='. $commentuser .'">';

if (file_exists("images/users/" .$commentuser.".jpg")) $rs .= '<img src="images/users/'.$commentuser.'.jpg"></a>';
else $rs .= '<img src="images/users/default.jpg"></a>';
	
$rs .= '</div><div class="col-xs-10 col-sm-10 col-md-11 col-lg-11"><b>'. $commentuser.'</b>:  '.$comment.'
</div>
</div>';

if($username==$commentuser)
$rs .= '<button class="btn btn-danger commentdel" data-id="'.$commentid.'"><span class="glyphicon glyphicon-trash"></span></button>';

$rs .= '</div>
</div>
';

}

if($rs == "")
{
	$rs .= " No comments yet!";
}

header('content-type: application/json');
echo json_encode($rs);



?>