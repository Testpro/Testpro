<?
	require_once("inc/common.php");
		include("check_login.php");
error_reporting(E_ALL ^ E_NOTICE);
if ($_GET['section']!="") 
{
	$sql=" DELETE FROM resume_detail WHERE section='".$_GET['section']."'" 		;
	mysql_query($sql) or die ("Error". mysql_error()) ; 
	header("location: resume.php?finished=1");
}// if 

// create the text file for flash
// Get Contetns from the file 


$h=fopen("text_resume_working.txt","rb");
$text=fread($h,filesize("text_resume_working.txt"));
fclose($h);
//writing into the the file.
writeFile();
header("location:resume.php?finished=1");
?> 