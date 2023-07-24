<?php
error_reporting(0);
ob_start();
session_start();
include('../include/config.php');

//echo $_SESSION['adminusername'];

//echo $_SESSION['user_type'].'++++++++++++++';

if($_SESSION['loggedIn_user_id']=="")
{
	header("location:../index.php");
}	


if($_SESSION['adminusername']!="")
{
		$query = "SELECT first_name,last_name,profile_image  FROM user_info WHERE user_id ='".$_SESSION['loggedIn_user_id']."'  ";

		$result = $conn->query($query) or die ("table not found");
		
		$results = mysqli_fetch_array($result);	
		
		
		if($results['profile_image'] !="")
		{
			$profile_DP = $results['profile_image'];
		}
		else
		{
			$profile_DP = "avatar-4.jpg";
		}
		
}	


if($_SESSION['loggedIn_user_id']==2)
{
	$logout_url = 'logout_admin.php';
}
else{
	$logout_url = 'logout.php';
}

		
?>


					<nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
						 
                              <div class="main-menu-header" style="padding:25px 0 0px 0;">
							   <div style="margin:4px 0 0px 0;"></div>
							  <a href="edit_user_info.php?id=<?php echo $_SESSION['loggedIn_user_id']; ?>"><img class="img-80 img-radius" src="../UPLOAD_file/<?php echo $profile_DP; ?>" alt="User"></a>
                                  
                                  <div class="user-details">
                                      <span id="more-details"><?php echo $results['first_name']." ".$results['last_name']; ?><i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
									  
                                          <a href="user_details.php?id=<?php echo $_SESSION['loggedIn_user_id']; ?>"><i class="ti-user"></i>View Profile</a>
                                          <a href="<?php echo $logout_url; ?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          
                        
						     <div class="pcoded-navigation-label" data-i18n="nav.category.forms" style="font-size: 17px;background: #eee;border-bottom: 2px solid #448aff;margin: 0 0 10px 0;" > </div>
                          <ul class="pcoded-item pcoded-left-item">
						  
						  <?php  if($_SESSION['loggedIn_user_id'] != 2 && $_SESSION['user_type'] != 'Admin'){ ?>
						  <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Profile</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="complete_profile.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> Complete Profile</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									 
								  </ul> 
							</li>
						  <?php } ?>
							
							<?php if($_SESSION['user_type']=="tutor"){ ?>
							
							
							 <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Tuition Jobs</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="view_tuition_jobs.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> View Tuition Jobs</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
									 
								  </ul> 
							</li>
							<?php } ?>
							
							<?php if($_SESSION['user_type']=="student"){ ?>
							
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Student</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="tutor_search.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> Tutor Search</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  <li class=" ">
                                          <a href="post_requirement.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i>Add Post Requirement</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
									   <li class=" ">
                                          <a href="view_student_post_requirement.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i>View Post Requirement</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
									   <li class="">
                                          <a href="my_bookings.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i>My Bookings</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
									  <li class="">
                                          <a href="rate/index.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i>Rating My Tutor </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
									 
								  </ul> 
							</li>
							
								
							<?php } ?>
							
						  <?php if($_SESSION['loggedIn_user_id']==2 && $_SESSION['user_type']=='Admin'){ ?>
						  
						  <li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage School Levels</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="add_school_levels.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> Add School Levels</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									   <li class=" ">
                                          <a href="view_school_levels.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> View School Levels </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									 
								  </ul> 
							</li>
                              
                              
								
								
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Grade</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="add_grade.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> Add Grade</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
                                      <li class=" ">
                                          <a href="view_grade.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> View Grade </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
									  
									  
									  
								  </ul> 
								</li>
								
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Subjects</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
								  
								   <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="add_subjects.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> Add Subjects</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
                                      <li class=" ">
                                          <a href="view_subjects.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> View Subjects </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
									  
									  
									  
								  </ul> 
								</li>
								
								
								
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Stream</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="add_stream.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> Add Stream</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
                                      <li class=" ">
                                          <a href="view_stream.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> View Stream </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
									  
									  
									  
								  </ul> 
								</li>
								
								
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Qualification</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
								  
								   <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="add_qualification.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> Add Qualification</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
                                      <li class=" ">
                                          <a href="view_qualification.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> View Qualification </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
									  
									  
									  
								  </ul> 
								</li>
								
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Tutors</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
								  
								   <ul class="pcoded-submenu">
									 
                                      <li class=" ">
                                          <a href="view_tutor.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> View Tutors </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
									  
								  </ul> 
								</li>
								
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage Students</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
								  
								   <ul class="pcoded-submenu">
									 
                                      <li class=" ">
                                          <a href="view_students.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> View Students </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
									  
								  </ul> 
								</li>
								
								
								
								
								
						  <?php } ?>
								
							
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Chat Room</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                 
								   <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="view_client_messages.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> View Client Messages</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
									 
								  </ul> 
								  
								  <ul class="pcoded-submenu">
									  <li class="">
                                          <a href="view_received_messages.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> View Received Messages</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
								  </ul>
								  <ul class="pcoded-submenu">
									  <li class=" ">
                                          <a href="view_send_messages.php?user_id=<?php echo $_SESSION['loggedIn_user_id']; ?>&user_type=<?php echo $_SESSION['user_type']; ?>" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><i class="ti-angle-right" style="font-size: 10px;"></i> View Send Messages</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>	
									  
								  </ul>
								  
								  
								</li>	
								
								
								
								<li class="pcoded-hasmenu">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Manage User Info</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
								  
								   <ul class="pcoded-submenu">
									 
                                      <li class=" ">
                                          <a href="view_user_info.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"> <i class="ti-angle-right" style="font-size: 10px;"></i> View All Users </span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
									  
								  </ul> 
								</li>
								
								
								
								
							</ul> 	

								
                         
                      </div>
                  </nav>



