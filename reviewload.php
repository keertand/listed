
<?php

include "db.php";

$query = "select * from reviewdb where ( reviewtext != 'NULL' and reviewtext != '')order by timestamp desc";
$results = mysqli_query($con, $query);

while($row = mysqli_fetch_array($results))
{
$reviewid = $row['reviewid'];
$comment = $row["reviewtext"];
$commentuser = $row["username"];
$rating = $row["rating"];

echo '

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 comment">


<div class="row">
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-1 commentdp">
	<a href="index.php?pagetype=profile&username='. $commentuser .'">';
									if (file_exists("images/users/" .$commentuser.".jpg")) echo '<img src="images/users/'.$commentuser.'.jpg">';
									else echo '<img src="images/users/default.jpg">';
echo '</a>
</div>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-11">

<div class="commentcontent" data-id="'.$reviewid.'">
<img class="arrow" src="images/arrow.png" />
	
	<span class="prrate" data-rate="'.$rating.'"></span>
	<p><b>'.$commentuser.'</b> : 
	'.$comment.'</p>
</div>

</div>

</div>
<div class="actioncentre">
<button class="btn btn-primary formloader" data-id="'.$reviewid.'">Comment</button>

</div>
<div id="'.$reviewid.'_comments" class="commentloader col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

</div>

</div>
';


}

?>