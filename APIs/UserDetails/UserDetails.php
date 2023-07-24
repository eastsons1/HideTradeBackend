<?php
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

require_once("config.php");
//require_once("dbcontroller.php");
header('content-type:application/json');



		
		
		if($_POST['user_id']!="")
		{
			$check = "SELECT * FROM user_info WHERE user_id = '".$_POST['user_id']."' ";
			$check_res = $conn->query($check);
			$check_res_num = mysqli_num_rows($check_res);
			
		  if($check_res_num == 1)	
		  {
				 
				 $user_list_arr = array();
				$user = $conn->query("SELECT * FROM user_info WHERE user_id = '".$_POST['user_id']."' ");
				while($user_list = mysqli_fetch_assoc($user))
				{
					if($user_list['user_type']=="I am looking for a Tutor")
					{
						$sql = "SELECT * FROM user_student_info  WHERE user_id = '".$_POST['user_id']."' " ;
						
						$user_type = "Student";
					}
					if($user_list['user_type']=="I am an Educator")
					{
						$sql = "SELECT * FROM  user_tutor_info WHERE user_id = '".$_POST['user_id']."' " ;
						
						$user_type = "Tutor";
					}
					
					$user_extra_info = mysqli_fetch_assoc($conn->query($sql));
					
					if(!empty($user_extra_info))
					{
						$user_list_arr[] = array_merge($user_list,$user_extra_info);
					}
					else{
						$user_list_arr[] = $user_list;
					}
					
				}
				
				
				/// get user additional details
				if($user_type=="Tutor")
				{	
					$tutor_booking_details_arr = array();
					
					/// tutor booking details
					$tutor_booking_details = mysqli_fetch_assoc($conn->query("SELECT * FROM tutor_booking_process WHERE tutor_id = '".$_POST['user_id']."' "));
					
					/// On tutor booking - Student Subjects 
					$Student_Subjects_arr = array();
					$Student_Subjects_sql = $conn->query("SELECT * FROM tutor_booking_process_StudentSubjects WHERE tutor_booking_process_id = '".$tutor_booking_details['tutor_booking_process_id']."' ");
					while($Student_Subjects = mysqli_fetch_assoc($Student_Subjects_sql))
					{
						$Student_Subjects_arr[] = $Student_Subjects;
					}
					
					/// On tutor booking - Tutor Qualification  
					$Tutor_Qualification_arr = array();
					$Tutor_Qualification_sql = $conn->query("SELECT * FROM tutor_booking_process_TutorQualification WHERE tutor_booking_process_id = '".$tutor_booking_details['tutor_booking_process_id']."' ");
					while($Tutor_Qualification  = mysqli_fetch_assoc($Tutor_Qualification_sql))
					{
						$Tutor_Qualification_arr[] = $Tutor_Qualification;
					}
					
					/// On tutor booking -  Tutor Schedule   
					$Tutor_Schedule_arr = array();
					$Tutor_Schedule_sql = $conn->query("SELECT * FROM tutor_booking_process_TutorSchedule WHERE tutor_booking_process_id = '".$tutor_booking_details['tutor_booking_process_id']."' ");
					while($Tutor_Schedule  = mysqli_fetch_assoc($Tutor_Schedule_sql))
					{
						$Tutor_Schedule_arr[] = $Tutor_Schedule;
					}
					
					/// On tutor booking -  Tutor SlotsTime    
					$Tutor_Slots_Time_arr = array();
					$Tutor_Slots_Time_sql = $conn->query("SELECT * FROM tutor_booking_process_TutorSlotsTime WHERE tutor_booking_process_id = '".$tutor_booking_details['tutor_booking_process_id']."' ");
					while($Tutor_Slots_Time  = mysqli_fetch_assoc($Tutor_Slots_Time_sql))
					{
						$Tutor_Slots_Time_arr[] = $Tutor_Slots_Time;
					}
					
					$tutor_booking_detailsF = array('Tutor_Booking_Details' => $tutor_booking_details);	
					$Student_Subjects_arrF = array('Student_Subjects' => $Student_Subjects_arr);	
					$Tutor_Qualification_arrF = array('Tutor_Qualification' => $Tutor_Qualification_arr);	
					$Tutor_Schedule_arrF = array('Tutor_Schedule' => $Tutor_Schedule_arr);	
					$Tutor_Slots_Time_arrF = array('Tutor_Slots_Time' => $Tutor_Slots_Time_arr);
					
					$tutor_booking_details_arr[] = array_merge($tutor_booking_detailsF,$Student_Subjects_arrF,$Tutor_Qualification_arrF,$Tutor_Schedule_arrF,$Tutor_Slots_Time_arrF);
					
				}
				
				
				$user_list_arrF = array_merge($user_list_arr,$tutor_booking_details_arr);
				
				
				
				if(!empty($user_list_arr))
				{
					$resultData = array('status' => true, 'Single_User_details' => $user_list_arrF);
				}
				else{
					$resultData = array('status' => false, 'message' => 'No Records Found.');
				}
				
			
		  }
		  else{
			
			 $resultData = array('status' => false, 'message' => 'User id not exists.');
							
		  }
		}
		else
		{
			  $resultData = array('status' => false, 'message' => 'User id can not blank.');		
		}			
		

					
			echo json_encode($resultData);
			
?>