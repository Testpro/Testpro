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

function validate(f){


if(document.getElementById("caption6").value=="")
{
alert("Enter a Title Text");
document.getElementById("caption6").focus();
return false;
}
	if(document.getElementById("video_path").value=="")
	{
	alert("Select the video from list !");
	return false;
	}


	if(f.thumbnail.value=="")
	{
		alert("Select a Thumbnail Image");
		f.thumbnail.focus();
		return false;
	}// if 
	else
	{ 
		return CheckExtension(f.thumbnail.value);
	}//else 


	


}

function del_headshot(nid) {

	var x= confirm(" Do you really want to Delete this Video ?");
	if (x) 
	{
		window.location="deletevideo.php?srno=" + nid;
	}

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
			include("inc/leftPan.php")
			?></td>
          </tr>
          <tr>
            <td height="243" valign="bottom"><h5><span class="orangetext"><strong>Questions?</strong></span><strong> Send us an email:</strong><br />
                <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a></h5></td>
          </tr>
        </table></td>
        <td width="1%" align="left" valign="top" class="vr"><img src="images/vr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
                

        <td width="74%" align="right" valign="top">
        <form name="sequence" action="setvideosequence.php" method="post">
        <table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr>
            <td><h4 class="orangetext"><strong>VIDEO</strong></h4></td>
          </tr>
          <tr>
            <td><h5>In this section, you can swap out your existing reel for a new one, or add new reels to the website.</h5>
              <h5>&nbsp;</h5>
              <h5>Reels MUST be in FLV (Flash) format (320x240 pixels) to function on the site. </h5>
              <h5>If you require conversion services, Seventh Planet Inc. would be more than happy to assist you (email <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a>).</h5></td>
          </tr>

          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
          <tr >
            <td valign="bottom"><h5><span class="orangetext"><strong>Current Reel:</strong></span></h5></td>
          </tr>
          <tr >
            <td valign="bottom">
            <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table" style="border-color:#646262">
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr class="greybg">
                    <td width="13%" height="25" align="center" class="whitelinktext"><h5><strong>Number</strong></h5></td>
                    <td width="43%" class="whitelinktext"><h5><strong>Title</strong></h5></td>
                    <td width="14%" align="center" class="whitelinktext"><h5><strong>Thumbnail</strong></h5></td>
                    <td width="11%" align="center" class="whitelinktext"><h5><strong>Edit</strong></h5></td>

                    <td width="11%" align="center" class="whitelinktext"><h5><strong>Delete</strong></h5></td>
                  </tr>
                 <?php
				  	$count=0;
					$lastdisp=0;
				  	$sql="SELECT * FROM video order by display_srno ASC ";
					$rs=mysql_query($sql) or die(mysql_error());
					while($row=mysql_fetch_array($rs))
					{
						echo '<tr>
								<td align="center"><h5><input type="text" value="'.$row['display_srno'].'"  name="'.$row['srno'].'" size="2"></h5></td>
								<td><h5>'.$row['caption'].'</h5></td>
								<td align="center"><h5><img src="../'.$row['thumbnail_path'].'" width="36" height="36" /></h5></td>
								<td align="center"><h5><a href="edit_video.php?id='.$row['srno'].'"><img src="images/edit.gif"  width="14" height="14" border="0" alt="Edit" title="Edit" /></a></h5></td>

								<td align="center"><h5><a href="#"><img src="images/delete.png" alt="delete" width="24" height="24" border="0" alt="Edit" onclick="del_headshot('.$row['srno'].');"/></a></h5></td>
							  </tr>';
						$lastdisp=$row['display_srno'];
					}//while
					$count = $lastdisp;
				  ?>
                </table>
                </td>
              </tr>
            </table>              
            </td>
          </tr>
          <tr><td colspan="4" align="right"><input type="submit" name="UpdateSequence" value="Update Sequence" /></td></tr>
          </table>
          </form>
		  <table width="100%"> 
		  <tr>
		  <td width="235" valign="TOP"class="whitelinktext greybg">                      <div class="text" align="center"> <strong>Currently Available Videos </strong><br/>
        (Click on file name to select) </div>

                      <?php $path = "../tmpvideos"; // path to the folder.
				
 	$dh = opendir($path);
	$i=1;
	?>
	<table width="100%" cellpadding="0" cellspacing="1"> 
	
	<?
	while (($file = readdir($dh)) !== false) 
	{
    	if($file != "." && $file != ".." && $file!="index.html" && findexts($file)=="flv" ) 
		{?>
	<tr>
	<td bgcolor="#CCCCCC"> <h5><? echo "<a href='javascript:;' title ='".$file."' target='_self' onclick='javascript:get_thumbnail(\"".($file)."\");'><span class=''>".substr($file,0,30)."...</span></a>" ?> 
	</h5>
	</td>
	</tr>
    <?php //echo " <h5 ><li class='orangetext'> <a href='javascript:;' title ='".$file."' target='_self' onclick=javascript:get_thumbnail('".$file."');><span class='whitelinktext'>".substr($file,0,30)."...</span></a> </h5>";
        $i++;
    	}
	}
	
	  ?> </table></td>
		  <td width="277" align="left" valign="TOP">
          <form action="addvideo.php" method="post" name="frmAddVid" enctype="multipart/form-data" onsubmit="return validate(this);">
            <table width="66%" cellspacing="6" cellpadding="0">
              <tr >
                <td width="85%" colspan="2" align="left" bordercolor="1"><h5><strong class="orangetext">Add New Reel</strong></h5>
                  <input type="hidden" name="total_videos" value="<?php echo $count; ?>" /></td>
              </tr>
              <tr >
                <td align="left"><h5>Title Text</h5></td>
                <td align="left"><input  name="caption" type="text" class="textinput" id="caption6" size="20" /></td>
                . </tr>
              <tr >
                <td align="left">
                  <h5>Thumbnail file                   </h5></td>
               
              <td align="left"><input name="thumbnail" type="file" id="thumbnail4" value=""   class="textinput" size="20" maxlength="20"/></td>
              </tr>
              <tr >
                <td align="left"><h5>Video Path
                </h5></td>
              <td align="left"><input name="video_path" type="text" class="textinput" id="video_path" size="20" value="" readonly /></td>
              </tr>
              
              <tr >
                
                <td colspan=2 align="right"><input type="submit" name="button2" id="button22" value="Add Video" /></td>
              </tr>
            </table>
			
          </form>		  </td>
			</tr>
			</table> 
        <br />
        <form name="frmExport" action="submitvideos.php"  method="post" >
        <table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr >
            <td align="center">
              <input type="submit" name="submitvideos" value="Publish Updates on Site" />
            </td>
          </tr>
          </table>
        </form>        </td></tr>
          <tr class="hr">
            <td><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
        
          </tr>
          <tr><td>&nbsp;</td>
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
