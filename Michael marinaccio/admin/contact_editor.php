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

$newstr1 = $textContent;
	
$contents=$newstr1;

fclose($handle);
$editor_text=str_replace("&Message=","", $contents) ;

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