<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
//include("include/functions.php");
//$db = new MySqlDb;



if(isset($_SESSION['adminusername']) && $_SESSION['adminusername']!="")
{
	//header("location:admin/welcome.php");
}
if(isset($_POST['login']))
{
	if( isset($_POST['username']) && isset($_POST['userpass']))
	{
		$username = $_POST['username'];
		$userpassword = $_POST['userpass'];
		
	   
		  $query = "SELECT * FROM user_info WHERE email	='".$username."' and password ='".md5($userpassword)."' and user_type = 'Admin' and user_roll = 1 ";
		
		//die();
		
		$result = $conn->query($query) or die ("table not found");
		$numrows = mysqli_num_rows($result);
		
		
		if($numrows > 0)
		{
		  $results = mysqli_fetch_array($result);
		  $results['email'];
			$results['password'];
			
			if ( $username==$results['email'] && md5($userpassword) == $results['password'] )
			{
				$_SESSION['adminusername'] = $_POST['username'];
				
				$_SESSION['username'] = $_POST['username'];
				
				$_SESSION['user_type'] = 'Admin';
				$_SESSION['loggedIn_user_id'] = $results['user_id']; 
				
				
				
				if($_POST['remember'])
				{
					setcookie("cookusername", $_SESSION['adminusername'], time()+3600 , "/");
					setcookie("cookpass", $_SESSION['adminusername'], time()+60*60*24*30 , "/");
				}
				else
				{
					setcookie("cookusername", $_SESSION['adminusername'], time()+(-3600) , "/");
				}
				//header("location:admin/view_user_info.php?user_type=".$_POST['user_type']);
				header("location:admin/welcome.php");
			}
			else $message1="Password not valid !";
		}
		else $message1="Username not valid !";
	}
} 
/* Check if user has been remembered */
$remembered = 0;
if(isset($_COOKIE['cookusername']))
{
	$saved_username = $_COOKIE['cookusername'];
	$saved_password_md5 = $_COOKIE['cookpass'];
	$remembered = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tutor App </title>
    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Tutor App" />
      <meta name="keywords" content="Tutor App" />
      <meta name="author" content="Eastsons" />
      <!-- Favicon icon -->

      <link rel="icon" href="admin/assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="admin/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="admin/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="admin/assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="admin/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">
	  
	  <script language="javascript" type="text/javascript">
function validate()
{
	if(document.loginform.username.value=="")
	 {
		alert("Please enter username!")
		document.loginform.username.focus();
		return false;
		}
	
	 if(document.loginform.userpass.value=="")
	 {
		alert("Please enter password!")
		document.loginform.userpass.focus();
		return false;
	}
}
</script>
	  
	  
  </head>

  <body themebg-pattern="theme1">
  
  <?php //include("header.php"); ?>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material" name="loginform" method="post" action="" >
                            <div class="text-center">
                                <img src="images/logoF.png" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Sign In</h3>
                                        </div>
                                    </div>
														
									
                                    <div class="form-group form-primary">
                                        <input type="text" name="username" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Your Email Address</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="userpass" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" name="remember" value="1" <?php if($remembered==1) echo "checked"; ?> >
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right f-right">
                                                <a href="#" class="text-right f-w-600"> Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" name="login" onclick="return validate();" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Thank you.</p>
                                            <p class="text-inverse text-left"><a href="index.php"><b>Back to website</b></a></p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
    <script type="text/javascript" src="admin/assets/js/jquery/jquery.min.js"></script>    
	<script type="text/javascript" src="admin/assets/js/jquery-ui/jquery-ui.min.js "></script>     
	<script type="text/javascript" src="admin/assets/js/popper.js/popper.min.js"></script>    
	<script type="text/javascript" src="admin/assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="admin/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="admin/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
<!-- modernizr js -->
    <script type="text/javascript" src="admin/assets/js/SmoothScroll.js"></script>     
	<script src="admin/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="admin/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="admin/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="admin/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="admin/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="admin/assets/js/common-pages.js"></script>
</body>

</html>
