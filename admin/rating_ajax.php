<?php
error_reporting(0);
session_start(); 
include('../include/config.php');

$postid = $_POST['postid'];
$rating = $_POST['rating'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM post_rating WHERE postid=".$postid." and userid=".$_SESSION['loggedIn_user_id'];

$result = $conn->query($query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];

if($count == 0){
    $insertquery = "INSERT INTO post_rating(userid,postid,rating) values(".$_SESSION['loggedIn_user_id'].",".$postid.",".$rating.")";
    $conn->query($insertquery);
}else {
    $updatequery = "UPDATE post_rating SET rating=" . $rating . " where userid=" . $_SESSION['loggedIn_user_id'] . " and postid=" . $postid;
    $conn->query($updatequery);
}


// get average
$query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=".$postid;
$result = $conn->query($query) or die(mysqli_error());
$fetchAverage = mysqli_fetch_array($result);
$averageRating = $fetchAverage['averageRating'];

$return_arr = array("averageRating"=>$averageRating);

echo json_encode($return_arr);