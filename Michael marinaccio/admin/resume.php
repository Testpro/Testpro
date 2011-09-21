<?php 
require_once("inc/common.php");
include("check_login.php");	
error_reporting(E_ALL ^ E_NOTICE);
//get resume info for this actor
$sql="select A.* from resume_master A ;";
$res=mysql_query($sql) ;//or die ("Error ". Mysql_error() ."  <BR> Query== ".$sql);
$bio_row=mysql_fetch_array($res);
$height=stripslashes($bio_row['height']);

$weight=stripslashes($bio_row['weight']);
$eye=stripslashes($bio_row['eyes']);	
$hair=stripslashes($bio_row['hair']);
$adds1=stripslashes($bio_row['address1']);

$adds2=stripslashes($bio_row['address2']);

$adds3=stripslashes($bio_row['address3']);
$phone=stripslashes($bio_row['phone']);
$fax=stripslashes($bio_row['fax']);

$association=stripslashes($bio_row['association']);

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstration Panel</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="process_resume.php" name="frmResume" method="post"  enctype="multipart/form-data">

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
        <td width="74%" valign="top"><table width="100%" cellspacing="6" cellpadding="0">
          <tr>
            <td colspan="2"><h4 class="orangetext"><strong>RESUME</strong></h4></td>
          </tr>
          <tr>
            <td colspan="2"><h5>You can edit your Resume in the text panel below. Provided is a Rich Text Editor, which works similarly to the formatting palette in Microsoft<SUP>®</SUP> Word.</h5>
              <h5>&nbsp;</h5>
              <h5>To create a link to an external website, highlight the text for the hyperlink, then press the link button (a small sphere with chain link) in the formatting palette and enter a link. Once you have finished editing your bio, please make sure to press “Submit Changes” in order to save your work.</h5></td>
          </tr>

          <tr class="hr">
            <td colspan="2"><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
         <tr >
            <td colspan="2" align="center"><strong>
              <? if (isset($_GET['finished'])) { ?>
              <span class="orangetext text">Data Updated Successfully!              </span></strong>
              <? }// if 
			  elseif(isset($_GET['nopdf'])) { ?>
              <span class="orangetext text">Please Upload the PDF file.              </span></strong>
			    <? }// if ?>
			  </td>
          </tr>
          <tr >
            <td colspan="2" align="left"><strong>
              <?=$a_name?>
            </strong></td>
          </tr>
          <tr >
            <td width="50%" align="left"><h5>Height</h5></td>
            <td width="78%" align="left"><h5>
              <input name="height" type="text" id="textfield" size="50" value=<?=$height?>>
            </h5></td>
          </tr>
          <tr >
            <td align="left"><h5>Weight</h5></td>
            <td align="left"><input name="weight" type="text" id="textfield2" size="50" value="<?=$weight?>"></td>
          </tr>
          <tr >
            <td align="left"><h5>Eye</h5></td>
            <td align="left"><input name="eyes" type="text" id="textfield3" size="50" value="<?=$eye?>"></td>
          </tr>
          <tr >
            <td align="left"><h5>Hair</h5></td>
            <td align="left"><input name="hair" type="text" id="textfield4" size="50" value="<?=$hair?>">
			           <input name="address1" type="hidden" id="textfield7" size="50" value="<?=$adds1?>">
					   <input name="address2" type="hidden" id="textfield8" size="50" value="<?=$adds2?>">
					   <input name="address3" type="hidden" id="textfield9" size="50" value="<?=$adds3?>">
			</td>
          </tr>
         <!--  <tr >
            <td align="left"><h5>Phone</h5></td>
            <td align="left"><h5>
              <input name="phone" type="text" id="textfield10" size="50" value="<?=$phone?>">
            </h5></td>
          </tr>
          <tr >
            <td align="left"><h5>Fax</h5></td>
            <td align="left"><h5>
              <input name="fax" type="text" id="textfield5" size="50" value="<?=$fax?>" />
            </h5></td>
          </tr> -->
         <tr >
            <td align="left"><h5>Union</h5></td>
            <td align="left"><input name="association" type="text" id="textfield4" size="50" value="<?=$association?>">
			</td>
          </tr>
		  
		  <tr >
            <td align="left"><h5>Resume PDF </h5></td>
            <td align="left"><h5>
                <input name="pdf" type="file" id="textfield5" size="50" />
            </h5></td>
          </tr>
		  <tr align="left">
		    <td>&nbsp;</td>
		    <td>(*<span class="orangetext text"> Resume PDF will replace the current pdf file. </span>)</td>
		  </tr>
		  <tr>
                <td colspan="2" align="right">
				<a href="resume_add_section.php" class="text"><span class="orangetext">  Add New Section</span> </a> </td>
             </tr>
			  <tr>
                <td colspan="2" align="right">
				<?php
		 	$sql="select *  from  resume_detail order by section_order, field_order ASC ";
			$res=mysql_query($sql);// or die ("Error ". Mysql_error() ."  <BR> Query== ".$sql);
			$i=0;
			while ($row=mysql_fetch_array($res)) 
			{
				$section=trim($row['section']);
				$skills=trim($row['skills']);
				$i++;
				if ($i>1 && ( ($section!=$prv_section) ))
				{
					echo "<BR>";
				}
				
		 ?> <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table" style="border-color:#646262">
              <tr>
                <td>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="2">
                   <? 
		  if ($section!=$prv_section) 
		  {
			  ?>
				
				  <tr align="left" class="greybg">
                    <td  height="25" colspan="3" class="whitelink" ><h5><strong>
                <?=makeClickableLinks($section)?>
                 </strong>      </h5>                      </td>
                    <td width="69%" height="25" align="right" valign="bottom" class="whitelinktext"  colsapn=5> <h5>Sequence Number 
                      <input type="text" value="<?=$row['section_order']?>"  name="<?=$section?>_"  size="1">  <strong><a href="resume_edit.php?section=<?=$section?>" class='text'><img src="images/edit.gif" border="0" /></a> <a href="resume_delete.php?section=<?=$section?>" onclick="return confirm('Are you sure! You want to delete this section');" class='text'><img src="images/delete.png" width="24" height="24" border=0 align="bottom" /></a></strong> </h5> </td>
				  </tr>
					
                <?
			}
			
			
			if ($skills!=$prv_skills) 
			{
				?>
				
				  <tr align="left">
                    <td height="25" colspan="4"  ><h5>
             <div style="width:500px; overflow:auto;" >    <?=makeClickableLinks($skills)  ?> </div>
                 </h5>					
				 <hr></td>
                    </tr>
					
                <?
			}
			
				?>
				  <tr>
                    <td valign=top width="25%" align="left"><h5>
                      <?=makeClickableLinks($row['field1']) ?>&nbsp;
                      </h5></td>
                    <td  width="25%" valign=top><h5>
                      <?=makeClickableLinks($row['field2'])?>&nbsp;
                      </h5></td>
                    <td  width="25%"  valign=top align="left">
                       <h5> <?=makeClickableLinks($row['field3'])?></h5>&nbsp;
                              </td>
				  <td   width="25%" valign=top align="right">
							  <? if ($row['field1']||$row['field2'] || $row['field3'] )
							  {
							  ?>
                      <h5>Sequence  <input type="text" value="<?=$row['field_order']?>"  name="field_<?=$row['id']?>"  size="1"> </h5>                              
					  <?
					  }//if ?>
					  </td>
                    </tr>
                </table>				
</td>
				</tr>
				</table>
<?       
		$prv_section=$section;
		$prv_skills=$skills;
			}//while 
?>
				<BR><strong>
               
                </strong>                  </td>
          
		     </tr>
           <tr>
                <td colspan="2" align="right">
				<a href="resume_add_section.php" class="text"><span class="orangetext">  Add New Section</span> </a> </td>
             </tr>
		  <tr >
            <td colspan="2" align="right"><input type="reset" name="Reset" id="button" value="Cancel" />
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
</form>

<map name="Map" id="Map"><area shape="rect" coords="647,44,745,85" href="https://www.seventhplanet.net/" target="_blank" alt="Seventh Planet, Inc." />
<area shape="rect" coords="43,37,291,70" href="index.htm" alt="Adminstration Panel" />
</map></body>
</html>
