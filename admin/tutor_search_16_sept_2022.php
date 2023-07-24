<?php
error_reporting(0);
ob_start();	
session_start(); 
include('../include/config.php');
include("../include/functions.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tutor APP </title>
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
      <meta name="description" content="Tutor APP" />
      <meta name="keywords" content="Tutor APP" />
      <meta name="author" content="Tutor APP" />
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


<script language="javascript" type="text/javascript">
function checkChecked()
{
	
	if(confirm('Are you sure want to delete all selected data.'))
	{
		var a=new Array();
		a=document.getElementsByName("numbers[]");
		var p=0;
		for(i=0;i<a.length;i++)
		{
			if(a[i].checked)
			{
				p=1;
			}
		}
		
		
		if (p==0)
		{
			alert('Please select at least one check box');
			return false;
		}
		return true;
		
	}
	else
	 {
	 return false;
	}

}
   $(document).ready(function(){
   
		// Select all
        $("A[href='#select_all']").click( function() {
            $("#" + $(this).attr('rel') + " INPUT[type='checkbox']").attr('checked', true);
            return false;
        });
       
        // Select none
        $("A[href='#select_none']").click( function() {
            $("#" + $(this).attr('rel') + " INPUT[type='checkbox']").attr('checked', false);
            return false;
        });
       
        // Invert selection
        $("A[href='#invert_selection']").click( function() {
            $("#" + $(this).attr('rel') + " INPUT[type='checkbox']").each( function() {
                $(this).attr('checked', !$(this).attr('checked'));
            });
            return false;
        });
		
   });


function DoAction( id )
{

     $.ajax({
          type: "GET",
          url: "delete_school_level.php?id=" + id,
          success: function(msg){
                     $('#'+id).fadeOut();
                   }
     });
}


 
 function Use_Filter()
 {
	// alert('1');
	
	 $('#Next_Search1').css('display','none');
	  $('#Next_Search').css('display','none');
	 $('#Use_filter').css('display','block');
 }


</script>
<script language="javascript">
 var IE = (document.all) ? 1 : 0;
 var NS = (document.layers) ? 1 : 0;

function popUp( loc, w, h, menubar ) {
 	if( w == '' || w == null || w == false) {
  	w = 250;
    }
 	if( h == '' || h == null || h == false) {
  	h = 250;
  	//alert(h);
 	}
 	if( menubar == null || menubar == false ) {
  	menubar = "";
 	}else {
  	menubar = "menubar,";
 	}
 	if( NS ) { w += 40}
 	
   	var editorWin = window.open(loc,'editWin', menubar + 'resizable,scrollbars=yes,width=' + w + ',height=' + h);
	
 	editorWin.focus(); 
	}
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
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Tutor Search</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            
															
															
		<form name="frm" method="post">
		
		  <div id="group_1">
		  <table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td colspan="12" style="border-top:1px solid #fff;padding: 5% 5% 0 5%;">
					
				<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
				 <td colspan="7" class="bodrBot" width="50%" align="right">
				 
				<div style="background:#eee; padding:3% 3% 3% 3%;" id="Next_Search1">
				 
				 <div class="form-group" style="text-align: left;width: 28%;float: left;">
				
				<select type="text" class="form-control" value="" id="tuition_type" name="tuition_type" placeholder="Tuition type" autocomplete="off">
				<option value="Select Tuition Service">--Select Tuition Service--</option>
				
				<option value="Home Tuition">Home Tuition</option>
				<option value="Online Tuition" >Online Tuition</option>
				<option value="Homework Help">Homework Help</option>
				
				</select>
				
				
				</div>
				 <div class="form-group" style="text-align: left;width: 28%;float: left;margin: 0 0 0 50px;">
				 <input class="form-control form-control-round2" placeholder="Enter Tution Location Postal Code" type="text" name="postal_code" id="postal_code" style="width: 100%;max-width: 249px;min-width: 200px;float: left;font-size: 14px;padding: 12px 8px 12px 18px;">
				</div>
				  
				<input type="submit" value="Go Next" name="Search_tutorBy_tution_services" class="btn waves-effect waves-light hor-grd btn-grd-info " style="padding: 12px 30px 12px 30px;">
				
				</div>
				
				<br/>
			
			<div style="background:#eee; padding:3% 3% 35% 3%;" id="Next_Search">
				
				 <div class="form-group" style="text-align: left;width: 28%;float: left;">
				<label class="control-label mb-10" for="exampleInputEmail_2"><strong>Select Levels</strong></label>
				<?php  
				$query_levels = $conn->query("select * from school_levels order by school_level_name ASC");
				$num_levels = mysqli_num_rows($query_levels);
				?>
				
				<select type="text" class="form-control" value="" id="Levels_search" name="Levels_search[]" multiple size=<?php echo $num_levels; ?> placeholder="Select Levels" autocomplete="off">
				<option value="Select Levels">--Select Levels--</option>
				<?php 
				
				while($query_level_result = mysqli_fetch_array($query_levels))
				{
				?>
				<option value="<?php echo $query_level_result['school_level_name']; ?>" ><?php echo $query_level_result['school_level_name']; ?></option>
				<?php } ?>
				
				</select>
				</div>	

				  
				 <div class="form-group" style="text-align: left;width: 28%;float: left;margin: 0 0 0 70px;">
				<label class="control-label mb-10" for="exampleInputEmail_2"><strong>Select Subject</strong></label>
				<?php  
				$query_subjects = $conn->query("select * from subjects order by subjects_name ASC");
				$num_subjects = mysqli_num_rows($query_subjects);
				?>
				
				<select type="text" class="form-control" value="" id="subject_search" name="subject_search[]" multiple size=<?php echo $num_subjects; ?> placeholder="Select Subject" autocomplete="off">
				<option value="Select Subject">--Select Subject--</option>
				<?php 
				
				while($query_subject_result = mysqli_fetch_array($query_subjects))
				{
				?>
				<option value="<?php echo $query_subject_result['subjects_name']; ?>" ><?php echo $query_subject_result['subjects_name']; ?></option>
				
				<?php } ?>
				
				</select>
				</div>	
	
						  
				<input type="submit" value="Search" name="Search_tutorBy_tution_services2" class="btn waves-effect waves-light hor-grd btn-grd-info " style="padding: 15px 30px 15px 30px;">
				
				
				</div>	
				
				
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				
				
				
				
				
				
				
				
				<tr>
				<td><div style="text-align:right;background: #eee;margin: -30px 0px 3px 0;padding: 0 18px 40px 0px;" >
				<div onclick="Use_Filter()" style="color: #fff;width: 13%;float: right;background: #1d4999;text-align: center;border: 1px solid #ccc;font-weight: 400;font-size: 17px;padding: 4px 0px 5px 0;" >Use Filter</div></div></td>
				</tr>
				
				
				<tr id="Use_filter" style="display:none;">
				
				<td colspan="7" class="bodrBot" width="50%" align="right">
				<div style="background:#eee; padding:3% 3% 17% 3%;">
				 
				 <div class="form-group" style="text-align: left;width: 22%;float: left;">
				
				 <div class="form-group" style="text-align: left; width:auto; float: left;">
				
				<?php  
				$query_levels2 = $conn->query("select * from school_levels order by school_level_name ASC");
				$num_levels2 = mysqli_num_rows($query_levels2);
				?>
				
				<select type="text" class="form-control" value="" id="Levels_search2" name="Levels_search2[]" multiple size=6   placeholder="Select Levels" autocomplete="off">
				<option value="">--Select Levels--</option>
				<?php 
				
				while($query_level_result2 = mysqli_fetch_array($query_levels2))
				{
				?>
				<option value="<?php echo $query_level_result2['school_level_name']; ?>" ><?php echo $query_level_result2['school_level_name']; ?></option>
				<?php } ?>
				
				</select>
				</div>	

				
				
				</div>
				
				 <div class="form-group" style="text-align: left;width: 28%;float: left;margin: 0 25px 0 0;">
				
				<?php  
				$query_qualification  = $conn->query("select * from qualification order by Qualification ASC");
				$num_qualification = mysqli_num_rows($query_qualification);
				?>
				
				<select type="text" class="form-control" value="" id="Qualification" name="Qualification[]" multiple size=<?php echo $num_qualification; ?> placeholder="Select Subject" autocomplete="off">
				<option value="">--Select Qualification--</option>
				<?php 
				
				while($query_qualification_result = mysqli_fetch_array($query_qualification))
				{
				?>
				<option value="<?php echo $query_qualification_result['Qualification']; ?>" ><?php echo $query_qualification_result['Qualification']; ?></option>
				
				<?php } ?>
				
				</select>
				</div>	
				
				<div class="form-group" style="text-align: left;width: 28%;float: left;">
				<select type="text" class="form-control" value="" id="Gender" name="Gender" placeholder="Select Gender" autocomplete="off">
				<option value="">--Select Gender--</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
					
				</select>
				</div>
				
				<div class="form-group" style="text-align: left;width: 28%;float: left; margin: 0 25px 0 0;">
				<select type="text" class="form-control" value="" id="Status" name="Status"  placeholder="Select Status" autocomplete="off">
				<option value="">--Select Status--</option>
				<option value="Full Time">Full Time</option>
				<option value="Part Time">Part Time</option>
					
				</select>
				</div>
				
				<div class="form-group" style="text-align: left;width: 28%;float: left; margin: 0 25px 0 0;" >
				
				<select type="text" class="form-control" value="" id="Nationality" name="Nationality" placeholder="Nationality" autocomplete="off">
				<option value="">--Select Nationality--</option>
				<?php 
				
				$query_country = $conn->query("select * from country order by countryname ASC");
				while($query_country_result = mysqli_fetch_array($query_country))
				{
				?>
				<option value="<?php echo $query_country_result['countryname']; ?>" <?php if($query_country_result['countryname']==$data_rec_get_Result['qualification']){ echo 'selected';} ?> ><?php echo $query_country_result['countryname']; ?></option>
				<?php } ?>
				</select>
				
				</div>
				
	
				
				
				  
				<input type="submit" value="Search" name="Search_by_filter" class="btn waves-effect waves-light hor-grd btn-grd-info " style="padding: 12px 30px 12px 30px;">
				
				</div>
				</td>
				</tr>
				
				

				</table>
				</td>
				</tr>
				</table>
				</div>
		
		
			<table class="table table-hover" >
           
			  <tr>
                <td height="100" colspan="2" align="left" valign="top" bgcolor="#FFFFFF" class="bodr">
				<?php
				$rowsPerPage = 10; //GetNumRow();
				$pageNum = 1;
				
				if(isset($_GET['page']))
				{
				  $pageNum = $_GET['page'];
				}
				
				$offset = ($pageNum - 1) * $rowsPerPage; 
				
				
				$sql_user = "SELECT * FROM user_info as uinf INNER JOIN user_tutor_info as utinf ON uinf.user_id = utinf.user_id where uinf.user_type = 'I am an Educator'  ";
				
					
				
				if(isset($_POST['Search_tutorBy_tution_services']))
				{
					
						$tuition_type = $_POST['tuition_type'];
						$postal_code = $_POST['postal_code'];
						
						if($postal_code !="" && $tuition_type !="" )
						{
							
							$loggedIn_user_id = $_SESSION['loggedIn_user_id'];
							$user_type = $_SESSION['user_type'];
							
							header("location:tutor_search.php?user_id=$loggedIn_user_id&user_type=$user_type&tuition_type=$tuition_type&postal_code=$postal_code");
							
							//$sql_user = "select * from user_info as uinfo INNER JOIN user_tutor_info as user_tutor ON uinfo.user_id = user_tutor.user_id WHERE user_tutor.postal_code = '".$postal_code."' and user_tutor.tuition_type = '".$tuition_type."' ";
							
							
						}
					
				}
				
				if($_GET['tuition_type'] !="" && $_GET['postal_code'] !="")
				{
					$sql_user = "select * from user_info as uinfo INNER JOIN user_tutor_info as user_tutor ON uinfo.user_id = user_tutor.user_id WHERE user_tutor.postal_code = '".$_GET['postal_code']."' and user_tutor.tuition_type = '".$_GET['tuition_type']."' ";
							
				}
				
				
				
				if(isset($_POST['Search_tutorBy_tution_services2']))
				{
						
						
						
						
						
					if(!empty($_POST["Levels_search"]))
					{	
						$Levels_search     = count($_POST["Levels_search"]);
						
						if($Levels_search > 0 )  
						{  
							$Levels_search_arr = array();
							
							for($i=0; $i<$Levels_search; $i++)  
							{  
								if(trim($_POST["Levels_search"][$i] != ''))
								{
									$Levels_search_second_step_arrW[] = $_POST["Levels_search"][$i];
									
									//$Levels_search_arr =  $_POST["Levels_search"][$i];
								//	$sql_user = "SELECT * FROM user_info as uinf INNER JOIN tutor_totoring_levels as level ON uinf.user_id = level.user_id WHERE level.Tutoring_Level IN('".$Levels_search_arr."') ";
							
								
									
								}  
							}
							
							
							foreach($Levels_search_second_step_arrW as $key3 => $value3)
							{
								
								 $sql_user = "SELECT 
													  *
													FROM user_info
													JOIN tutor_totoring_levels
													  ON user_info.user_id = tutor_totoring_levels.user_id
													JOIN user_tutor_info 
													  ON user_tutor_info.user_id = tutor_totoring_levels.user_id WHERE tutor_totoring_levels.Tutoring_Level IN('".$value3."') and user_tutor_info.postal_code like '".$_GET['postal_code']."%' and user_tutor_info.tuition_type like '".$_GET['tuition_type']."%' GROUP BY user_tutor_info.user_id";
										
									
								
							}

						
						}
					}	
						
						
						
					if(!empty($_POST["subject_search"]))
					{	
						$subject_search     = count($_POST["subject_search"]);
						
						if($subject_search > 0 )  
						{  
							$subject_search_arr = array();
							
							for($i=0; $i<$subject_search; $i++)  
							{  
								if(trim($_POST["subject_search"][$i] != ''))
								{
									$subject_search_second_step_arrW[] = $_POST["subject_search"][$i];
									
									
								}  
							}
							
							foreach($subject_search_second_step_arrW as $key4 => $value4)
							{
								
								 $sql_user = "SELECT 
													  *
													FROM user_info
													JOIN tutor_tutorial_subjects
													  ON user_info.user_id = tutor_tutorial_subjects.user_id 
													JOIN user_tutor_info 
													  ON user_tutor_info.user_id = tutor_tutorial_subjects.user_id WHERE tutor_tutorial_subjects.Tutoring_Subjects IN('".$value4."') and user_tutor_info.postal_code like '".$_GET['postal_code']."%' and user_tutor_info.tuition_type like '".$_GET['tuition_type']."%' GROUP BY user_tutor_info.user_id";
										
									
								
							}	

						
						}
					}	
						
						
						
						if(!empty($_POST["Levels_search"]) && !empty($_POST["subject_search"]))
						{
							foreach(array_combine($Levels_search_second_step_arrW,$subject_search_second_step_arrW) as $key2 => $value2) 
							{
								 $sql_user = "SELECT 
													  *
													FROM user_info
													JOIN tutor_totoring_levels
													  ON user_info.user_id = tutor_totoring_levels.user_id
													JOIN tutor_tutorial_subjects
													  ON user_info.user_id = tutor_tutorial_subjects.user_id 
													JOIN user_tutor_info 
													  ON user_tutor_info.user_id = tutor_totoring_levels.user_id WHERE tutor_totoring_levels.Tutoring_Level IN('".$value2."') or tutor_tutorial_subjects.Tutoring_Subjects IN('".$value2."') and user_tutor_info.postal_code like '".$_GET['postal_code']."%' and user_tutor_info.tuition_type like '".$_GET['tuition_type']."%' GROUP BY user_tutor_info.user_id";
										
									
							}
						}	
							
						
						
						
						
						
				}		
				
				
				
				if(isset($_POST['Search_by_filter']))
				{
					//$Levels_search2 = '';
					
					
						
						$Status = $_POST['Status'];
						$Gender = $_POST['Gender'];
						$Nationality = $_POST['Nationality'];
						
						$Levels_search2_arrW = [];
						$Qualification_search2_arrW = [];
						
						
						
						
						if(!empty($_POST["Levels_search2"]))
						{
							if(count($_POST["Levels_search2"]) > 0 )  
							{  
						
								$Levels_search2 = count($_POST["Levels_search2"]);
						
								$Levels_search2_arr = array();
								
								
								
								for($i=0; $i<$Levels_search2; $i++)  
								{  
									if(trim($_POST["Levels_search2"][$i] != ''))
									{
										
										$Levels_search2_arr =  $_POST["Levels_search2"][$i];
										$Levels_search2_arrW[] = $_POST["Levels_search2"][$i];
										
										//$sql_user = "SELECT * FROM user_info as uinf INNER JOIN tutor_totoring_levels as level ON uinf.user_id = level.user_id WHERE level.Tutoring_Level IN('".$Levels_search2_arr."') ";
										
										
										/**
										$sql_user = "SELECT
													  *
													FROM user_info
													JOIN tutor_totoring_levels
													  ON user_info.user_id = tutor_totoring_levels.user_id
													JOIN user_tutor_info 
													  ON user_tutor_info.user_id = tutor_totoring_levels.user_id WHERE tutor_totoring_levels.Tutoring_Level IN('".$Levels_search2_arr."') ";
										
									**/
										
										
									}  
								}
								
								
								foreach($Levels_search2_arrW as $key5 => $value5)
								{
									//echo $value;
									
									 $sql_user = "SELECT 
														  *
														FROM user_info
														JOIN tutor_totoring_levels
														  ON user_info.user_id = tutor_totoring_levels.user_id
														JOIN user_tutor_info 
														  ON user_tutor_info.user_id = tutor_totoring_levels.user_id WHERE tutor_totoring_levels.Tutoring_Level IN('".$value5."') or user_tutor_info.tutor_status like '".$Status."%' or user_tutor_info.gender like '".$Gender."%' or user_tutor_info.nationality like '".$Nationality."%' and user_tutor_info.postal_code like '".$_GET['postal_code']."%' and user_tutor_info.tuition_type like '".$_GET['tuition_type']."%'  GROUP BY user_tutor_info.user_id";
											
										
									
								}
								
								
							
							}
						}	
							
						
						
						if(!empty($_POST["Qualification"]))
						{
							if(count($_POST["Qualification"]) > 0 )  
							{  
						
								$Qualification = count($_POST["Qualification"]);
								
								$Qualification_search2_arr = array();
								
								
								
								for($i=0; $i<$Qualification; $i++)  
								{  
									if(trim($_POST["Qualification"][$i] != ''))
									{
										
										$Qualification_search2_arr =  $_POST["Qualification"][$i];
										$Qualification_search2_arrW[] = $_POST["Qualification"][$i];
										
										
									}  
								}
								
								
								foreach($Qualification_search2_arrW as $key6 => $value6)
								{
									//echo $value;
									
									 $sql_user = "SELECT 
														  *
														FROM user_info
														JOIN user_tutor_info 
														  ON user_tutor_info.user_id = user_info.user_id WHERE user_tutor_info.qualification IN('".$value6."') or user_tutor_info.tutor_status like '".$Status."%' or user_tutor_info.gender like '".$Gender."%' or user_tutor_info.nationality like '".$Nationality."%' and user_tutor_info.postal_code like '".$_GET['postal_code']."%' and user_tutor_info.tuition_type like '".$_GET['tuition_type']."%'  GROUP BY user_tutor_info.user_id";
											
										
									
								}
							
								
							}
							
						}
							
							
							
							
							
							
						if(!empty($_POST["Qualification"]) && !empty($_POST["Levels_search2"]))
						{	
							foreach(array_combine($Levels_search2_arrW,$Qualification_search2_arrW) as $key7 => $value7) 
							{
								 $sql_user = "SELECT 
													  *
													FROM user_info
													JOIN tutor_totoring_levels
													  ON user_info.user_id = tutor_totoring_levels.user_id
													JOIN user_tutor_info 
													  ON user_tutor_info.user_id = tutor_totoring_levels.user_id WHERE tutor_totoring_levels.Tutoring_Level IN('".$value7."') or user_tutor_info.qualification IN('".$value7."') or user_tutor_info.tutor_status like '".$Status."%' or user_tutor_info.gender like '".$Gender."%' or user_tutor_info.nationality like '".$Nationality."%' and user_tutor_info.postal_code like '".$_GET['postal_code']."%' and user_tutor_info.tuition_type like '".$_GET['tuition_type']."%' GROUP BY user_tutor_info.user_id";
										
									
							}
							
						}
						

							if(empty($_POST["Qualification"]) && empty($_POST["Levels_search2"]) && $Status != "" || $Gender !="" || $Nationality != "" )
							{
								 $sql_user = "SELECT 
													  *
													FROM user_info
													JOIN tutor_totoring_levels
													  ON user_info.user_id = tutor_totoring_levels.user_id
													JOIN user_tutor_info 
													  ON user_tutor_info.user_id = tutor_totoring_levels.user_id WHERE user_tutor_info.tutor_status like '".$Status."%' or user_tutor_info.gender like '".$Gender."%' or user_tutor_info.nationality like '".$Nationality."%' and user_tutor_info.postal_code like '".$_GET['postal_code']."%' and user_tutor_info.tuition_type like '".$_GET['tuition_type']."%' GROUP BY user_tutor_info.user_id";
										
								
							}						
							
						
						
						
						
				}		
				


				
				
				 if(isset($_POST['Submit']))
				 {
				 $search=$_POST['search'];
					if($search !='')
					{ 
					
					//$sql_user = "SELECT * FROM user_info as uinf INNER JOIN user_tutor_info as utinf ON uinf.user_id = utinf.user_id WHERE uinf.first_name like '".$search."%' or uinf.email like '".$search."%' or uinf.mobile like '".$search."%' or utinf.qualification like '".$search."%' or utinf.tutor_status like '".$search."%' or utinf.tuition_type like '".$search."%' or utinf.location like '".$search."%' or utinf.postal_code like '".$search."%' or utinf.travel_distance like '".$search."%' ";
					
					}
				}
					
					
				if($_GET['sort']==1)
				{ 
				$sql_user .=" ORDER BY first_name ";
				}
				
				if(isset($_GET['ord']) && $_GET['ord']!="")
				{ 
				$sql_user.=" ".$_GET['ord'];
				}
				$result = $conn->query( $sql_user);
				$num_rows = mysqli_num_rows($result);
				 $sql_user.= " LIMIT $offset, $rowsPerPage";
				 $res_user = $conn->query($sql_user);
				 
				// print_r($res_user);
				// die();
				if($num_rows == 0)
				{
				?>
				  <table width="100%" cellpadding="0" cellspacing="0" class="paddTop30">
				    <tr>
				      <td colspan="3" align="center" valign="middle"><strong><font color="#FF0000" size="+1">No records. </font></strong></td>
				    </tr>
				  </table>
				 <?php
						}
						else
						{
						?> 
                   <div id="group_1"><table width="100%" cellpadding="0" cellspacing="0" border="0">
					<!--	<tr>
							<td colspan="12" style="border-top:1px solid #fff;">
							
							<table width="100%" cellspacing="0" cellpadding="0">
							<tr>
							 <td colspan="7" class="bodrBot" width="50%" align="right">
								  
								  <input class="form-control form-control-round" placeholder="Tutor Search by Distance, Location, City, Name, Email, Mobile ..." type="text" name="search" id="search" style="width: 100%;max-width: 821px;min-width: 821px;float: left;padding: 10px 0 11px 16px;font-size: 22px;">
                                      <input type="submit" value="Search" name="Submit" class="btn waves-effect waves-light hor-grd btn-grd-info " style="padding: 15px 30px 15px 30px;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							
							</table>
						 </td>
					</tr> -->				
                      <tr bgcolor="<?php echo $bgcolor;?>">
                        <td width="27"  align="left" valign="middle" class="paddTopBot5 paddLt6 bodrBot"><strong>S.No.</strong></td>
						<td width="47"  align="left" valign="middle" class="paddTopBot5 paddLt6 bodrBot">&nbsp;</td>
						<td width="567"  align="left" valign="middle" class="paddTopBot5 bodrBot">&nbsp;</td>
						<td width="367" align="left" class="paddLt15 paddTopBot5 bodrBot"><strong>
                          <?php 
							if($_GET['ord']=='ASC' && $_GET['sort']=='1')
							{
							?>
                          <img src="images/up.gif" border="0" align="baseline" />&nbsp;<a href="tutor_search.php?sort=1&amp;ord=DESC&amp;page=<?php echo $pageNum;?>">Tutor Name</a>
                          <?php   
							}
							elseif($_GET['ord']=='DESC' && $_GET['sort']=='1')
							{
							?>
                          <img src="images/down.gif"  border="0" align ="baseline" />&nbsp;<a href="tutor_search.php?sort=1&amp;ord=ASC&amp;page=<?php echo $pageNum;?>">Tutor Name</a>
                          <?php
							}
							else
							{
							?>
						  <strong><a href="tutor_search.php?sort=1&amp;ord=DESC&amp;page=<?php echo $pageNum;?>">Tutor Name</a><a href="view_schedule.php?sort=1&amp;ord=ASC&amp;page=<?php echo $pageNum;?>"></a></strong>
						  <?php
							}
							?>
                        </strong></td>
							<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Email</strong></td>
								<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Mobile</strong></td>
								<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Location</strong></td>
								<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Distance</strong></td>
						
						<td width="300"  align="center" valign="middle" class="paddTopBot5 bodrBot"><strong>Action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                      </tr>
                    <?php
						$i=0;
						$sr = $offset;
						
						
						while($data_user = mysqli_fetch_array($res_user))
						{
						 $sr++;
						if($i%2==0)
						{
							$bgcolor="#E5E5E5";
						}
						else
						{
							$bgcolor="#FFFFFF";
						}
						
						
						$tutor_extra_data = mysqli_fetch_array($conn->query("select * from user_tutor_info where user_id = '".$data_user['user_id']."' "));
						
						
					?>
                    <tr bgcolor="<?php echo $bgcolor;?>" id="<?php echo $data_user['id'];?>">
                        <td width="27"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><strong><?php echo $sr; ?></strong></td>
						<td width="47"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle">
						
							<div class="chk-option">
							<div class="checkbox-fade fade-in-primary">
							<label class="check-task">
							<input type="checkbox" id="chk<?php echo $data_user['user_id'];?>" name="numbers[]" value="<?php echo $data_user['user_id'];?>"  />
						
							<span class="cr">
							<i class="cr-icon fa fa-check txt-default"></i>
							</span>
							</label>
							</div>
							</div>
						
						</td>
						
						
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle">
						<?php 
						if($tutor_extra_data['profile_image'] != "")
						{
						?>
						<div style="margin:0px 10px 0px 0px;float: left;">
						
						<img src="../UPLOAD_file/<?php echo $tutor_extra_data['profile_image']; ?>" style="width:48px;">
						
						</div>
						<div style="border-radius:50%; background-color:green;width: 7px;height: 7px;margin: 0 0 0 42%;"></div>
						<?php } ?>
						<?php 
						$getFlag = mysqli_fetch_array($conn->query("select * from country where countryname = '".$tutor_extra_data['nationality']."' "));
						$getFlagName = strtolower($getFlag['code']);
						
						$getFlagImage = '<img src="../flags-medium/'.$getFlagName.'.png'.'" style="width: 30px;margin: 0 0 0 4px;" >';
						
						echo '<span style="">'.$tutor_extra_data['tutor_code'].$getFlagImage.'<br/>';
						echo $tutor_extra_data['qualification'].'<br/>'; 
						
						echo $tutor_extra_data['personal_statement'].'</span><br/>';
						?>
						</td>
						
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle">
						<?php echo ucfirst($data_user['first_name'])." ".$data_user['last_name'];  ?>
						</td>
						
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo $data_user['email']; ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo $data_user['mobile']; ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo $tutor_extra_data['location']; ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo $tutor_extra_data['travel_distance']; ?></td>
						
						
						<td width="144"  align="center" class="paddBot11 paddTop5" valign="middle">
						
					
						<a href="tutor_details.php?id=<?php echo $data_user['user_id']; ?>&page=<?php echo $pageNum; ?>" ><img src="images/edit1.png" title="View Details" border="0" style="width:17px; height:17px;" />   </a>	
						
						
						&nbsp;
				</td>
                     
					 </tr>
                    <?php
						$i++;
						}
						$maxPage = ceil($num_rows/$rowsPerPage);
						if($maxPage ==0)
						{
							$maxPage=1; 
						}
					?>
                  </table></div>
			    </td>
              </tr>
			  <tr>
					<td height="15" align="left" bgcolor="#FFFFFF" width="79%"> 
                    <font color="#000000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <br>
                    </font><font color="#000000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
					&nbsp;Showing page <strong><?php echo $pageNum; ?></strong> of <strong><?php echo $maxPage; ?></strong><?php if($maxPage==1) echo " page"; else echo " pages";?> 
					                    </font></strong></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                  </font></strong></font></td>
                     <td height="15" align="center" bgcolor="#FFFFFF" width="21%"> 
                    <font color="#000000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <br>
                    </font><font color="#000000"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <?php 
							$qstring = "";
							if($_GET['sort']!="")
							{
								$qstring = "&amp;sort=".$_GET['sort'];
							}
							if($_GET['ord']!="")
							{
								$qstring .= "&amp;ord=".$_GET['ord'];
							}
							if ($pageNum > 1)
							{
								$page = $pageNum - 1;
								$prev = " <a href=\"$self?page=$page$qstring\">< Previous</a> ";
								
								$first = " <a href=\"$self?page=1$qstring\">[First Page]</a> ";
							} 
							else
							{
								$prev  = '';       // we're on page one, don't enable 'previous' link
								$first = ' [First Page] '; // nor 'first page' link
							}
							
							// print 'next' link only if we're not
							// on the last page
							if ($pageNum < $maxPage)
							{
								$page = $pageNum + 1;
								$next = " <a href=\"$self?page=$page$qstring\">Next ></a> ";
								
								$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
							} 
							else
							{
								$next = '';      // we're on the last page, don't enable 'next' link
								$last = ' [Last Page] '; // nor 'last page' link
							}
							
							// print the page navigation link
							//echo $first . $prev . " Showing page <strong>$pageNum</strong> of <strong>$maxPage</strong> pages " . $next . $last;
							if($prev=='')
								echo $next;	
							else if($next=='')
								echo $prev;
							else echo $prev . " | " . $next;
							}
						?>
                    </font></strong></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                  </font></strong></font></td>
                 
              </tr>
			  
           
        </table>
			</form>
															
															
															
															
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
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="assets/pages/widget/amchart/gauge.js"></script>
    <script src="assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/pages/widget/amchart/light.js"></script>
    <script src="assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/js/script.js "></script>
	
	
	

	
	
</body>

</html>
