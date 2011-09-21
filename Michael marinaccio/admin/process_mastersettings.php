<?php
include_once("checklogin.php");

//Getting the settings first.
$query = "select * from master_setting ";
$result = mysql_query($query);
while($row=mysql_fetch_array($result))
{
	$sql="UPDATE master_setting SET current_value='".addslashes($_POST[$row['setting_name']])."', db_update_date=sysdate() WHERE setting_name='".$row['setting_name']."'";
	
	//$sql="UPDATE master_setting SET current_value='".stripslashes($_POST[$row['setting_name']])."', db_update_date=sysdate() WHERE setting_name='".$row['setting_name']."'";
	mysql_query($sql) or die("Sorry! Could not execute query.<br>".$sql);
}//while
header("Refresh: 0;url=mastersettings.php");
?>