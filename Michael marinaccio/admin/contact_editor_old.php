<BR>
<BR>

<?php

$text_file="text_contact.txt";
$msg="";

// get contents from the File 
$handle = fopen("../".$text_file, "rb");
$contents = fread($handle, filesize("../".$text_file));
$textContent=$contents ;

$textContent=stripslashes(html_entity_decode($textContent) );
$sizearray1=explode('size=',$textContent);

//print_r($sizearray);

$newstr1 = "";
foreach($sizearray1 as $str1)
{
	//Search for the first double quote in that.
	$dqpos11=0;
	$dqpos11=stripos($str1,">");
	if($dqpos11>0)
	{
		//Getting the size in between those.
		$size1 = intval(preg_replace('/\D/', '', substr($str1,0,$dqpos11)));
		$newsize1 = $size1 / 7;
		$remstr1 = substr($str1,$dqpos11);
		$remstr1 = '"'.$newsize1.'"'.$remstr1;
		if($newstr1 != "")
		{
			$str1 = 'size='.$remstr1;
		}//if
		else
		{
			$str1 = $remstr1;
		}//else
	}//if
	
		$newstr1 .= $str1;
}//foreach
	
$contents=$newstr1;

fclose($handle);
$editor_text=str_replace("Message=","", $contents) ;

function RTE_Preload($content) {
	// Strip newline characters.
	$content = str_replace(chr(10), " ", $content);
	$content = str_replace(chr(13), " ", $content);
	// Replace single quotes.
	$content = str_replace(chr(145), chr(39), $content);
	$content = str_replace(chr(146), chr(39), $content);
	// Return the result.
	return $content;
}
// Send the preloaded content to the function.

$content = RTE_Preload($editor_text)
?>
<form method="POST" name='frmEditor' action='process_contact.php'>
<!-- Include the Free Rich Text Editor Runtime -->
<script src="js/richtext.js" type="text/javascript" language="javascript"></script>
<!-- Include the Free Rich Text Editor Variables Page -->
<script src="js/config.js" type="text/javascript" language="javascript"></script>
<!-- Initialise the editor -->
<script>
initRTE('<?= $content ?>', 'main.css');
</script>
<input type="reset" name="Reset" id="button" value="Cancel" />
<input type="submit" name="cmd_submit" id="cmd_submit" value="Submit Changes" />
<BR>
</form>