<?php
    ob_start();
	session_start(); 
	include('../include/config.php');
	include("../include/functions.php");
	//include("../include/checklogin.php");
	
	
	$id = $_GET['id'];
	if($id!="")
	{
		
		
		///user data delete
				
				$user_info_temp  = $conn->query(" DELETE FROM user_info_temp WHERE user_id = '".$id."' ");
				
				
				$user_tutor_info_img     = $conn->query("select * from user_tutor_info where user_id = '".$id."' ");
				$user_tutor_info_img_res = mysqli_fetch_array($user_tutor_info_img);
				$fetch1      = $user_tutor_info_img_res['profile_image'];
				@unlink("../UPLOAD_file/".$fetch1 );
				@unlink("../UPLOAD_file/".$fetch1 );
				@unlink("../UPLOAD_file/".$fetch1 );
				
				$user_tutor_info   = $conn->query(" DELETE FROM user_tutor_info WHERE user_id = '".$id."' ");
				
				$user_student_info_img     = $conn->query("select * from user_student_info where user_id = '".$id."' ");
				$user_student_info_img_res = mysqli_fetch_array($user_student_info_img);
				$fetch2      = $user_student_info_img_res['profile_image'];
				@unlink("../UPLOAD_file/".$fetch2 );
				@unlink("../UPLOAD_file/".$fetch2 );
				@unlink("../UPLOAD_file/".$fetch2 );
				
				$user_student_info   = $conn->query(" DELETE FROM user_student_info WHERE user_id = '".$id."' ");
				
				$tutor_tutorial_subjects   = $conn->query(" DELETE FROM tutor_tutorial_subjects WHERE user_id = '".$id."' ");
				$tutor_totoring_stream   = $conn->query(" DELETE FROM tutor_totoring_stream WHERE user_id = '".$id."' ");
				$tutor_totoring_levels  = $conn->query(" DELETE FROM tutor_totoring_levels WHERE user_id = '".$id."' ");
				$tutor_totoring_grade  = $conn->query(" DELETE FROM tutor_totoring_grade WHERE user_id = '".$id."' ");
				$tutor_qualification_subject_grade = $conn->query(" DELETE FROM tutor_qualification_subject_grade WHERE user_id = '".$id."' ");
				$token_table = $conn->query(" DELETE FROM token_table WHERE user_id = '".$id."' ");
				
				
				$tbl_user_order_request_docs_img     = $conn->query("select * from tbl_user_order_request_docs where user_id = '".$id."' ");
				$tbl_user_order_request_docs_img_res = mysqli_fetch_array($tbl_user_order_request_docs_img);
				$fetch4      = $tbl_user_order_request_docs_img_res['order_request_document'];
				@unlink("../UPLOAD_file/".$fetch4 );
				@unlink("../UPLOAD_file/".$fetch4 );
				@unlink("../UPLOAD_file/".$fetch4 );
				
				$tbl_user_order_request_docs  = $conn->query(" DELETE FROM tbl_user_order_request_docs WHERE user_id = '".$id."' ");
				
				$tbl_user_documents_img     = $conn->query("select * from tbl_user_documents where user_id = '".$id."' ");
				$tbl_user_documents_img_res = mysqli_fetch_array($tbl_user_documents_img);
				$fetch5      = $tbl_user_documents_img_res['document_name'];
				@unlink("../UPLOAD_file/".$fetch5 );
				@unlink("../UPLOAD_file/".$fetch5 );
				@unlink("../UPLOAD_file/".$fetch5 );
				
				$tbl_user_documents  = $conn->query(" DELETE FROM tbl_user_documents WHERE user_id = '".$id."' ");
				
				$tbl_temp_documents  = $conn->query(" DELETE FROM tbl_temp_documents WHERE user_id = '".$id."' ");
				$student_post_requirement  = $conn->query(" DELETE FROM student_post_requirement WHERE user_id = '".$id."' ");
				$chat_users_details  = $conn->query(" DELETE FROM chat_users_details WHERE tutor_id = '".$id."' ");
				$chat_users_details2  = $conn->query(" DELETE FROM chat_users_details WHERE student_id = '".$id."' ");
				$chatrooms  = $conn->query(" DELETE FROM chatrooms WHERE chat_userid = '".$id."' ");
				$chatrooms2  = $conn->query(" DELETE FROM chatrooms WHERE loggedIn_user_id = '".$id."' ");
				$booked_tutor  = $conn->query(" DELETE FROM booked_tutor WHERE booked_by_user_id = '".$id."' ");
				$booked_tutor2  = $conn->query(" DELETE FROM booked_tutor WHERE booked_to_user_id = '".$id."' ");
				
				
				$user_info_img     = $conn->query("select * from user_info where user_id = '".$id."' ");
				$user_info_img_res = mysqli_fetch_array($user_info_img);
				$fetch3      = $user_info_img_res['profile_image'];
				@unlink("../UPLOAD_file/".$fetch3 );
				@unlink("../UPLOAD_file/".$fetch3 );
				@unlink("../UPLOAD_file/".$fetch3 );
				
				$user_info  = $conn->query(" DELETE FROM user_info WHERE user_id = '".$id."' ");
		
	}
?>