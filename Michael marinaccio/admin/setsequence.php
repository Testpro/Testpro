<?php
	require_once("inc/common.php");
	include("check_login.php");	
	foreach($_POST as $key=>$value)
	{
		
		if($key!="UpdateSequence")
		{
			$sql="UPDATE headshot SET display_srno='".$value."' WHERE srno='".$key."'";
			
			mysql_query($sql);
		}//if
		
	}//foreach
	header("Location:headshots.php");
?>