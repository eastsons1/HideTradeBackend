<?php
error_reporting(0);
ob_start();	
session_start(); 
include('../include/config.php');
include("../include/functions.php");

 //echo $_SESSION['user_type'];
 
// die();

	if(isset($_POST['deleteAll']))
	{
		for($i=0;$i<=count($_POST['numbers']);$i++)
		{
			if($_POST['numbers'][$i]!="")
			{
			
				 $sql_multi_delete4 = "DELETE FROM user_tutor_info WHERE id = '".$_POST['numbers'][$i]."'";
				 $sql_multi_delete44 = $conn->query($sql_multi_delete4) or die(" query  not executed");
				 
				 
			}
		}	
	}
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
          url: "delete_tutor.php?id=" + id,
          success: function(msg){
                     $('#'+id).fadeOut();
                   }
     });
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
                                                        <h5>View List of Tutors</h5>
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
				
					
					$sql_user = "SELECT * FROM user_info as uinf INNER JOIN user_tutor_info as utinf ON uinf.user_id = utinf.user_id order by utinf.id DESC";
				
				 if(isset($_POST['Submit']))
				 {
				 $search=$_POST['search'];
				 if($search !='')
					{ 
					
						$sql_user = "SELECT * FROM user_info as uinf INNER JOIN user_tutor_info as utinf ON uinf.user_id = utinf.user_id WHERE utinf.qualification like '".$search."%' ";
					
					}
				}
					
					
				if($_GET['sort']==1)
				{ 
					$sql_user .=" ORDER BY qualification ";
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
						<tr>
							<td colspan="12" style="border-top:1px solid #fff;">
							
							<table width="100%" cellspacing="0" cellpadding="0">
							<tr>
								<td width="42%" height="35" align="left" valign="middle" class="paddLt6 bodrBot">
								
								<strong>
								<a rel="group_1" href="#select_all">Select All</a>&nbsp;&nbsp;|&nbsp;&nbsp;
								<a rel="group_1" href="#select_none">Select None</a>&nbsp;&nbsp;|&nbsp;&nbsp;
								<a rel="group_1" href="#invert_selection">Invert Selection </a></strong>	</td>
								<td  colspan="7" align="left" class="bodrBot">
								<input type="submit" name="deleteAll" class="btn waves-effect waves-light hor-grd btn-grd-info " value="Delete" onclick="return checkChecked();" />  

								
                                
								</td>
                                  <td width="50%" colspan="7" align="right" class="bodrBot">
								  
								  <input class="form-control form-control-round" type="text" name="search" id="search" style="width: 100%;max-width: 337px;min-width: 334px;float: left;" />
                                      <input type="submit" value="Search" name="Submit" class="btn waves-effect waves-light hor-grd btn-grd-info " style="padding: 8px 20px 8px 20px;" />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							</table>
						 </td>
					</tr>				
                      <tr bgcolor="<?php echo $bgcolor;?>">
                        <td width="27"  align="left" valign="middle" class="paddTopBot5 paddLt6 bodrBot"><strong>S.No.</strong></td>
						<td width="47"  align="left" valign="middle" class="paddTopBot5 paddLt6 bodrBot">&nbsp;</td>
						<td width="367" align="left" class="paddLt15 paddTopBot5 bodrBot"><strong>
                          <?php 
							if($_GET['ord']=='ASC' && $_GET['sort']=='1')
							{
							?>
                          <img src="images/up.gif" border="0" align="baseline" />&nbsp;<a href="view_tutor.php?sort=1&amp;ord=DESC&amp;page=<?php echo $pageNum;?>">Qualification </a>
                          <?php   
							}
							elseif($_GET['ord']=='DESC' && $_GET['sort']=='1')
							{
							?>
                          <img src="images/down.gif"  border="0" align ="baseline" />&nbsp;<a href="view_tutor.php?sort=1&amp;ord=ASC&amp;page=<?php echo $pageNum;?>">Qualification</a>
                          <?php
							}
							else
							{
							?>
						  <strong><a href="view_tutor.php?sort=1&amp;ord=DESC&amp;page=<?php echo $pageNum;?>">Qualification</a></strong>
						  <?php
							}
							?>
                        </strong></td>
						
						<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Age</strong></td>
						<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Nationality</strong></td>
						<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Tutor Status</strong></td>
						<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Tuition Type</strong></td>
						<td width="367"  align="left" valign="middle" class="paddTopBot5 bodrBot"><strong>Travel Distance(KM)</strong></td>
						
						
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
						
						
					?>
						<tr bgcolor="<?php echo $bgcolor;?>" id="<?php echo $data_user['id'];?>">
					
                        <td width="27"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><strong><?php echo $sr; ?></strong></td>
						<td width="47"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle">
						
							<div class="chk-option">
							<div class="checkbox-fade fade-in-primary">
							<label class="check-task">
							<input type="checkbox" id="chk<?php echo $data_user['id'];?>" name="numbers[]" value="<?php echo $data_user['id'];?>"  />
						
							<span class="cr">
							<i class="cr-icon fa fa-check txt-default"></i>
							</span>
							</label>
							</div>
							</div>
						
						</td>
						
						
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['qualification']); ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['age']); ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['nationality']); ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['tutor_status']); ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['tuition_type']); ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['travel_distance']); ?></td>
						
						<td width="144"  align="center" class="paddBot11 paddTop5" valign="middle">
						
						&nbsp;
						
						<a href="javascript: VOID(0);" onclick="javascript:if(confirm('Are you sure you want to delete ?')){DoAction('<?php echo $data_user['id'];?>');}"><img src="images/trash.png" title="Delete" border="0"/></a></a>&nbsp;&nbsp;</td>
                     
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
                  </table>
				  </div>
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
