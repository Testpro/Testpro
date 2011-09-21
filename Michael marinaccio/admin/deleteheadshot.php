<?php
	require_once("inc/common.php");
	
	$srno=$_GET['srno'];
	if($srno>0)
	{
		//Getting the images for that headshot.
		$sql="SELECT * FROM headshot WHERE srno='".$srno."'";
		$rs=mysql_query($sql);
		$row=mysql_fetch_array($rs);
		
		//Deleting them.
		if (file_exists($row['thumbnail_path']) )  		unlink("".$row['thumbnail_path']);

		if (file_exists( $row['display_path']))		unlink("".$row['display_path']);
				if (file_exists($row['printable_path']))  unlink("".$row['printable_path']);
		
		//Now deleting the row from database.
		$sql="DELETE FROM headshot WHERE srno = '".$srno."'";
		mysql_query($sql);
	}//if
	
	header("Location:headshots.php");
?>