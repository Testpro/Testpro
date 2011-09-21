<?php
	require_once("inc/common.php");
	
	//Preparing the xml.
	
	$xml = '<gallery>
  <album>
    <albumDescription><![CDATA[Album 1]]></albumDescription>
   
';
	
	$extra = ' displayNum="3" separation="5" ';
	$sql="SELECT * FROM headshot order by display_srno ASC";
	$rs=mysql_query($sql);
	while($row=mysql_fetch_array($rs))
	{
		$img=str_replace("../G_images/","", $row['display_path']);
		$timg=str_replace("../G_images/","", $row['thumbnail_path']);
		$limg= str_replace("../G_images/","", $row['printable_path']);
		$xml.='
	 <image>
      <path>'.$img.'</path>
      <caption>'.$row['caption'].' </caption>
      <link name="Click here to enlarge" path="G_images/'.$limg.'" target="_blank"/>
      <imageName>'.$img.'</imageName>
    </image>';
	}//while
	$xml.=' </album></gallery>';
	
	$text_file="G_images.xml";
	$msg="";
	$handle=fopen("../$text_file", "w");
	$a=fwrite($handle,$xml);
	
	fclose($handle);

	header("Location:headshots.php");
?>