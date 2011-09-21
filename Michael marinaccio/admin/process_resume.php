<?
	require_once("inc/common.php");
error_reporting(E_ALL ^ E_NOTICE);
//get resume info for this actor
//checking for file type pdf

if ($_FILES['pdf']['name']) 
{
	if ($_FILES['pdf']['type']=="application/pdf") 
	{
		move_uploaded_file($_FILES['pdf']["tmp_name"],"../resume.pdf");
		
	}// if 
	else
	{
		header("location:resume.php?notpdf=1");
	}
	
	
}// if 


$height=addslashes($_POST['height']);
$weight=addslashes($_POST['weight']);
$eye=addslashes($_POST['eyes']);	
$hair=addslashes($_POST['hair']);
$adds1=addslashes($_POST['address1']);
$adds2=addslashes($_POST['address2']);
$adds3=addslashes($_POST['address3']);
$phone=addslashes($_POST['phone']);
$fax=addslashes($_POST['fax']);
$association=addslashes($_POST['association']);
 $sql=" UPDATE resume_master SET   height = '".$height."' , weight = '".$weight."'   , eyes  = '".$eye."'  ,  hair = '".$hair."'  , address1 = '".$adds1."'  , address2 = '".$adds2."' , address3 = '".$adds3."'  , phone = '".$phone."'  , fax= '".$fax."' , association='".$association."'    "; 
mysql_query($sql) or die ("Update Error" . Mysql_error()." <BR> $sql" ) ;

/// UPDATING THE SECTIONS sequence numbering
foreach($_POST as $key=>$val)
{
	// update the section order
	
	if ( strripos ($key,"_")  && !(strripos($key,"eld_"))  )
	{
		
 		$sql="   UPDATE resume_detail SET section_order=".$val."   WHERE  section='".trim(str_replace("_"," ",$key))."' ";
		mysql_query($sql);
		
		//echo $key."<BR>";echo $val."<BR>";
	}
//Update the field rows.
	if ( strripos ($key,"eld_")  )
	{
		$temp=explode("_",$key);
		 $sql="   UPDATE resume_detail SET field_order=".$val." WHERE id=".$temp[1] .""  ;
		mysql_query($sql);
		//echo $key."<BR>";echo $val."<BR>";
	}

}

//writing into the the file.
writeFile();

header("location:resume.php?finished=1");
?>
