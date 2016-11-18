<?php




?>


   <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" >
        <div class="container-fluid mainhead" style="margin-left:80px;margin-right:80px;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="listed" style="padding-top:0px;margin-top:18px;padding-bottom:0px;height:auto;" class="navbar-brand"><div><img src="images/logo.png"><span style="margin-top:-20px;">Listed</span></div></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a style="padding:10px;" ></a>
                    </li>
                   
                    <li>
                        <a id="findme" style="padding:15px;"><?php echo $fname . ' '. $lname;?></a>
                    </li>
					
                    <li>
					  <div class="dropdown">
						  <div class="dp"   aria-expanded="true" style="height:30px; width:30px;">
						  <a href="index.php?pagetype=profile&username=<?php echo $username;?>">
							<!-- <img src="images/dp.png"> -->
							
					<?php 
						if (!file_exists("images/users/" .$username.".jpg")) 
								echo '<img src="images/users/default.jpg" />';
							else	echo '<img src="images/users/'.$username.'.jpg" />';
							
							?>
							</a></div>
						  
						</div>
					</li>
                </ul>
	
				
		
				
            </div>
            <!-- /.navbar-collapse -->
        
		
		
		</div>
        <!-- /.container-fluid -->
		
	
  
	
	</nav>
	
	


