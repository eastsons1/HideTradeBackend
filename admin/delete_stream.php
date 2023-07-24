<?php
    ob_start();
	session_start(); 
	include('../include/config.php');
	
	
	$id = $_GET['id'];
	if($id!="")
	{
			 $sql_multi_delete4 = "DELETE FROM stream WHERE id = '".$id."'";
			 $sql_multi_delete44 = $conn->query($sql_multi_delete4) or die(" query  not executed");
		
	}
?>