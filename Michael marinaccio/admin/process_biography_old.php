<?php

$text_file="text_bio.txt";
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
	
	//print_r($sizearray);
	
	$newstr ="";
	foreach($sizearray as $str)
	{
		//Search for the first double quote in that.
		$dqpos=0;
		$dqpos=stripos($str,">");
		if($dqpos > 0)
		{
			//Getting the size in between those.
			$size = intval(preg_replace('/\D/', '', substr($str,0,$dqpos)));
			$newsize = $size * 7;
			$remstr = substr($str,$dqpos);
			$remstr = '"'.$newsize.'"'.$remstr;
			if($newstr != "")
			{
				$str = 'size='.$remstr;
			}
			else
			{
				$str = $remstr;
			}//else
		}//if
		
		$newstr .= $str;
		
	}//foreach
	
	$prv=0;
	$handle=fopen("../$text_file", "w");
	$a=fwrite($handle,stripslashes(html_entity_decode($newstr)));
	if ($a)
	{
		$msg=" Data updated Successfully!" ; 
		
	}
	
	fclose($handle);
}// if 

header("Location:biography.php");
?>