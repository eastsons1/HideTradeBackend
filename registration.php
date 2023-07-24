<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
include("include/functions.php");
//$db = new MySqlDb;









//////

function Send_OTP_Mobile($CountryCode,$Mobile,$OTP)
{
	///"https://api.authkey.io/request?authkey=597a19768e9f3ec6&mobile=7991846193&country_code=91&sid=5319&otp=1234&time=10min";
	
 //$url_otp = "https://api.authkey.io/request?authkey=597a19768e9f3ec6&mobile=$Mobile&country_code=$CountryCode&sid=5319&otp=$OTP&time=10min";
$url_otp = "https://api.authkey.io/request?authkey=a00bc3228c699037&mobile=$Mobile&country_code=$CountryCode&sid=9334&otp=$OTP&time=10min";


 $payload = json_encode("");
    //sending requests
    $ch = curl_init($url_otp);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'       
    ));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    // catching the response
    $response = json_decode($result, true);
	
	echo $response;
	
}


///////




 //echo $_SESSION['OTP'];

	if(isset($_POST['Submit']))
	{
		$user_type	=	$_POST['user_type'];
		$first_name	=	$_POST['first_name'];
		$last_name	=	$_POST['last_name'];
		$user_name = $_POST['user_name'];
		$email	=	$_POST['email'];
		$password	=	md5($_POST['password']);
		$mobile	=	$_POST['mobile'];
		
		$country_phone_code	=	$_POST['country_phone_code'];
		$address	=	$_POST['address'];
		
		
		
		if( $first_name!="" && $last_name!="" && $email!="" && $mobile!="" && $country_phone_code!="" && $password != "")
		{
			
			//$check_email = "SELECT * FROM user_info_temp WHERE email = '".$email."' or mobile ='".$mobile."' ";    /// Check mobile or email exists
			
			$check_email = "SELECT * FROM user_info WHERE email = '".$email."' ";    /// Check mobile or email exists
			$check_email_result = $conn->query($check_email);
			$email_already_exits = mysqli_num_rows($check_email_result);
			if($email_already_exits>0)
			{
				$resultData = array('status' => false, 'message' => 'This Email id already exists. Please use another email id.');
				$email_chk = 0;
				
			}
			else			
			{
				$email_chk = 1;
			}
			
			
			$check_mobile = "SELECT * FROM user_info WHERE mobile ='".$mobile."' ";    /// Check mobile or email exists
			$check_mobile_result = $conn->query($check_mobile);
			$mobile_already_exits = mysqli_num_rows($check_mobile_result);
			if($mobile_already_exits>0)
			{
				$resultData = array('status' => false, 'message' => 'This Mobile No. already exists. Please use another Mobile No.');
				$mobile_chk = 0;
			}
			else			
			{
				$mobile_chk = 1;
			}
			
			
			
		  if($email_chk == 1 && $mobile_chk == 1)	
		  {
				$_SESSION['OTP'] = '';
			  
				$randomNumber_otp = rand(10,10000);
				$randomNumber_otp_mobile = rand(10,20000);
				
				$check_email = $conn->query("SELECT * FROM user_info WHERE email = '".$email."' ");
			
			  if(mysqli_num_rows($check_email) == 0)	
			  {	
			
			
			 $sql = "insert into user_info_temp set first_name ='".$first_name."', last_name ='".$last_name."', adminusername ='".$email."', email = '".$email."', password ='".$password."', mobile ='".$mobile."', user_roll	= '0', OTP = '".$randomNumber_otp."', OTP_mobile = '".$randomNumber_otp_mobile."'  ";
			
			
			
			if($res=$conn->query($sql))
			{
				
				$subject  = "OTP For User Registration";
			
				$message = '<table border="0" >

				<tr><td></td><td><strong>OTP For Registration</strong></td></tr>

				<tr><td><strong>OTP: </strong></td><td>'.$randomNumber_otp.'</td></tr>

				</table>';

			
							
				$to	=	"pushpendra@eastsons.com".",".$email;	
		
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .=  'X-Mailer: PHP/'. phpversion();
				//$headers .= 'Bcc: test@yahoo.com' . "\r\n";
				$headers .= 'From: support@gmail.com' . "\r\n";		

				

				if(@mail($to, $subject, $message, $headers))
				{

					//$msg1 = '<span style="color:red;">Message sent successfully.</span>';
					
					Send_OTP_Mobile($country_phone_code,$mobile,$randomNumber_otp_mobile);
					
					$_SESSION['OTP'] = $randomNumber_otp;
					
					header('location:registration.php?step=1');

				}
				
				
				
				
				 $query = "SELECT * FROM user_info_temp WHERE email	='".$email."' and password ='".$password."'  ";
		
		
		
					$result = $conn->query($query) or die ("table not found");
					 $numrows = mysqli_num_rows($result);
					
					if($numrows > 0)
					{
					  $results = mysqli_fetch_array($result);
					  $results['adminusername'];
						$results['password'];
						$storedPassword = $results['password'];
						if ( $email==$results['adminusername'] && $password == $results['password'] )
						{
						 	$_SESSION['adminusername'] = $_POST['email'];
							$_SESSION['user_name'] = $_POST['user_name'];
							
							 $_SESSION['username'] = $_POST['email'];
							//$_SESSION['userpass'] = $_POST['userpass'];
							
							// $_SESSION['user_type'] = $_POST['user_type'];
							 $_SESSION['loggedIn_user_id'] = $results['user_id']; 
							
							
							//header("location:admin/welcome.php");
							
							 $Last_user_id = mysqli_fetch_array($conn->query("select user_id from user_info_temp order by user_id DESC limit 1"));
							
							//header("location:upload_user_doc.php?id=".$Last_user_id['user_id']);
							$msg1="Registration Successfull!. Please Login Now.";
							
						}
						else { $msg1="Password not valid !"; }
						
					}
				
				
				$msg1="User Registration Successfull!. Please Login Now.";
				
			}
			else
			{
				$msg1 = "Error while trying to inserting the record.";
			}
			
		 }
		 else{
			 $msg1 = "This Email id already exists. Please use another email id.";
		 }
			
			
		}
		else{
			
			//$msg1 = "This Email or Mobile Already Exists. Please go for login.";
		}
			
		}
	}
	
	
	if(isset($_POST['Submit2']))
	{
		if($_GET['step']==1 && $_SESSION['OTP']!="")
		{
			$check_otp = "SELECT * FROM user_info_temp WHERE OTP = '".$_POST['OTP']."' and OTP_mobile = '".$_POST['OTP2']."' ";
			$check_otp_result = $conn->query($check_otp);
			$check_otp_exits = mysqli_num_rows($check_otp_result);
			
		  if($check_otp_exits == 1)	
		  {
				 $update_sql = $conn->query("update user_info_temp set OTP_Validate ='1' where OTP = '".$_POST['OTP']."'  ");
				 if($update_sql)
				 {
					 header('location:registration.php?step=2');
				 }
			
		  }
		  else{
			  $msg1 = "OTP entered is not valid. Please enter correct OTP.";
		  }
		}	
	}
	
	if(isset($_POST['Submit3']))
	{
		if($_POST['Term_cond']==1 && $_POST['user_type']!="Role Select")
		{	
		
		if($_GET['step']==2 && $_SESSION['OTP']!="")
		{
			$check_otp = "SELECT * FROM user_info_temp WHERE OTP = '".$_SESSION['OTP']."' and OTP_Validate ='1' ";
			$check_otp_result = $conn->query($check_otp);
			$check_otp_exits = mysqli_num_rows($check_otp_result);
			
		  if($check_otp_exits == 1)	
		  {
			  $user_temp_record = mysqli_fetch_array($check_otp_result);
			  
				$sql = "insert into user_info set first_name ='".$user_temp_record['first_name']."', last_name = '".$user_temp_record['last_name']."', adminusername ='".$user_temp_record['adminusername']."', email = '".$user_temp_record['email']."', password ='".md5($_POST['password'])."', mobile ='".$user_temp_record['mobile']."', user_type ='".$_POST['user_type']."', Term_cond ='".$_POST['Term_cond']."', user_roll	= '0' ";
			
				if($res=$conn->query($sql))
				{
					
					//$conn->insert_id;
					$last_id = mysqli_insert_id($conn);
					
					$del_sql = $conn->query("delete from user_info_temp WHERE OTP_Validate ='1' and OTP = '".$_SESSION['OTP']."' ");
				
				
					if($_POST['user_type']=="I am looking for a Tutor")
					{
						$user_type_session = 'student';
					}
					if($_POST['user_type']=="I am an Educator")
					{
						$user_type_session = 'tutor';
					}	
				
					$_SESSION['user_type'] = $user_type_session;
					$_SESSION['adminusername'] = $user_temp_record['email'];
					$_SESSION['user_name'] = $user_temp_record['first_name']." ".$user_temp_record['last_name'];
					$_SESSION['username'] = $user_temp_record['email'];
					$_SESSION['loggedIn_user_id'] = $last_id; 
					//header("location:admin/welcome.php");
					header("location:admin/complete_profile.php");
					
				}
			
		  }
		  else{
			  $msg1 = "OTP entered is not valid. Please enter correct OTP.";
		  }
		}	
		
		 }
		  else{
			  $msg1 = "Select Role and Terms & Conditions.";
		  }
	}
	
	
	//echo $_SERVER['REQUEST_URI'];
	
	if($_SESSION['OTP'] !="" && $_SERVER['REQUEST_URI']=='/projects/studyLab/registration.php')
	{	
			$check_otp = "SELECT * FROM user_info_temp WHERE OTP = '".$_SESSION['OTP']."' and OTP_Validate = '1' ";
			$check_otp_result = $conn->query($check_otp);
			$check_otp_exits = mysqli_num_rows($check_otp_result);
			
		  if($check_otp_exits == 1)	
		  {
			   header('location:registration.php?step=2');
		  }	  
		
	}
	
	if($_SESSION['OTP'] =="" && ($_SERVER['REQUEST_URI']=='/projects/studyLab/registration.php?step=1' || $_SERVER['REQUEST_URI']=='/projects/studyLab/registration.php?step=2'))
	{
		header('location:registration.php');
	}
	
		
	
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tutor APP </title>
   
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Tutor APP" />
      <meta name="keywords" content="Tutor APP" />
      <meta name="author" content="Tutor APP" />
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
	
	/**if(document.myForm.user_type.value == "Select User Type")
	{
		alert("Please select user type.");
		document.myForm.user_type.focus();
		return false;
	}
	**/
	if(document.myForm.first_name.value == "")
	{
		alert("Please enter first name");
		document.myForm.first_name.focus();
		return false;
	}
	
	if(document.myForm.last_name.value == "")
	{
		alert("Please enter last name");
		document.myForm.last_name.focus();
		return false;
	}
	if(document.myForm.user_name.value == "")
	{
		alert("Please enter user name");
		document.myForm.user_name.focus();
		return false;
	}
	if(document.myForm.Civic_Nr.value == "")
	{
		alert("Please enter civic nr");
		document.myForm.Civic_Nr.focus();
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
	
	if(document.loginform.country_phone_code.value=="")
	 {
		alert("Please enter country phone code.")
		document.loginform.country_phone_code.focus();
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


function User_Type()
{
	
	document.getElementById('user_type').value;
	//alert(document.getElementById('user_type').value);
}
</script>
	  
  </head>

  <body themebg-pattern="theme1">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                   
					<form class="md-float-material form-material" name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();" >
                        <div class="text-center">
                            <img src="admin/assets/images/logoF.png" alt="logoF.png">
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up</h3>
										<?php if($msg1 != ""){ ?>
										<br/>
										<span style="color:red;"><?php echo $msg1; ?></span>
										<?php } ?>
                                    </div>
                                </div>
								
								<?php if($_GET['step']==2 && $_SESSION['OTP']!=""){ ?>
								
								<form class="md-float-material form-material" name="myForm3" method="post" enctype="multipart/form-data" onsubmit="return validate2();" >
								
								
								<div class="form-group form-primary" >
								<select name="user_type" id="user_type" class="form-control" autocomplete="off"  >
								<option value="Role Select">-- Role Select --</option>
								<!--<option value="Admin">Admin</option>-->
								<option value="I am looking for a Tutor">I am looking for a Tutor</option>
								<option value="I am an Educator">I am an Educator</option>
								</select>	
								</div>
								
								<div class="form-group form-primary">
                                    <input type="checkbox" value="1" name="Term_cond" class="form-control" required=""  style="font-size: ;width: 21px;height: 20px;">
                                    <span class="form-bar2"></span>
                                    <label class="float-label2" style="margin-left: 32px;margin-top: -22px;font-weight: bold;" >I agree to the Tearms & Conditions, and the Privacy Policy.</label>
                                </div>
								
								
								
								 <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="Submit3" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Submit</button>
                                    </div>
                                </div>
								</form>
								
								<?php } ?>
								
								<?php if($_GET['step']==1 && $_SESSION['OTP']!=""){ ?>
								
								<form class="md-float-material form-material" name="myForm2" method="post" enctype="multipart/form-data" onsubmit="return validate2();" >
								 <div class="form-group form-primary">
                                    <input type="text" name="OTP" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Enter OTP Received From Email</label>
                                </div>
								 <div class="form-group form-primary">
                                    <input type="text" name="OTP2" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Enter OTP Received From Mobile</label>
                                </div>
								 <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="Submit2" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Next</button>
                                    </div>
                                </div>
								</form>
								
								<?php 
								}
								
								 if($_GET['step']=="" && $_SESSION['OTP']==""){ ?>
								
								<form class="md-float-material form-material" name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();" >
									
									
								 <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="first_name" id="first_name" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="text" name="last_name" id="last_name" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Last Name</label>
                                        </div>
                                    </div>
                                </div>	
									
									
								<!--	 Updated By AAlok to first name & Last Name
								
								  <div class="form-group form-primary">
                                    <input type="text" name="fname" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Your Name</label>
                                </div>
								
								-->
								
								 <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="password" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-primary">
                                            <input type="password" name="confirm_password" class="form-control" required="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Your Email Address</label>
                                </div>
								
								<div class="form-group form-primary">
								 
                                    <select type="text" name="country_phone_code" id="country_phone_code" class="form-control" required=""  autocomplete="off" style="width: 40%; float:left; margin-right: 21px;" >
									<?php 
									$country_code = $conn->query("select * from countries_phone_code order by name ASC");
									while($country_code_num = mysqli_fetch_array($country_code))
									{
									?>
									<option value="<?php echo $country_code_num['phonecode']; ?>" ><?php echo $country_code_num['name']." - [ ".$country_code_num['phonecode']." ]"; ?></option>
									<?php } ?>
									</select>
									<input type="text" name="mobile" class="form-control" required=""  autocomplete="off" style="width: 51%; float:left;" placeholder="Phone No." >
									<br/>	
								  <!-- <span class="form-bar"></span>
                                     <label class="float-label">Phone No.</label>  -->
                                </div>
								
								
								
								
								
                               
								
								
                              <!--  <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                            <label>                                       
											<div class="checkbox-fade fade-in-primary">

											<input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept <a href="#">Terms &amp; Conditions.</a></span>
                                            </label>
</div>                                                
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Send me the <a href="#!">Newsletter</a> weekly.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="Submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Next</button>
                                    </div>
                                </div>
								 </form>
								<?php } ?>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you.</p>
                                        <p class="text-inverse text-left"><a href="index.php"><b>Back to website</b></a></p>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                   
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
                    <img src="admin/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="admin/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="admin/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="admin/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="admin/assets/images/browser/ie.png" alt="">
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
