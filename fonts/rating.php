<?php 
session_start();
include('inc/header.php');
?>
<title>Study Lab</title>
<script src="js/rating.js"></script>
<link rel="stylesheet" href="css/style_rating.css">
<?php include('inc/container.php');?>
<div class="container">		
	<h2>DDD</h2>
	<?php
	include 'inc/menu.php';
	include 'class/Rating.php';
	$rating = new Rating();
	$itemList = $rating->getItemList();
	
	//print_r(Rating());
	
	foreach($itemList as $item){
		$average = $rating->getRatingAverage($item["product_id"]);
	?>	
	<div class="row">
		<div class="col-sm-2" style="width:150px">
			<img class="product_image" src="UPLOAD_file/<?php echo $item["product_image"]; ?>" style="width:100px;height:200px;padding-top:10px;">
		</div>
		<div class="col-sm-4">
		<h4 style="margin-top:10px;"><?php echo $item["product_image"]; ?></h4>
		<div><span class="average"><?php printf('%.1f', $average); ?> <small>/ 5</small></span> <span class="rating-reviews"><a href="show_rating.php?item_id=<?php echo $item["product_id"]; ?>">Rating & Reviews</a></span></div>
		<?php echo $item["product_desc"]; ?>		
		</div>		
	</div>
	<?php } ?>	
</div>	
</div>	
<?php include('inc/footer.php');?>






