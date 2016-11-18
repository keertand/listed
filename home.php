<?php 
$altdata = "product tags";

include "db.php";
?>


<div class="row home">

<div class="row searchcontainer">
<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 search">

<input type="text" id="searchbar" placeholder="Search your mind..." />

<span class="glyphicon glyphicon-search"></span>
<span class="glyphicon glyphicon-th"></span>
<div class="row">
<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 catcontainer">
<p>Select your category:</p>
<ul><form id="catform">
<li><input type="radio" name="category" value="0">All Categories</input> 
	  </li>'
  <?php
  
	$query = "select categoryid, categoryname from categorydb";
	$results = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($results))
	{
	 $catid = $row['categoryid'];
	 $catname = $row['categoryname'];
	 
	   echo '<li><input type="radio" name="category" value="'.$catid.'"> '.$catname.'</input> 
	  </li>';
	  }
  ?>
</form></ul>
</div>
</div>

</div>
</div>

<div class="wrap">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 resultbox">
<div id="#res" class="row"></div>
</div>
</div>
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 latest">
<?php

for($i=0;$i<12;$i++)
{
echo '
	<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 block">
		<a href="index.php?pagetype=product&productid=sample_65430">
		<div class="product">
			<img alt="<?php echo $altdata;?>" src="images/products/sample_65430/thumb.jpg" />
			<div class="desc"><span>data about image</span>
			<span class="prrate" data-rate="3.5"></span>
			</div>
		</div>
		</a>
	</div>
	
	';
}
	?>


</div>

</div>
</div>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 favourites">

<h2>Favourites</h2>

<div class="row">
	
	<?php

for($i=0;$i<12;$i++)
{
echo '
	<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 block">
		<a href="index.php?pagetype=product&productid=sample_65430">
		<div class="product">
			<img alt="<?php echo $altdata;?>" src="images/products/sample_65430/thumb.jpg" />
			<div class="desc"><span>data about image</span>
			<span class="prrate" data-rate="2"></span>
			</div>
		</div>
		</a>
	</div>
	
	';
}
	?>
	
</div>

</div>

</div>

</div>
