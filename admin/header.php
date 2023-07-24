<?php
error_reporting(0);
set_time_limit(0);
ob_start();
session_start();

//echo $_SESSION['adminusername'];

///die();

if($_SESSION['adminusername']!="")
{	
?>
	<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<tr>
    <td height="77" align="center" valign="top"><table width="101%" height="77" border="0" cellpadding="0" cellspacing="0">
      <tr>
     
         <td width="81%" align="left" valign="middle" class="textadminheader"><img src="images/header_logo.png" style="width: 4%;margin: 0 0 0 15px;">
			</td>
        <td width="19%" align="right" valign="middle" class="paddRt">
		<?php 
		//if($_SESSION['adminusername']!='')
		//{
		?>
		<table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="middle"><img src="images/logoutlt.gif" width="7" height="38" /></td>
            <td align="center" class="bottonbg paddRtLt13" valign="middle">
            <a href="logout.php" class="lik12"><strong>Logout</strong></a></td>
            <td align="center" valign="middle"><img src="images/logoutrt.gif" width="7" height="38" /></td>
          </tr>
        </table>
        <?php
		//} 
		?>
		</td>
      </tr>
    </table></td>
  </tr>
  
<?php 

}
else{ 

	

?>
<script type="text/javascript">
//window.location.href="https://refuel.site/projects/Sarabella/admin/index.php";
</script>

<?php  
//ob_end_flush(); 

} 
?>
 