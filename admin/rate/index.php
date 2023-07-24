<?php
error_reporting(0);
ob_start();	
session_start(); 
//include('../include/config.php');
//include("../include/functions.php");
//$db = new MySqlDb;


include "config.php";

?>
<html>
    <head>
        <title>5 Star Rating </title>
		
        <!-- CSS -->
        <link href="style.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
       
 <link href='font-awesome.min.css' rel='stylesheet' type='text/css'>
       
	   
        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');

                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var postid = split_id[1];  // postid
//alert(postid);
                        // AJAX Request
                        $.ajax({
                            url: 'rating_ajax.php',
                            type: 'post',
                            data: {postid:postid,rating:value},
                            dataType: 'json',
                            success: function(data){
                                // Update average
                                var average = data['averageRating'];
                                $('#avgrating_'+postid).text(average);
                            }
                        });
                    }
                }
            });
        });
      
        </script>
    </head>
    <body>
        <div class="content">
            <div class="header">
                        <h2><strong>Rating</strong> My Tutors  </h2>
                        
                    </div>
					
            <?php
                $userid = $_SESSION['loggedIn_user_id'];
				
			 $current_date1 = date('d-m-Y');
				
			 $current_date = strtotime($current_date1);
				
				//echo '<br>';
				
				 $query2 = "SELECT bookt.booked_date FROM user_info as uinfo INNER JOIN booked_tutor as bookt ON uinfo.user_id=bookt.booked_to_user_id WHERE bookt.booked_by_user_id = '".$_SESSION['loggedIn_user_id']."'  ";
				
				 $result2 = mysqli_fetch_array(mysqli_query($con,$query2));
				
				 $old_date = strtotime($result2['booked_date']);
				
				
				if($current_date > $old_date)
				{
					//echo $result2['booked_date'].'yes';
				}
				else
				{
					//echo $result2['booked_date'].'No';
				}
				
				
				 $query = "SELECT * FROM user_info as uinfo INNER JOIN booked_tutor as bookt ON uinfo.user_id=bookt.booked_to_user_id WHERE bookt.booked_by_user_id = '".$_SESSION['loggedIn_user_id']."' and bookt.booked_date <>  '".$current_date1."' ";
				
               // $query = "SELECT * FROM user_tutor_info as tinfo INNER JOIN user_info as uinfo ON tinfo.user_id=uinfo.user_id";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    $postid = $row['user_id'];
                    $title = $row['first_name']." ".$row['last_name'];
                    $content = $row['qualification'];
                   // $link = $row['link'];

                    // User rating
                    $query = "SELECT * FROM post_rating WHERE postid=".$postid." and userid=".$userid;
                    $userresult = mysqli_query($con,$query) or die(mysqli_error());
                    $fetchRating = mysqli_fetch_array($userresult);
                    $rating = $fetchRating['rating'];

                    // get average
                    $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
                    $avgresult = mysqli_query($con,$query) or die(mysqli_error());
                    $fetchAverage = mysqli_fetch_array($avgresult);
                    $averageRating = $fetchAverage['averageRating'];

                    if($averageRating <= 0){
                        $averageRating = "No rating yet.";
                    }
            ?>
                    <div class="post">
                        <h2><?php echo $title; ?></h2>
                        <div class="post-text">
                            <?php echo $content; ?>
                        </div>
                        <div class="post-action">
                            <!-- Rating -->
                            <select class='rating' id='rating_<?php echo $postid; ?>' data-id='rating_<?php echo $postid; ?>'>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="5" >5</option>
                            </select>
                            <div style='clear: both;'></div>
                            Average Rating : <span id='avgrating_<?php echo $postid; ?>'><?php echo $averageRating; ?></span>

                            <!-- Set rating -->
                            <script type='text/javascript'>
                            $(document).ready(function(){
                                $('#rating_<?php echo $postid; ?>').barrating('set',<?php echo $rating; ?>);
                            });
                            
                            </script>
                        </div>
                    </div>
            <?php
                }
            ?>

        </div>

        
    </body>
</html>
