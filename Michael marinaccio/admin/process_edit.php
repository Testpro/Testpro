<?

require_once("inc/common.php");
error_reporting(E_ALL ^ E_NOTICE);
//get resume info for this actor

if ($_POST['sectionNew']=="" ) 
{
	header("location:resume_edit.php?nosection=1&section=".$_POST['section']);
	exit();
}

// before deleting getthe section_order so that order will remain same after deleting item.. 

		$section_order_new=0;
		// get the max of section_order and put the new sectio_oder number
		$sql2="SELECT MAX(section_order)  FROM resume_detail WHERE section='".$_POST['section']."' ";
		$rs=mysql_query($sql2);
		if ($rs) 
		{
			$row2=mysql_fetch_array($rs);
			if ($row2[0]) 
			{
				$section_order_new=$row2[0];
			}// if  row
		}// if  rs 
		//$section_order_new++;
		

// delete old details of This updated Section
$sql=" DELETE FROM  resume_detail WHERE section='".$_POST['section']."' "  ; 
$res=mysql_query($sql);


for ($i=0;$i<=(count($_POST['field1'])-1);$i++ )
{
	$temp_flg=0;
	if ($_POST['field1'][$i]  || $_POST['field2'][$i] || $_POST['field3'][$i] )  
	{
		  $sql=" INSERT INTO resume_detail SET section='".$_POST['sectionNew']."' , section_order=".$section_order_new.", skills='".$_POST['skills']."' , field1='".$_POST['field1'][$i]."' , field2='".$_POST['field2'][$i]."' ,  field3='".$_POST['field3'][$i]."' , field_order=".($i+1)." ";
		  $temp_flg=1;
		
		mysql_query($sql) or die (mysql_error()) ;
	}// if 
}// for 

if ($temp_flg==0) 
{
$sql=" INSERT INTO resume_detail SET section='".$_POST['sectionNew']."' , section_order=".$section_order_new.", skills='".$_POST['skills']."' , field1='".$_POST['field1'][$i]."' , field2='".$_POST['field2'][$i]."' ,  field3='".$_POST['field3'][$i]."' , field_order=".($i+1)." ";
	mysql_query($sql) or die (mysql_error()) ;
}

//writing into the the file.
writeFile();

header("location:resume.php?finished=1");


?>
