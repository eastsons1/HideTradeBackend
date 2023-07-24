<?php
error_reporting(0);
ob_start();	
session_start(); 
include('../include/config.php');
//include("../include/functions.php");

 //echo $_SESSION['user_type'];
 
	if(isset($_POST['Submit']))
	{
		$dateTime = date('Y-m-d H:i:sP');
		
		
		
		if($_SESSION['user_type']=='student')
		{
			$chat_user_id = $_GET['tutor_id'];
			$chat_user_id_url = "tutor_id=".$_GET['tutor_id'];
		}	
		
		if($_SESSION['user_type']=='tutor')
		{
			$chat_user_id = $_GET['student_id'];
			$chat_user_id_url = "student_id=".$_GET['student_id'];
		}	
		
		
		if($_POST['message'] !="")
		{
			
			 $fetch     =  "INSERT INTO chatrooms SET chat_userid = '".$chat_user_id."', msg = '".$_POST['message']."', loggedIn_user_id ='".$_SESSION['loggedIn_user_id']."',  status='Send', created_on = '".$dateTime."'  ";
			
			//die();
			
			$query_run =  $conn->query($fetch);
			if($query_run)
			{
				
				header("location:chat_room.php?".$chat_user_id_url);
			}	
		}	
		else{
			
			$msg1 = "Message can not be blank.";
		}
    }
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tutor App </title>
   
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
	
	
	<style>
.stepper-wrapper {
  font-family: Arial;
  margin-top: 50px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

  @media (max-width: 768px) {
    font-size: 12px;
  }
}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -50%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #ccc;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #4bb543;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #4bb543;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}




#FillColorCircle{background-color:#4bb543}
#NoFillColorCircle{background-color:#cccccc}
	</style>
	
	
	
	<script>
	function select_quotation()
	{
		//alert($('#quote_no').val());
		
		document.getElementById('show_quote_no').innerHTML = "Quotation No. "+$('#quote_no').val();
		
		
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

                                                        <h5> Chat Room </h5>
													
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
                                                    

												<br/><br/>

							
						 <div class="" style="padding: 2rem 26rem 2rem 7rem;background: #eee;">
						<div class="row clearfix">
						
						<?php if($msg1 !=""){ ?>
						<span style="color:red;"><?php echo $msg1; ?></span>
						<?php } ?>
						
							<p>&nbsp;</p>
									<br/><br/> 
									
						<form class="form-horizontal" name="frm" method="post" enctype="multipart/form-data" >
							<div class="row clearfix">
							
                               <br/><br/><br/>
                                <div class="col-lg-12 col-md-10 col-sm-8">
								
								<div class="form-group" style="background:#eee; border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding:5px 0 6px 6px;">
								
								<table border="0">
								<tr>
								<td>
								<?php
									//$data_sel     =  "SELECT * FROM chatrooms where loggedIn_user_id= '".$_SESSION['loggedIn_user_id']."' and chat_userid='".$_GET['chat_user_id']."' order by created_on DESC ";
									
									if($_GET['chat_user_id']=="")
									{	
									  $data_sel     =  "SELECT * FROM chatrooms where loggedIn_user_id= '".$_SESSION['loggedIn_user_id']."' order by created_on DESC ";
									}
									else
									{
										$data_sel     =  "SELECT * FROM chatrooms where loggedIn_user_id= '".$_SESSION['loggedIn_user_id']."' and chat_userid='".$_GET['chat_user_id']."' order by created_on DESC ";
									}
									
									$datas =  $conn->query($data_sel);
									
									while($Chat_data = mysqli_fetch_array($datas))
									{
										
										echo '<div style="width:100%;"><span style="text-align:right; color:green;">'.$Chat_data['msg'].'</span><span style="font-size:11px; color:#999;"><i>'."  ( ".$Chat_data['created_on'].' ) <br/></i></span></div>';
										
										$Chat_data_id[] = $Chat_data['chat_userid'];
										
										
								?>	
								 
								<?php } ?>
								
								</td>
								<td>
								
								<?php
								
								$next_user_chat = $conn->query("SELECT * FROM chatrooms where loggedIn_user_id= '".$Chat_data_id[0]."' and chat_userid ='".$_SESSION['loggedIn_user_id']."'  order by created_on DESC ");
								while($connected_user_msg =  mysqli_fetch_array($next_user_chat))
								{
										
										echo '<div style="width:100%; margin-left:80%; "><span style="text-align:right; color:blue;">'.$connected_user_msg['msg'].'</span><span style="font-size:11px; color:#999;"><i>'." ( ".$connected_user_msg['created_on'].' ) <br/></i></span></div>';
								}
								?>
								</td>
								</tr>
								</table>		
									
								</div>	
								
									<div class="form-group">
									
									<label class="control-label mb-10" for="exampleInputName_1" style=" width: 100%; color: #ffaa00;"><strong>Chating With Tutor: 
									<?php 
									$qsql = $conn->query("select first_name,last_name from user_info where user_id = '".$_GET['tutor_id']."' ");
									$tutor_name = mysqli_fetch_array($qsql);
									echo $tutor_name['first_name']." ".$tutor_name['last_name'];
									?>
									
									</strong></label>
									
                                    </div>
									
								
                                    <div class="form-group">
									
									<label class="control-label mb-10" for="exampleInputName_1" style=" width: 100%;"><strong>Message </strong></label>
									
									<textarea name="message" class="form-control" ></textarea>
									
                                    </div>
                                </div>
                            </div>
							
							
								
							<div class="col-lg-12 col-md-10 col-sm-8">
                               
                                    <input type="Submit" name="Submit" class="btn waves-effect waves-light hor-grd btn-grd-info" value="Submit" >
								
                            </div>
							
							
							</form>	
											
											</div>	
								</div>		
											
											



												
															
															
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
