<?php
error_reporting(0);
ob_start();	
session_start(); 
include('include/config.php');
include("include/functions.php");
//$db = new MySqlDb;


 // Load Stripe's PHP library and set your secret keys
  require_once("config.php"); 
  // Create the subscription
  require_once("create-subscription.php"); 
  

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
.page-header{height:140vh;}
</style>
 <style>
      .spacing {
        margin-top:20px;
      }
      .success {
        color: #fff;
        background-color: green;
      }
      .error {
        color: #fff;
        background-color: red;
      }

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
           
		   
		    <?php if (isset($success)): ?>
      <div class='success'><?php echo $success; ?></div>
    <?php else: ?>
      <?php if (isset($error)): ?>
        <div class='error'><?php echo $error; ?></div>
      <?php endif ?>       
      
<style>

.content {
     
    margin:0 auto;
    text-align:left;
    padding:15px;
     
}

.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    background-color: #111;
    color: white;
    font-size: 25px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
	color:#000;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}

.page-header .container > .content-center{top:42% !important;}
</style>
 
<div class="content" style="width:100%;">
<h2 style="text-align:center"> Subscriptions </h2>
<p style="text-align:center">Buy Now</p>

<a href="https://buy.stripe.com/test_5kA4hqccmgEJgxy144">pay</a>

<?php 
 if($_SESSION['user_type'] != "")
  {
  
		  $sql = 'select * from tbl_subscription limit 0,3';
		  $reslt = $conn->query($sql);
		  $n = 0;
		  while($get_data = mysqli_fetch_array($reslt))
		  {
			  
			  $n = $n+1;
				//echo $n;
				if($n==2)
				{
					 $style = 'style="background-color:#4CAF50"';
				}	
				if($n==3)
				{
					 $style = 'style="background-color:blue"';
				}	


						
 
?>


<div class="columns">
  <ul class="price">
    <li class="header" <?php echo $style; ?> ><?php echo $get_data['subscription_name']; ?></li>
    <li class="grey">$ <?php echo $get_data['subs_price']; ?> / year</li>
    <li><?php echo strip_tags($get_data['subs_description']); ?></li>
  
    <li class="grey">

        <form action="" method="POST" class="spacing">
        <input name="plan" type="hidden" value="<?php echo $get_data['subscription_name']; ?>" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="<?php echo $get_data['subs_price']; ?>" />         
        <input name="currency" type="hidden" value="usd" />  
 <input name="stripeToken" type="hidden" value="tok_in" />  
<input name="stripeEmail" type="hidden" value="test@gmail.com" />   
 
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-image="assets/images/header_logo.png"
          data-name="<?php echo $get_data['subscription_name']; ?>"
          data-description="<?php echo strip_tags($get_data['subs_description']); ?>"
          data-panel-label="Subscribe Now"
          data-label="Subscribe Now"
          data-locale="auto">
        </script>
      </form>
   

    </li>
  </ul>
</div>

  <?php }  } ?>



  <?php endif ?>  

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