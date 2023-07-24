<?php
error_reporting(0);
ob_start();	
session_start(); 
include('../include/config.php');
include("../include/functions.php");

 
 
	if($_SESSION['loggedIn_user_id'] !="")
	{
		$fetch = "SELECT * FROM tbl_my_schedule as mor INNER JOIN tbl_assign_schedule_to_agent as tao where mor.order_request_id = tao.order_request_id and tao.assign_order_id = '".$_GET['orid']."' ";
	}
	
	 $query_run =  $conn->query($fetch);
	 $query_run_data = mysqli_fetch_array($query_run);
	 
	  $assign_to_agent_details = mysqli_fetch_array($conn->query("select first_name,last_name from user_info where user_id='".$query_run_data['assign_to_agent_id']."' "));

	$assigned_by_user_details = mysqli_fetch_array($conn->query("select first_name,last_name from user_info where user_id='".$query_run_data['assigned_by_user_id']."' "));
		
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tutor APP </title>
   
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
          url: "99999delete_my_order_request.php?id=" + id,
          success: function(msg){
                     $('#'+id).fadeOut();
                   }
     });
}

function DoActionRemove( id )
{

     $.ajax({
          type: "GET",
          url: "delete_assigned_my_order_request.php?id=" + id,
          success: function(msg){
                     $('#'+id).fadeOut();
                   }
     });
}

function edit_price(orid,mid,quantity)
{
	
	//alert(quantity);
	var price = prompt("Enter Price per Qty($) : ");
	//var qty = prompt("Enter Quantity($) : ");
	var wexp = prompt("Enter Work Extra Price($) : ");
	var discount = prompt("Enter Discount($) : ");
	var Taxex = prompt("Enter Taxex($) : ");
	
	
	if(price!= null)
	{
		$.ajax({
			  type: "GET",
			  url: "edit_quote_price.php?orid=" + orid+"&mid=" + mid+"&price=" + price+"&wexp=" + wexp+"&discount=" + discount+"&Taxex=" + Taxex+"&quantity=" + quantity,
			  success: function(msg){
						 //$('#'+id).fadeOut();
						 window.location.href="create_quote.php?orid=" + orid+"&mid=" + mid;
					   }
		 });
	
	}
}



function saveQuote(orid,mid)
{
	//alert(orid);
	//alert(document.getElementById("quote_no").innerHTML);
	var quote_no = document.getElementById("quote_no").innerHTML
	var quote_date = document.getElementById("quote_date").innerHTML;
	var status = document.getElementById("status").innerHTML;
	var Manufacturing = document.getElementById("Manufacturing").value;
	var expiry_date = document.getElementById("expiry_date").innerHTML;

	if(Manufacturing!= "Select Manufacturing")
	{
		$.ajax({
			  type: "GET",
			  url: "save_quote.php?orid=" + orid+"&mid=" + mid+"&quote_no=" + quote_no+"&quote_date=" + quote_date+"&status=" + status+"&Manufacturing=" + Manufacturing+"&expiry_date=" + expiry_date,
			  success: function(msg){
						 //$('#'+id).fadeOut();
						 window.location.href="view_quote.php?orid=" + orid+"&mid=" + mid;
					   }
		 });
	
	}

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
	
<style>
.table td, .table th{border-top:0px; padding:16px 1rem 7px 1rem !important;}
</style>	
	
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1300,height=1800');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
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
                                    <div class="page-body" id="divToPrint" >
                                      
    
                                            <!--  project and team member start -->
                                            <div class="col-xl-12 col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                       <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" style="width:134px;">

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            
															
															
		<form name="frm" method="post">
			<table class="table table-hover2222" >
			
			<tr>
							<td colspan="12" style="">
							
							<table width="100%" cellspacing="0" cellpadding="0">
							<tr style="background: #eee;color: green;border-bottom: 2px solid; font-size:19px;">
								<td width="40%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Quotation No. : </strong>
								<span style="color: #000000;" id="quote_no">
								<?php
								$measurement_data = mysqli_fetch_array($conn->query("SELECT remarks,product FROM tbl_add_measurement where order_request_id = '".$_GET['orid']."' "));
								$party_name = mysqli_fetch_array($conn->query("SELECT first_name,last_name,status,contact_no,visit_address,email FROM tbl_my_schedule as mor INNER JOIN user_info as uinf where mor.user_id = uinf.user_id and mor.order_request_id = '".$_GET['orid']."' "));
								
								
									// Generating a random number
									//$randomNumber = rand();
									//print_r($randomNumber);
									//print_r("\n");

									// Generating a random number in a
									// Specified range.
									$randomNumber = rand(10,10000);
									print_r("SBQN-".$randomNumber);
									?>
								</span>
								</td>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Date : </strong> <span style="color: #000000;" id="quote_date"> <?php echo date("Y-m-d"); ?></span>
								</td>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Status : </strong> <span style="color: #000000;" id="status" > <?php echo $party_name['status']; ?></span>
								</td>
								
							</tr>
							
							<tr>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Manufacturing Units : </strong>
								<span style="color: #000000;">
								<select name="Manufacturing" id="Manufacturing" class="form-control999" style="width:50%;background: #eee;border: 1px solid #ccc;height: 24px;border-radius: 14px;padding-left: 7px;" >
									<option value="Select Manufacturing">-Select Manufacturing-</option>
									
									<?php 
									$mu = "SELECT * FROM user_info where user_type='Manufacturing Units'";
									$mud = $conn->query($mu);
									while($mud_res = mysqli_fetch_array($mud))
									{
									?>
									<option value="<?php echo $mud_res['first_name']." ".$mud_res['last_name']; ?>" ><?php echo $mud_res['first_name']." ".$mud_res['last_name']; ?></option>
									<?php } ?>
									
									</select>
									</span>
								</td>
								
								
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Expire Date : </strong> 
								<span style="color: #000000;" id="expiry_date"> 
								<?php
									$date = date("Y-m-d");;
									echo date('Y-m-d', strtotime($date. ' + 10 days'));
								?></span>
								</td>
								
							</tr>
							
							<tr>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Service Name : </strong>
								<span style="color: #000000;">
								<?php 
								$service_name = mysqli_fetch_array($conn->query("SELECT order_request FROM tbl_my_schedule as mor INNER JOIN tbl_assign_schedule_to_agent as tao where mor.order_request_id = tao.order_request_id and tao.assign_order_id = '".$_GET['orid']."' "));
								echo $service_name['order_request'];
								?>
									</span>
								</td>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Product: </strong> <span style="color: #000000;">
								<?php
									echo $measurement_data['product'];
								?>
								</span>
								</td>
								
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Deposit : </strong> <span style="color: #000000;">50% Non Refundable</span>
								</td>
								
							</tr>
							
							<tr>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
									<strong>Customer : </strong>
									
									<span style="color: #000000;">
								<?php 
								echo ucfirst($party_name['first_name']." ".$party_name['last_name'])." [ "." ".$party_name['visit_address']." ]";
								?>
								
								
								</span>
								</td>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Contact No. : </strong> <span style="color: #000000;"><?php echo $party_name['contact_no']; ?></span>
								</td>
								
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								<strong>Email : </strong> <span style="color: #000000;"> <?php echo $party_name['email']; ?></span>
								</td>
							</tr>
							
							<tr>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
									<strong>Remarks : </strong>
									
									<span style="color: #000000;">
								<?php 
								echo $measurement_data['remarks'];
								?>
								</span>
								</td>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								
								</td>
								<td width="33%" height="" align="left" valign="middle" class="paddLt6 ">
								
								</td>
								
							</tr>
							
							
							</table>
						 </td>
					</tr>		
           
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
				
				if($_SESSION['user_type'] == "Admin")
				{
					
					$sql_user = "SELECT * FROM tbl_add_measurement ";
					
				}
				else{
					
					$sql_user = "SELECT * FROM tbl_add_measurement where measurement_id = '".$_GET['mid']."' and order_request_id = '".$_GET['orid']."' ";
					
				}
				
			
				 if(isset($_POST['Submit']))
				 {
				 $search=$_POST['search'];
				 if($search !='')
					{ 
					
					$sql_user = "SELECT * FROM tbl_my_schedule WHERE order_request like '".$search."%' or visit_address like '".$search."%' ";
					
					}
				}
					
					
				if($_GET['sort']==1)
				{ 
				$sql_user .=" ORDER BY location ";
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
								
                      <tr bgcolor="<?php echo $bgcolor;?>">
                        <td width="27"  align="left" valign="middle" class="paddTopBot5 paddLt6 bodrBot"><strong>S.No.</strong></td>
						<td width="47"  align="left" valign="middle" class="paddTopBot5 paddLt6 bodrBot">&nbsp;</td>
						<td width="367" align="left" class="paddLt15 paddTopBot5 bodrBot"><strong>
                         Location
                        </strong></td>
						<td width="367" align="left" class="paddLt15 paddTopBot5 bodrBot"><strong>
                          Product</strong></td>
						 <td width="667" align="left" class="paddLt15 paddTopBot5 bodrBot"><strong>
                          Qty</strong></td>
						   <td width="667" align="left" class="paddLt15 paddTopBot5 bodrBot"><strong>
                          </strong></td>
						   <td width="667" align="left" class="paddLt15 paddTopBot5 bodrBot"><strong>
                          Price</strong></td>
						   
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
                    <tr bgcolor="<?php echo $bgcolor;?>" id="<?php echo $data_user['measurement_id'];?>">
                        <td width="27"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><strong><?php echo $sr; ?></strong></td>
						<td width="47"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle">
						
							<div class="chk-option">
							<div class="checkbox-fade fade-in-primary">
							<label class="check-task">
							<input type="checkbox" id="chk<?php echo $data_user['measurement_id'];?>" name="numbers[]" value="<?php echo $data_user['measurement_id'];?>"  />
						
							<span class="cr">
							<i class="cr-icon fa fa-check txt-default"></i>
							</span>
							</label>
							</div>
							</div>
						
						
						</td>
						
						
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['location']); ?></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo ucfirst($data_user['product']); ?></td>
                       <td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo $data_user['quantity']; ?></td>
                       <td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo $data_user['quantity']." x ".$data_user['price_per_qty']; ?></td>
					   <td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><?php echo "$".$data_user['quantity'] * $data_user['price_per_qty']; ?></td>
					   
					   <td width="144"  align="center" class="paddBot11 paddTop5" valign="middle">
						
						
						<a href="javascript:void(0);" onclick="edit_price(<?php echo $_GET['orid']; ?>,<?php echo $_GET['mid']; ?>,<?php echo $data_user['quantity']; ?>);" >
						
						<img src="images/pricing.png" title="Edit Price" border="0" style="width:26px; height:26px;" />   </a>	
						
						&nbsp;
						<a href="job_details.php?id=<?php echo $data_user['measurement_id']; ?>&page=<?php echo $pageNum; ?>"><img src="images/edit1.png" title="Details View" border="0"></a>&nbsp;
						
<a href="javascript: VOID(0);" onclick="javascript:if(confirm('Are you sure you want to delete ?')){DoAction('<?php echo $data_user['measurement_id'];?>');}"><img src="images/trash.png" title="Delete" border="0"/></a></a>&nbsp;&nbsp;</td>
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
					
					
					
					 <tr>
                        <td width="27"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"><strong></strong></td>
						<td width="47"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle">
						
						</td>
						
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"></td>
						<td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"></td>
                       <td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"></td>
                       <td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle"></td>
					   <td width="367"  align="left" class="paddLt15 paddBot11 paddTop5" valign="middle">
					   
					   <?php $Quote_price = mysqli_fetch_array($result); ?>
					   
					   <strong>Product Price:</strong> 
					   <br/>
					   <strong>Work Extra:</strong>
					   <br>
					   <strong>Discount:</strong>
					   <br>
					    <strong>Sub Total:</strong> 
						<br/>
						<strong>Taxex:</strong>
						<br>
						<strong style="font-size:22px;">Grand Total:</strong>
					   
					   </td>
					   
					   <td width="144"  align="center" class="paddBot11 paddTop5" valign="middle">
						<strong><?php echo "$".$Quote_price['total_price']; ?></strong><br>
						<strong><?php echo "$".$Quote_price['work_extra_price']; ?></strong><br>
						<strong><?php echo "$".$Quote_price['discount']; ?></strong><br>
						<strong><?php echo "$".$Quote_price['sub_total']; ?></strong><br>
						<strong><?php echo "$".$Quote_price['taxex']; ?></strong><br>
						<strong style="font-size:22px;"><?php echo "$".$Quote_price['grand_total']; ?></strong><br>
						</td>
                      </tr>
					  
					
					
                  </table></div>
			    </td>
              </tr>
						<?php } ?>
			  
           
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
								
		<div>
		
		<input type="button" class="btn waves-effect waves-light hor-grd btn-grd-info " value="Print Quote" onclick="PrintDiv();">
		<input type="button" class="btn waves-effect waves-light hor-grd btn-grd-info " value="Save Quote" onclick="saveQuote(<?php echo $_GET['orid']; ?>, <?php echo $_GET['mid']; ?>);">
		</div>

								
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
