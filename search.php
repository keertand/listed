

<?php 

$query = $_POST["flag1"];
$rs = "";
$category = 0;
$category = $_POST["flag2"];
$constraint = $_POST["flag3"];

include "db.php";


$temp = explode(" ",$query);

$altdata = "kd"; 

function checkintruder($query)
{
	if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $query) || $query=="")
	{
		return false;
	}
	else
	{
		return true;
	}
}


if(checkintruder($query))
{
	$count = 0;
	
	foreach ($temp as $word)
	{
		
		// like product name 
		if($category!=0)
		{
			//make product search inside this category space.
		}
		else
		{
			//search product irrespective of categories.
		}
		
		
		//make query to ignore first ten items, or pass constraint as ascending timestamps of products.
				
		$rs .= '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 BLOCK">
				<a href="index.php?pagetype=product&productid=pid">
				<div class="product">
					<img alt="'.$altdata.'" src="images/searchpic.png" />
					<div class="desc"><span>data about image</span></div>
				</div>
				</a>
				</div>
				';
		
		if($count>=10)
			{
				$constraint++;
				break;	
			}
		else{
				$count++;
			}	
		
	}

	//only 10 results at most at a time. 

$rs .= '<div class="filler"></div>';

}



if($constraint>0)
{
	$t = "<button class='loadmore' onclick='loadmore()' data-id='". $constraint. "' >Load more...</button>";
	$rs .= $t;
}




header('content-type: application/json');
echo json_encode($rs);
	

?>