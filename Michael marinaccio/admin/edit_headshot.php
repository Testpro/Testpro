<?php
	require_once("inc/common.php");
	
$sql="SELECT * FROM headshot WHERE srno='".$_GET['id']."'" ;  
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
function validate(f)
{
	
	
	if( f.single.value!="" || f.thumbnail.value!="" || f.display.value!="" || f.printable.value!="" || f.caption.value!="" ) {
	
	return true;
	}
	
	
	else  {
			if (f.caption.value=="") {
			alert("Enter a caption");
			document.getElementById("caption").focus();
			return false;
	
			}	
			
			if( f.single.value=="" || f.thumbnail.value=="" || f.display.value=="" || f.printable.value=="") {
			alert("Select an Image");
			f.single.focus();
			return false;
			}
	
			
	
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
        <form name="edit_headshot" action="process_headshot.php" method="post" enctype="multipart/form-data"  onsubmit=" return validate(this);">
        <input type="hidden" name="srno" value="<?php echo $row['srno'];?>" />
        <table width="100%" border="0" cellspacing="6" cellpadding="0">
          <tr>
            <td><h4 class="orangetext"><strong>EDIT HEADSHOT </strong></h4></td>
          </tr>
          <tr>
            <td><h5>Welcome to your headshot gallery admin section. In this area, you can edit, your existing headshots. </h5>
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
            
            <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table" style="border-color:#646262">
              <tr>
                <td>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr class="greybg">
                    <td  height="25" align="center" class="whitelinktext"><h5><strong>&nbsp;</strong></h5></td>
                    <td  class="whitelinktext"><h5><strong>&nbsp;</strong></h5></td>
                    <td align="center" class="whitelinktext"><h5><strong>&nbsp;</strong></h5></td>
                   
                  </tr>
                
                 <tr>  
                  <td  align="left"><h5><strong>Caption Text</strong></h5></td>             
								<td align="center"><input type="text" value="<?php echo $row['caption'];?>" name="caption"  id="caption"/></td>
                  </tr>    
                   </tr>
          <tr><td colspan="3"><br />
          <hr size="1" /></td>
           </tr>
                  
                  <tr>
                    <td  align="left" ><h5><strong>Single Image</strong></h5></td>
								<td align="center"><img src="<?php echo $row['thumbnail_path'];?>" width="36" height="36" /></td>
                                <td align="left"> <input type="file" class="textinput" id="single"  name="single" />  </td>

				 </tr>         
                  
                   </tr>
          <tr><td colspan="3"><br /> <h5><strong> OR </strong></h5><br />
          <hr size="1" /></td>
           </tr>
                  
                  
                     
                  <tr>
                   <td  align="left" ><h5><strong>Thumbnail Image</strong></h5></td>       
				   <td align="center"><img src="<?php echo $row['thumbnail_path'];?>" width="36" height="36" /></td>
                   <td align="left"> <input  type="file" class="textinput" id="thumbnail"  name="thumbnail"/>  </td>
                   </tr>
                   <tr>
                    <td  align="left" ><h5><strong>Display Image </strong></h5></td>
								<td align="center"><img src="<?php echo $row['display_path'];?>" width="36" height="36" /></td>
                                <td align="left"> <input  type="file" class="textinput" id="display" name="display" />  </td>

                                </tr>
                    <tr>
                    <td  align="left" ><h5><strong>Printable Image</strong></h5></td>
								<td align="center"><img src="<?php echo $row['printable_path'];?>" width="36" height="36" /></td>
                                <td align="left"> <input type="file" class="textinput" id="printable"  name="printable" />  </td>

							  </tr>
                              
                              
                   
                </table>
                 <?php $lastdisp=$row['display_srno'];
				
				$count = $lastdisp;?>
                  <input type="hidden" name="total_shots" value="<?php echo $count; ?>" />
                </td>
              </tr>
              
            </table>              </td>
          </tr>
          <tr><td colspan="4" align="right">
		  <input type="reset" name="Reset" id="button" value="Cancel" onclick="window.location='headshots.php'" /> &nbsp;
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
