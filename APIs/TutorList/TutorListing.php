<?php
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

require_once("config.php");
//require_once("dbcontroller.php");
header('content-type:application/json');

	
	
		if($_GET['student_id'] !="")
		{
	
	
			$query = "SELECT * FROM tutor_booking_process where student_id = '".$_GET['student_id']."' ";
					
				
			$result = $conn->query($query) or die ("table not found");
			$numrows = mysqli_num_rows($result);
			
			
			if($numrows > 0)
			{
				$Response = array();
				
				while($tutor_result = mysqli_fetch_assoc($result))
				{
					$tutor_booking_process_StudentSubjects = array();
					$Tutor_Qualification  = array();
					$Tutor_Schedule   = array();
					$Tutor_slot_time = array();
					
					
					/// for Student_Subjects
					$ss_query = $conn->query("select * from tutor_booking_process_StudentSubjects where tutor_booking_process_id = '".$tutor_result['tutor_booking_process_id']."' ");
					
					while($student_subject_res = mysqli_fetch_array($ss_query))
					{
						if($student_subject_res['Student_Subjects'] != "")
						{
							$tutor_booking_process_StudentSubjects[] = array(
																			 'tutor_booking_process_StudentSubjects_id' => $student_subject_res['tutor_booking_process_StudentSubjects_id'],
																			 'Student_Subjects' => $student_subject_res['Student_Subjects']
																			 );
						}
					}
					
					/// for Tutor_Qualification
					$TQ_query = $conn->query("select * from tutor_booking_process_TutorQualification where tutor_booking_process_id = '".$tutor_result['tutor_booking_process_id']."' ");
					
					while($Tutor_Qualification_res = mysqli_fetch_array($TQ_query))
					{
						if($Tutor_Qualification_res['Tutor_Qualification'] != "")
						{
							$Tutor_Qualification[] = array(
														 'tutor_booking_process_TutorQualification_id' => $Tutor_Qualification_res['tutor_booking_process_TutorQualification_id'],
														 'Tutor_Qualification' => $Tutor_Qualification_res['Tutor_Qualification']
														 );
						}
					}
					
					/// for Tutor_Schedule
					$TS_query = $conn->query("select * from tutor_booking_process_TutorSchedule where tutor_booking_process_id = '".$tutor_result['tutor_booking_process_id']."' ");
					
					while($Tutor_Schedule_res = mysqli_fetch_array($TS_query))
					{
						if($Tutor_Schedule_res['tutor_schedule'] != "")
						{
							$Tutor_Schedule[] = array(
														 'tutor_booking_process_TutorSchedule_id' => $Tutor_Schedule_res['tutor_booking_process_TutorSchedule_id'],
														 'tutor_schedule' => $Tutor_Schedule_res['tutor_schedule']
														 );
						}
					}
					
					
					/// for Tutor_Slot_time
					$TST_query = $conn->query("select * from tutor_booking_process_TutorSlotsTime where tutor_booking_process_id = '".$tutor_result['tutor_booking_process_id']."' ");
					
					while($Tutor_Slot_time_res = mysqli_fetch_array($TST_query))
					{
						if($Tutor_Slot_time_res['tutor_slot_time'] != "")
						{
							$Tutor_slot_time[] = array(
														 'tutor_booking_process_TutorSlot_time_id' => $Tutor_Slot_time_res['tutor_booking_process_TutorSlot_time_id'],
														 'tutor_slot_time' => $Tutor_Slot_time_res['tutor_slot_time']
														 );
						}
					}
					
					
					
					
					if($tutor_result['tutor_booking_status']==0)
					{
						$tutor_booking_status = 'In Progress';
					}
					else{
						$tutor_booking_status = 'Completed';
					}
					
					
					$Response[] = array(
									 'tutor_booking_process_id' => $tutor_result['tutor_booking_process_id'],
									 'student_id' => $tutor_result['student_id'],
									 'student_level' => $tutor_result['student_level'],
									 'student_grade' => $tutor_result['student_grade'],
									 'student_tution_type' => $tutor_result['student_tution_type'],
									 'tutor_id' => $tutor_result['tutor_id'],
									 'tutor_duration_weeks' => $tutor_result['tutor_duration_weeks'],
									 'tutor_duration_hours' => $tutor_result['tutor_duration_hours'],
									 'tutor_tution_fees' => $tutor_result['tutor_tution_fees'],
									 'tutor_tution_schedule_time' => $tutor_result['tutor_tution_schedule_time'],
									 'tutor_tution_offer_amount_type' => $tutor_result['tutor_tution_offer_amount_type'],
									 'tutor_tution_offer_amount' => $tutor_result['tutor_tution_offer_amount'],
									 'booked_date' => $tutor_result['booked_date'],
									 'tutor_booking_status' => $tutor_booking_status,
									 'student_subjects' => $tutor_booking_process_StudentSubjects,
									 'tutor_qualification' => $Tutor_Qualification,
									 'tutor_schedule' => $Tutor_Schedule,
									 'Tutor_slot_time' => $Tutor_slot_time		
									 );
					
					
				}	
				
				if(!empty($Response))
				{
					$resultData = array('status' => true, 'output' => $Response);
				}
				else			
				{
					$resultData = array('status' => false, 'message' => 'No Record Found.');
				}				
				
				
			}
			else 
			{
				//$message1="Email Id Or Mobile Number not valid !";
				$resultData = array('status' => false, 'message' => 'No Record Found.');
			}
				

		}
		else{
			
			$resultData = array('status' => false, 'message' => 'Student id can\'t be blank.');
		}	
							
			echo json_encode($resultData);
					
			
?>