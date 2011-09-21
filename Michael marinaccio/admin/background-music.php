<?
include("check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstration Panel</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function validate(f){

		if(f.music.value=="")
		{
		alert("Select a Mp3 file");
		f.music.focus();
		return false;
		}

}
</script>
</head>

<body>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/top_banner.gif" alt="Adminstration Panel" width="778" height="102" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td class="pagebg"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td width="25%" valign="top"><table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td height="35" valign="top"><img src="images/section_name.gif" alt="SECTION NAME" width="158" height="19" /></td>
          </tr>
          <tr>
            <td><?php
			include("inc/leftPan.php")
			?></td>
          </tr>
          <tr>
            <td height="200" valign="bottom"><h5><span class="orangetext"><strong>Questions?</strong></span><strong> Send us an email:</strong><br />
                <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a></h5></td>
          </tr>
        </table></td>
        <td width="1%" align="left" valign="top" class="vr"><img src="images/vr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
        <td width="74%" valign="top"><table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr>
            <td><h4 class="orangetext"><strong>BACKGROUND MUSIC</strong></h4></td>
          </tr>
          <tr>
            <td><h5>In this section, you can upload a music loop which will play when your website is loaded. You can also toggle the music off in this section (so that no music plays). Please be aware that the loop will start again right after it finishes, so a seamless music loop will give you the best results.</h5>
              <h5>&nbsp;</h5>
              <h5>Please select the music on your hard drive with the “Browse” button below, then press “Submit” to save your changes.</h5>
              <h5>&nbsp;</h5>
              <h5><span class="orangetext"><strong>NOTE: </strong></span><br />
                Uploaded music MUST be in .mp3 format in order to play on your website. Seventh Planet, Inc. takes no responsibility for a user’s music selection, so please make sure that you follow ALL copyright laws.</h5></td>
          </tr>
			<form name="newfrm" action="addmusic.php" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          <tr >
            <td align="left"><h5><strong class="orangetext">Select your music</strong></h5></td>
          </tr>
          <tr >
            <td align="left"><h5><strong>Upload your New  Background Music (.mp3 format)</strong>
                    <input name="music" type="file" class="textinput" id="music" />
            </h5></td>
          </tr>
          <tr >
            <td align="right"><input type="reset" name="Reset" id="button" value="Cancel" />
                <input type="submit" name="button2" id="button2" value="Add Music" /></td>
          </tr>
        </table></td>
      </tr></form>
    </table>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" class="bottombg"><h5>© 2009 <a href="https://www.seventhplanet.net/" target="_blank">Seventh Planet, Inc</a>. All rights reserved.</h5></td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="647,44,745,85" href="https://www.seventhplanet.net/" target="_blank" alt="Seventh Planet, Inc." />
<area shape="rect" coords="43,37,291,70" href="index.htm" alt="Adminstration Panel" />
</map></body>
</html>
