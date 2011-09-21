<!--
/**********************************************************************
	Version: FreeRichTextEditor.com Version 1.00.
	License: http://creativecommons.org/licenses/by/2.5/
	Description: Example of how to preload content into freeRTE using ASP.
	Author: Copyright (C) 2006  Steven Ewing
**********************************************************************/
-->
<%
function freeRTE_Preload(content) {
	' Strip whitespace.
	content = trim(content);
	' Strip newline characters.
	content = replace(content, chr(10), " ")
	content = replace(content, chr(13), " ")
	' Replace single quotes.
	content = replace(content, chr(145), chr(39))
	content = replace(content, chr(146), chr(39))
	' Return the result.
	freeRTE_Preload = content
}
' Send the preloaded content to the function.
content = freeRTE_Preload("<i>This is some <b>preloaded</b> content</i>")

%>
<form method="get">
<!-- Include the Free Rich Text Editor Runtime -->
<script src="../js/richtext.js" type="text/javascript" language="javascript"></script>
<!-- Include the Free Rich Text Editor Variables Page -->
<script src="../js/config.js" type="text/javascript" language="javascript"></script>
<!-- Initialise the editor -->
<script>
initRTE('<%= $content %>', 'example.css');
</script>
<input type="submit">
</form>