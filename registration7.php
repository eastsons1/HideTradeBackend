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
		
		
		
		if($user_type!="" && $fname!="" && $email!="" && $password!="" && $mobile!="")
		{
			 $sql = "insert into user_info set first_name ='".$fname."', last_name = '".$lname."', admin_username ='".$email."', email = '".$email."', password ='".md5($password)."', mobile ='".$mobile."', address1 ='".$address."', user_type = '".$user_type."', user_roll	= '0'  ";
			
			//die();
			
			if($res=$conn->query($sql))
			{
				
				//$msg1 = "Record inserted successfully.";
				
				
				 $query = "SELECT * FROM user_info WHERE email	='".$email."' and password ='".md5($password)."' and user_type = '".$user_type."' ";
		
		//die();
		
					$result = $conn->query($query) or die ("table not found");
					 $numrows = mysqli_num_rows($result);
					
					if($numrows > 0)
					{
					  $results = mysqli_fetch_array($result);
					  $results['admin_username'];
						$results['password'];
						$storedPassword = $results['password'];
						if ( $email==$results['admin_username'] && md5($password) == $results['password'] )
						{
						 	$_SESSION['adminusername'] = $_POST['email'];
							//$_SESSION['adminuserpass'] = $_POST['userpass'];
							
							 $_SESSION['username'] = $_POST['email'];
							//$_SESSION['userpass'] = $_POST['userpass'];
							
							 $_SESSION['user_type'] = $_POST['user_type'];
							 $_SESSION['loggedIn_user_id'] = $results['user_id']; 
							
							
							header("location:admin/welcome.php");
						}
						else { $message1="Password not valid !"; }
						
					}
				
				
				
				
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
				<select name="user_type" id="user_type" class="form-control" autocomplete="off" style="color:#ccc;" >
						<option value="Select User Type">-- Select User Type --</option>
						<option value="Customer">Customer</option>
						<option value="Agents">Agents</option>
				</select>		
				</div>
				<div class="form-group" style=" margin-bottom: 47px;">
		
				<label class="control-label mb-10" for="exampleInputName_1" style=" width: 100%;">User Name</label>
				<input type="text" class="form-control" name="fname" placeholder="First Name" autocomplete="off" style=" width: 46%;float: left;clear: both; margin-right: 43px;
"><input type="text" class="form-control" name="lname" placeholder="Last Name" style=" width: 46%;  float: left;" autocomplete="off">
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
				<textarea name="address" class="form-control" rows="3" cols="5" placeholder="Address" autocomplete="off" ></textarea>
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">Upload User Document</label>
					<div class="container" >
<input type="file" name="file" id="file">

<!-- Drag and Drop container-->
<div class="upload-area"  id="uploadfile">
<h3 style="color: #424242;font-size: 27px;font-weight: 100;font-family: 'Muli', Arial, Tahoma, sans-serif;">Drag and Drop file here<br/>Or<br/>Click to select file</h3>
</div>
</div>
				</div>	
				
				
				
				<div class="form-group text-center">
				<input type="submit" name="Submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light" value="Sign Up">
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