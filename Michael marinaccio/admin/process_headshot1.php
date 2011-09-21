<?php
	require_once("inc/common.php");
	
	$srno = $_POST['srno'];
	$thumbnail_path = "";
	$display_path = "";
	$printable_path = "";
	
	if ($_FILES['thumbnail']['tmp_name'] != "")
	{
		//Getting the type of image uploaded.
		//$type = substr(,-3);
		$thumbnail_path = "../G_images/thumb_".$_FILES['thumbnail']['name'];
		
		//echo "thumbnail path".$thumbnail_path;
		//die();
		copy($_FILES['thumbnail']['tmp_name'], $thumbnail_path);
	}//if
	if ($_FILES['display']['tmp_name'] != "")
	{
		//Getting the type of image uploaded.
		//$type = substr(,-3);
		$display_path = "../G_images/disp_".$_FILES['display']['name'];
		copy($_FILES['display']['tmp_name'], $display_path);
	}//if
	if ($_FILES['printable']['tmp_name'] != "")
	{
		//Getting the type of image uploaded.
		//$type = substr(,-3);
		$printable_path = "../G_images/print_".$_FILES['printable']['name'];
		copy($_FILES['printable']['tmp_name'], $printable_path);
	}//if
	
	$caption = $_POST['caption'];
	
	$sql="update headshot set caption = '".$caption."',thumbnail_path= '".$thumbnail_path."',display_path ='".$display_path."',printable_path = '".$printable_path."' where  srno =".$srno ;
	//echo "query is ".$sql;
	mysql_query($sql)or die(mysql_error());
	header("Location:headshots.php");
?>