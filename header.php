<?php
session_start(); 

//echo $_SESSION['user_type'];
//die();
  if($_SESSION['user_type'] == "")
  {
	 // header("location:login.php");
  }
  else{
	  
	  $Login_user = "Welcome ".$_SESSION['user_type'];
  }
  
  //die();
  
 
  
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="navbar-collapse" style="
    margin: 0px;
    text-align: right;
    float: right;
    border-radius: 32px;
    font-size: 13px;
    background: #fff;
    padding: 0 22px 0 16px; width:100%; max-width:268px;
">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME&nbsp; | </a>
                </li>
               
				
				       
                <li class="nav-item"  style="font-size: 15px;margin: 8px 0 0 0;" >
				<?php if($_SESSION['user_type'] !="")
					{  echo $Login_user; ?>
						
					<?php }else{ ?>
                    <a class="nav-item" href="registration.php">SIGN UP</a>
					<?php } ?>
					
                </li>
            </ul>
        </div>
    </div>
</nav>