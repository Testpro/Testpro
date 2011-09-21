<?php
	require_once("inc/common.php");
	
	$thumbnail_path = "";
	$video_path = "";
	
	
	if ($_FILES['music']['tmp_name'] != "")
	{
		$source="../images/music/";		
		$dir_handle = @opendir($source) or die("Unable to open");
		while ($file = readdir($dir_handle)) 
		{
			if($file!="." && $file!=".." && !is_dir("$source/$file"))
			{
				 unlink("$source/$file");
			}
																				
		}
		closedir($dir_handle);
																		
			
		$thumbnail_path = "images/music/".$_FILES['music']['name'];
		copy($_FILES['music']['tmp_name'], "../".$thumbnail_path);
	}//if
	
	
	header("Location:background-music.php");
?>