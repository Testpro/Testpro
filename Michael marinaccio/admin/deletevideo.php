<?php
	require_once("inc/common.php");
	error_reporting(E_ALL);
	$srno=$_GET['srno'];
	if($srno>0)
	{
		//Getting the images for that headshot.
		$sql="SELECT * FROM video WHERE srno='".$srno."'";
		$rs=mysql_query($sql);
		$row=mysql_fetch_array($rs);
		
		//Deleting them.
		if (file_exists("../videos/orig/".$row['video_path'])) 
		{
			unlink("../".$row['thumbnail_path']);
		} 	
		if (file_exists("../videos/orig/".$row['video_path'])) 
		{
			unlink("../videos/orig/".$row['video_path']);
		}
		
		
		//Now deleting the row from database.
		$sql="DELETE FROM video WHERE srno = '".$srno."'";
		mysql_query($sql);
	}//if
	
	header("Location:video.php");
?>