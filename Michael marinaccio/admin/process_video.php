<?php
	require_once("inc/common.php");
	$srno = $_POST['srno'];
	$thumbnail_path = "";
	$video_path = "";
	
	//echo $_FILES['thumbnail']['tmp_name'];
	//die;

	// move the video
	//chek whether the posted video name present there in tmpvideos or not
	if ($_POST['video_path_original']!=$_POST['video_path'])
	{
		
		if ( file_exists("../tmpvideos/".$_POST['video_path']) )
		{
			// move the file from tmpvideos to Destination path using command rename
			$vid=explode(".",$_POST['video_path']);
			$vid[0]=$vid[0].time();

			rename("../tmpvideos/".$_POST['video_path'],"../videos/orig/".$vid[0].".".$vid[1] ) ;
			$video_path = "videos/orig/".$vid[0].".".$vid[1];
		}// if 
		else
		{
			$video_path =	$_POST['video_path_original'];
		}//else 
	}// if 
	else
	{
		$video_path =$_POST['video_path_original'];
	}// else 

	if ($_FILES['thumbnail']['tmp_name'] != "")
	{

		$thumbnail_path = "videos/pics/".$_POST['video_path'];
		$thumbnail_path  =explode(".",$thumbnail_path  );
		$thumbnail_path[0]=$thumbnail_path[0].time();
		move_uploaded_file($_FILES['thumbnail']['tmp_name'], "../".$thumbnail_path[0].".jpg");

		$caption = $_POST['caption'];
		$sql="update video set caption ='".$caption."' ,thumbnail_path='".$thumbnail_path[0].".jpg' ,video_path = '".$video_path."'  where srno =".$srno;
		mysql_query($sql) or die(mysql_error());
		header("Location:video.php");

				
	}//if
	else
	{
		$caption = $_POST['caption'];
		$sql="update video set caption ='".$caption."' ,video_path = '".$video_path."'  where srno =".$srno;
		mysql_query($sql) or die(mysql_error());
		header("Location:video.php");
	
	}// 

?>