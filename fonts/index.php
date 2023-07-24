<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
include("include/functions.php");
//$db = new MySqlDb;



if(isset($_SESSION['adminusername']) && $_SESSION['adminusername']!="")
{
	header("location:admin/welcome.php");
}
if(isset($_POST['login']))
{
	if( isset($_POST['username']) && isset($_POST['userpass']))
	{
		$username = $_POST['username'];
	   $userpassword = $_POST['userpass'];
	   $user_type = $_POST['user_type'];
	   
		  $query = "SELECT * FROM user_info WHERE email	='".$username."' and password ='".md5($userpassword)."' and user_type = '".$user_type."' ";
		
		//die();
		
		$result = $conn->query($query) or die ("table not found");
		$numrows = mysqli_num_rows($result);
		if($numrows > 0)
		{
		  $results = mysqli_fetch_array($result);
		  $results['admin_username'];
			$results['password'];
			$storedPassword = $results['password'];
			if ( $username==$results['admin_username'] && md5($userpassword) == $results['password'] )
			{
				$_SESSION['adminusername'] = $_POST['username'];
				$_SESSION['adminuserpass'] = $_POST['userpass'];
				
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['userpass'] = $_POST['userpass'];
				
				$_SESSION['user_type'] = $_POST['user_type'];
				
				if($_POST['remember'])
				{
					setcookie("cookusername", $_SESSION['adminusername'], time()+3600 , "/");
					setcookie("cookpass", $_SESSION['adminusername'], time()+60*60*24*30 , "/");
				}
				else
				{
					setcookie("cookusername", $_SESSION['adminusername'], time()+(-3600) , "/");
				}
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
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Study Lab</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="admin/assets_n/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets_n/css/main.css">
    <link rel="stylesheet" href="admin/assets_n/css/authentication.css">
    <link rel="stylesheet" href="admin/assets_n/css/color_skins.css">
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
<style>
.btn.btn-simple, .navbar .navbar-nav>a.btn.btn-simple{display:none !important;}
.bootstrap-select{border:1px;border-radius:31px; padding:0 0 0 0 !important;}
</style>
</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="#" title="" target="_blank"><img src="assets/images/header_logo.png" style="width: 31%;"></a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Search Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Follow us on Twitter" href="#" target="_blank">
                        <i class="zmdi zmdi-twitter"></i>
                        <p class="d-lg-none d-xl-none">Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Like us on Facebook" href="#" target="_blank">
                        <i class="zmdi zmdi-facebook"></i>
                        <p class="d-lg-none d-xl-none">Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Follow us on Instagram" href="#" target="_blank">                        
                        <i class="zmdi zmdi-instagram"></i>
                        <p class="d-lg-none d-xl-none">Instagram</p>
                    </a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-round" href="registration.php">SIGN UP</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(admin/assets_n/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" name="loginform" method="post" action="">
                    <div class="header">
                        <div class="logo-container">
                           <br>
                        </div>
                        <h5>Log in</h5>
						<font color="#FF0000"><?php echo $message1; ?></font>
                    </div>
                    <div class="content"> 
						 <div class="input-group input-lg">
								<select name="user_type" id="user_type" class="form-control" autocomplete="off" >
								<option value="Select User Type">-- Select User Type --</option>
								<option value="Admin">Admin</option>
								<option value="Study Lab">Study Lab</option>
								<option value="Agents">Agents</option>
								</select>	
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
					
                        <div class="input-group input-lg">
                            <input type="text" name="username" class="form-control" placeholder="Enter Email Id" autocomplete="off">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input name="userpass" type="password" placeholder="Enter Password" class="form-control" autocomplete="off" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
						 <div class="input-group input-lg">
                            <input style="width:24px; height:24px; margin:0 10px 0 20px;" class="form-control55" type="checkbox" name="remember" value="1" <?php if($remembered==1) echo "checked"; ?> /> Remember me on this computer.
                            
                        </div>
                    </div>
                    <div class="footer text-center">
                        <input type="submit" name="login" onclick="return validate();" value="SIGN IN" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">
                        <h6 class="m-t-20"> If don't have account <a style="color:#fff; text-decoration:underline; font-weight:bold;" href="https://refuel.site/projects/Study Lab/registration.php"> Register Now</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Copyright Study Lab</span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="admin/assets_n/bundles/libscripts.bundle.js"></script>
<script src="admin/assets_n/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>
</html>