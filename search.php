<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
include("include/functions.php");
//$db = new MySqlDb;


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

.authentication .card-plain{max-width:596px !important;}
.prof{text-decoration:underline;}
.prof:hover{text-decoration:none; color:#00bcd4;}
</style>
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
			
			
			
			
			
			<?php
				if(isset($_POST['Search']))
				{
					if( $_POST['user_type'] != "" || $_POST['address'] != "")
					{
						$user_type = $_POST['user_type'];
						$address = $_POST['address'];


						//strrchr($address, $address);



						$query = "SELECT * FROM user_info WHERE user_type = '".$user_type."' or address1 regexp '(^|[[:space:]])$address([[:space:]]|$)' ";
						
						


						$result = $conn->query($query) or die ("table not found");
						$numrows = mysqli_num_rows($result);
						if($numrows > 0)
						{
							?>
							
						<div style="width:100%; border:none;">

						<table style="width:100%; border-bottom:1px solid;">
						<tr>
						<td style="background: green;border-bottom: 1px solid #fff; border-top-left-radius:22px;"><strong>Name</strong></td> 
						<td style="background: green;border-bottom: 1px solid #fff;"><strong>Address</strong></td> 
						<td style="background: green;border-bottom: 1px solid #fff; border-top-right-radius:22px;"><strong>Contact No.</strong></td>
						</tr>
						<tr>
						<td></td> <td></td> <td></td>
						</tr>
					<?php		
						while($results = mysqli_fetch_array($result))
						{
							$first_name =	$results['first_name'];
							$address1 =  $results['address1'];
							$mobile =  $results['mobile'];
						   ?>
						   <tr><td><a class="prof" href="profile.php?id=<?php echo $results['user_id']; ?>"><?php echo ucfirst($first_name); ?></a></td> <td><?php echo $address1; ?></td> <td><?php echo $mobile; ?></td>
								</tr>
					<?php
						}
						?>
						
						</table>
			
					</div>
			<?php
						
						}

					}
				} 
			?>
			
			
			
			
			
			
			
			
			
			
			
                <form class="form" name="loginform" method="post" action="">
                    <div class="header">
                        <div class="logo-container">
                           <br>
                        </div>
                        <h5>Search Customer / Agent</h5>
						<font color="#FF0000"><?php echo $message1; ?></font>
                    </div>
                    <div class="content"> 
						
						 <div class="input-group input-lg">
								<select name="user_type" id="user_type" class="form-control" autocomplete="off" >
								<option value="Select User Type">-- Select By Type --</option>
								
								<option value="Customer">Customer</option>
								<option value="Agents">Agents</option>
								</select>	
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>  
						
                        <div class="input-group input-lg">
                            <input type="text" name="address" class="form-control" placeholder="Search By Location" autocomplete="off">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-city"></i>
                            </span>
                        </div>
                       
						
                    </div>
                    <div class="footer text-center">
                        <input type="submit" name="Search" onclick="return validate22();" value="SEARCH" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">
                        
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