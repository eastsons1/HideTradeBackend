<?php
error_reporting(0);
ob_start();	
session_start(); 
include('../include/config.php');
include("../include/functions.php");


	///Start Student post requirement
	
	if(isset($_POST['Submit2']))
	{
		
		$Qualification	=	$_POST['Qualification'];
		$Gender	=	$_POST['Gender'];
		$frequency_lessons	=	$_POST['frequency_lessons'];
		$hours	=	$_POST['textInput'];
		$minutes	=	$_POST['textInput2'];
		$Preferred_Time	=	$_POST['Preferred_Time'];
		$Preferred_Days	=	$_POST['Preferred_Days'];
		$Fee_Range	=	$_POST['Fee_Range'];
		
		
		if($Qualification != "Select Qualification" && $Gender != "Select Gender of Tutor" && $frequency_lessons != "Frequency_Lessons" && $hours != "" && $Preferred_Time != "Select Preferred Time" && $Preferred_Days != "Select Preferred Days" && $Fee_Range != "")
		{
	
			$sql_inserts     =  " INSERT INTO student_post_requirement SET user_id ='".$_SESSION['loggedIn_user_id']."', Qualification = '".$Qualification."', Gender = '".$Gender."', frequency_lessons ='".$frequency_lessons."', hours ='".$hours."', minutes = '".$minutes."', Preferred_Time ='".$Preferred_Time."', Preferred_Days = '".$Preferred_Days."', Fee_Range = '".$Fee_Range."' ";
		    $sql_insert_runs =  $conn->query($sql_inserts);
	
			if($sql_insert_runs)
			{
				$msg1 = '<span style="color:red;">Data insert successfully.</span>';
			}
		}
		else
		{
			$msg1 = '<span style="color:red;">Data not inserted successfully.</span>';
		}			
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

function validate2()
{	
   
	if(document.myForm2.Qualification.value == "Select Qualification")
	{
		alert("Please select qualification.");
		document.myForm2.Qualification.focus();
		return false;
	}
	if(document.myForm2.Gender.value == "Select Gender of Tutor")
	{
		alert("Please select Gender");
		document.myForm2.Gender.focus();
		return false;
	}
	
	if(document.myForm2.frequency_lessons.value == "Frequency_Lessons")
	{
		alert("Please select Frequency Lessons");
		document.myForm2.frequency_lessons.focus();
		return false;
	}
	
	
	
	if(document.myForm2.textInput.value=="")
	{
		alert("Please select hours");
		document.myForm2.textInput.focus();
		return false;
	}
	
	 if(document.myForm2.Preferred_Time.value=="Select Preferred Time")
	 {
		alert("Please select preferred time")
		document.myForm2.Preferred_Time.focus();
		return false;
	}
	if(document.myForm2.Preferred_Days.value=="Select Preferred Days")
	 {
		alert("Please select preferred days")
		document.myForm2.Preferred_Days.focus();
		return false;
	}
	
	if(document.myForm2.Fee_Range.value=="")
	 {
		alert("Please select fee range")
		document.myForm2.Fee_Range.focus();
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
	
	function updateTextInput2(val) {
	  document.getElementById('textInput2').value=val; 
	}
	
	function updateTextInput3(val) {
	  document.getElementById('textInput3').value=val; 
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
                                                        <h5>Post Student Requirement</h5>
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

			
			
			<?php if($_SESSION['user_type']=="student"){ ?>

			<form name="myForm2" method="post" enctype="multipart/form-data" onsubmit="return validate2();">
			
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
				<label class="control-label mb-10" for="exampleInputEmail_2">Gender of Tutor</label>
				<select type="text" class="form-control" value="" id="Gender" name="Gender" placeholder="Gender" autocomplete="off">
				<option value="Select Gender of Tutor">--Select Gender of Tutor--</option>
				
				<option value="Not Preferences" >Not Preferences</option>
				<option value="Male" >Male</option>
				<option value="Female" >Female</option>
				
				</select>
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Frequency of Lessons(Tuition Type)</label>
				<select type="text" class="form-control" id="frequency_lessons" name="frequency_lessons" placeholder="Frequency Lessons" autocomplete="off" ">
				<option value="Frequency_Lessons">--Select Tuition Type--</option>
				<option value="Home Tuition">Home Tuition</option>
				<option value="Online Tuition">Online Tuition</option>
				<option value="Homework Help">Homework Help</option>
				</select>
				</div>
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Duration of Lessons</label>
				<table border="0">
				<tr>
				<td style="width: 50%;padding: 0 19px 0 18px;">
				<label class="control-label mb-10" for="exampleInputEmail_2">Hours</label>
				<input type="text" class="form-control" name="textInput" id="textInput" value="" placeholder="Duration of Lessons Hours" style="width:100%; float:left;margin:17px 0 0 0;" autocomplete="off">
				<input type="range" name="rangeInput" min="1" max="12" onmousemove="updateTextInput(this.value);">
				</td>
				<td style="width: 50%;padding: 0 19px 0 18px;">
				<label class="control-label mb-10" for="exampleInputEmail_2">Minutes</label>
				<input type="text" class="form-control" name="textInput2" id="textInput2" value="" placeholder="Duration of Lessons Minutes" style="width:100%; float:left;margin:17px 0 0 0;" autocomplete="off">
				<input type="range" name="rangeInput2" min="1" max="60" onmousemove="updateTextInput2(this.value);">
				</td>
				</tr>
				</table>
				</div>
				
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Preferred Time</label>
				<select type="text" class="form-control" value="" id="Preferred_Time" name="Preferred_Time" placeholder="Preferred Time" autocomplete="off" ">
				<option value="Select Preferred Time">--Select Preferred Time--</option>
				<option value="Morning" >Morning</option>
				<option value="Afternoon">Afternoon</option>
				<option value="Evening">Evening</option>
				</select>
				</div>
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Preferred Days</label>
				<select type="text" class="form-control" value="" id="Preferred_Days" name="Preferred_Days" placeholder="Preferred Days" autocomplete="off" ">
				<option value="Select Preferred Days">--Select Preferred Days--</option>
				<option value="Monday" >Monday</option>
				<option value="Tuesday">Tuesday</option>
				<option value="Wednesday">Wednesday</option>
				<option value="Thrusday">Thrusday</option>
				<option value="Friday">Friday</option>
				<option value="Saturday">Saturday</option>
				</select>
				</div>
				
				
				
				<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_2">Fee Range(In Indian Rupees)</label>
				
				<input type="text" class="form-control" name="Fee_Range" id="textInput3" value="" placeholder="Fee Range" style="width:100%; float:left;margin:17px 0 0 0;" autocomplete="off">
				<input type="range" name="rangeInput3" min="1000" max="50000" onmousemove="updateTextInput3(this.value);">
				
				</div>
				
  
				 <br/>
							  
				<div class="form-group text-center">
				<input type="submit" name="Submit2" class="btn waves-effect waves-light hor-grd btn-grd-info" value="Submit Requirement">
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
	
	
	
	
	
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script>
  $(function () {
	 
    $('#datetimepicker1').datetimepicker();
	 jQuery.noConflict();
 });
</script>
	
	
</body>

</html>
