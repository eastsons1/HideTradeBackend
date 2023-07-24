<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
include("include/functions.php");
//$db = new MySqlDb;

if(isset($_POST['Submit']))
	{
		
		$fname	=	$_POST['fname'];
		
		$email	=	$_POST['email'];
		
		$mobile	=	$_POST['mobile'];
		$message	=	$_POST['message'];
		$enquiry_user_type  = $_POST['enquiry_user_type'];
		$enquiry_user_type_id  = $_GET['id'];
		$search_by_user_id = $_SESSION['loggedIn_user_id'];
		$date = date('d-m-y');
		$agent_email_id = $_POST['agent_email_id'];
		
		if($fname!="" && $message!="" && $email!="" && $mobile!="" && $agent_email_id != "")
		{
			 $sql = "insert into tbl_enquiry_agent set enquiry_user_type ='".$enquiry_user_type."', enquiry_user_type_id = '".$enquiry_user_type_id."',  search_by_user_id = '".$search_by_user_id."',  enquiry_name  ='".$fname."', enquiry_email_id  ='".$email."', enquiry_mobile = '".$mobile."', enquiry_message = '".$message."', hire_status = '0', enquiry_date = '".$date."' ";
			
			
			$chat_msg_query = $conn->query("insert into chat_message  set message_datetime = '".$date."',  message_text = '".$message."',  message_chat_id  ='', message_send_user_id  ='".$_SESSION['loggedIn_user_id']."' ");
			
			 
			
			//die();
			
			if($res=$conn->query($sql))
			{
				
				$msg1 = '<span style="color:red;">Record inserted successfully.</span>';
			}
			else
			{
				$msg1 = '<span style="color:red;">Error while trying to inserting the record.</span>';
			}
			
			
			
			
			$subject  = "Message from Enquiry";
			//$message = $_POST['message'];
			
			$message = '<table border="0" >

			<tr><td></td><td><strong>Enquiry Message</strong></td></tr>

			<tr><td><strong>Full Name:</strong></td><td>'.$fname.'</td></tr>

			<tr><td><strong>Email:</strong></td><td>'.$email.'</td></tr>
			<tr><td><strong>Mobile:</strong></td><td>'.$mobile.'</td></tr>

			<tr><td><strong>Message:</strong></td><td>'.$message.'</td></tr>

			</table>';

			//echo $message;

			//die();
		
							
				$to	=	"pushpendra@eastsons.com".",".$agent_email_id;	
		
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .=  'X-Mailer: PHP/'. phpversion();
				//$headers .= 'Bcc: test@yahoo.com' . "\r\n";
				$headers .= 'From: support@gmail.com' . "\r\n";		

				

			if(@mail($to, $subject, $message, $headers))
			{

				//@mail("pushpendra@eastsons.com", "Hello", "test", $headers);

				$msg1 = '<span style="color:red;">Message sent successfully.</span>';

			}else{ $msg1 =  '<span style="color:red;">Fail</span>';}
				
			
			
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
	if(document.loginform.user_type.value=="Select User Type")
	 {
		alert("Please select usertype!")
		document.loginform.user_type.focus();
		return false;
		}
	
	 if(document.loginform.address.value=="")
	 {
		alert("Please enter location/city!")
		document.loginform.address.focus();
		return false;
	}
}
</script>
<style>
.btn.btn-simple, .navbar .navbar-nav>a.btn.btn-simple{display:none !important;}
.bootstrap-select{border:1px;border-radius:31px; padding:0 0 0 0 !important;}
.authentication .card-plain.card-plain .form-control{background:#000 !important;}

.authentication .card-plain{max-width:93% !important;}
.prof{text-decoration:underline;}
.prof:hover{text-decoration:none; color:#00bcd4;}
.page-header .container > .content-center{top:35% !important;}
</style>


<script language="javascript" type="text/javascript">
function validate()
{
	
	if(document.myForm.fname.value == "")
	{
		alert("Please enter name");
		document.myForm.fname.focus();
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
	
	
	
	
	 if(document.loginform.mobile.value=="")
	 {
		alert("Please enter mobile No.")
		document.loginform.mobile.focus();
		return false;
	}

	if(document.loginform.message.value=="")
	{
		alert("Please enter message")
		document.loginform.message.focus();
		return false;
	}	
	
	
	
	return true;
	
}
</script>

</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- Navbar -->
<?php include("header.php"); ?>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(admin/assets_n/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
			
			
			<div class="header">
                        <div class="logo-container">
                           <br>
                        </div>
                        <h5> Customer / Agent Profile</h5>
						<font color="#FF0000"></font>
                    </div>
			
			
			<?php
			
						$query = "SELECT * FROM user_info WHERE user_id = '".$_GET['id']."'  ";


						$result = $conn->query($query) or die ("table not found");
						$numrows = mysqli_num_rows($result);
						if($numrows > 0)
						{
							?>
							
						<div style="width:100%; border:none; float:left;">
						
						
					<?php		
						$results = mysqli_fetch_array($result);
						
							$first_name =	$results['first_name'];
							$last_name =	$results['last_name'];
							$address1 =  $results['address1'];
							$mobile =  $results['mobile'];
							$email =  $results['email'];
							$user_type =  $results['user_type'];
						   ?>
						  
						   <h2 style="color:green; border-bottom:2px solid;font-weight: bold;text-align: left;"><?php echo ucfirst($first_name)." ".ucfirst($last_name); ?></h2>
						    <div style="width:30%; text-align:left; float:left;">
							 
							 <img src="UPLOAD_file/<?php echo $results['profile_image']; ?>" style="width: 63%;">
						   </div>
						   
						     <div style="width:690%; text-align:left;">
							 
							  <h5 style="color:#f96332;"><span class="">
                                <i style="font-size: 28px;" class="zmdi zmdi-card-membership"></i>
                            </span> <?php echo $user_type; ?></h5>
							 
							 <h5><span class="">
                                <i style="font-size: 28px;" class="zmdi zmdi-phone"></i>
                            </span> <?php echo $mobile; ?></h5>
							
							 <h5><span class="">
                                <i style="font-size: 28px;" class="zmdi zmdi-email"></i>
                            </span> <?php echo $email; ?></h5>
							
							<h5><span class="">
                                <i style="font-size: 28px;" class="zmdi zmdi-city"></i>
                            </span> <?php echo $address1; ?></h5>
						   </div>
						   
						   
						  
					
			
					</div>
			<?php
						
						}

				
			?>
			
			

			
            </div>
        </div>
		
		
		<div style="clear:both;"></div>
		



<style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
  text-align:center;
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #21B2E0;
  color: white;
}

.modal-body {padding: 2px 16px; font-size:24px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>

	
	
<!-- Trigger/Open The Modal -->
<button class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light" id="myBtn" style="width:186px; margin-top:500px;">Enquire Now</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Fill the Form </h2>
    </div>
    <div class="modal-body">
      <span style="color:#e7368d;">
				<?php 
				if($msg1 != "")
				{
				echo $msg1;
				}												
				?>
				</span>
			<form name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();" >
			
			
				<div class="form-group" style=" margin-bottom: 47px;">
		
				<label class="control-label mb-10" for="exampleInputName_1" style=" width: 100%;">Name</label>
				<input type="text" class="form-control" name="fname" placeholder="Name" autocomplete="off" style=" width: 46%;float: left;clear: both; margin-right: 43px;
">
</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" autocomplete="off">
				</div>
				
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">Mobile No.</label>
				<input type="text" class="form-control" name="mobile" placeholder="Mobile No." autocomplete="off">
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">Message</label>
				<textarea name="message" class="form-control" rows="3" cols="5" placeholder="Message" autocomplete="off" ></textarea>
				</div>
				
				<input type="hidden" name="enquiry_user_type" value="<?php echo $user_type; ?>" >
				<input type="hidden" name="agent_email_id" value="<?php echo $email; ?>" >
				
				<div class="form-group text-center">
				<input type="submit" name="Submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light" value="Submit">
				</div>
			</form>

    </div>

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

	
		
		
		
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