<?php
	require_once("inc/common.php");
	include("check_login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstration Panel</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
var valid_extensions = /(.jpg|.jpeg)$/i;
function CheckExtension(fld)
{
if (valid_extensions.test(fld)) return true;
alert('The selected file is of the wrong type. Please upload JPG / JPEG images');
return false;
}


function validate(f)
{

	
	if(f.single.value=="" && f.thumbnail.value=="" ) {
	alert("Select an Image");
	f.single.focus();
	return false;
	}

	
	if(f.single.value=="" && f.thumbnail.value=="" )
	{
	alert("Select a Thumbnail Image");
	f.thumbnail.focus();
	return false;
	}
	

	if(f.single.value=="" && document.getElementById("display").value=="")
	{
	alert("Select a Display Image");
	document.getElementById("display").focus();
	return false;
	}


	if(f.single.value=="" &&  f.printable.value=="" )
	{
	alert("Select a Printable Image");
	document.getElementById("printable").focus();
	return false;
	}

	if(document.getElementById("caption").value=="")
	{
		alert("Enter a caption");
		document.getElementById("caption").focus();
		return false;
	}
	if (f.single.value!="" )
	{
			return CheckExtension(f.single.value);
	}
	if (f.thumbnail.value!="" )
	{
			return CheckExtension(f.thumbnail.value);
	}
	if (f.display.value!="" )
	{
			return CheckExtension(f.display.value);
	}
	if (f.printable.value!="" )
	{
			return CheckExtension(f.printable.value);
	}

	return true;
	


}


function del_headshot(nid) {

var del=confirm(" Do you really want to Delete this Headshot ?");
if(del==true) {
window.location="deleteheadshot.php?srno=" + nid;

}

else {

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
			include("inc/leftPan.php");
			?></td>
          </tr>
          <tr>
            <td height="300" valign="bottom"><h5><span class="orangetext"><strong>Questions?</strong></span><strong> Send us an email:</strong><br />
                <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a></h5></td>
          </tr>
        </table></td>
        <td width="1%" align="left" valign="top" class="vr"><img src="images/vr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
        <td width="74%" valign="top">
        <form name="sequence" action="setsequence.php" method="post">
        <table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr>
            <td><h4 class="orangetext"><strong>HEADSHOTS</strong></h4></td>
          </tr>
          <tr>
            <td><h5>Welcome to your headshot gallery admin section. In this area, you can edit, remove, or change the sequence of your existing headshots, or you can add new ones. </h5>
              <h5>&nbsp;</h5>
              <h5><span class="orangetext">Suggestion:</span><br />
                For best results, we advise uploading three image sizes per photograph: (1) a large, printable version ( 
 2480 pixels by 3508 pixels), (2) a main gallery display size (245 
pixels by  366 pixels), and (3) a thumbnail size (77  pixels by  77 pixels).</h5></td>
          </tr>

          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          <tr >
            <td valign="bottom"><h5><span class="orangetext"><strong>Current Headshots:</strong></span></h5></td>
          </tr>
          <tr >
            <td valign="bottom">
            
            <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table" style="border-color:#646262">
              <tr>
                <td>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr class="greybg">
                    <td width="13%" height="25" align="center" class="whitelinktext"><h5><strong>Number</strong></h5></td>
                    <td width="43%" class="whitelinktext"><h5><strong>Caption</strong></h5></td>
                    <td width="14%" align="center" class="whitelinktext"><h5><strong>Thumbnail</strong></h5></td>
                    <td width="19%" align="center" class="whitelinktext"><h5><strong>Edit</strong></h5></td>
                    <td width="11%" align="center" class="whitelinktext"><h5><strong>Delete</strong></h5></td>
                  </tr>
                  <?php
				  	$count=0;
					$lastdisp=0;
				  	$sql="SELECT * FROM headshot order by display_srno ASC";
					$rs=mysql_query($sql);
					while($row=mysql_fetch_array($rs))
					{

						echo '<tr>
								<td align="center"><h5><input type="text" value="'.(++$count).'" name="'.$row['srno'].'" size="2"></h5></td>
								<td><h5>'.$row['caption'].'</h5></td>
								<td align="center"><h5><img src="'.$row['thumbnail_path'].'" width="36" height="36" /></h5></td>
								<td align="center"><h5><a href="edit_headshot.php?id='.$row['srno'].'"><img src="images/edit.gif" alt="delete" width="14" height="14" border="0" alt="Edit" /></a></h5></td>
								<td align="center"><h5><a href="#"><img src="images/delete.png" alt="delete" width="24" height="24" border="0" alt="Edit" onclick="del_headshot('.$row['srno'].');"/></a></h5></td>
							  </tr>';
						$lastdisp=$row['display_srno'];
					}//while
					$count = $lastdisp;
				  ?>
                  
                </table>
                
                </td>
              </tr>
              
            </table>              </td>
          </tr>
          <tr><td colspan="4" align="right"><input type="submit" name="UpdateSequence" value="Update Sequence" /></td></tr>
          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          </table></form>
      <form name="newfrm" action="addheadshot.php"  method="post" enctype="multipart/form-data"  onsubmit="return validate(this);">
          <table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr >
            <td align="left"><h5><strong class="orangetext">Add New Headshot</strong>
              <input type="hidden" name="total_shots" value="<?php echo $count; ?>" />
            </h5>            </td>
          </tr>
          
          <tr >
            <td align="left"><h5><strong>Upload a Single Picture </strong>
                 <input name="single" type="file" class="textinput" id="single" />
                </h5>              </td>
          </tr>
          <tr><td><br /> <h5><strong> OR </strong></h5><br />
          <hr size="1" /></td>
           </tr>
          <tr >
            <td align="left"><h5><strong>Upload your New Headshot Thumbnail (77 px X 77 px)</strong>
                 <input name="thumbnail" type="file" class="textinput" id="thumbnail" />
                </h5>              </td>
          </tr>
          <tr >
            <td align="left"><h5><strong>Upload your New  Headshot Display Picture (245 px x 366 px)</strong>
                 <input name="display" type="file" class="textinput" id="display" />
                </h5>              </td>
          </tr>
          <tr >
            <td align="left"><h5><strong>Upload your New  Headshot Printable Picture (2480 px x 3508 px )</strong>
                 <input name="printable" type="file" class="textinput" id="printable" />
                </h5>              </td>
          </tr>
           </tr>
          <tr><td><br /> 
          <hr size="1" /></td>
           </tr>
          <tr >
            <td align="left"><h5><strong>Caption Text</strong></h5></td>
          </tr>
          <tr >
            <td align="left"><input name="caption" type="text" class="textinput" id="caption" /></td>
          </tr>
          <tr >
            <td align="right"><input type="submit" name="addimage" id="addimage" value="Add Headshot" /></td>
          </tr>
        </table>
        </form>
        <form name="frmExport" action="submitheadshots.php"  method="post" >
        <table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr >
            <td align="center">
              <input type="submit" name="submitheadshots" value="Publish Updates on Site" />
            </td>
          </tr>
          </table>
        </form>
        </td>
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
