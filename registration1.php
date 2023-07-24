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
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Study Lab</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
	
	
	<script language="javascript" type="text/javascript">
function validate()
{
	
	if(document.myForm.user_type.value == "Select User Type")
	{
		alert("Please select user type.");
		document.myForm.user_type.focus();
		return false;
	}
	if(document.myForm.fname.value == "")
	{
		alert("Please enter first name");
		document.myForm.fname.focus();
		return false;
	}
	
	if(document.myForm.lname.value == "")
	{
		alert("Please enter last name");
		document.myForm.lname.focus();
		return false;
	}
	if(document.myForm.email.value=="")
	{
		alert("Please enter email");
		document.myForm.email.focus();
		return false;
	}
	
	
	 var filter = '{literal}'+/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/+'{/literal}';
	
	 var emailIDV = document.getElementById('email');	
	 
	 if(emailIDV.value!="" && (emailIDV.value.indexOf("@",0)==-1 || emailIDV.value.indexOf(".",0)==-1))
    {
        alert("Email field is not valid")
        emailIDV.focus();
        emailIDV.select();
        return false;
    }
	
	
	 if(document.loginform.password.value=="")
	 {
		alert("Please enter password!")
		document.loginform.password.focus();
		return false;
	}
	
	
	 if(document.loginform.mobile.value=="")
	 {
		alert("Please enter mobile No.")
		document.loginform.mobile.focus();
		return false;
	}

	if(document.loginform.address.value=="")
	{
		alert("Please enter address")
		document.loginform.address.focus();
		return false;
	}	
	
	
	
	return true;
	
}
</script>
	
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.html">Study Lab</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            
          </div>
        </div>
      </nav>
      <section class="bg-dark-30 showcase-page-header module parallax-bg" data-background="assets/images/showcase_bg.jpg">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">Click Below</div>
            <div class="font-alt mb-40 titan-title-size-4">LOGO Here</div><a class="section-scroll btn btn-border-w btn-round" href="login.php">Search Product</a>
          </div>
        </div>
      </section>
      <div class="main showcase-page">
        <section class="module-extra-small bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-8 col-lg-9">
                <div class="callout-text font-alt">
                  
                  
                </div>
              </div>
            
            </div>
          </div>
        </section>
        <section class="module-medium" id="demos">
          <div class="container">
            <div class="row multi-columns-row">
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
          </div>
        </section>
       
	   
	   
	   <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">© <?php echo date("Y"); ?>&nbsp;<a href="index.html">Taneries</a>, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>