<?php
	require_once("inc/common.php");
	include("check_login.php");	
	$thumbnail_path = "";
	$video_path = "";
	
	//echo $_FILES['thumbnail']['tmp_name'];
	//die;
	
/*	if ($_FILES['video']['tmp_name'] != "")
	{
		//Getting the type of image uploaded.
		//$type = substr(,-3);
		$video_path= "../videos/orig/".$_FILES['video']['name'];
		$video_path =str_replace(" ","_",$video_path );
		//echo $_FILES['video']['tmp_name'];
		move_uploaded_file($_FILES['video']['tmp_name'],$video_path);
	}//if
	*/
$video_path=$_POST['video_path'];
	if ($_FILES['thumbnail']['tmp_name'] != "")
	{
		//Getting the type of image uploaded.
		//$type = substr(,-3);
		$thumbnail_path = "videos/pics/".$video_path;
//		$thumbnail_path  =str_replace(" ","_",$thumbnail_path );
		$thumbnail_path  =explode(".",$thumbnail_path  );
		$thumbnail_path[0]=$thumbnail_path[0].time();
		copy($_FILES['thumbnail']['tmp_name'], "../".$thumbnail_path[0].".jpg");
	}//if
	$caption = $_POST['caption'];
	$video_path_new=explode(".",$_POST['video_path']);
	$video_path_new[0]=$video_path_new[0].time();
	$video_path_new=$video_path_new[0].".".$video_path_new[1];
	
	
	$sql="INSERT INTO video (display_srno,caption,thumbnail_path,video_path) VALUES ('".(intval($_POST['total_videos'])+1)."','".$caption."','".$thumbnail_path[0].".jpg','".$video_path_new."')";
	
	copy("../tmpvideos/".$video_path, "../videos/orig/".$video_path_new) ;
	unlink("../tmpvideos/".$video_path) ;
	mysql_query($sql) or die(mysql_error());
	
header("Location:video.php");
?>