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
		
		 $age	=	$_POST['age'];
		
		//die();
		
		$nationality	=	$_POST['Nationality'];
		$qualification	=	$_POST['Qualification'];
		$tutor_status	=	$_POST['Tutor_status'];
		$tuition_type	=	$_POST['Tuition_type'];
		
		$location	=	$_POST['Location'];
		$postal_code	=	$_POST['Postal_Code'];
		$travel_distance	=	$_POST['textInput'];
		$personal_statement	=	$_POST['Personal_Statement'];
		
		$random_num = rand(100,100000);
		$random_character =  ucfirst(substr("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", mt_rand(0, 51), 1).substr(md5(time()), 50));
		$tutor_code = $random_character.$random_num;
		
	
				$fetchP     =  "SELECT * FROM user_tutor_info where user_id ='".$_SESSION['loggedIn_user_id']."'";
				$query_runP =  $conn->query($fetchP);
				
				$query_resPass =  mysqli_fetch_array($query_runP);
				$exist_user_img =  explode("_",$query_resPass['profile_image']);
				$image_name = time()."_".str_replace(" ","_",$_FILES['uploadfile_logo']['name']);
				$DIR = "../UPLOAD_file/";
				
		
	if($exist_user_img[1] != $_FILES['uploadfile_logo']['name'])
	{		
		if(mysqli_num_rows($query_runP)>0)
		{
			if(!copy($_FILES['uploadfile_logo']['tmp_name'],$DIR.$image_name))
			{
				 $sql2     =  " UPDATE user_tutor_info SET age = '".$age."', nationality = '".$nationality."', qualification ='".$qualification."', tutor_status ='".$tutor_status."', tuition_type ='".$tuition_type."', location = '".$location."', postal_code = '".$postal_code."', travel_distance = '".$travel_distance."', personal_statement = '".$personal_statement."' where user_id ='".$_SESSION['loggedIn_user_id']."' ";
			  

				$UPDATE =  $conn->query($sql2);
		
				if($UPDATE)
				{
					$msg1 = '<span style="color:red;">Data updated successfully.</span>';
				}
			}
			else			
			{
				$sql2     =  " UPDATE user_tutor_info SET age = '".$age."', nationality = '".$nationality."', qualification ='".$qualification."', tutor_status ='".$tutor_status."', tuition_type ='".$tuition_type."', location = '".$location."', postal_code = '".$postal_code."', travel_distance = '".$travel_distance."', personal_statement = '".$personal_statement."', profile_image = '".$image_name."' where user_id ='".$_SESSION['loggedIn_user_id']."' ";
			  

				$UPDATE =  $conn->query($sql2);
		
				if($UPDATE)
				{
					$msg1 = '<span style="color:red;">Data updated successfully.</span>';
				}
				
			}		
		}
		else{
			
				if(copy($_FILES['uploadfile_logo']['tmp_name'],$DIR.$image_name))
				{
					$sql_insert     =  " INSERT INTO user_tutor_info SET user_id ='".$_SESSION['loggedIn_user_id']."', age = '".$age."', nationality = '".$nationality."', qualification ='".$qualification."', tutor_status ='".$tutor_status."', tuition_type ='".$tuition_type."', location = '".$location."', postal_code = '".$postal_code."', travel_distance = '".$travel_distance."', personal_statement = '".$personal_statement."', tutor_code = '".$tutor_code."', profile_image = '".$image_name."' ";
					$sql_insert_run =  $conn->query($sql_insert);
			
					if($sql_insert_run)
					{
						$msg1 = '<span style="color:red;">Data insert successfully.</span>';
					}
				}	
		}
	}	
		
		
	}
	
	///Start Student Profile
	
	if(isset($_POST['Submit2']))
	{
		
		$student_name	=	$_POST['student_name'];
		$Level	=	$_POST['Level'];
		$Grade	=	$_POST['Grade'];
		$Stream	=	$_POST['Stream'];
		$passing_year	=	$_POST['passing_year'];
		$Subject	=	$_POST['Subject'];
		
		
	
			$fetchPs     =  "SELECT * FROM user_student_info where user_id ='".$_SESSION['loggedIn_user_id']."'";
			$query_runPs =  $conn->query($fetchPs);
			
			
			
				$query_resPassS =  mysqli_fetch_array($query_runPs);
				$exist_user_imgS =  explode("_",$query_resPassS['profile_image']);
				$image_nameS = time()."_".str_replace(" ","_",$_FILES['uploadfile_logo2']['name']);
				$DIR2 = "../UPLOAD_file/";
				
	if($exist_user_imgS[1] != $_FILES['uploadfile_logo2']['name'])
	{			
				
		if(mysqli_num_rows($query_runPs)>0)
		{
			if(!copy($_FILES['uploadfile_logo2']['tmp_name'],$DIR2.$image_names))
			{
				
				$sqls2     =  " UPDATE user_student_info SET student_name = '".$student_name."', Level = '".$Level."', Grade ='".$Grade."', Stream ='".$Stream."', passing_year ='".$passing_year."', Subject = '".$Subject."' where user_id ='".$_SESSION['loggedIn_user_id']."' ";
			  
				$UPDATEs =  $conn->query($sqls2);
		
				if($UPDATEs)
				{
					$msg1 = '<span style="color:red;">Data updated successfully.</span>';
				}
			}
			else{
				
				$sqls2     =  " UPDATE user_student_info SET student_name = '".$student_name."', Level = '".$Level."', Grade ='".$Grade."', Stream ='".$Stream."', passing_year ='".$passing_year."', Subject = '".$Subject."', profile_image = '".$image_names."' where user_id ='".$_SESSION['loggedIn_user_id']."' ";
			  
				$UPDATEs =  $conn->query($sqls2);
		
				if($UPDATEs)
				{
					$msg1 = '<span style="color:red;">Data updated successfully.</span>';
				}
			}
		}
		else{
			
				if(copy($_FILES['uploadfile_logo2']['tmp_name'],$DIR2.$image_names))
				{
					
					$sql_inserts     =  " INSERT INTO user_student_info SET user_id ='".$_SESSION['loggedIn_user_id']."', student_name = '".$student_name."', Level = '".$Level."', Grade ='".$Grade."', Stream ='".$Stream."', passing_year ='".$passing_year."', Subject = '".$Subject."', profile_image = '".$image_names."' ";
					$sql_insert_runs =  $conn->query($sql_inserts);
			
					if($sql_insert_runs)
					{
						$msg1 = '<span style="color:red;">Data insert successfully.</span>';
					}
				}	
		}
	}	
		
		
	}
	
		$query = "SELECT first_name,last_name FROM user_info WHERE user_id ='".$_SESSION['loggedIn_user_id']."'  ";
		$result = $conn->query($query) or die ("table not found");
		$results = mysqli_fetch_array($result);	
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


		


</script>




	<link href="css/style_upload.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/script_user_doc.js" type="text/javascript"></script>
	
	
	
	

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
			
			
				<?php 
				if($_GET['RollSwitch']=='On' || $_SESSION['user_type']=='tutor')
				{
					$checkbox_status = 'checked';
				}
				else{
					$checkbox_status = '';
				}
				?>
				
				<div style="width:100%;">
				<input type="checkbox" id="switch" class="checkbox" name="roll_switch" value="1" <?php echo $checkbox_status; ?> onclick="roll_switch()" style="width: 23px;height: 23px;float: left;margin: -1px 5px 0 0;"  />
				<span for="I Want to ba an Educator" style="font-weight: 600;color: #ffaa00;margin: -2px 0 15px 0;width: 215px;font-size: 14px;">I Want to ba an Educator</span>
						
				</div>														
														
														
														
                                                           
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
						
							<td colspan="12" style="border-top:1px solid #fff;">
						
				<?php if($_SESSION['user_type']=="student"){ ?>
							
							<table width="100%" cellspacing="0" cellpadding="0">
							<tbody><tr>
								
                                  <td colspan="7" class="bodrBot" width="50%" align="right">
								  
                                      <a href="tutor_search.php" class="btn waves-effect waves-light hor-grd btn-grd-info " style="padding: 8px 20px 8px 20px;" >Tutor Search</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							</tbody></table>
									
				<?php 
				}
				if($_SESSION['user_type']=="tutor")
				{	
				?>	
				
					<table width="100%" cellspacing="0" cellpadding="0">
							<tbody><tr>
								
                                  <td colspan="7" class="bodrBot" width="50%" align="right">
								  
                                      <a href="view_tuition_jobs.php" class="btn waves-effect waves-light hor-grd btn-grd-info " style="padding: 8px 20px 8px 20px;" >Tuition Jobs</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							</tbody></table>
				
				<?php } ?>
				

					</td>
					</tr></tbody>	
					</table>					
								
					<br/>
								<br/>		
						
					
								
					<?php 
						$data_rec = "SELECT * FROM user_tutor_info WHERE user_id ='".$_SESSION['loggedIn_user_id']."'  ";
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
						
					
					?>		

				
			<?php if($_SESSION['user_type']=="tutor"){ ?>

			<form name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validate();">
						
					<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2" style="color: #ffaa00;font-size: 22px;" >Tutor Code: <?php echo $data_rec_get_Result['tutor_code']; ?></label>
				 
				  </div>	
				  
				  
				  <?php
					if($data_rec_get_Result['profile_image']!="")
					{
					?>
						<div class="form-group">
						<label class="control-label mb-10" for="exampleInputName_1">Profile Image</label>

						<img src="../UPLOAD_file/<?php echo $data_rec_get_Result['profile_image']; ?>" style="width:80px;" />&nbsp;<a href="delete_profile.php?user_id=<?php echo $data_rec_get_Result['user_id'];?>&user_type=<?php echo $_SESSION['user_type']; ?>&RollSwitch=<?php echo $_GET['RollSwitch']; ?>"><img src="images/delete.png" border="0" /></a>
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
				<input type="text" class="form-control" value="<?php echo $nationalityFilled; ?>" id="Nationality" name="Nationality" placeholder="Nationality" autocomplete="off">
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Qualification</label>
				<select type="text" class="form-control" value="" id="Qualification" name="Qualification" placeholder="Qualification" autocomplete="off">
				<option value="Select Qualification">--Select Qualification--</option>
				<?php 
				
				$query = $conn->query("select * from Qualification order by Qualification DESC");
				while($query_result = mysqli_fetch_array($query))
				{
				?>
				<option value="<?php echo $query_result['Qualification']; ?>" <?php if($query_result['Qualification']==$data_rec_get_Result['qualification']){ echo 'selected';} ?> ><?php echo $query_result['Qualification']; ?></option>
				<?php } ?>
				</select>
				</div>
			
			  
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Tutor Status</label>
				<select type="text" class="form-control" value="" id="Tutor_status" name="Tutor_status" placeholder="Tutor Status" autocomplete="off">
				<option value="Select Tutor Status">--Select Tutor Status--</option>
				
				<option value="Full Time" <?php if($data_rec_get_Result['tutor_status']=="Full Time"){ echo 'selected';} ?> >Full Time</option>
				<option value="Part Time" <?php if($data_rec_get_Result['tutor_status']=="Part Time"){ echo 'selected';} ?>>Part Time</option>
				
				</select>
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


				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputName_1">Personal Statement</label>
				<textarea name="Personal_Statement" class="form-control" rows="3" cols="5" placeholder="Personal Statement" autocomplete="off"><?php echo $data_rec_get_Result['personal_statement']; ?></textarea>
				</div>
							  
				 <br/>
							  
				<div class="form-group text-center">
				<input type="submit" name="Submit" class="btn waves-effect waves-light hor-grd btn-grd-info" value="Update Profile">
				</div>		  
				
					</form>
			<?php } ?>
			
			<?php 
			if($_SESSION['user_type']=="student")
			{ 
				
						$stu_rec = "SELECT * FROM user_student_info WHERE user_id ='".$_SESSION['loggedIn_user_id']."'  ";
						$stu_rec_get2 = $conn->query($stu_rec) or die ("table not found");
						$stu_rec_get_result2 = mysqli_fetch_array($stu_rec_get2);  
			?>

			<form name="myForm2" method="post" enctype="multipart/form-data" onsubmit="return validate2();">
			
			
			
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
				<input type="text" class="form-control" value="<?php echo $nationalityFilled; ?>" id="student_name" name="student_name" placeholder="Student's Name" autocomplete="off">
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
				<option value="<?php echo $query_result_level['school_level_name']; ?>" <?php if($query_result_level['school_level_name']==$data_rec_get_Result['qualification']){ echo 'selected';} ?> ><?php echo $query_result_level['school_level_name']; ?></option>
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
				<option value="<?php echo $query_grade_result['grade_name']; ?>" <?php if($query_grade_result['grade_name']==$data_rec_get_Result['qualification']){ echo 'selected';} ?> ><?php echo $query_grade_result['grade_name']; ?></option>
				<?php } ?>
				</select>
				</div>
			  
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Select Stream</label>
				<select type="text" class="form-control" value="" id="Stream" name="Stream" placeholder="Stream" autocomplete="off">
				<option value="Select Stream">--Select Stream--</option>
				
				<option value="Arts"  >Arts</option>
				<option value="Commerce" >Commerce</option>
				<option value="Science" >Science</option>
				
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
				<option><?php echo $value; ?></option>
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
				<option value="<?php echo $query_subjects_result['subjects_name']; ?>" <?php if($query_subjects_result['subjects_name']==$data_rec_get_Result['qualification']){ echo 'selected';} ?> ><?php echo $query_subjects_result['subjects_name']; ?></option>
				<?php } ?>
				</select>
				</div>
				
  
				 <br/>
							  
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
