<table width="292" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="9" align="left" valign="top"><img src="images/box_T_L.gif" width="9" height="41" /></td>
                <td align="left" valign="middle" class="txt14blk bg_box">Announcement <span class="txt14red">Result</span></td>
                <td width="9" align="left" valign="top"><img src="images/box_T_R.gif" width="9" height="41" /></td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="top" class="bodrgray_right bodrgray_left"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr class="body_box_bg">
                      <td height="270" align="left" valign="top">
				
				<div style="padding-top:20px;"><br/>
				<?php 
				$query	=	$db->query("select * from tbl_result order by course limit 0,7");
			
				while($result	=	$db->fetch_array($query))
				{
				?>
			 
				<div style="padding-left:20px;">
					 <a href="resultdetails.php?id=<?php echo $result['id'];?>" class="lnk12blk">
					  <img src="images/arrow-image.gif" border="0" style="vertical-align:middle;" /> <?php echo ucfirst($result['course']); ?>
					</a> </div>
			 
			   <?php 
				}
				?>
				</div></td>
                    </tr>
					<tr>
								<td align="right" valign="top"><a href="result.php"><img src="images/view_all.gif" width="62" height="23" hspace="10" vspace="3" border="0" /></a></td>
							</tr>
                </table></td>
              </tr>
			  
              <tr>
                <td width="9" height="6" align="left" valign="top"><img src="images/box_B_L.gif" width="9" height="6" /></td>
                <td width="100%" align="left" valign="top" class="bodrgray_bot"><img src="images/space.gif" width="1" height="1" /></td>
                <td width="9" height="6" align="left" valign="top"><img src="images/box_B_R.gif" width="9" height="6" /></td>
              </tr>
            </table>