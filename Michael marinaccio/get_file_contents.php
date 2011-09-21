<?php
if (isset($_GET['file'])) 
{
$text_file=$_GET['file'];
$text_file="$text_file.txt";
$handle = fopen($text_file, "rb");
$contents = fread($handle, filesize($text_file));
fclose($handle);
$contents=str_replace("&Message=","",$contents);
$contents2=str_replace("&Message=","",$contents);
$contents = stripslashes($contents);
$contents = stripslashes($contents);
if ($_GET['file']=="text_contact" ) 
{
	if (strlen($contents2))
	{

		?><h5>
	 <div id = "FeedbackMsg" style="color:#FF0000">   </div>
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody><tr>
                      <td width="100%" valign="top" align="center">
					  <table width="60%" cellspacing="1" cellpadding="0" border="0">
                        <tbody><tr>
                          <td valign="top" height="30" class="blacktext"><strong>Please fill out this form to send an email</strong></td>
                        </tr>
                        <tr>
                          <td class="blacktext"><h5><strong>Name</strong></h5></td>
                        </tr>
                        <tr>
                          <td><input size="34"  type="text" id="name" class="textinput" name="name"/></td>
                        </tr>
                        <tr>
                          <td class="blacktext"><h5><strong>Phone</strong></h5></td>
                        </tr>
                        <tr>
                          <td><input size="34"  type="text" id="phone" class="textinput" name="phone"/></td>
                        </tr>
                        <tr>
                          <td class="blacktext"><h5><strong>Email</strong></h5></td>
                        </tr>
                        <tr>
                          <td><input size="34"  type="text" id="email" class="textinput" name="email"/></td>
                        </tr>
                        <tr>
                          <td class="blacktext"><h5><strong>Comments</strong></h5></td>
                        </tr>
                        <tr>
                          <td><textarea rows="5" cols="32"  id="comments" class="textinput" rows="5" cols="18" name="comments"/> </textarea></td>
                        </tr>
                        <tr>
                          <td align="left"><input type="button" value="Send" id="button" name="button" onclick="sendFeedback();"/></td>
                        </tr>
                      </tbody></table></td>
                    </tr>
                  </tbody></table> </h5>                 
			<?
	}// else
}

else
{
echo stripslashes($contents) ; 
}



}
?>