<?php
$text_file="text_contact.txt";
$msg="";
if (isset($_POST['cmd_submit'])	) 
{
	$textContent="&Message=".$_POST['RTE_content'];
	$textContent2="&Message=".$_POST['RTE_content'];
	$prv=0;$pos=0;
	$FinalContent="";
	$len=strlen($textContent2);
	//LOGIC BY PRATAP
	
	//Exploding the complete string on 'size='
	$textContent2=stripslashes(html_entity_decode($textContent2) );
	$sizearray=explode('size=',$textContent2);
	$newstr = $textContent2;
	$prv=0;
	$handle=fopen("../$text_file", "w");
	$a=fwrite($handle,stripslashes(html_entity_decode($newstr)));
	if ($a)
	{
		$msg=" Data updated Successfully!" ; 
		
	}
	
	fclose($handle);
}// if 



header("Location:contact.php");

?>