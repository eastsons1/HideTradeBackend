<?php
error_reporting(0);
ob_start();
session_start();
include('../include/config.php');

//echo $_SESSION['adminusername']."++++++++++++++";

//echo $_SESSION['loggedIn_user_id'];

if($_SESSION['loggedIn_user_id']=="")
{
	header("location:../index.php");
}	


if($_SESSION['adminusername']!="")
{
		$query = "SELECT first_name,last_name,profile_image  FROM user_info WHERE user_id ='".$_SESSION['loggedIn_user_id']."'  ";

		$result = $conn->query($query) or die ("table not found");
		
		$results = mysqli_fetch_array($result);	
		
		
		if($results['profile_image'] !="")
		{
			$profile_DP = $results['profile_image'];
		}
		else
		{
			$profile_DP = "avatar-4.jpg";
		}
		
}	
	
if($_SESSION['loggedIn_user_id']==2)
{
	$logout_url = 'logout_admin.php';
}
else{
	$logout_url = 'logout.php';
}

	
?>

<nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      
                      <a href="index.php">
                          <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" style="width:134px;" />
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                         
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                         
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="../UPLOAD_file/<?php echo $profile_DP; ?>" class="img-radius" alt="User-Profile-Image">
                                  <span><?php echo ucfirst($results['first_name']." ".$results['last_name']); ?></span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                 
                                  <li class="waves-effect waves-light">
                                      <a href="user_details.php?id=<?php echo $_SESSION['loggedIn_user_id']; ?>">
                                          <i class="ti-user"></i> Profile
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="email-inbox.php">
                                          <i class="ti-email"></i> My Messages
                                      </a>
                                  </li>
                                 
                                  <li class="waves-effect waves-light">
                                      <a href="<?php echo $logout_url; ?>">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
		  
		  
		  
		  