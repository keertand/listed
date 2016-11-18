<?php

include "db.php";


$productid = $_GET['productid'];



//check db for product id, if doesnt exist, then redirect to home.php

$query = "select authorid, approval from productdb where ( productid='".$productid."' )";
$results = mysqli_query($con, $query);
$count = 0;
	while($row = mysqli_fetch_array($results))
	{
		$authorid = $row['authorid'];
		$approval = $row['approval'];
		$count++;
	}
	
if($count==0 || ( $approval==0 && $authorid!=$username))
{
	header('Location: index.php?pagetype=oops');
}

$query = "select * from productdb where productid='".$productid."' ";
$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{

	$productname = $row['pname'];
	$n = $row['imgno'];
	//from userdetails
	$authorid = $row['authorid'];	

		$query2 = "select fname, lname from userdetails where username='".$authorid."' ";
		$results2 = mysqli_query($con, $query2);
		while($row2 = mysqli_fetch_array($results2))
			{
				$postedby = $row2['fname']." ".$row2['lname'];
			}

		
	}

//from description table
	$query = "select * from descriptiondb where productid='".$productid."' ";
	$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$description = $row['description'];
	}

//from review db
	$query = "select avg(rating) as rating from reviewdb where productid='".$productid."' ";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
		$rating = $row['rating'];
	}

//favourites thingy

	$query = "select 1 from actiondb where ( productid='".$productid."' and username='$username' and favourite=1)";
	$results = mysqli_query($con, $query);
	$count = 0;
	while($row = mysqli_fetch_array($results))
	{
		$count++;
	}
if($count==0) $heart = "unfav";
else $heart = "fav";


	$query = "select 1 from actiondb where ( productid='".$productid."' and favourite=1)";
	$results = mysqli_query($con, $query);
	$count = 0;
	while($row = mysqli_fetch_array($results))
	{
		$count++;
	}
$favcount = $count;

?>



<div class="row productpage">


<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 productdps">












<div id="carousel" class="carousel slide productslide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
  <?php
  
	 for($i=1;$i<$n;$i++)
	 {	 
		echo '<li data-target="#carousel" data-slide-to="'.$i.'"></li>';
		
	 }
	 
 ?> 
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/products/<?php echo $productid;?>/1.jpg" alt="Chania">
    </div>

	<?php
	 for($i=2;$i<=$n;$i++)
	{
		echo '
		<div class="item">
		  <img src="images/products/'.$productid.'/'.$i.'.jpg" alt="'.$productname.'">
		</div>
		';
		}
	?>
		
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


























</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-11 col-lg-offset-1 nameplate">
<div class="row">
<div class="col-xs-10 col-sm-10 col-md-8 col-lg-6">
<span class="pname"><?php echo $productname;?></span>
<span class="prratebig" data-rate="<?php echo $rating;?>"></span>

<ul class="links">
<li><a href="#specification">Specifications</a></li>
<li><a href="#comments">Reviews</a></li>
</ul>
</div>


<div class="col-xs-2 col-sm-2 col-md-4 col-lg-5">
<div class="favsicon"><span data-id="<?php echo $productid;?>" class="glyphicon glyphicon-heart <?php echo $heart; ?>"></span><span id="favno" class="favno"><b><?php echo $favcount;?></b></span></div>
</div>


<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">

<div class="row details">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 postedby">
<span>Posted by: 
<?php echo $postedby; ?>
</span></div>


</div>
</div>


</div>
</div>


<div class="row description">
<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-11 col-lg-offset-1 ">
<h2>Description</h2>
<p><?php echo $description;?></p>
</div>
</div>

<div id="specification" class="row specification">
<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1 ">
<h2>Specifications</h2>


<div>
	<?php include "specificationload.php"; ?>
</div>



</div>
</div>

<div id="comments" class="row comments">

<h2>User Reviews</h2>

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 comment">




<div class="row">
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-1 commentdp">
	<a href="index.php?pagetype=profile&username=<?php echo $username;?>"><?php
									if (file_exists("images/users/" .$username.".jpg")) echo '<img src="images/users/'.$username.'.jpg">';
									else echo '<img src="images/users/default.jpg">';
									?></a>
</div>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-11">

<div class="reviewcontent">
<img class="arrow" src="images/arrow.png" />
	<span class="commentrate" data-rate="1"></span>
	<input type="text" id="commenttext" placeholder="enter your review ( optional )" />
	<button id="submitreview" data-id="<?php echo $productid;?>" class="btn btn-primary">Rate and Review</button>
</div>

</div>

</div>

</div>


<?php include "reviewload.php";?>



</div>


</div>

<script>
$('.commentrate').each(function(){
				var rate = $(this).attr('data-rate');
				
			  $(this).rateYo({
				rating: rate			
			  });
				 
			 })
			 
			 $('#submitcomment').on('click',function(){
				alert("into");
				var commenttext = $("#commenttext").val();
				var reviewid = $(this).attr('data-id');
			
			$.ajax({
					type:'POST',
					url: "comment.php",
						data: {flag1: commenttext, flag2: reviewid},
						success: function(){
							location.reload();
						  },
						error: function(err,e1,e2){alert(err.status+e1+e2);},
						complete: function(obj){setimages();}
					 });
			});			
		
		
		
		
</script>