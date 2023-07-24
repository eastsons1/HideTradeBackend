<?php 
error_reporting(0);
session_start();
include('inc/header.php');
include('include/config.php');


?>

<title>Study Lab</title>
<script src="js/rating.js"></script>
<link rel="stylesheet" href="css/style_rating.css">


<?php include('inc/container.php');?>

<div class="container">		
	<h2>Tannaries/Agents Rating & Review</h2>
	<?php
	include 'inc/menu.php';
	include 'class/Rating.php';
	
	
	
	$rating = new Rating();
	$itemList = $rating->getItemList();
	
	//print_r($rating);
	
	foreach($itemList as $item){
		$average = $rating->getRatingAverage($item["enquiry_id"]);
		
		
		//print_r($item);
		
		
		$show_user_list_sql = "select * from user_info where user_id  = '".$item['enquiry_user_type_id']."' or user_id  = '".$item['search_by_user_id']."' ";
		$show_user_list_sql_run = $conn->query($show_user_list_sql) or die ("table not found");
		while($show_user_list_Record = mysqli_fetch_array($show_user_list_sql_run))
		{
			
			if($show_user_list_Record['user_id']==$item['search_by_user_id'])
			{
				$enquiry_message = '<strong>Enquiry Message:</strong> '.$item['enquiry_message'];
			}
	?>	
	<div class="row">
		<div class="col-sm-2" style="width:150px">
			<img class="product_image" src="UPLOAD_file/<?php echo $show_user_list_Record["profile_image"]; ?>" style="width:100px;height:130px;padding-top:10px;">
		</div>
		<div class="col-sm-4">
		<h4 style="margin-top:10px;"><strong><?php echo $show_user_list_Record["user_type"]." - ".$show_user_list_Record["first_name"]." ".$show_user_list_Record["last_name"]; ?></strong></h4>
		<div><span class="average"><?php printf('%.1f', $average); ?> <small>/ 5</small></span> <span class="rating-reviews"><a href="show_user_rating.php?item_id=<?php echo $show_user_list_Record["user_id"]; ?>">Rating & Reviews</a></span></div>
		<?php echo $enquiry_message; ?>		
		</div>		
	</div>
		<?php } } ?>	
</div>	
</div>	
<?php include('inc/footer.php'); ?>






