<?php
function sendmail($mailto, $from_name,$from_mail, $from_comp_name, $from_address, $subject, $message) 
{
	$uid = md5(uniqid(time()));
		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		//$header .= "Reply-To: ".$replyto."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		$header .= "This is a multi-part message in MIME format.\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$header .= $message."\r\n\r\n";
		$header .= "--".$uid."--";
	
	if (mail($mailto, $subject, $message, $header)) 
	{
	  return true;
	} 
	else 
	{
	   return false;
	}	
}

function SendReturnMail($mailto, $from_mail, $from_name, $subject, $message)
{
	$replyto = $from_mail;
	$uid = md5(uniqid(time()));
	$header = "From: ".$from_name." <".$from_mail.">\r\n";
	$header .= "Reply-To: ".$replyto."\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	$header .= "This is a multi-part message in MIME format.\r\n";
	$header .= "--".$uid."\r\n";
	$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
	$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	$header .= $message."\r\n\r\n";
	$header .= "--".$uid."--";
	if(mail($mailto, $subject, $message, $header)) {
		 return true;
	} else {
			return false;
	}
}

function MessegeBusinessAccountMail($username, $pass)
{
	$siteRoot = GetSiteRoot();
    $messege = "<center>".
    "<table width='600' border='0' cellspacing='0' cellpadding='0' style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>".
      "<tr>".
        "<td height='50' style='font-size:16px; font-weight:bold; background-image:url(".$siteRoot."images/headingbg.gif); background-position:left top; background-repeat:no-repeat;' align='left' valign='bottom'><img src='".$siteRoot."images/logo.gif' alt='LocalComicStore.com'></td>".
      "</tr>".
      "<tr>".
        "<td align='center'>".
            "<table width='95%' border='0' cellspacing='0' cellpadding='0'>".
              "<tr>".
                "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'><br>
                    Welcome to LocalComicStore.com, ".$username."<br><br>
                    Thank you for regestering for a business account on localcomicstore.com. Your account is subjected to the localcomicstore admin approval before you can login to your account.
                    <br><br>
                    Below is your login details for the localcomicstore business account:<br><br>
                    <strong>username: </strong>".$username."<br>
                    <strong>password: </strong>".$pass."<br>
                    <br><br>
                    Thanks,<br>
                    LocalComicStore Team<br><BR>
                </td>".
              "</tr>".
            "</table>".
        "</td>".
      "</tr>".
      "<tr>".
        "<td style='font-size:11px; color:#CCCCCC' align='center'>".
            "Copyright ".date("Y")." localcomicstore.com".
        "</td>".
      "</tr>".
    "</table>".
    "</center>";
	return $messege;
}

function SendNewAccountMail($name, $username, $pass)
{
	$siteRoot = GetSiteRoot();
    $messege = "<center>".
    "<table width='700' border='0' cellspacing='0' cellpadding='0' style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>".
      "<tr>".
        "<td height='50' style='font-size:16px; font-weight:bold;' align='left' valign='bottom'><img src='".$siteRoot."images/mail_header.jpg' alt='FamilyZen Geanealogy'></td>".
      "</tr>".
      "<tr>".
        "<td align='center'>".
            "<table width='95%' border='0' cellspacing='0' cellpadding='0'>".
              "<tr>".
                "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'><br>
					 Hello ".$name." ,<br>
					Welcome to FamilyZen Geanealogy.<br>
					Your user name is:  ".$username."<br />
					Your password is: ".$pass."  (you can change it next time you enter FamilyZen Geanealogy by going to 'settings' --> 'account')<br />
					Remember, FamilyZen Geanealogy is a <strong>private</strong> network that is <strong>safe</strong> and <strong>secure</strong>. Your information will only be visible to family members that are registered in FamilyZen Geanealogy.<br />
					<strong>What to do now?</strong><br /><br />
                </td>".
              "</tr>".
			  "<tr>".
			   "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px; padding-left:15px;'>".
					"<table width='100%' border='0'>".
						  "<tr>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px' valign='top'>1.&nbsp;</td>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>Keep adding family members to the tree. It’s really easy, just click “add family” on the family member’s card.</td>".
						  "</tr>".
						  "<tr>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'  valign='top'>2.&nbsp;</td>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>Invite all your relatives to join the network. They will love it! The more people that join the network the better it gets!</td>".
						  "</tr>".
						  "<tr>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px' valign='top'>3.&nbsp;</td>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>Share photos, videos, documents, ancestral information, and much more with your relatives. Together you will build a dynamic family network filled with lots of memories.</td>".
						  "</tr>".
						  "<tr>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px' valign='top'>4.&nbsp;</td>".
							"<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>Take advantage of all the other services offered: birthday calendar, message exchange, forums, comments on posted pictures, etc. An interactive family networking environment that´s fun and easy to use!</td>".
						  "</tr>".
					"</table>".
			   "</td>".
			  "</tr>".
			  "<tr>".
                "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'><br>
					You can access FamilyZen Geanealogy now from the following link:<br />
					http://www.Geanealogy.com/login?token=wpBMwp%2fCm8KFfsKmTUBZalxowoPChcKHwrM%3d<br />
					Thanks,<br>
                    FamilyZen Geanealogy Team<br><BR><br />
				</td>".
			  "</tr>".
            "</table>".
        "</td>".
      "</tr>".
      "<tr>".
        "<td style='font-size:11px; color:#CCCCCC' align='center'>".
            "Copyright ".date("Y")." FamilyZen".
        "</td>".
      "</tr>".
    "</table>".
    "</center>";
	$subject = "Welcome to Genealogy!";
	$mailto = $username;
	//return sendmail($mailto, $subject, $messege);
}

function MessegeForgetPassword($name, $username, $pass)
{
	$siteRoot = GetSiteRoot();
    $messege = "<center>".
    "<table width='600' border='0' cellspacing='0' cellpadding='0' style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>".
      "<tr>".
        "<td height='50' style='font-size:16px; font-weight:bold;' align='left' valign='bottom'><img src='".$siteRoot."images/mail_header.jpg' alt='FamilyZen Geanealogy'></td>".
      "</tr>".
      "<tr>".
        "<td align='center'>".
            "<table width='95%' border='0' cellspacing='0' cellpadding='0'>".
              "<tr>".
                "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'><br>
                    Hello ".$name.",<br><br>
                    You are receiving this notification because you have requested for your account password on FamilyZen Geanealogy.<br /><br />
                    Below is your login details for your FamilyZen Geanealogy account:<br><br>
                    <strong>username: </strong>".$username."<br>
                    <strong>password: </strong>".$pass."<br>
                    <br><br>
                    Thanks,<br>
                    FamilyZen Geanealogy Team<br><BR>
                </td>".
              "</tr>".
            "</table>".
        "</td>".
      "</tr>".
      "<tr>".
        "<td style='font-size:11px; color:#CCCCCC' align='center'>".
            "Copyright ".date("Y")." FamilyZen".
        "</td>".
      "</tr>".
    "</table>".
    "</center>";
	return $messege;
}


function SendContactMail($email, $name, $from_mail , $comp_name, $address,$subject, $message)
{ 
	$siteRoot = "Taneries Faridabad"; 
	//$siteRoot = "http:\\adobindia.com";
    $message = "<center>".
    "<table width='600' border='0' cellspacing='0' cellpadding='0' style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>".
      "<tr>".
        "<td height='50' style='font-size:16px; font-weight:bold;' align='left' valign='bottom'><img src='".$siteRoot."images/mail_header.jpg' alt='Taneries Faridabad'></td>".
      "</tr>".
      "<tr>".
        "<td align='center'>".
            "<table width='95%' border='0' cellspacing='0' cellpadding='0'>".
              "<tr>".
                "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'><br>
                    Hello,<br><br>
                    We have a contact request from the Taneries Faridabad contact us page. The details are shown below:<br />
                    <br />
                    <strong>Name: </strong>".$name."<br>
                    <strong>Email: </strong>".$from_mail."<br>
					<strong>Type of Subject: </strong>".$subject."<br>
					<strong>School Name: </strong>".$comp_name."<br>
					<strong>Address: </strong>".$address."<br>
                    <br>
                    <br>
                    Thanks<br>
Taneries Faridabad Team<br>
                </td>".
              "</tr>".
            "</table>".
        "</td>".
      "</tr>".
      "<tr>".
        "<td style='font-size:11px; color:#CCCCCC' align='center'>".
            "Copyright ".date("Y")." Taneries Faridabad.".
        "</td>".
      "</tr>".
    "</table>".
    "</center>";
	//echo $messege;

	//$subject = "Contact Messege from".$name.".";
	//$mailto = "ashishenterprises1362@gmail.com";
	//$mailto = "adobindia@gmail.com";
		
	return sendmail($email, $name, $from_mail, $comp_name, $address, $subject, $message); 
}

function GetTitleRequestMessege($title, $name, $email)
{
	$siteRoot = GetSiteRoot();
  $messege = "<center>".
    "<table width='600' border='0' cellspacing='0' cellpadding='0' style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>".
      "<tr>".
        "<td height='50' style='font-size:16px; font-weight:bold; background-image:url(".$siteRoot."images/headingbg.gif); background-position:left top; background-repeat:no-repeat;' align='left' valign='bottom'><img src='".$siteRoot."images/logo.gif' alt='LocalComicStore.com'></td>".
      "</tr>".
      "<tr>".
        "<td align='center'>".
            "<table width='95%' border='0' cellspacing='0' cellpadding='0'>".
              "<tr>".
                "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'><br>
                    Hello, <br><br>I am ".$name.", I am intrested in the comic title available at your store. Please send me a price quote for the title. The title details are mentioned below:<br><br>
										<strong>Title: </strong>".$title."<br />
										<br /><br />
                    Thanks,<br>
                    ".$name."<br>
										".$email."<br><br>
                </td>".
              "</tr>".
            "</table>".
        "</td>".
      "</tr>".
      "<tr>".
        "<td style='font-size:11px; color:#CCCCCC' align='center'>".
            "Copyright ".date("Y")." localcomicstore.com".
        "</td>".
      "</tr>".
    "</table>".
    "</center>";
	return $messege;

}

function sendOrderMail($storeID, $subscriber_id, $store_title_id)
{
	$sql_comic = "SELECT * FROM tbl_store_titles left join tbl_comic on tbl_comic.id = tbl_store_titles.comic_id WHERE tbl_store_titles.id = '".$store_title_id."'";
	$result_comic = mysql_query($sql_comic);
	$row_comic = mysql_fetch_array($result_comic);
	$seriesGroup = GetSeriesGroupTitle($row_comic['series_group_id']);
	$series = GetSeriesTitle($row_comic['series_id']);
	$title = $row_comic['comic_title'];
	$issue = $row_comic['issue_no'];
	
	$sql_subscriber = "SELECT * FROM tbl_subscriber WHERE id = '".$subscriber_id."'";
	$result_subs = mysql_query($sql_subscriber);
	$row_subs = mysql_fetch_array($result_subs);
	$sub_name = ucwords(trim($row_subs['subscriber_first_name']." ".$row_subs['subscriber_last_name']));
	$sub_email = $row_subs['subscriber_email'];
	
	$sql_stores = "SELECT * FROM tbl_stores WHERE id = '".$storeID."'";
	$result_stores = mysql_query($sql_stores);
	$row_stores = mysql_fetch_array($result_stores);
	$store_name = $row_stores['store_name'];
	$store_address = $row_stores['store_address']." ".$row_stores['store_address2']."<br>".$row_stores['store_city'].", ".$row_stores['store_state']." ".$row_stores['store_zip'];
	$store_email = $row_stores['store_contact_email'];
	
	
	
	$siteRoot = GetSiteRoot();
	
  $messege = "<center>".
    "<table width='600' border='0' cellspacing='0' cellpadding='0' style='font-family:Arial, Helvetica, sans-serif; font-size:13px'>".
      "<tr>".
        "<td height='50' style='font-size:16px; font-weight:bold; background-image:url(".$siteRoot."images/headingbg.gif); background-position:left top; background-repeat:no-repeat;' align='left' valign='bottom'><img src='".$siteRoot."images/logo.gif' alt='LocalComicStore.com'></td>".
      "</tr>".
      "<tr>".
        "<td align='center'>".
            "<table width='95%' border='0' cellspacing='0' cellpadding='0'>".
              "<tr>".
                "<td style='font-family:Arial, Helvetica, sans-serif; font-size:13px'><br>
                    Hello, <br><br>".$sub_name."<br><br>Your title described below has been dispatched,<br><br>
                    <strong>Series Group: </strong>".$seriesGroup."<br />
										<strong>Series: </strong>".$series."<br />
										<strong>Title: </strong>".$title."<br />
										<strong>Issue: </strong>".$issue."<br />
										<br /><br />
                    Thanks,<br>
                    ".$store_name."<br>
										".$store_address."<br><br><br>
                </td>".
              "</tr>".
            "</table>".
        "</td>".
      "</tr>".
      "<tr>".
        "<td style='font-size:11px; color:#CCCCCC' align='center'>".
            "Copyright ".date("Y")." localcomicstore.com".
        "</td>".
      "</tr>".
    "</table>".
    "</center>";
		
	$from_mail = $store_email;
	$from_name = $store_name;
	$replyto = $store_email;
	$subject = "Your subscription order is dispatched.";
	$mailto = $sub_email;

	$uid = md5(uniqid(time()));
	$header = "From: ".$from_name." <".$from_mail.">\r\n";
	$header .= "Reply-To: ".$replyto."\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	$header .= "This is a multi-part message in MIME format.\r\n";
	$header .= "--".$uid."\r\n";
	$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
	$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	$header .= $messege."\r\n\r\n";
	$header .= "--".$uid."--";
	if(mail($mailto, $subject, $messege, $header)) {
		 return true;
	} else {
			return false;
	}
}
?>