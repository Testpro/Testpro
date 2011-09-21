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
            <td><?php
			include("inc/leftPan.php")
			?></td>
          </tr>
          <tr>
            <td height="300" valign="bottom"><h5><span class="orangetext"><strong>Questions?</strong></span><strong> Send us an email:</strong><br />
                <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a></h5></td>
          </tr>
        </table></td>
        <td width="1%" align="left" valign="top" class="vr"><img src="images/vr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
        <td width="74%" valign="top"><table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr>
            <td><h4 class="orangetext"><strong>HEADSHOTS</strong></h4></td>
          </tr>
          <tr>
            <td><h5>Welcome to your headshot gallery admin section. In this area, you can edit, remove, or change the sequence of your existing headshots, or you can add new ones. </h5>
              <h5>&nbsp;</h5>
              <h5><span class="orangetext">Suggestion:</span><br />
                For best results, we advise uploading three image sizes per photograph: (1) a large, printable version (xxx pixels by xxx pixels), (2) a main gallery display size (xxx pixels by xxx pixels), and (3) a thumbnail size (xxx pixels by xxx pixels).</h5></td>
          </tr>

          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          <tr >
            <td valign="bottom"><h5><span class="orangetext"><strong>Current Headshots:</strong></span></h5></td>
          </tr>
          <tr >
            <td valign="bottom"><table width="100%" border="1" cellpadding="0" cellspacing="0" class="table" style="border-color:#646262">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr class="greybg">
                    <td width="13%" height="25" align="center" class="whitelinktext"><h5><strong>Number</strong></h5></td>
                    <td width="43%" class="whitelinktext"><h5><strong>Caption</strong></h5></td>
                    <td width="10%" align="center" class="whitelinktext"><h5><strong>Select</strong></h5></td>
                    <td width="14%" align="center" class="whitelinktext"><h5><strong>Thumbnail</strong></h5></td>
                    <td width="9%" align="center" class="whitelinktext"><h5><strong>Edit</strong></h5></td>
                    <td width="11%" align="center" class="whitelinktext"><h5><strong>Delete</strong></h5></td>
                  </tr>
                  <tr>
                    <td align="center"><h5>1</h5></td>
                    <td><h5>My Comedy Mood</h5></td>
                    <td align="center"><h5>
                      <input name="checkbox" type="checkbox" id="checkbox" checked="checked" />
                    </h5></td>
                    <td align="center"><h5><img src="images/headshot_1.gif" width="36" height="36" /></h5></td>
                    <td align="center"><h5>
                      <input type="submit" name="Submit" id="button3" value="Edit" />
                    </h5></td>
                    <td align="center"><h5>
                      <input type="submit" name="button4" id="button6" value="Delete" />
                    </h5></td>
                  </tr>
                  <tr>
                    <td align="center"><h5>2</h5></td>
                    <td><h5>In Serious way</h5></td>
                    <td align="center"><h5>
                      <input type="checkbox" name="checkbox2" id="checkbox2" />
                    </h5></td>
                    <td align="center"><h5><img src="images/headshot_2.gif" width="36" height="36" /></h5></td>
                    <td align="center"><h5>
                      <input type="submit" name="button" id="button4" value="Edit" />
                    </h5></td>
                    <td align="center"><h5>
                      <input type="submit" name="button5" id="button7" value="Delete" />
                    </h5></td>
                  </tr>
                  <tr>
                    <td align="center"><h5>3</h5></td>
                    <td><h5>Socking attraction</h5></td>
                    <td align="center"><h5>
                      <input type="checkbox" name="checkbox3" id="checkbox3" />
                    </h5></td>
                    <td align="center"><h5><img src="images/headshot_3.gif" width="36" height="36" /></h5></td>
                    <td align="center"><h5>
                      <input type="submit" name="button3" id="button5" value="Edit" />
                    </h5></td>
                    <td align="center"><h5>
                      <input type="submit" name="button6" id="button8" value="Delete" />
                    </h5></td>
                  </tr>
                </table></td>
              </tr>
            </table>              </td>
          </tr>
          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          <tr >
            <td align="left"><h5><strong class="orangetext">Add New Headshot</strong></h5></td>
          </tr>
          <tr >
            <td align="left"><h5><strong>Upload your New Headshopt Thumbnail (36 px X 36px)</strong>
                 <input name="thumbnail" type="file" class="textinput" id="fileField" />
                </h5>
              </td>
          </tr>
          <tr >
            <td align="left"><h5><strong>Upload your New  Headshopt Display Picture (333 px X 335px)</strong>
                 <input name="display" type="file" class="textinput" id="fileField" />
                </h5>
              </td>
          </tr>
          <tr >
            <td align="left"><h5><strong>Upload your New  Headshopt Printable Picture (333 px X 335px)</strong>
                 <input name="printable" type="file" class="textinput" id="fileField" />
                </h5>
              </td>
          </tr>
          <tr >
            <td align="left"><h5><strong>Caption Text</strong></h5></td>
          </tr>
          <tr >
            <td align="left"><input name="caption" type="text" class="textinput" id="caption" /></td>
          </tr>
          <tr >
            <td align="right"><input type="reset" name="Reset" id="button" value="Cancel" />
                <input type="submit" name="button2" id="button2" value="Submit Changes" /></td>
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
