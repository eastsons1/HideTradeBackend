<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
include("include/functions.php");
//$db = new MySqlDb;



	if(isset($_POST['Submit']))
	{
		$user_type	=	$_POST['user_type'];
		$fname	=	$_POST['fname'];
		$lname	=	$_POST['lname'];
		$email	=	$_POST['email'];
		$password	=	$_POST['password'];
		$mobile	=	$_POST['mobile'];
		$address	=	$_POST['address'];
		
		
		
		if($user_type!="" && $username!="" && $email!="" && $password!="" && $mobile!="")
		{
			 $sql = "insert into user_info set first_name ='".$fname."', last_name = '".$lname."', admin_username ='".$email."', email = '".$email."', password ='".md5($password)."', mobile ='".$mobile."', address1 ='".$address."', user_type = '".$user_type."', user_roll	= '0'  ";
			
			//die();
			
			if($res=$conn->query($sql))
			{
				
				$msg1 = "Record inserted successfully.";
			}
			else
			{
				$msg1 = "Error while trying to inserting the record.";
			}
		}
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
	
	    <link href="assets/css/style.css" rel="stylesheet">
	
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
         <div class="col-md-12 col-sm-6 col-xs-12">
			  
			 <div style="text-align:center;"> <h1>Registration</h1></div>
			 <br/>
				<span style="color:#e7368d;">
				<?php 
				if($msg1 != "")
				{
				echo $msg1;
				}												
				?>
				</span>
			<form name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();" >
			
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">User Type</label>
				<select name="user_type" id="user_type" class="form-control" autocomplete="off" >
						<option value="Select User Type">-- Select User Type --</option>
						<option value="Study Lab">Study Lab</option>
						<option value="Agents">Agents</option>
				</select>		
				</div>
				<div class="form-group" style=" margin-bottom: 47px;">
		
				<label class="control-label mb-10" for="exampleInputName_1" style=" width: 100%;">User Name</label>
				<input type="text" class="form-control" name="fname" placeholder="First Name" autocomplete="off" style=" width: 48%;float: left;clear: both; margin-right: 43px;
"><input type="text" class="form-control" name="lname" placeholder="Last Name" style=" width: 48%;  float: left;" autocomplete="off">
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off">
				</div>
				<div class="form-group">
				<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Enter pwd" autocomplete="off" >
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">Mobile No.</label>
				<input type="text" class="form-control" name="mobile" placeholder="Mobile No." autocomplete="off">
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">Address</label>
				<textarea name="address" class="form-control" rows="5" cols="5" placeholder="Address" autocomplete="off" ></textarea>
				</div>
				
				<div class="form-group text-center">
				<input type="submit" name="Submit" class="btn btn-info btn-rounded" value="sign Up">
				</div>
			</form>
				  
				  
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