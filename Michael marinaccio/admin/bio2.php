<?
error_reporting(E_ALL ^ E_NOTICE);
include("inc/common.php");
include("check_login.php");


?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstration Panel</title>
<link href="style.css" rel="stylesheet" type="text/css" />
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
            <td>
			
			<?php
			include("inc/leftPan.php")
			?>
			</td>
          </tr>
          <tr>
            <td height="200" valign="bottom"><h5><span class="orangetext"><strong>Questions?</strong></span><strong> Send us an email:</strong><br />
                <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a></h5></td>
          </tr>
        </table></td>
        <td width="1%" align="left" valign="top" class="vr"><img src="images/vr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
        <td width="74%" valign="top"><table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr>
            <td><h4 class="orangetext"><strong>BIOGRAPHY</strong></h4></td>
          </tr>
          <tr>
            <td><h5>You can edit your Bio in the text panel below. Provided is a Rich Text Editor, which works similarly to the formatting palette in Microsoft<SUP>®</SUP> Word.</h5>
              <h5>&nbsp;</h5>
              <h5>To create a link to an external website, highlight the text for the hyperlink, then press the link button (a small sphere with chain link) in the formatting palette and enter a link. Once you have finished editing your bio, please make sure to press “Submit Changes” in order to save your work.</h5></td>
          </tr>

         
          <tr >
            <td align="right">
			<div align="center" class="text orangetext" > <?=$msg?></div>
	
	<?			include("editor2.php") ; 	?> 
			</td>
          </tr>
        </table></td>
      </tr>
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
