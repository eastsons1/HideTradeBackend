<?php
	session_start();
?>	
<link rel="stylesheet" type="text/css" href="css/sdmenu.css" />
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>

<div style="float: left" id="my_menu" class="sdmenu">
   
 <?php if($_SESSION['user_type']=="Admin"){ ?>
  
  <div>
  	<span style="cursor:pointer">Manage Product Category</span>
	<a href="add_category.php">Add Product Category</a>
    <a href="view_category.php">View Product Category</a>
  </div>
  
  <div>
  	<span style="cursor:pointer">Manage Product Brand</span>
	<a href="add_brand.php">Add Product Brand</a>
    <a href="view_brand.php">View Product Brand</a>
  </div>
  
  <div>
  	<span style="cursor:pointer">Manage Product</span>
	<a href="add_product.php">Add Product</a>
    <a href="view_products.php">View Product</a>
  </div>
  
  <div>
  	<span style="cursor:pointer">Manage User Info</span>
    <a href="view_user_info.php">View User Info</a>
  </div>
  
   <div>
  	<span style="cursor:pointer">Manage Subscription</span>
	<a href="add_subscription.php">Add Subscription</a>
    <a href="view_subscription.php">View Subscription</a>
  </div>
  
  
  <!--<div>
    <span style="cursor:pointer">Manage Database Backup</span>
    <a href="backup.php">Database Backup</a>
  </div>-->
 
  
  
  <div>
    <span style="cursor:pointer">Manage Admin</span>
    <a href="change_passsword.php">Change Password</a>
  </div>
 <?php }else{ ?>
   <div>
  	<span style="cursor:pointer">Manage User Info</span>
    <a href="view_user_info.php">View User Info</a>
  </div>
  <?php } ?>
  
</div>