<?php
require_once("inc/common.php");
	
$sql="SELECT * FROM video WHERE srno='".$_GET['id']."'" ;  
$res= mysql_query($sql)  or die (mysql_error()) ; 
$row=mysql_fetch_array($res);
$count=0;
$lastdisp=0;
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

function validate(f){


if(document.getElementById("caption").value=="")
{
alert("Enter a Title Text");
document.getElementById("caption").focus();
return false;
}
	if(document.getElementById("video_path").value=="")
	{
	alert("Select the video from list !");
	return false;
	}


	if(f.thumbnail.value!="")
	{ 
		return CheckExtension(f.thumbnail.value);
	}//else 


	


}

function get_thumbnail(nvar){
var nstr = nvar;
document.getElementById("video_path").value=nvar;


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
        <form name="edit_video" action="process_video.php" method="post" enctype="multipart/form-data" onsubmit="return validate(this);" >
        <input type="hidden" name="srno" value="<?php echo $row['srno'];?>" />
        <table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr>
            <td><h4 class="orangetext"><strong>EDIT VIDEO </strong></h4></td>
          </tr>
          <tr>
            <td><h5>Welcome to your video gallery admin section. In this area you can edit, your existing videos. </h5>
              <h5>&nbsp;</h5>
              </td>
          </tr>

          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          <tr >
            <td valign="bottom"><h5><span class="orangetext"><strong>&nbsp;</strong></span></h5></td>
          </tr>
          <tr >
            <td valign="bottom">
            
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table" style="border-color:#646262">
              <tr>
                <td>                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td width="235" rowspan="4" valign="top"class="whitelinktext greybg">                      <div class="text" align="center"> <strong>Currently Available Videos </strong><br/>
        (Click on file name to select) </div>

                      <?php $path = "../tmpvideos/"; // path to the folder.
				
 	$dh = opendir($path);
	$i=1;
	?>
	<table width="100%" cellpadding="0" cellspacing="1"> 
	
	<?
	while (($file = readdir($dh)) !== false) 
	{
    	if($file != "." && $file != "..") 
		{?>
	<tr>
	<td bgcolor="#CCCCCC"> <h5><? echo "<a href='javascript:;' title ='".$file."' target='_self' onclick='javascript:get_thumbnail(\"".$file."\");'><span class=''>".substr($file,0,30)."...</span></a>" ?> 
	</h5>
	</td>
	</tr>
    <?php //echo " <h5 ><li class='orangetext'> <a href='javascript:;' title ='".$file."' target='_self' onclick=javascript:get_thumbnail('".$file."');><span class='whitelinktext'>".substr($file,0,30)."...</span></a> </h5>";
        $i++;
    	}
	}
	
	  ?> </table></td>
                    <td  align="left"><h5><strong>Title Text</strong></h5></td>
                    <td align="left"><input type="text" value="<?php echo $row['caption'];?>" name="caption"  id="caption"/></td>
                  </tr>
                  <tr>
                    <td colspan="3"  align="left" ><div align="center"><img src="../<?php echo $row['thumbnail_path'];?>" width="36" height="36" /></div></td>
                    </tr>
                  <tr>
                    <td  align="left" ><h5><strong>Thumbnail Image</strong></h5></td>
                    <td colspan="2" align="left">
                      <input  name="thumbnail"  type="file" id="thumbnail2" size="20"/>                    </td>
                    </tr>
                  <tr>
                    <td  align="left" ><h5><strong>Video Path </strong></h5></td>
                    <td colspan="2" align="left"><input name="video_path" type="text" readonly=""  id="video_path" size="20" value="<?=str_replace("videos/orig/","",$row['video_path'])?>" /> 
					<input name="video_path_original" type="hidden" id="video_path_original" size="20"  value="<?=str_replace("videos/orig/","",$row['video_path'])?>" />
					
					</td>
                    </tr>
                </table>                  <?php $lastdisp=$row['display_srno'];
				
				$count = $lastdisp;?>
                  <input type="hidden" name="total_videos" value="<?php echo $count; ?>" />                </td>
              </tr>
            </table>              </td>
          </tr>
          <tr><td colspan="4" align="right"><input type="reset" name="Reset" id="button" value="Cancel" onclick="window.location='video.php'" />
          <input type="submit" name="Update" value="Submit Changes" /></td></tr>
          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          </table></form>
         
       
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
