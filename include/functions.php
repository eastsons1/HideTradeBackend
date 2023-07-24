<?php

/*To Show the Success Message when data is inserted successfully*/
function ShowSuccess($message)
{
	$out = "<tr><td align='center' valign='middle' colspan='2' class='paddTop10 paddRt14 paddBot11' height='30'><div class='OKmessegeBody'>".$message."</div></td></tr>";
	return $out;
}

/*To Show the Error Message when data is not inserted successfully*/
function ShowError($message)
{
	$out = "<tr><td align='center' valign='middle' colspan='2' class='paddTop10 paddRt14 paddBot11' height='30'><div class='ErrormessegeBody'>".$message."</div></td></tr>";
	return $out;
}

/*To get the site title for the admin*/
function getAdminSiteTitle()
{
	$db = new MySqlDb;
	$sql_admin = "SELECT admin_title FROM tbl_preferences WHERE id='1'";
	$result_admin = $db->query($sql_admin);
	$row_admin = $db->fetch_array($result_admin);
	return $row_admin['admin_title'];	
}

/*To get the site title for the website*/
function getWebSiteTitle()
{
	$db = new MySqlDb;
	$sql_admin = "SELECT website_title FROM tbl_preferences WHERE id='1'";
	$result_admin = $db->query($sql_admin);
	$row_admin = $db->fetch_array($result_admin);
	return $row_admin['website_title'];	
}

/********************************************************************************************************************/
/*To get the title, keyword and description for the website of each page with the help of page name*/
function getSeoContent($page)
{
	$db = new MySqlDb;
	$sql_admin = "SELECT * FROM tbl_seo WHERE file_name='".$page."'";
	$result_admin = $db->query($sql_admin);
	$row_admin = $db->fetch_array($result_admin);
	return $row_admin;	
}
/********************************************************************************************************************/
/*To get the description for the website of each page with the help of page name
function getWebSiteDescription($page)
{
	$db = new MySqlDb;
	$sql_admin = "SELECT description FROM tbl_seo WHERE file_name='1'";
	$result_admin = $db->query($sql_admin);
	$row_admin = $db->fetch_array($result_admin);
	return $row_admin['website_des'];	
}*/

/*To get the email-id of the admin on which the email would be sent to admin*/
function GetAdminEmail()
{
	$db = new MySqlDb;
	$sql_admin = "SELECT emailAdd_sent_out FROM tbl_preferences WHERE id='1'";
	$result_admin = $db->query($sql_admin);
	$row_admin = $db->fetch_array($result_admin);
	return $row_admin['emailAdd_sent_out'];
}

/*To get the name of the admin */
function GetSenOutEmailName()
{
	$db = new MySqlDb;
	$sql = "SELECT name_email_sender FROM tbl_preferences WHERE id='1'";
	$result = $db->query($sql);
	$row = $db->fetch_array($result);
	return $row['name_email_sender'];
}

/*To get the root path of the website*/
function GetSiteRoot()
{
	$db = new MySqlDb;
	$sql = "SELECT site_base_url FROM tbl_preferences WHERE id='1'";
	$result = $db->query($sql);
	$row = $db->fetch_array($result);
	return $row['site_base_url'];
}

/*To get the number of rows in the view pages in admin*/
function GetNumRow()
{
	$db = new MySqlDb;
	$sql = "SELECT record_per_page FROM tbl_preferences WHERE id='1'";
	$result = $db->query($sql);
	$row = $db->fetch_array($result);
	return $row['record_per_page'];
}

/*To get the number of rows in the view pages in frontend*/
function GetNumRowFront()
{
	$db = new MySqlDb;
	$sql = "SELECT record_per_page_frontend FROM tbl_preferences WHERE id='1'";
	$result = $db->query($sql);
	$row = $db->fetch_array($result);
	return $row['record_per_page_frontend'];
}

function cleanText($text)
{
	$db = new MySqlDb;
	$title=$text;
	$special = array('"','\'');
	$clean_title =  str_replace($special,' ',$title);
	$special = array('/','!','&','*', '"', ',', ':', ';', '\'', '#', '?', '(', ')', '[', ']', ' ', '@', '%', '!', '*', '+', '-','.');
	$striped_title =  str_replace($special,'-',$title);
	$striped_title =  str_replace("--",'-',$striped_title);
	return $striped_title;
}

/*Date Format*/
function DateFormat($date)
{
	$db = new MySqlDb;
	$newDate = date("j F,Y",strtotime($date));
	return $newDate;
}

function DateFormat2($date)
{
	$db = new MySqlDb;
	$newDate = date("d/m/Y",strtotime($date));
	return $newDate;
}

function DateFormatWithTime($date)
{
	$db = new MySqlDb;
	$newDate = date("d/m/Y, g:i a",strtotime($date));
	return $newDate;
}

function isUserNameAvailable($username)
{
	$db = new MySqlDb;
	$qry = "select username from tbl_user where username='$username'";
	$qry_run = $db->query($qry);
	$num_row = $db->num_rows($qry_run);
	if($num_row > 0)
		return false;
	else
		return true;	
}

function isEmailAvailable($useremail)
{
	$db = new MySqlDb;
	$qry = "select useremail from tbl_user where useremail='$useremail'";
	$qry_run = $db->query($qry);
	$num_row = $db->num_rows($qry_run);
	if($num_row > 0)
		return false;
	else
		return true;	
}

function isValidEmail($email)
{
	if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email))
	{
		#echo "Your email is ok.";
		return true;
	}
	else
	{
		#echo "Wrong email address format";
		return false;
	}
}

function SelectCategory($id)
{
	$db = new MySqlDb;
	$qr_cat = "select * from tbl_categories";
	$cat_run = $db->query($qr_cat);
	while($de_res = $db->fetch_array($cat_run))
	{
		if($id == $de_res['id'])
		{
			echo "<option value='".$de_res['id']."' selected>".$de_res['category']."</option>";
		}
		else
		{
			echo "<option value='".$de_res['id']."'>".$de_res['category']."</option>";
		}
	}	
}

function SelectFAQCategory($id)
{
	$db = new MySqlDb;
	$qr_cat = "select * from tbl_faq_category";
	$cat_run = $db->query($qr_cat);
	while($de_res = $db->fetch_array($cat_run))
	{
		if($id == $de_res['id'])
		{
			echo "<option value='".$de_res['id']."' selected>".$de_res['category']."</option>";
		}
		else
		{
			echo "<option value='".$de_res['id']."'>".$de_res['category']."</option>";
		}
	}	
}


function SelectTechnology($id)
{
	$db = new MySqlDb;
	$sql = "select * from tbl_technology"; 
	$sql_cat = $db->query($sql);
	$icount=0;
	while($row_cat = $db->fetch_array($sql_cat))
	{
		$icount++;
		if($icount == '1')
		{
			echo "<tr>";
		}
		if($id==$row_cat['id'])
		{
			echo "<td><input type='checkbox' name='technology[]' id='technology' value=".$row_cat['id']." checked/>".$row_cat['technology']."</td>";
		}
		else
		{
			echo "<td><input type='checkbox' name='technology[]' id='technology' value=".$row_cat['id']." />".$row_cat['technology']."</td>";
		}
		if($icount=='4')
		{
			echo "</tr>";
			$icount=0;
		}
	}

	for($j=0; $j<4-$icount; $j++)
	{
		echo "<td>&nbsp;</td>";
	}
	if($icount != 4)
	{
		echo "</tr>";
	}
}


function GetCategory($id)
{
	$db = new MySqlDb;
	$qry = "select category from tbl_categories where id = '".$id."'";
	$qry_run = $db->query($qry);
	$qry_res = $db->fetch_array($qry_run);
	return $qry_res['category'];
}

/*To get status of the extractor*/
function GetStatus($id)
{
	$db = new MySqlDb;
	if($id=='1')
	{
		$status = "Active";
	}
	else
	{
		$status = "DeActive";
	}
	return $status;
}

function GetContactInfo($type)
{
	$db = new MySqlDb;
	$qry = "select * from tbl_email_template where email_type = '".$type."'";
	$qry_run = $db->query($qry);
	$qry_res = $db->fetch_array($qry_run);
	return $qry_res;
}

function GetFaqCategory($cat_id)
{
	$db = new MySqlDb;
	$qry = "select * from tbl_faq_category where id = '".$cat_id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['category'];
}

function SelectCountry($id)
{
	$db = new MySqlDb;
	$qr_cat = "select * from tbl_country";
	$cat_run = $db->query($qr_cat);
	while($de_res = $db->fetch_array($cat_run))
	{
		if($id == $de_res['id'])
		{
			echo "<option value='".$de_res['id']."' selected>".$de_res['country']."</option>";
		}
		else
		{
			echo "<option value='".$de_res['id']."'>".$de_res['country']."</option>";
		}
	}	
}

function GetCountry($id)
{
	$db = new MySqlDb;
	$qry = "select * from tbl_country where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['country'];
}

function GetLinkName($id)
{
	$db = new MySqlDb;
	$qry = "select link_text from tbl_menu_link where link_id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['link_text'];
}

function GetParentLink($id)
{
	$db = new MySqlDb;
	$qr_cat = "select * from tbl_menu_link where parent_link_id='0'";
	$cat_run = $db->query($qr_cat);
	while($de_res = $db->fetch_array($cat_run))
	{
		if($id == $de_res['link_id'])
		{
			echo "<option value='".$de_res['link_id']."' selected>".$de_res['link_text']."</option>";
		}
		else
		{
			echo "<option value='".$de_res['link_id']."'>".$de_res['link_text']."</option>";
		}
	}	
}


function GetPageName($file)
{
	$db = new MySqlDb;
	$qr_cat = "select link_file_name from tbl_menu_link";
	$cat_run = $db->query($qr_cat);
	while($de_res = $db->fetch_array($cat_run))
	{
		if($file == $de_res['link_file_name'])
		{
			echo "<option value='".$de_res['link_file_name']."' selected>".$de_res['link_file_name']."</option>";
		}
		else
		{
			echo "<option value='".$de_res['link_file_name']."'>".$de_res['link_file_name']."</option>";
		}
	}	
}

function GetHomeLinkID()
{
	$db = new MySqlDb;
	$sql = "Select link_id FROM tbl_menu_link WHERE lcase(link_text)='home'";
	$result = $db->query($sql);
	if($db->num_rows($result) > 0)
	{
		$rows = $db->fetch_array($result);
		return $rows['link_id'];
	}
	else
	{
		return 0;
	}
}

function SelectDate($id)
{
	$db = new MySqlDb;
	for($i=1;$i<=31;$i++)
	{
		if($id == $i)
		{
			echo "<option value='".$i."' selected>".$i."</option>";
		}
		else
		{
			echo "<option value='".$i."'>".$i."</option>";
		}
	}	
}

function SelectMonth($id)
{
	$db = new MySqlDb;
	$month_name = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	for($i=1;$i<=count($month_name);$i++)
	{
		if($id == $i)
		{
			echo "<option value='".$i."' selected>".$month_name[$i-1]."</option>";
		}
		else
		{
			echo "<option value='".$i."'>".$month_name[$i-1]."</option>";
		}
	}	
}

function SelectYear($id)
{
	$db = new MySqlDb;
	for($y = 1900; $y <= date("Y"); $y++)
	{
		if($id == $y)
		{
			echo "<option value='".$y."' selected>".$y."</option>";
		}
		else
		{
			echo "<option value='".$y."'>".$y."</option>";
		}
	}
}

function GetAboutUsContent($id)
{
	$db = new MySqlDb;
	$qry = "select * from tbl_static_pages where page_name = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['content'];
}

function GetUserTypeById($id)
{
	$db = new MySqlDb;
	$qry = "select user_type from tbl_register where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['user_type'];
}

function GetUserImageName($id)
{
	$db = new MySqlDb;
	$qry = "select file_name from tbl_register where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['file_name'];
}

function GetTermsContent($id)
{
	$db = new MySqlDb;
	$qry = "select * from tbl_static_pages where page_name = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['content'];
}

function SelectUser($id)
{
	$db = new MySqlDb;
	$qr_cat = "select id, email from tbl_register";
	$cat_run = $db->query($qr_cat);
	while($de_res = $db->fetch_array($cat_run))
	{
		if($id == $de_res['id'])
		{
			echo "<option value='".$de_res['id']."' selected>".$de_res['email']."</option>";
		}
		else
		{
			echo "<option value='".$de_res['id']."'>".$de_res['email']."</option>";
		}
	}	
}

function SelectNewsCategory($id)
{
	$db = new MySqlDb;
	$qr_cat = "select * from tbl_news_category";
	$cat_run = $db->query($qr_cat);
	while($de_res = $db->fetch_array($cat_run))
	{
		if($id == $de_res['id'])
		{
			echo "<option value='".$de_res['id']."' selected>".$de_res['news_category']."</option>";
		}
		else
		{
			echo "<option value='".$de_res['id']."'>".$de_res['news_category']."</option>";
		}
	}	
}

function GetUserNameById($id)
{
	$db = new MySqlDb;
	$qry = "select email from tbl_register where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['email'];
}

function GetNewsCategoryById($id)
{
	$db = new MySqlDb;
	$qry = "select * from tbl_news_category where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['news_category'];
}

function GetVideoTextFile($id)
{
	$db = new MySqlDb;
	$qry = "select video_file, text_file from tbl_article where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res;
}

function GetUserName($id)
{
	$db = new MySqlDb;
	$qry = "select first_name, last_name from tbl_register where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return ucfirst($res['first_name'])." ".ucfirst($res['last_name']);
}

function GetThumbsUpPercentage($id)
{
	$db = new MySqlDb;
	$qry = "select thumbs_up, thumbs_down from tbl_blog where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	if($res['thumbs_up'] =='0' && $res['thumbs_down'] == '0')
	{
		$result_rate = "0";	
	}
	else
	{
		$total = $res['thumbs_up'] + $res['thumbs_down'];
		$thumbs_up = ($res['thumbs_up']/$total) * 100;
		$result_rate = round($thumbs_up);
	}
	return $result_rate;
}

function GetThumbsDownPercentage($id)
{
	$db = new MySqlDb;
	$qry = "select thumbs_up, thumbs_down from tbl_blog where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	if($res['thumbs_up'] =='0' && $res['thumbs_down'] == '0')
	{
		$result_rate = "0";	
	}
	else
	{
		$total = $res['thumbs_up'] + $res['thumbs_down'];
		$thumbs_down = ($res['thumbs_down']/$total) * 100;
		$result_rate = round($thumbs_down);
	}
	return $result_rate;
}

function GetSessionId($id)
{
	$db = new MySqlDb;
	$qry = "select session_id from tbl_blog where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['session_id'];
}

function GetCommentCount($id)
{
	$db = new MySqlDb;
	$qry = "select count(*) as comment_count from tbl_comment where article_id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['comment_count'];
}

function GetUserImage($id)
{
	$db = new MySqlDb;
	$qry = "select file_name from tbl_register where id = '".$id."'";
	$qry_res = $db->query($qry);
	$res = $db->fetch_array($qry_res);
	return $res['file_name'];
}


#################Course List####################
function GetCourseList()
{
	$db = new MySqlDb;
	$qr_cat = "select * from tbl_course order by course";
	$cat_run = $db->query($qr_cat);
    echo "<option value=''>Select course</option>\n";

	while($de_res = $db->fetch_array($cat_run))
	{
		if($de_res['course']!="")
		{
			echo "<option value='".$de_res['course']."' >".$de_res['course']."</option>";
		}
		
	}	
}



###################

function currentYear($id)
{
	$db = new MySqlDb;
	$cyear	=	date("Y");
	 echo "<option value=''>Year</option>\n";
	for($y = $cyear; $y <= 2050; $y++)
	{
		if($id == $y)
		{
			echo "<option value='".$y."' selected>".$y."</option>";
		}
		else
		{
			echo "<option value='".$y."'>".$y."</option>";
		}
	}
}



?>
