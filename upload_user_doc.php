<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
include("include/functions.php");
//$db = new MySqlDb;


if($_SESSION['loggedIn_user_id']=="")
{
	header("location:index.php");
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
	
	    
	
	
	

<style>
.btn.btn-simple, .navbar .navbar-nav>a.btn.btn-simple{display:none !important;}
.bootstrap-select{border:1px;border-radius:31px; padding:0 0 0 0 !important;}

.form-group {
    position: relative;
    text-align: left !important;
}
.page-header{height:300vh !important;}
.form-group .form-control, .input-group .form-control{background:#000 !important; color:#fff !important;}
</style>


	<link href="css/style_user_doc.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/script2.js" type="text/javascript"></script>
	
</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- Navbar -->
<?php include("header.php"); ?>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(admin/assets_n/images/login.jpg)"></div>
    <div class="container">
         <div class="col-md-12 col-sm-6 col-xs-12"  style="max-width: 58%;margin-left: 20%;margin-right: 20%;padding-top: 12%;width: 100%;">
			  
			 <div style="text-align:center;"> <h5>Registration</h5></div>
			 <br/>
				
			
			
			<div class="form-group">
			 <div style="text-align:center; color:green; font-weight:bold;"> Record updated successfully. Upload user documents</div>
			 <br>
				
				<div class="container" >
				<input type="file" name="file" id="file">

				<!-- Drag and Drop container-->
				<div class="upload-area"  id="uploadfile">
				<h3 style="color: #424242;font-size: 27px;font-weight: 100;font-family: 'Muli', Arial, Tahoma, sans-serif;">Drag and Drop file here<br/>Or<br/>Click to select file</h3>
				</div>
				</div>
			</div>	

				  <br>
			
				 <a href="admin/index.php"> <input style="width: 100%;max-width: 393px;" type="button" name="login"  value="Go To Admin" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light"></a>
				  
				  
				  
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