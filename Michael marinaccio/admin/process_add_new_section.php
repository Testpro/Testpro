<?
require_once("inc/common.php");
error_reporting(E_ALL ^ E_NOTICE);
//get resume info for this actor
if ($_POST['section']=="" ) 
{
	header("location:resume_add_section.php?nosection=1");
	exit();
}
else
{

		$temp_flg=0;
		$section_order_new=0;
		// get the max of section_order and put the new sectio_oder number
		$sql2="SELECT MAX(section_order)  FROM resume_detail";
		$rs=mysql_query($sql2);
		if ($rs) 
		{
			$row2=mysql_fetch_array($rs);
			if ($row2[0]) 
			{
				$section_order_new=$row2[0];
			}// if  row
		}// if  rs 
		$section_order_new++;
		
		for ($i=0;$i<=(count($_POST['field1']));$i++ )
		{
			if ($_POST['field1'][$i]  ||  $_POST['field2'][$i] || $_POST['field3'][$i] )  
			{
				$sql=" INSERT INTO resume_detail SET section='".$_POST['section']."' , section_order=".$section_order_new.", skills='".$_POST['skills']."' , field1='".$_POST['field1'][$i]."' , field2='".$_POST['field2'][$i]."' ,  field3='".$_POST['field3'][$i]."' , field_order=".($i+1)." ";
				mysql_query($sql) or die (mysql_error()) ;
				$temp_flg=1;
			}// if 
		}// for 
	if ($temp_flg==0) 
	{
		$sql=" INSERT INTO resume_detail SET section='".$_POST['section']."' , section_order=".$section_order_new.", skills='".$_POST['skills']."' , field1='".$_POST['field1'][$i]."' , field2='".$_POST['field2'][$i]."' ,  field3='".$_POST['field3'][$i]."' , field_order=".($i+1)." ";
		mysql_query($sql) or die (mysql_error()) ;
		$temp_flg=0;
	}

}//else	
//writing into the the file.
writeFile();
header("location:resume.php?finished=1");
?>