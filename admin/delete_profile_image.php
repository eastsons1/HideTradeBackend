<?php
error_reporting(0);
ob_start();	
session_start(); 
include('../include/config.php');
include("../include/functions.php");
	
	
	$user_id = $_GET['user_id'];
	$user_type = $_GET['user_type'];
	
	
	if($user_type=="tutor")
	{
		$select     = $conn->query("select * from user_tutor_info where user_id = '".$user_id."' ");
		$select_res = mysqli_fetch_array($select);
		$fetch      = $select_res['profile_image'];
		@unlink("../UPLOAD_file/".$fetch );
		
		$query="update user_tutor_info set profile_image = '' WHERE user_id='".$user_id."'";
	}
	if($user_type=="student")
	{
		$select     = $conn->query("select * from user_student_info where user_id = '".$user_id."' ");
		$select_res = mysqli_fetch_array($select);
		$fetch      = $select_res['profile_image'];
		@unlink("../UPLOAD_file/".$fetch );
		
		$query="update user_student_info set profile_image = '' WHERE user_id='".$user_id."'";
	}
	//$query="delete from  products  WHERE id='".$id."'";
	$result=$conn->query($query) or die(" query  not executed");
	//header("location:edit_products.php?id=$id&page=$page&flag=$flag");
	header("location:edit_user_info.php?id=$user_id");

	 
?>