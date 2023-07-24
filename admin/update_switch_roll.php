<?php
   // ob_start();
	session_start(); 
	include('../include/config.php');
	
	
	$user_id = $_GET['user_id'];
	$RollSwitch = $_GET['RollSwitch'];
	$user_type = $_GET['user_type'];
	
	
	if($user_id != "" && $RollSwitch == "On")
	{
		
		if($user_type=="tutor")
		{
			$Utype = "I am an Educator";
			$SetUserTypeSession = 'student';
		}
		
		
			
			 $sql = "UPDATE user_info SET user_type = '".$Utype."' WHERE user_id = '".$user_id."'";
			 $sql_run = $conn->query($sql) or die(" query  not executed");
			 
			$_SESSION['user_type']="";
			$_SESSION['RollSwitch'] = "";
			
			unset($_SESSION['user_type']);
			unset($_SESSION['RollSwitch']);
			
		 $_SESSION['user_type'] = $SetUserTypeSession;
		 $_SESSION['RollSwitch'] = $_GET['RollSwitch'];
		
		echo $return_url = "complete_profile.php?user_id=".$user_id."&user_type=".$user_type."&RollSwitch=".$_SESSION['RollSwitch'];
			
		
	}
	
	if($user_id!="" && $RollSwitch == "Off")
	{
		
		
		if($user_type=="student")
		{
			$Utype = "I am looking for a Tutor";
			$SetUserTypeSession = 'tutor';
		}
		
				/**
				$select     = $conn->query("select * from user_tutor_info where user_id = '".$user_id."' ");
				$select_res = mysqli_fetch_array($select);
				$fetch      = $select_res['profile_image'];
				@unlink("../UPLOAD_file/".$fetch );	
			
			 $delT = "DELETE FROM user_tutor_info WHERE user_id = '".$user_id."'";
			 $delT_run = $conn->query($delT) or die(" query  not executed");
			 **/
		
			 $sql = "UPDATE user_info SET user_type = '".$Utype."' WHERE user_id = '".$user_id."'";
			 $sql_run = $conn->query($sql) or die(" query  not executed");
			 
			$_SESSION['user_type']="";
			$_SESSION['RollSwitch'] = "";
			
			unset($_SESSION['user_type']);
			unset($_SESSION['RollSwitch']);
			
		 $_SESSION['user_type'] = $SetUserTypeSession;
		 $_SESSION['RollSwitch'] = $_GET['RollSwitch'];
		
		echo $return_url2 = "complete_profile.php?user_id=".$user_id."&user_type=".$user_type."&RollSwitch=".$_SESSION['RollSwitch'];
			
		
	}
?>