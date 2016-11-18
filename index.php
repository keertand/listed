

<?php session_start();?>

<?php

$_SESSION['username'] = "keertand";
$_SESSION['usertype'] = "0";


include "db.php";

// for testing - temporary authorization ::


$username = $_SESSION['username'];

$query = "select lname, fname from userdetails where username='".$username."' ";
$results = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($results))
	{
		$fname = $row['fname'];
		$lname = $row['lname'];
	}
	
	
?>

<html>

<head>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	

    <!-- Bootstrap Core JavaScript -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="css/theme.css"/>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.js"></script>
	
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	
	
	<title>Listed</title>
	<link rel="shortcut icon" type="image/png" href="images/logo.png" />

<script>

 
</script>


</head>

<body>

<?php 


include "header.php";


	if(isset($_GET['pagetype']))
	{
		$pagetype = $_GET['pagetype'];
		
		if($pagetype=="home")
		{
			include "home.php";
		}
		else if($pagetype=="product")
		{			
			if(isset($_GET['productid']))
			{
			include "product.php";
			}
			else include "home.php";
		}
		else if($pagetype=="category")
		{
			if(isset($_GET['categoryid']))
			{
			include "category.php";
			}
			else include "home.php";
		}
		else if($pagetype=="upload")
		{
			include "upload.php";
		}
		else if($pagetype=="admin")
		{
			if($_SESSION['username']=="admin")
			{
				include "admin.php";
			}
			else
			{
				include "oops.php";
			}
		}
		else if($pagetype=="profile")
		{
			if(isset($_GET['username']))
			{
			include "profile.php";
			}
			else include "oops.php";
		}
		else
		{
				include "oops.php";
		}
	
	//other page types also come here.
	
	}

	else
	{
		$pagetype = "home";
		include "home.php";
	}





include "footer.php";



?>


</body>

<script>

 //$('.dp').materialAvatar({shape: 'circle', backgroundColor: '#0351a0', textColor: 'white'});
 
 
function setimages()
{
	$('#res .product img').each(function(){
	var imgClass = (this.height/this.width <= 1) ? 'fat' : 'tall';
	$(this).addClass(imgClass);
 })
 
} 
 
$('#listed').on('click',function(){
	
	window.location = "index.php";
	
});

function loadmore(){
	alert("yointo");
	var y = $(this).attr('data-id');
	search(y);
	}
 
$(document).ready(function(){
	
	
			 
			$( ".navbar-brand img" ).click(function() {
			 // $( ".cat" ).slideToggle();
			  
			  $(".cat").slideToggle( "slow" );
			  
			  $(".cat").fadeOut;
			  
			});


			 $('.product img').each(function(){

			 var imgClass = (this.height/this.width <= 1) ? 'fat' : 'tall';
			  $(this).addClass(imgClass);
			 })

			 
			$(".search input").keyup(function() {


				$(window).animate({
					scrollTop: 150
				}, 500);
					search(0);
				});

			$(".glyphicon-search").on('click',function(){
				
				search(0);
			});	
				

			$('.product').hover(function(){
				$(this).find('.desc').css('marginTop','-120px'); 
				
			});
			$('.product').mouseleave(function(){
				$(this).find('.desc').css('marginTop','-50px'); 
			});
			

			 $(window).scroll(function() {
											
				var x = $(document).scrollTop();
				
				if(x<200)
				{
					$(".latest").css("marginTop",-x*0.5);
					
				}
			 });
			 
			 
			 function search(z)
			{
				var x = $("#searchbar").val();
				var y = $('input[name=category]:checked', '#catform').val();
				alert(y);
				if (typeof(y) == "undefined") y=0;
				alert(y);
				$.ajax({
				type:'POST',
				url: "search.php",
					data: {flag1: x,flag2: y, flag3: z},
					success: function(result){
						result = $.trim(result);	
					  document.getElementById('#res').innerHTML = result;
					 // var child = document.createElement('div');
					  },
					error: function(err,e1,e2){alert(err.status+e1+e2);},
					complete: function(obj){setimages();}
				 });
					
			}

			$(function () {
			 
			  
			 $('.prrate').each(function(){
				var rate = $(this).attr('data-rate');
				
			  $(this).rateYo({
				rating: rate,
				readOnly: true				
			  });
				 
			 })
			 
			  $('.prratebig').each(function(){
				var rate = $(this).attr('data-rate');
				
			  $(this).rateYo({
				rating: rate,
				readOnly: true				
			  });
				 
			 })
			 
			 $('.commentrate').each(function(){
				var rate = $(this).attr('data-rate');
				
			  $(this).rateYo({
				rating: rate			
			  });
				 
			 })
			 
			 $(".prrate").rateYo("option", "starWidth", "20px");
			 $(".commentrate").rateYo("option", "starWidth", "30px");
			 
			 $(".prrate").rateYo("option", "multiColor", true);
			 $(".prratebig").rateYo("option", "multiColor", true);
			 $(".commentrate").rateYo("option", "multiColor", true);
			 
			});

			imagesetter();
	
	
	});

	
		$('.product').hover(function(){
				$(this).find('.desc').css('marginTop','-120px'); 
			});
			
		$('.product').mouseleave(function(){
				$(this).find('.desc').css('marginTop','-50px'); 
			}); 
				
		$('.search .glyphicon-th').on('click',function(){
			
			$('.catcontainer').slideToggle("fast");
		});
				
		
		$('#submitreview').on('click',function(){
			
			var reviewtext = $("#commenttext").val();
			var rating = $(".commentrate").rateYo("option", "rating");
			var pid = $(this).attr('data-id');
		
		$.ajax({
				type:'POST',
				url: "review.php",
					data: {flag1: reviewtext, flag2: rating, flag3: pid},
					success: function(){
						location.reload();
					  },
					error: function(err,e1,e2){alert(err.status+e1+e2);},
					complete: function(obj){setimages();}
				 });
		});		
			
		
			
		function commentload(reviewid){
			
			
			var x = reviewid + '_comments';
			

		$.ajax({
				type:'POST',
				url: "commentload.php",
					data: {flag1: reviewid },
					success: function(result){
					result = $.trim(result);	
					  document.getElementById(x).innerHTML = result;
					 // $('#' + reviewid + '_comments').slideDown( "slow");
					},
					error: function(err,e1,e2){alert(err.status+e1+e2);},
					complete: function(obj){setimages();}
				 });
		}			
			
			
				

		$('.actioncentre .formloader').on('click',function(){
			
			var reviewid = $(this).attr('data-id');
			var form = '<div class="row"><div class="nestedcomment col-xs-11 col-sm-11 col-md-11 col-lg-11 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1"><div class="commentinput row"><div class="col-xs-10 col-sm-10 col-md-11 col-lg-11"><input type="text" name="comment" data-id="' + reviewid + '" placeholder="Comment...." required /></div><div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"><button class="btn btn-primary" id="submitcomment" data-id="' + reviewid + '">comment</button></div></div></div>';
			
			var x = reviewid + '_comments';
			
			document.getElementById(x).innerHTML = form;
			$('#' + reviewid + '_comments').slideDown( "slow");
		
		});			
		
		
	$(document).on('click', '#submitcomment', function() {		
			var commenttext = $(".commentinput input").val();
			var reviewid = $(this).attr('data-id');
		
		$.ajax({
				type:'POST',
				url: "comment.php",
					data: {flag2: commenttext, flag1: reviewid},
					success: function(){
						location.reload();
					  },
					error: function(err,e1,e2){alert(err.status+e1+e2);},
					complete: function(obj){setimages();}
				 });
		});				
		
		
		$('.commentcontent').on('click',function(){
			
			var reviewid = $(this).attr('data-id');
			
			commentload(reviewid);
			$('#' + reviewid + '_comments').slideToggle( "slow");
			
		});
		
		
		function imagesetter()
		{
			//var x = $(window).height()/$(window).width();
			//var y = screen.height/screen.width;
			
			var w = window,
			d = document,
			e = d.documentElement,
			g = d.getElementsByTagName('body')[0],
			x = w.innerWidth || e.clientWidth || g.clientWidth,
			y = w.innerHeight|| e.clientHeight|| g.clientHeight;
			
			//alert(x + ' × ' + y);
			x = y/x;
			//alert(x);
			if(x>1)
			{
		$('.item img').each(function(){
			
			$(this).css('maxWidth','none'); 
			$(this).css('height','100%'); 
			$(this).css('width','auto'); 			
				
			 })
			}
		}
		
		function togglefavourite(productid)
		{
			$.ajax({
				type:'POST',
				url: "favourites.php",
					data: {flag1: productid},
					success: function(result){
						result = $.trim(result);
						document.getElementById('favno').innerHTML = result;
					  },
					error: function(err,e1,e2){alert(err.status+e1+e2);}
				 });			
		}


		
		$('.favsicon .glyphicon-heart').on('click',function(){
			var productid = $(this).attr('data-id');
			togglefavourite(productid);
			$(this).toggleClass('fav');
		});
		
			</script>



</html>