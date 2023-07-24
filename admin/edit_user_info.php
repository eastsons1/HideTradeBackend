<?php
error_reporting(0);
ob_start();	
session_start(); 
include('../include/config.php');
include("../include/functions.php");



 //echo $_SESSION['user_type'];

	 if($_GET['user_type'] !="")
	 {
		$_SESSION['user_type']="";
		unset($_SESSION['user_type']);
		 $_SESSION['user_type'] = $_GET['user_type'];
	 }	
	
	

	///Start Tutor Profile
	
	if(isset($_POST['Submit']))
	{
		
		
		
		$fetchP     =  "SELECT * FROM user_tutor_info as tinfo INNER JOIN user_info as uinfo ON tinfo.user_id=uinfo.user_id where tinfo.user_id ='".$_GET['id']."'";
		$query_runP =  $conn->query($fetchP);
		
		$User_records_DataW = mysqli_fetch_array($query_runP);
		
		
		if($_POST['first_name'] !="")
		{
			$first_name = $_POST['first_name'];
		}
		else{
			$first_name = $User_records_DataW['first_name'];
		}
		if($_POST['last_name'] !="")
		{
			$last_name = $_POST['last_name'];
		}
		else{
			$last_name = $User_records_DataW['last_name'];
		}
		if($_POST['email'] !="")
		{
			$email = $_POST['email'];
		}
		else{
			$email = $User_records_DataW['email'];
		}
		if($_POST['password'] !="")
		{
			$password = md5($_POST['password']);
		}
		else{
			$password = $User_records_DataW['password'];
		}
		if($_POST['mobile'] !="")
		{
			$mobile = $_POST['mobile'];
		}
		else{
			$mobile = $User_records_DataW['mobile'];
		}
		if($_POST['address1'] !="")
		{
			$address1 = $_POST['address1'];
		}
		else{
			$address1 = $User_records_DataW['address1'];
		}
		if($_POST['user_type'] !="")
		{
			$user_type = $_POST['user_type'];
		}
		else{
			$user_type = $User_records_DataW['user_type'];
		}
		if($_POST['age'] !="")
		{
			 $age	=	$_POST['age'];
		}
		else{
			$age = $User_records_DataW['age'];
		}
		if($_POST['Nationality'] !="")
		{
			$nationality	=	$_POST['Nationality'];
		}
		else{
			$nationality = $User_records_DataW['Nationality'];
		}
		if($_POST['Qualification'] !="")
		{
			$qualification	=	$_POST['Qualification'];
		}
		else{
			$qualification = $User_records_DataW['Qualification'];
		}
		if($_POST['Tutor_status'] !="")
		{
			$Tutor_status	=	$_POST['Tutor_status'];
		}
		else{
			$Tutor_status = $User_records_DataW['Tutor_status'];
		}
		if($_POST['Tuition_type'] !="")
		{
			$tuition_type	=	$_POST['Tuition_type'];
		}
		else{
			$tuition_type = $User_records_DataW['Tuition_type'];
		}
		if($_POST['Location'] !="")
		{
			$location	=	$_POST['Location'];
		}
		else{
			$location = $User_records_DataW['Location'];
		}
		if($_POST['Postal_Code'] !="")
		{
			$postal_code	=	$_POST['Postal_Code'];
		}
		else{
			$postal_code = $User_records_DataW['Postal_Code'];
		}
		if($_POST['textInput'] !="")
		{
			$travel_distance	=	$_POST['textInput'];
		}
		else{
			$travel_distance = $User_records_DataW['textInput'];
		}
		if($_POST['Personal_Statement'] !="")
		{
			$Personal_Statements	=	$_POST['Personal_Statement'];
		}
		else{
			$Personal_Statements = $User_records_DataW['Personal_Statement'];
		}
		if($_POST['gender'] !="")
		{
			$gender = $_POST['gender'];
		}
		else{
			$gender = $User_records_DataW['gender'];
		}
		if($_POST['Name_Of_School'] !="")
		{
			$Name_Of_School = $_POST['Name_Of_School'];
		}
		else{
			$Name_Of_School = $User_records_DataW['Name_Of_School'];
		}
		if($_POST['Course_Exam'] !="")
		{
			 $Course_Exam = $_POST['Course_Exam'];
		}
		else{
			$Course_Exam = $User_records_DataW['Course_Exam'];
		}
		if($_POST['OtherCourse_Exam'] !="")
		{
			 $OtherCourse_Exam = $_POST['OtherCourse_Exam'];
		}
		else{
			$OtherCourse_Exam = $User_records_DataW['OtherCourse_Exam'];
		}
		if($_POST['Select_Years'] !="")
		{
			 $tutor_tutoring_experience_years = $_POST['Select_Years'];
		}
		else{
			$tutor_tutoring_experience_years = $User_records_DataW['Select_Years'];
		}
		if($_POST['Select_Months'] !="")
		{
			 $tutor_tutoring_experience_months = $_POST['Select_Months'];
		}
		else{
			$tutor_tutoring_experience_months = $User_records_DataW['Select_Months'];
		}
		
		
		
		
		if($_POST["Tutoring_Subjects"] !="")
		{
			$Tutoring_Subjects     = count($_POST["Tutoring_Subjects"]);
		}
		if($_POST["totoring_grade"] !="")
		{
			$totoring_grade = count($_POST['totoring_grade']);
		}
		if($_POST["tutoring_Stream"] !="")
		{
			$tutoring_Stream = count($_POST['tutoring_Stream']);
		}
		if($_POST["tutor_Subject"] !="")
		{
			$tutor_Subject = count($_POST['tutor_Subject']);
		}
		if($_POST["tutor_Grade"] !="")
		{
			$tutor_Grade = count($_POST['tutor_Grade']);
		}
		if($_POST["Tutoring_Levels"] !="")
		{
			$Tutoring_Levels = count($_POST['Tutoring_Levels']);
		}
		
		
		
		$random_num = rand(100,100000);
		$random_character =  ucfirst(substr("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", mt_rand(0, 51), 1).substr(md5(time()), 50));
		$tutor_code = $random_character.$random_num;
		
	
				
				
				//$query_resPass =  mysqli_fetch_array($query_runP);
				$exist_user_img =  explode("_",$User_records_DataW['profile_image']);
				$image_name = time()."_".str_replace(" ","_",$_FILES['uploadfile_logo']['name']);
				$DIR = "../UPLOAD_file/";
				
			
		
		
			
				/// Store All data in Product Master Table Start
				if($tutor_Subject > 0 )  
				{  
			
					$del_tdsg = $conn->query("delete from tutor_qualification_subject_grade where user_id= '".$_GET['id']."' ");
						
						
					for($i=0; $i<$tutor_Subject; $i++)  
					{  
						if(trim($_POST["tutor_Subject"][$i] != ''))
						{
							
							 $a1  = $conn->query("INSERT INTO tutor_qualification_subject_grade set  tutor_qualification_Subject = '".$_POST["tutor_Subject"][$i]."', tutor_qualification_Grade ='".$_POST["tutor_Grade"][$i]."', user_id = '".$_GET['id']."' ");
							
						}  
					}  
				}
				
					
					/// Store tutor_Subject End
					
					
					
				/// Store All data in totoring_grade Start
					if($totoring_grade > 0 )  
					{  
				
						$del_tdsg2grd = $conn->query("delete from tutor_totoring_grade where user_id= '".$_GET['id']."'  ");
						
						for($i=0; $i<$totoring_grade; $i++)  
						{  
							if(trim($_POST["totoring_grade"][$i] != ''))
							{
								
								$TutoringGrade_Sql  = $conn->query(" INSERT INTO tutor_totoring_grade set Tutoring_Grade ='".$_POST["totoring_grade"][$i]."', user_id = '".$_GET['id']."' ");
								
							}  
						}  
					}
					
					/// Store All data in totoring_grade End	
					
				
					/// Store All data in Tutoring_Subjects Start
					if($Tutoring_Subjects > 0 )  
					{  
				
						$del_tdsg2sub = $conn->query("delete from tutor_tutorial_subjects where user_id= '".$_GET['id']."'  ");
						
						for($i=0; $i<$Tutoring_Subjects; $i++)  
						{  
							if(trim($_POST["Tutoring_Subjects"][$i] != ''))
							{
								
								$TutoringGrade_sub  = $conn->query(" INSERT INTO tutor_tutorial_subjects set Tutoring_Subjects ='".$_POST["Tutoring_Subjects"][$i]."', user_id = '".$_GET['id']."' ");
								
							}  
						}  
					}
					
					/// Store All data in Tutoring_Subjects End	
					
					
					/// Store All data in tutoring_Stream Start
					if($tutoring_Stream > 0 )  
					{  
				
						$del_tdsg2str = $conn->query("delete from tutor_totoring_stream where user_id= '".$_GET['id']."'  ");
						
						for($i=0; $i<$tutoring_Stream; $i++)  
						{  
							if(trim($_POST["tutoring_Stream"][$i] != ''))
							{
								
								$TutoringGrade_str  = $conn->query(" INSERT INTO tutor_totoring_stream set Tutoring_Stream ='".$_POST["tutoring_Stream"][$i]."', user_id = '".$_GET['id']."' ");
								
							}  
						}  
					}
					
					/// Store All data in tutoring_Stream End	
					
					
					
					/// Store All data in Tutoring_Levels Start
					if($Tutoring_Levels > 0 )  
					{  
				
						$del_tdsg2str = $conn->query("delete from tutor_totoring_levels where user_id= '".$_GET['id']."'  ");
						
						for($i=0; $i<$Tutoring_Levels; $i++)  
						{  
							if(trim($_POST["Tutoring_Levels"][$i] != ''))
							{
								
								$Tutoring_Levels_str  = $conn->query(" INSERT INTO tutor_totoring_levels set Tutoring_Level ='".$_POST["Tutoring_Levels"][$i]."', user_id = '".$_GET['id']."' ");
								
							}  
						}  
					}
					
					/// Store All data in Tutoring_Levels End	
		
		
		
		
		
			
		
		
		if($exist_user_img[1] != $_FILES['uploadfile_logo']['name'] )
		{		

				//////////////////////
				
				
					if(!copy($_FILES['uploadfile_logo']['tmp_name'],$DIR.$image_name))
					{
						
						$update_sql     =  " UPDATE user_tutor_info SET gender = '".$gender."', age = '".$age."', nationality = '".$nationality."', qualification ='".$qualification."', name_of_school = '".$Name_Of_School."', Course_Exam = '".$Course_Exam."', OtherCourse_Exam = '".$OtherCourse_Exam."', tutor_status ='".$Tutor_status."', tuition_type ='".$tuition_type."', location = '".$location."', postal_code = '".$postal_code."', travel_distance = '".$travel_distance."', tutor_tutoring_experience_years = '".$tutor_tutoring_experience_years."', tutor_tutoring_experience_months = '".$tutor_tutoring_experience_months."', personal_statement = '".$Personal_Statements."' where user_id ='".$_GET['id']."' ";
						$UPDATE_Q =  $conn->query($update_sql);
						
						$sql2     =  " UPDATE user_info SET first_name ='".$first_name."', last_name = '".$last_name."', email = '".$email."', password ='".$password."', mobile ='".$mobile."', address1 ='".$address1."' where user_id ='".$_GET['id']."' ";
						$sql_run_u =  $conn->query($sql2);
				
					
						if($sql_run_u)
						{
							$msg1 = '<span style="color:red;">User update successfully.</span>';
						}
							
							//$msg1 = '<span style="color:red;">File could not be uploaded</span>';
					}
					else
					{
					
						$update_sql2     =  " UPDATE user_tutor_info SET gender = '".$gender."', age = '".$age."', nationality = '".$nationality."', qualification ='".$qualification."', name_of_school = '".$Name_Of_School."', Course_Exam = '".$Course_Exam."', OtherCourse_Exam = '".$OtherCourse_Exam."', tutor_status ='".$Tutor_status."', tuition_type ='".$tuition_type."', location = '".$location."', postal_code = '".$postal_code."', travel_distance = '".$travel_distance."', tutor_tutoring_experience_years = '".$tutor_tutoring_experience_years."', tutor_tutoring_experience_months = '".$tutor_tutoring_experience_months."', personal_statement = '".$Personal_Statements."', profile_image = '".$image_name."' where user_id ='".$_GET['id']."' ";
						$update_sql2_Q =  $conn->query($update_sql2);
						
						$sql     =  " UPDATE user_info SET first_name ='".$first_name."', last_name = '".$last_name."', email = '".$email."', password ='".$password."', mobile ='".$mobile."', address1 ='".$address1."' where user_id ='".$_GET['id']."' ";
						$sql_run =  $conn->query($sql);
				
					
						if($sql_run)
						{
							$msg1 = '<span style="color:red;">User updated successfully.</span>';
						}
					
					
					}
				
				
				////////////////////////


			
		}
		else{
			
					$update_sql     =  " UPDATE user_tutor_info SET gender = '".$gender."', age = '".$age."', nationality = '".$nationality."', qualification ='".$qualification."', name_of_school = '".$Name_Of_School."', Course_Exam = '".$Course_Exam."', OtherCourse_Exam = '".$OtherCourse_Exam."', tutor_status ='".$Tutor_status."', tuition_type ='".$tuition_type."', location = '".$location."', postal_code = '".$postal_code."', travel_distance = '".$travel_distance."', tutor_tutoring_experience_years = '".$tutor_tutoring_experience_years."', tutor_tutoring_experience_months = '".$tutor_tutoring_experience_months."', personal_statement = '".$Personal_Statements."' where user_id ='".$_GET['id']."' ";
						$UPDATE_Q =  $conn->query($update_sql);
						
						$sql2     =  " UPDATE user_info SET first_name ='".$first_name."', last_name = '".$last_name."', email = '".$email."', password ='".$password."', mobile ='".$mobile."', address1 ='".$address1."' where user_id ='".$_GET['id']."' ";
						$sql_run_u =  $conn->query($sql2);
				
					
						if($sql_run_u)
						{
							$msg1 = '<span style="color:red;">User update successfully.</span>';
						}
		}

		
		
		
		
		
		
	}
	
	///Start Student Profile
	
	if(isset($_POST['Submit2']))
	{
		
		
			
		$fetchPs     =  "SELECT * FROM user_student_info as sinfo INNER JOIN user_info as uinfo ON sinfo.user_id=uinfo.user_id where sinfo.user_id ='".$_GET['id']."'";
		
		$query_runPs =  $conn->query($fetchPs);
		$query_resPassS =  mysqli_fetch_array($query_runPs);
		
		
		if($_POST['first_name2'] !="")
		{
			$first_name2 = $_POST['first_name2'];
		}
		else{
			$first_name2 = $query_resPassS['first_name2'];
		}
		if($_POST['last_name2'] !="")
		{
			$last_name2 = $_POST['last_name2'];
		}
		else{
			$last_name2 = $query_resPassS['last_name2'];
		}
		if($_POST['email2'] !="")
		{
			$email2 = $_POST['email2'];
		}
		else{
			$email2 = $query_resPassS['email2'];
		}
		if($_POST['password2'] !="")
		{
			$password2 = md5($_POST['password2']);
		}
		else{
			$password2 = $query_resPassS['password2'];
		}
		if($_POST['mobile2'] !="")
		{
			$mobile2 = $_POST['mobile2'];
		}
		else{
			$mobile2 = $query_resPassS['mobile2'];
		}
		if($_POST['address12'] !="")
		{
			$address12 = $_POST['address12'];
		}
		else{
			$address12 = $query_resPassS['address12'];
		}
			
		$student_name	=	$_POST['student_name'];
		$Level	=	$_POST['Level'];
		$Grade	=	$_POST['Grade'];
		$Stream	=	$_POST['Stream'];
		$passing_year	=	$_POST['passing_year'];
		$Subject	=	$_POST['Subject'];
		$Student_Location	=	$_POST['Student_Location'];
		$Student_Postal_Code	=	$_POST['Student_Postal_Code'];
		$Student_Nationality = $_POST['Student_Nationality'];
		
		
	
				$exist_user_imgS =  explode("_",$query_resPassS['profile_image']);
				$image_nameS = time()."_".str_replace(" ","_",$_FILES['uploadfile_logo2']['name']);
				$DIR2 = "../UPLOAD_file/";
				
			if($exist_user_imgS[1] != $_FILES['uploadfile_logo2']['name'])
			{			
						
				
					if(!copy($_FILES['uploadfile_logo2']['tmp_name'],$DIR2.$image_nameS))
					{
						
						$sqls2     =  " UPDATE user_student_info SET student_name = '".$student_name."', Level = '".$Level."', Grade ='".$Grade."', Stream ='".$Stream."', passing_year ='".$passing_year."', Subject = '".$Subject."', country = '".$Student_Nationality."', Student_Location = '".$Student_Location."', Student_Postal_Code = '".$Student_Postal_Code."' where user_id ='".$_SESSION['loggedIn_user_id']."' ";
					  
						$UPDATEs =  $conn->query($sqls2);
						
						$sql2     =  " UPDATE user_info SET first_name ='".$first_name2."', last_name = '".$last_name2."', email = '".$email2."', password ='".$password2."', mobile ='".$mobile2."', address1 ='".$address12."' where user_id ='".$_GET['id']."' ";
						$sql_run_u =  $conn->query($sql2);
				
						if($UPDATEs)
						{
							$msg1 = '<span style="color:red;">Data updated successfully.</span>';
						}
					}
					else{
						
						$sqls2     =  " UPDATE user_student_info SET student_name = '".$student_name."', Level = '".$Level."', Grade ='".$Grade."', Stream ='".$Stream."', passing_year ='".$passing_year."', Subject = '".$Subject."', country = '".$Student_Nationality."', Student_Location = '".$Student_Location."', Student_Postal_Code = '".$Student_Postal_Code."', profile_image = '".$image_nameS."' where user_id ='".$_SESSION['loggedIn_user_id']."' ";
					  
						$UPDATEs =  $conn->query($sqls2);
						
						$sql2     =  " UPDATE user_info SET first_name ='".$first_name2."', last_name = '".$last_name2."', email = '".$email2."', password ='".$password2."', mobile ='".$mobile2."', address1 ='".$address12."' where user_id ='".$_GET['id']."' ";
						$sql_run_u =  $conn->query($sql2);
				
						if($UPDATEs)
						{
							$msg1 = '<span style="color:red;">Data updated successfully.</span>';
						}
					}
				
				
				
				
			}
			else{
				
				$sqls2     =  " UPDATE user_student_info SET student_name = '".$student_name."', Level = '".$Level."', Grade ='".$Grade."', Stream ='".$Stream."', passing_year ='".$passing_year."', Subject = '".$Subject."', country = '".$Student_Nationality."', Student_Location = '".$Student_Location."', Student_Postal_Code = '".$Student_Postal_Code."' where user_id ='".$_SESSION['loggedIn_user_id']."' ";
					  
						$UPDATEs =  $conn->query($sqls2);
						
						$sql2     =  " UPDATE user_info SET first_name ='".$first_name2."', last_name = '".$last_name2."', email = '".$email2."', password ='".$password2."', mobile ='".$mobile2."', address1 ='".$address12."' where user_id ='".$_GET['id']."' ";
						$sql_run_u =  $conn->query($sql2);
				
						if($UPDATEs)
						{
							$msg1 = '<span style="color:red;">Data updated successfully.</span>';
						}
			}	
		
		
	}
	
		$query = "SELECT * FROM user_info WHERE user_id ='".$_GET['id']."'  ";
		$result = $conn->query($query) or die ("table not found");
		$results = mysqli_fetch_array($result);	
		
		
		if($results['user_type']=="I am looking for a Tutor")
		{
			 $user_type = 'student';
		}
		if($results['user_type']=="I am an Educator")
		{
			$user_type = 'tutor';
		}
		
		
	?>
	
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tutor App </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Tutor App" />
      <meta name="keywords" content="Tutor App" />
      <meta name="author" content="Tutor App" />
      <!-- Favicon icon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	  
	  
	  
	  
<script  src="js/jquery-latest.js" type="text/javascript"></script>



<script language="javascript">

function validate()
{	
   
	if(document.myForm.age.value == "")
	{
		alert("Please select Age.");
		document.myForm.age.focus();
		return false;
	}
	if(document.myForm.Nationality.value == "")
	{
		alert("Please enter nationality");
		document.myForm.Nationality.focus();
		return false;
	}
	
	if(document.myForm.Qualification.value == "Select Qualification")
	{
		alert("Please enter qualification");
		document.myForm.Qualification.focus();
		return false;
	}
	if(document.myForm.Tutor_status.value=="Select Tutor Status")
	{
		alert("Please enter tutor status");
		document.myForm.Tutor_status.focus();
		return false;
	}
	
	 if(document.myForm.Tuition_type.value=="Select Tuition Type")
	 {
		alert("Please enter tuition type!")
		document.myForm.Tuition_type.focus();
		return false;
	}
	
	
	 if(document.myForm.Personal_Statement.value=="")
	 {
		alert("Please enter personal statement.")
		document.myForm.Personal_Statement.focus();
		return false;
	}

	
	
	return true;
  
}




function validate2()
{	
   
	if(document.myForm2.student_name.value == "")
	{
		alert("Please enter student name.");
		document.myForm2.student_name.focus();
		return false;
	}
	if(document.myForm2.Level.value == "Select Level")
	{
		alert("Please select level");
		document.myForm2.Level.focus();
		return false;
	}
	
	if(document.myForm2.Grade.value == "Select Grade")
	{
		alert("Please select grade");
		document.myForm2.Grade.focus();
		return false;
	}
	if(document.myForm2.Stream.value=="Select Stream")
	{
		alert("Please select stream");
		document.myForm2.Stream.focus();
		return false;
	}
	
	 if(document.myForm2.passing_year.value=="")
	 {
		alert("Please select passing year")
		document.myForm2.passing_year.focus();
		return false;
	}
	if(document.myForm2.Subject.value=="Select Subject")
	 {
		alert("Please select subject")
		document.myForm2.Subject.focus();
		return false;
	}
	
	return true;
  
}


tinyMCE.init({ 
        // General options 
        mode : "textareas", 
        theme : "advanced", 
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template", 
 
        // Theme options 
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect", 
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor", 
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen", 
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage", 
        theme_advanced_toolbar_location : "top", 
        theme_advanced_toolbar_align : "left", 
        theme_advanced_statusbar_location : "bottom", 
        theme_advanced_resizing : true, 
 
        // Skin options 
        skin : "o2k7", 
        skin_variant : "silver", 
 
        // Example content CSS (should be your site CSS) 
        content_css : "css/example.css", 
 
        // Drop lists for link/image/media/template dialogs 
        template_external_list_url : "js/template_list.js", 
        external_link_list_url : "js/link_list.js", 
        external_image_list_url : "js/image_list.js", 
        media_external_list_url : "js/media_list.js", 
 
        // Replace values for the template plugin 
        template_replace_values : { 
                username : "Some User", 
                staffid : "991234" 
        } 
}); 


function Tuition_Type()
{
	
	if(document.getElementById('Tuition_type').value=="Home Tuition")
	{
		document.getElementById('Tuition_Type_id').style.display="block";
	}
else{
	document.getElementById('Tuition_Type_id').style.display="none";
}	
		
	
	
	
}


	function updateTextInput(val) {
	  document.getElementById('textInput').value=val; 
	}


		


	function Other_exam_Course(id)
	{
		
		if(id == "Others")
		{

				if(document.getElementById('Course_Exam_ID').style.display == 'none')
				{
					document.getElementById('Course_Exam_ID').style.display='block';
				}
				
		}
	else{
			document.getElementById('Course_Exam_ID').style.display='none';
		}	
		
	}	


</script>





	<link href="css/style_upload.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/script_user_doc.js" type="text/javascript"></script>
	
	
	
	
	
	
	
	
	
	
	<script type="text/javascript">
    $(document).ready(function () {

      // allowed maximum input fields
      var max_input = 5;

      // initialize the counter for textbox
      var x = 1;

      // handle click event on Add More button
      $('.add-btn').click(function (e) {
        e.preventDefault();
        if (x < max_input) { // validate the condition
          x++; // increment the counter
          $('.wrapper').append(`
					
					<div>
							
							
							
							
							
				<div class="form-group" style="width: 45%;float: left;margin: 0 68px 0 0;" >
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Subject</label>
				<select type="text" class="form-control" value="" id="tutor_Subject" name="tutor_Subject[]" placeholder="Tutor Subject" autocomplete="off">
				<option value="Select Subject">--Select Subject--</option>
				<?php 
				
				$query_subjects = $conn->query("select * from subjects order by subjects_name ASC");
				while($query_subjects_result = mysqli_fetch_array($query_subjects))
				{
				?>
				<option value="<?php echo $query_subjects_result['subjects_name']; ?>" <?php if($query_subjects_result999['subjects_name']==$stu_rec_get_result2999['Subject']){ echo 'selected';} ?> ><?php echo $query_subjects_result['subjects_name']; ?></option>
				<?php } ?>
				</select>
				</div>
				

				<div class="form-group" style="width: 48%;float: left;" >
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Grade</label>
				<select type="text" class="form-control" value="" id="tutor_Grade" name="tutor_Grade[]" placeholder="Grade" autocomplete="off">
				<option value="Select Grade">--Select Grade--</option>
				<?php 
				
				$query_grade = $conn->query("select * from grade order by grade_name ASC");
				while($query_grade_result = mysqli_fetch_array($query_grade))
				{
				?>
				<option value="<?php echo $query_grade_result['grade_name']; ?>" <?php if($query_grade_result9999['grade_name']==$stu_rec_get_result29999['Grade']){ echo 'selected';} ?> ><?php echo $query_grade_result['grade_name']; ?></option>
				<?php } ?>
				</select>
				</div>
									
									
									
							
						
							
							<a href="#" class="remove-lnk"><img src="images/remove.png">Remove Add More Results</a>
					</div>
			
          `); // add input field
        }
      });

      // handle click event of the remove link
      $('.wrapper').on("click", ".remove-lnk", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();  // remove input field
        x--; // decrement the counter
      })

    });
  </script>
	
	
	
	
	
	
	

  </head>

  <body>
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
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
         
		 <?php include("header-top.php"); ?>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <?php include("header-left.php"); ?>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Welcome to Admin</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                      
    
                                            <!--  project and team member start -->
                                            <div class="col-xl-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Complete Your Profile</h5>
                                                        <div class="card-header-right">
			
			
										
														
														
                                                           
							</div>
						</div>
						<div class="card">
							<div class="card-block">
                                                            
															
															
				
					<div class="row clearfix">
						 <div class="col-lg-12 col-md-10 col-sm-8">
						<?php 
							if($msg1!="")
							{
							echo $msg1;
							}
							?>
						</div>
						</div>
						
								
						
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
						<tbody><tr>
						
						<td>
						<div class="form-group" style="text-align: center;font-size: 22px;" >
				<label class="control-label mb-10" for="exampleInputEmail_2">			  
					<?php
					/* This sets the $time variable to the current hour in the 24 hour clock format */
					$time = date("H");
					/* Set the $timezone variable to become the current timezone */
					$timezone = date("e");
					/* If the time is less than 1200 hours, show good morning */
					if ($time < "12") {
						echo "Good Morning ".'<span style="color:#777; font-size:49px;">'.ucfirst($results['first_name'])." ".$results['last_name'].'</span>';
					} else
					/* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
					if ($time >= "12" && $time < "17") {
						echo "Good Afternoon ".'<span style="color:#777; font-size:49px;">'.ucfirst($results['first_name'])." ".$results['last_name'].'</span>';
					} else
					/* Should the time be between or equal to 1700 and 1900 hours, show good evening */
					if ($time >= "17" && $time < "19") {
						echo "Good Evening ".'<span style="color:#777; font-size:49px;">'.ucfirst($results['first_name'])." ".$results['last_name'].'</span>';
					} else
					/* Finally, show good night if the time is greater than or equal to 1900 hours */
					if ($time >= "19") {
						echo "Good Night ".'<span style="color:#777; font-size:49px;">'.ucfirst($results['first_name'])." ".$results['last_name'].'</span>';
					}
					?>
					</label>
					</div>
								
				</td>
						
				
					</tr></tbody>	
					</table>					
								
					<br/>
								<br/>		
						
					
								
					<?php 
						$data_rec = "SELECT uinfo.user_id,uinfo.adminusername,uinfo.first_name,uinfo.last_name,uinfo.email,uinfo.password,uinfo.mobile,uinfo.address1,uinfo.user_type, tuinfo.id, tuinfo.user_id,tuinfo.profile_image,tuinfo.age,tuinfo.gender,tuinfo.nationality,tuinfo.qualification,tuinfo.name_of_school,tuinfo.Course_Exam,tuinfo.OtherCourse_Exam,tuinfo.gra_year,tuinfo.tutor_status,tuinfo.tuition_type,tuinfo.location,tuinfo.postal_code,tuinfo.travel_distance,tuinfo.tutor_tutoring_experience_years,tuinfo.tutor_tutoring_experience_months,tuinfo.personal_statement,tuinfo.tutor_code FROM user_tutor_info as tuinfo INNER JOIN user_info as uinfo ON tuinfo.user_id = uinfo.user_id WHERE uinfo.user_id ='".$_GET['id']."'  ";
						$data_rec_get = $conn->query($data_rec) or die ("table not found");
						$data_rec_get_Result = mysqli_fetch_array($data_rec_get);	
						
						if($data_rec_get_Result['age'] != "")
						{
							$ageFilled = $data_rec_get_Result['age'];
						}
						else{
							$ageFilled = "";
						}
						if($data_rec_get_Result['nationality'] != "")
						{
							$nationalityFilled = $data_rec_get_Result['nationality'];
						}
						else{
							$nationalityFilled = "";
						}
						
					//echo $data_rec_get_Result['profile_image'].'+++++++++++++++++++';
					?>		

				
			<?php if($user_type == "tutor"){ ?>

			<form name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();">
						
					
				  
				  <?php
					if($data_rec_get_Result['profile_image']!="")
					{
					?>
						<div class="form-group">
						<label class="control-label mb-10" for="exampleInputName_1">Profile Image</label>

						<img src="../UPLOAD_file/<?php echo $data_rec_get_Result['profile_image']; ?>" style="width:80px;" />&nbsp;<a href="delete_profile_image.php?user_id=<?php echo $data_rec_get_Result['user_id'];?>&user_type=<?php echo $user_type; ?>"><img src="images/delete.png" border="0" /></a>
						<input type="hidden" name="file_name" value="<?php echo $data_rec_get_Result['profile_image']; ?>" autocomplete="off" >

						</div>
					<?php
						}
						else{
						?>			
							<div class="form-group">
							<label class="control-label mb-10" for="exampleInputName_1">Profile Image</label>

							<input name="uploadfile_logo" type="file" class="form-control" autocomplete="off" />

							</div>
						<?php } ?>	
						
				<br/>		
						
						
				<div class="form-group" style=" margin-bottom: 47px;" >
				<label class="control-label mb-10" for="exampleInputEmail_2" style=" width: 100%;" >Full Name</label>
				  <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $data_rec_get_Result['first_name']; ?>"  placeholder="First Name" autocomplete="off" style=" width: 49%;float: left;clear: both; margin-right: 15px;" >
                  <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $data_rec_get_Result['last_name']; ?>"  placeholder="Last Name" autocomplete="off" style=" width: 49%; " >
                    
				  </div>
				  
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Email</label>
				<input type="text" class="form-control" value="<?php echo $data_rec_get_Result['email']; ?>" id="email" name="email" placeholder="Email Id" autocomplete="off">
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Password</label>
				<input type="password" class="form-control" value="<?php echo $data_rec_get_Result['password']; ?>" id="password" name="password" placeholder="Password" autocomplete="off">
				</div>
				
				 <div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Mobile</label>
				<input type="text" class="form-control" value="<?php echo $data_rec_get_Result['mobile']; ?>" id="mobile" name="mobile" placeholder="Mobile" autocomplete="off">
				</div>
				
				 <div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Address</label>
				<input type="text" class="form-control" value="<?php echo $data_rec_get_Result['address1']; ?>" id="address1" name="address1" placeholder="Address" autocomplete="off">
				</div>
				
				<div class="form-group">
					<select type="text" class="form-control" value="" id="user_type" name="user_type" placeholder="User Type" autocomplete="off">
					<option value="">--Select User Type--</option>
					<option value="I am an Educator" <?php if($data_rec_get_Result['user_type']=="I am an Educator"){ echo "selected"; } ?> >I am an Educator</option>
					<option value="I am looking for a Tutor" <?php if($data_rec_get_Result['user_type']=="I am looking for a Tutor"){ echo "selected"; } ?> >I am looking for a Tutor</option>
					</select>
				</div>
				  

				<br/>
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2" style="color:blue;font-size: 22px;">Personal Info: </label>
				  </div>			
							
				  <div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Gender</label>
				 
				  <select name="gender" id="gender" class="form-control">
				  <option value="Male">Male</option>
				  <option value="Female">Female</option>
				  </select>
                  </div>
				 
				  
								
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Age</label>
				<div class='input-group date' id='datetimepicker1'>
				<input type="date" class="form-control" id="start" name="age" value="<?php echo $data_rec_get_Result['age']; ?>" min="1950-01-01" max="2022-12-31" value="<?php echo $ageFilled; ?>" placeholder="Age" autocomplete="off">

				<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
				</span>
				</div>
				</div>
				  
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Nationality</label>
				
				<select type="text" class="form-control" value="" id="Nationality" name="Nationality" placeholder="Nationality" autocomplete="off">
				<option value="Select Nationality">--Select Nationality--</option>
				<?php 
				
				$query_country = $conn->query("select * from country order by countryname ASC");
				while($query_country_result = mysqli_fetch_array($query_country))
				{
				?>
				<option value="<?php echo $query_country_result['countryname']; ?>" <?php if($query_country_result['countryname']==$data_rec_get_Result['qualification']){ echo 'selected';} ?> ><?php echo $query_country_result['countryname']; ?></option>
				<?php } ?>
				</select>
				
				</div>
				
				
				<br/>
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2" style="color:blue;font-size: 22px;">Academic History: </label>
				  </div>			
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Qualification</label>
				<select type="text" class="form-control" value="" id="Qualification" name="Qualification" placeholder="Qualification" autocomplete="off">
				<option value="Select Qualification">--Select Qualification--</option>
				<?php 
				
				$query_qua = $conn->query("select * from qualification order by Qualification DESC");
				while($query_qua_result = mysqli_fetch_array($query_qua))
				{
				?>
				<option value="<?php echo $query_qua_result['Qualification']; ?>" <?php if($query_qua_result['Qualification']==$data_rec_get_Result['qualification']){ echo 'selected';} ?> ><?php echo $query_qua_result['Qualification']; ?></option>
				<?php } ?>
				</select>
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Name Of School</label>
				<input type="text" class="form-control" value="<?php echo $data_rec_get_Result['name_of_school']; ?>" id="Name_Of_School" name="Name_Of_School" placeholder="Name Of School" autocomplete="off">
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Course/Exam</label>
				<select type="text" class="form-control" value="" id="Course_Exam" name="Course_Exam" placeholder="Qualification" autocomplete="off" onchange="Other_exam_Course(this.value)">
				<option value="Course/Exam">--Course/Exam--</option>
				<option value="GCE O Level">GCE O Level</option>
				<option value="GCE A Level">GCE A Level</option>
				<option value="IB (Diploma)">IB (Diploma)</option>
				<option value="Polytechnic Diploma">Polytechnic Diploma</option>
				<option value="IGCSE">IGCSE</option>
				<option value="Others">Others</option>
				
				</select>
				</div>
				

				<div class="form-group" id="Course_Exam_ID" style="display:none;" >
				<label class="control-label mb-10" for="exampleInputEmail_2">Others Course/Exam</label>
				<input type="text" class="form-control" value="<?php echo $data_rec_get_Result['OtherCourse_Exam']; ?>" id="OtherCourse_Exam" name="OtherCourse_Exam" placeholder="Others Course Exam" autocomplete="off">
				</div>
				
				
				
				<div class="wrapper">
				
				<div class="form-group" style="width: 45%;float: left;margin: 0 68px 0 0;" >
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Subject</label>
				<select type="text" class="form-control" value="" id="tutor_Subject" name="tutor_Subject[]" placeholder="Tutor Subject" autocomplete="off">
				<option value="Select Subject">--Select Subject--</option>
				<?php 
				
				$query_subjects = $conn->query("select * from subjects order by subjects_name ASC");
				while($query_subjects_result = mysqli_fetch_array($query_subjects))
				{
				?>
				<option value="<?php echo $query_subjects_result['subjects_name']; ?>" <?php if($query_subjects_result999['subjects_name']==$stu_rec_get_result2999['Subject']){ echo 'selected';} ?> ><?php echo $query_subjects_result['subjects_name']; ?></option>
				<?php } ?>
				</select>
				</div>
				

				<div class="form-group" style="width: 48%;float: left;" >
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Grade</label>
				<select type="text" class="form-control" value="" id="tutor_Grade" name="tutor_Grade[]" placeholder="Grade" autocomplete="off">
				<option value="Select Grade">--Select Grade--</option>
				<?php 
				
				$query_grade = $conn->query("select * from grade order by grade_name ASC");
				while($query_grade_result = mysqli_fetch_array($query_grade))
				{
				?>
				<option value="<?php echo $query_grade_result['grade_name']; ?>" <?php if($query_grade_result9999['grade_name']==$stu_rec_get_result29999['Grade']){ echo 'selected';} ?> ><?php echo $query_grade_result['grade_name']; ?></option>
				<?php } ?>
				</select>
				</div>
				
				</div>
				
				
				<div class="row clearfix">
					<div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
					   
					</div>
					<div class="col-lg-10 col-md-10 col-sm-8">
						<div class="form-group" style="float:right;">
							<button class="btn add-btn" style="background:#598;"><img src="images/addf.png">&nbsp;Add More Result</button>
						</div>
					</div>
				</div>
				
			
                         
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Year/Graduation</label>
				<input type="text" class="form-control" value="<?php ?>" id="gra_year" name="gra_year" placeholder="Year/Graduation" autocomplete="off">
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Tuition Type</label>
				<select type="text" class="form-control" value="" id="Tuition_type" name="Tuition_type" placeholder="Tutor Status" autocomplete="off" onchange="Tuition_Type()">
				<option value="Select Tuition Type">--Select Tuition Type--</option>
				
				<option value="Home Tuition" <?php if($data_rec_get_Result['tuition_type']=="Home Tuition"){ echo 'selected';} ?> >Home Tuition</option>
				<option value="Online Tuition" <?php if($data_rec_get_Result['tuition_type']=="Online Tuition"){ echo 'selected';} ?>>Online Tuition</option>
				<option value="Homework Help" <?php if($data_rec_get_Result['tuition_type']=="Homework Help"){ echo 'selected';} ?> >Homework Help</option>
				
				</select>
				</div>
			
				<?php if($data_rec_get_Result['tuition_type']=="Home Tuition"){?>
				
				<div class="form-group" style=" margin-bottom: 47px;" id="Tuition_Type_id" >
				<?php }else{ ?>
				<div class="form-group" style=" margin-bottom: 47px; display:none;" id="Tuition_Type_id" >
				<?php } ?>
				<label class="control-label mb-10" for="exampleInputName_1" style=" width: 100%;">Home Tuition Details</label>
				<input type="text" class="form-control" name="Location" value="<?php echo $data_rec_get_Result['location']; ?>" placeholder="Location" autocomplete="off" style=" width: 49%;float: left;clear: both; margin-right: 15px;">
				<input type="text" class="form-control" name="Postal_Code" value="<?php echo $data_rec_get_Result['postal_code']; ?>" placeholder="Postal Code" style=" width: 49%;  float: left; " autocomplete="off">
				<input type="text" class="form-control" name="textInput" id="textInput" value="<?php echo $data_rec_get_Result['travel_distance']; ?>" placeholder="Travel Distance (0-20 KM)" style="width:100%; float:left;margin:17px 0 0 0;" autocomplete="off">
				<input type="range" name="rangeInput" min="0" max="20" onmousemove="updateTextInput(this.value);">
				</div>
				
				<br>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2" style="color:blue;font-size: 22px;">Tutoring Details: </label>
				  </div>
				
				
				<br/>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Tutoring Levels</label>
				<?php  
				$query_levels = $conn->query("select * from school_levels order by school_level_name ASC");
				$num_levels = mysqli_num_rows($query_levels);
				?>
				
				<select type="text" class="form-control" value="" id="Tutoring_Levels" name="Tutoring_Levels[]" multiple size = 7 placeholder="Tutoring Levels" autocomplete="off">
				<option value="Select Levels">--Select Levels--</option>
				<?php 
				
				while($query_level_result = mysqli_fetch_array($query_levels))
				{
				?>
				<option value="<?php echo $query_level_result['school_level_name']; ?>" ><?php echo $query_level_result['school_level_name']; ?></option>
				<?php } ?>
				
				</select>
				</div>
				
				<br/>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Grade - According to Preference</label>
				<?php  
				$query_grade = $conn->query("select * from grade order by grade_name ASC");
				$num_grade = mysqli_num_rows($query_grade);
				?>
				<select type="text" class="form-control" value="" id="totoring_grade" name="totoring_grade[]" multiple size = <?php echo $num_grade; ?>  placeholder="According to Preference" autocomplete="off" >
				<option value="Select Grade">--Select Grade--</option>
				<?php 
				
				while($query_grade_result = mysqli_fetch_array($query_grade))
				{
				?>
				<option value="<?php echo $query_grade_result['grade_name']; ?>" ><?php echo $query_grade_result['grade_name']; ?></option>
				<?php } ?>
				</select>
				</div>
				
				
				<br/>
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Stream - According to Preference</label>
				<br/><br/>
				<select type="text" class="form-control" value="" id="tutoring_Stream " name="tutoring_Stream[]" multiple size = 4  placeholder="Stream" autocomplete="off" >
				<option value="Select Stream">--Select Stream--</option>
				<option value="Express">Express</option>
				<option value="IP">IP</option>
				<option value="NA">NA</option>
				<option value="NT">NT</option>
				</select>
				</div>
				
				<br/>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Tutoring Subjects</label>
				
					<select type="text" class="form-control" value="" id="Tutoring_Subjects" name="Tutoring_Subjects[]" multiple size = 10 placeholder="Tutoring Subjects" autocomplete="off">
					<option value="Select Tutoring Subjects">--Select Tutoring Subjects--</option>
					<?php 
				
				$query_subject = $conn->query("select * from subjects order by subjects_name ASC");
				while($query_subject_res = mysqli_fetch_array($query_subject))
				{
				?>
				<option value="<?php echo $query_subject_res['subjects_name']; ?>" <?php if($query_grade_result9999['grade_name']==$stu_rec_get_result29999['Grade']){ echo 'selected';} ?> ><?php echo $query_subject_res['subjects_name']; ?></option>
				<?php } ?>
					</select>
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Tutoring Experience</label>
				
				<br/>
				
				<select style="width:48%; float:left; margin-right:10px;" type="text" class="form-control" value="" id="Select_Years" name="Select_Years" placeholder="Tutoring Experience" autocomplete="off">
				<option value="Select Years">--Select Years--</option>
				<?php 
				$endyears = 60;
				
				for($i=1; $i<=$endyears; $i++)
				{
				?>	
				
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php
				}
				
				?>
				
				</select>
				
				
				<select style="width:48%;  float:left;" type="text" class="form-control" value="" id="Select_Months" name="Select_Months" placeholder="Select Months" autocomplete="off" >
				<option value="Select Months">--Select Months--</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				
				</select>
				</div>
				
				
				
				<br/><br/><br/>
				
				

				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">Personal Statement</label>
				<textarea name="Personal_Statement" class="form-control" rows="3" cols="5" placeholder="Personal Statement" autocomplete="off"><?php echo $data_rec_get_Result['personal_statement']; ?></textarea>
				</div>
				
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Tutor Status</label>
				<select type="text" class="form-control" id="Tutor_status" name="Tutor_status" placeholder="Tutor Status" autocomplete="off">
				<option value="Select Tutor Status">--Select Tutor Status--</option>
				
				<option value="Full Time" <?php if($data_rec_get_Result['tutor_status']=="Full Time"){ echo 'selected';} ?> >Full Time</option>
				<option value="Part Time" <?php if($data_rec_get_Result['tutor_status']=="Part Time"){ echo 'selected';} ?>>Part Time</option>
				
				</select>
				</div>
				
							  
				 <br/>
							  
				<div class="form-group text-center">
				<input type="submit" name="Submit" class="btn waves-effect waves-light hor-grd btn-grd-info" value="Update Profile">
				</div>		  
				
					</form>
			<?php } ?>
			
			
			
			
			<?php 
			if($user_type == "student")
			{ 
				
					$stu_rec = "SELECT * FROM user_student_info as sinfo INNER JOIN user_info as uinfo ON sinfo.user_id = uinfo.user_id WHERE uinfo.user_id ='".$_GET['id']."'  ";
					$stu_rec_get2 = $conn->query($stu_rec) or die ("table not found");
					$stu_rec_get_result2 = mysqli_fetch_array($stu_rec_get2);  
					
					$student_data_rec = mysqli_fetch_array($conn->query("SELECT * FROM user_student_info as sinfo INNER JOIN user_info as uinfo ON sinfo.user_id = uinfo.user_id WHERE uinfo.user_id ='".$_GET['id']."'  "));
			?>

			<form name="myForm2" method="post" enctype="multipart/form-data" onsubmit="return validate2();">
			
			<div class="form-group" style=" margin-bottom: 47px;" >
				<label class="control-label mb-10" for="exampleInputEmail_2" style=" width: 100%;" >Full Name</label>
				  <input type="text" class="form-control" id="first_name2" name="first_name2" value="<?php echo $stu_rec_get_result2['first_name']; ?>"  placeholder="First Name" autocomplete="off" style=" width: 49%;float: left;clear: both; margin-right: 15px;" >
                  <input type="text" class="form-control" id="last_name2" name="last_name2" value="<?php echo $stu_rec_get_result2['last_name']; ?>"  placeholder="Last Name" autocomplete="off" style=" width: 49%; " >
                    
				  </div>
			
			
				  <?php
					if($stu_rec_get_result2['profile_image']!="")
					{
					?>
						<div class="form-group">
						<label class="control-label mb-10" for="exampleInputName_1">Profile Image</label>

						<img src="../UPLOAD_file/<?php echo $stu_rec_get_result2['profile_image']; ?>" style="width:80px;" />&nbsp;<a href="delete_profile.php?user_id=<?php echo $stu_rec_get_result2['user_id'];?>&user_type=<?php echo $_SESSION['user_type']; ?>&RollSwitch=<?php echo $_GET['RollSwitch']; ?>"><img src="images/delete.png" border="0" /></a>
						<input type="hidden" name="file_name2" value="<?php echo $stu_rec_get_result2['profile_image']; ?>" autocomplete="off" >

						</div>
					<?php
						}
						else{
						?>			
							<div class="form-group">
							<label class="control-label mb-10" for="exampleInputName_1">Profile Image</label>

							<input name="uploadfile_logo2" type="file" class="form-control" autocomplete="off" />

							</div>
						<?php } ?>		
						
						
			
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Student's Name</label>
				<input type="text" class="form-control" value="<?php echo $stu_rec_get_result2['first_name']." ".$stu_rec_get_result2['last_name']; ?>" id="student_name2" name="student_name2" placeholder="Student's Name" autocomplete="off">
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Email</label>
				<input type="text" class="form-control" value="<?php echo $stu_rec_get_result2['email']; ?>" id="email2" name="email2" placeholder="Email Id" autocomplete="off">
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Password</label>
				<input type="password" class="form-control" value="<?php echo $stu_rec_get_result2['password']; ?>" id="password2" name="password2" placeholder="Password" autocomplete="off">
				</div>
				
				 <div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Mobile</label>
				<input type="text" class="form-control" value="<?php echo $stu_rec_get_result2['mobile']; ?>" id="mobile2" name="mobile2" placeholder="Mobile" autocomplete="off">
				</div>
				
				 <div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Address</label>
				<input type="text" class="form-control" value="<?php echo $stu_rec_get_result2['address1']; ?>" id="address12" name="address12" placeholder="Address" autocomplete="off">
				</div>
				
				
				
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Level</label>
				<select type="text" class="form-control" value="" id="Level" name="Level" placeholder="Level" autocomplete="off">
				<option value="Select Level">--Select Level--</option>
				<?php 
				
				$query_level = $conn->query("select * from school_levels order by school_level_name ASC");
				while($query_result_level = mysqli_fetch_array($query_level))
				{
				?>
				<option value="<?php echo $query_result_level['school_level_name']; ?>" <?php if($query_result_level['school_level_name']==$stu_rec_get_result2['Level']){ echo 'selected';} ?> ><?php echo $query_result_level['school_level_name']; ?></option>
				<?php } ?>
				</select>
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Grade</label>
				<select type="text" class="form-control" value="" id="Grade" name="Grade" placeholder="Grade" autocomplete="off">
				<option value="Select Grade">--Select Grade--</option>
				<?php 
				
				$query_grade = $conn->query("select * from grade order by grade_name ASC");
				while($query_grade_result = mysqli_fetch_array($query_grade))
				{
				?>
				<option value="<?php echo $query_grade_result['grade_name']; ?>" <?php if($query_grade_result['grade_name']==$stu_rec_get_result2['Grade']){ echo 'selected';} ?> ><?php echo $query_grade_result['grade_name']; ?></option>
				<?php } ?>
				</select>
				</div>
			  
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Stream</label>
				<select type="text" class="form-control" value="" id="Stream" name="Stream" placeholder="Stream" autocomplete="off">
				<option value="Select Stream">--Select Stream--</option>
				
				<option value="Arts" <?php if($stu_rec_get_result2['Stream']=="Arts"){ echo 'selected';} ?> >Arts</option>
				<option value="Commerce" <?php if($stu_rec_get_result2['Stream']=="Commerce"){ echo 'selected';} ?> >Commerce</option>
				<option value="Science" <?php if($stu_rec_get_result2['Stream']=="Science"){ echo 'selected';} ?> >Science</option>
				
				</select>
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Passing Year</label>
				<select type="text" class="form-control" value="" id="passing_year" name="passing_year" placeholder="Passing Year" autocomplete="off">
				<?php
				$currentYear = date('Y');
				foreach(range(1950, $currentYear) as $value)
				{
				?>
				<option value="<?php echo $value; ?>" <?php if($stu_rec_get_result2['Grade']==$value){ echo 'selected';} ?>><?php echo $value; ?></option>
				<?php
				}
				
				?>
				
				</select>
				  </div>
				  
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Subject</label>
				<select type="text" class="form-control" value="" id="Subject" name="Subject" placeholder="Subject" autocomplete="off">
				<option value="Select Subject">--Select Subject--</option>
				<?php 
				
				$query_subjects = $conn->query("select * from subjects order by subjects_name ASC");
				while($query_subjects_result = mysqli_fetch_array($query_subjects))
				{
				?>
				<option value="<?php echo $query_subjects_result['subjects_name']; ?>" <?php if($query_subjects_result['subjects_name']==$stu_rec_get_result2['Subject']){ echo 'selected';} ?> ><?php echo $query_subjects_result['subjects_name']; ?></option>
				<?php } ?>
				</select>
				</div>
				
				
				
				<div class="form-group">
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Nationality</label>
				
				<select type="text" class="form-control" value="" id="Student_Nationality" name="Student_Nationality" placeholder="Nationality" autocomplete="off">
				<option value="Select Nationality">--Select Nationality--</option>
				<?php 
				
				$query_country2 = $conn->query("select * from country order by countryname ASC");
				while($query_country_result2 = mysqli_fetch_array($query_country2))
				{
				?>
				<option value="<?php echo $query_country_result2['countryname']; ?>" <?php if($query_country_result2['countryname']==$stu_rec_get_result2['country']){ echo 'selected';} ?> ><?php echo $query_country_result2['countryname']; ?></option>
				
				<?php } ?>
				
				</select>
				
				</div>
				
				<input type="text" class="form-control" name="Student_Location" value="<?php echo $stu_rec_get_result2['Student_Location'];  ?>" placeholder="Student Location" autocomplete="off" style=" width: 49%;float: left;clear: both; margin-right: 15px;">
				<input type="text" class="form-control" name="Student_Postal_Code" value="<?php echo $stu_rec_get_result2['Student_Postal_Code']; ?>" placeholder="Student Postal Code" style=" width: 49%;  float: left; " autocomplete="off">
				</div>
				
  
				 <br/> <br/> <br/>
							  
				<div class="form-group text-center">
				<input type="submit" name="Submit2" class="btn waves-effect waves-light hor-grd btn-grd-info" value="Update Profile">
				</div>		  
				
					</form>
			<?php } ?>
															
															
															
															
                                                          <!--  <div class="text-right m-r-20">
                                                                <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                                                            </div>  -->
															
															
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!--  project and team member end -->
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
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
     <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
	<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Chart js -->
   
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/js/script.js "></script>
	
	
	
	
	
<script>
  $(function () {
	 
    $('#datetimepicker1').datetimepicker();
	 jQuery.noConflict();
 });
 
 
 
 $(document).ready(function() {
			
			//alert('1');
			
			
   $('#switch').click(function() {
  if ($(this).is(':checked')) {
    // Do stuff
	
	//alert('1');
	
	
	
	var RollSwitch;
		var user_id = '<?php echo $_SESSION["loggedIn_user_id"]; ?>';
		var user_type = 'tutor';
		
		var x=$("#switch").is(":checked");
		//alert(x);
		
		if(x == true)
		{
			RollSwitch = 'On';
			
		}
		else{
			RollSwitch = 'Off';
		}	
		
		 $.ajax({
			  type: "GET",
			  url: "update_switch_roll.php?user_id=" + user_id + "&RollSwitch=" + RollSwitch + "&user_type=" + user_type,
			  success: function(msg){
						//alert(msg);
						window.location.href=msg;
						// $('#'+id).fadeOut();
					   }
		 });
	
	
	
	
	
	
	
	
	
	
	
  }else{
	  
	 // alert('2');
	  
	  var RollSwitch;
		var user_id = '<?php echo $_SESSION["loggedIn_user_id"]; ?>';
		var user_type = 'student';
		
	
			RollSwitch = 'Off';
		
		
		 $.ajax({
			  type: "GET",
			  url: "update_switch_roll.php?user_id=" + user_id + "&RollSwitch=" + RollSwitch + "&user_type=" + user_type,
			  success: function(msg){
						//alert(msg);
						window.location.href=msg;
						// $('#'+id).fadeOut();
					   }
		 });
	
	
	  
	  
	  
  }
});

});

 
</script>
	
	
</body>

</html>
