<?
	if (	isset($_POST['cmd_submit'])	) 
	{
		echo   $_POST['RTE_content'] ; 
		$handle=fopen("data/data.txt", "w");
		 fwrite($handle,$_POST['RTE_content']);
	}// if 
?>

<BR>
<BR>

<?php
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
$content = RTE_Preload("<i>Please Enter<b><br>Some</b> Text </i>")
?>
<form method="POST" name='frmEditor' action=''>
<!-- Include the Free Rich Text Editor Runtime -->
<script src="../js/richtext.js" type="text/javascript" language="javascript"></script>
<!-- Include the Free Rich Text Editor Variables Page -->
<script src="../js/config.js" type="text/javascript" language="javascript"></script>
<!-- Initialise the editor -->
<script>
initRTE('<?= $content ?>', 'main.css');
</script>
<input type="submit" name="button2" id="button2" value="Submit Changes" />
<BR>
</form>