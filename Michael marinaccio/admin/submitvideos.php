<?php
	require_once("inc/common.php");
	
	//Preparing the xml.
	
	$xml = '<?xml version="1.0" encoding="UTF-8" ?> 
			<gallery>';
	
	$extra = ' displayNum="3" separation="5" ';
	$sql="SELECT * FROM video order by srno ASC";
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs))
	{

	$t=str_replace("../videos/orig/","",$row['video_path']);
	$t=str_replace("videos/orig/","",$row['video_path']);
	$t=explode(".",$t);
	$xml.='<photo title="'.$row['caption'].'" src="'.$t[0].'" />';
	}//while
	$xml.='
	</gallery>';
	$text_file="videos.xml";
	$msg="";
	$handle=fopen("../$text_file", "w");
	$a=fwrite($handle,$xml);
	
	fclose($handle);

	header("Location:video.php");
?>