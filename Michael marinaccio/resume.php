<?

require("admin/inc/common.php");


$sql="SELECT * FROM resume_master " ;
$res=mysql_query($sql) ;
$row=mysql_fetch_array($res);
// get the address from the Contact File 
$h_contact=fopen("text_contact.txt","rb");
$text_contact=fread($h_contact,filesize("text_contact.txt"));
fclose($h_contact);
$text2=str_replace("&Message=","",$text_contact);
?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"><head> 
 
 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>Michael Marinaccio</title> 
<link href="michael.css" rel="stylesheet" type="text/css"> 
<style type="text/css"> 
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}
--> 
</style></head><body> 
<table width="38%" align="center" border="0" cellpadding="0" cellspacing="0"> 
  <tbody><tr> 
    <td><img src="images/resume_top.gif" alt="Michael Marinaccio" width="950" height="39"></td> 
  </tr> 
  <tr> 
    <td class="resumebg"><table width="90%" align="center" border="0" cellpadding="0" cellspacing="0"> 
      <tbody> 
        <tr>
          <td width="76%"><h1><span class="blacktext">Michael Marinaccio</span></h1>
</td>
          <td width="3%" align="right"><strong><img src="images/download_resume.jpg" alt="Download Resume" width="28" height="32" /></strong></td>
          <td width="21%" align="center"><h5><strong><a href="download_resume.php" target="_blank" class="blacktext">Download Print Version (.pdf)</a></strong></h5></td>
        </tr>
<!--         <tr>
          <td colspan="3" class="blacktext"><h5><a href="mailto:mjmarinaccio@aol.com"> mjmarinaccio@aol.com </a>  </h5></td>
        </tr>
 -->        <tr>
          <td colspan="3"><h5>&nbsp;</h5></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <?
	if ($row['association']!="" ) 
	{
		
	?>
<tr>
                <td width="31%" height="27" valign="middle"><h5><span class="blacktext"><strong><?=$row['association']?></strong></span></h5></td>
                <td width="69%" valign="middle" class="blacktext">&nbsp;</td>
              </tr> 
			  <?
	}// if 

?>
         	<?
						if ($row['height']!="" || $row['weight']!="" || $row['hair']!="" || $row['eyes']!=""  )
						{
				?> 
   <tr>
              <td colspan="2" valign="top">
			  			
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="1%" align="left" class="boxtopbg"><img src="images/box_top_left.gif" alt="Resume" width="10" height="10" /></td>
                  <td width="98%" class="boxtopbg"><img src="images/box_top_center.gif" alt="Resume" width="10" height="10" /></td>
                  <td width="1%" align="right" class="boxtopbg"><img src="images/box_top_right.gif" alt="Resume" width="10" height="10" /></td>
                </tr>
               
				<tr>
                  <td align="left"  class="boxleftbg"><img src="images/box_left_center.gif" alt="Resume" width="10" height="10" /></td>
                  <td class="whitebg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="8%" valign="top">
					  <?
					  if ($row['height']!="") 
					  {
					  ?>
					  <h5 class="blacktext"><strong>Height: </strong></h5>
					  <?
					  	}
					
					  if ($row['weight']!="") 
					  {
					  ?>
					    <h5 class="blacktext"><strong>Weight: </strong></h5>
					  <?
					  	}
					  
					  if ($row['hair']!="") 
					  {
					  ?>
					      <h5 class="blacktext"><strong>Hair: </strong></h5>
					  <?
					  	}
					 
					  if ($row['eyes']!="") 
					  {
					  ?>
					      <h5 class="blacktext"><strong>Eyes: </strong></h5>
					  <?
					  	}
					  ?>
                     
                       </td>
                      <td width="69%" valign="top"><h5><span class="blacktext">
                        <?
					 if ($row['height']!="") 
					  {
						echo makeClickableLinks(stripslashes($row['height']));
						echo "<br />";
						}
					 if ($row['weight']!="") 
					  {
						echo makeClickableLinks(stripslashes($row['weight']));
                        echo "<br />";
						}//
						 if ($row['hair']!="") 
					  {
						
						 echo makeClickableLinks(stripslashes($row['hair']));
						echo "<br />";
						}// 
                       if ($row['eyes']!="") 
					  {
						
						  echo makeClickableLinks(stripslashes($row['eyes']));
						  echo "<br />";
					  }
					  
					  
					  ?>
                      </span></h5></td>
                      <td width="23%" valign="top"><h5 class="blacktext">&nbsp;</h5>
                          <h5>&nbsp;</h5></td>
                    </tr>
                  </table></td>
                  <td align="right" class="boxrightbg" ><img src="images/box_right_center.gif" alt="Resume" width="10" height="10" /></td>
                </tr>
				
                <tr>
                  <td align="left" class="boxbottombg"><img src="images/box_bottom_left.gif" alt="Resume" width="10" height="10" /></td>
                  <td class="boxbottombg"><img src="images/box_bottom_center.gif" alt="Resume" width="10" height="10" /></td>
                  <td align="right" class="boxbottombg"><img src="images/box_bottom_right.gif" alt="Resume" width="10" height="10" /></td>
                </tr>
              </table>
			 
			  </td>
              </tr> <?

						} // if 
					?> 
          </table></td>
        </tr>
        <tr> 
        <td colspan="3">&nbsp;
        <table width="100%" border="0" cellpadding="2" cellspacing="0" class="blacktext"> 
              
		 <?
					 $sql="SELECT * FROM resume_detail order by section_order, field_order ASC " ;
                     $rs=mysql_query($sql) or die (mysql_error()) ;
                     $prv_section="";
                    while ($row2=mysql_fetch_array($rs))
                    { 
                        
                    $section=trim($row2['section']);
                    $skills=trim($row2['skills']);
                    if ($section != $prv_section) 
                    {
                    	//Check if this is the first time
                        if($prv_section!="")
                        {
                        	
							//this is not the first time. So  close the table of the previous section.
                            echo '</table></td>
                                  <td align="right" class="boxrightbg" >
                                  <img src="images/box_right_center.gif" alt="Resume" width="10" height="10" /></td>
                                </tr>
                                <tr>
                                  <td align="left" class="boxbottombg">
                                  <img src="images/box_bottom_left.gif" alt="Resume" width="10" height="10" /></td>
                                  <td class="boxbottombg">
                                  <img src="images/box_bottom_center.gif" alt="Resume" width="10" height="10" /></td>
                                  <td align="right" class="boxbottombg">
                                  <img src="images/box_bottom_right.gif" alt="Resume" width="10" height="10" /></td>
                                </tr>
                              </table></td>
                            </tr>';
                        }//if
                        echo "<tr>
                  <td colspan=3 >&nbsp;</td>
                </tr><tr> <td colspan=3 ><h4><b>".makeClickableLinks(stripslashes($section))."</b> </h4> </td>  </tr>  \n";
                    
                    ?>
 
                
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%" align="left" class="boxtopbg"><img src="images/box_top_left.gif" alt="Resume" width="10" height="10" /></td>
                      <td width="98%" class="boxtopbg"><img src="images/box_top_center.gif" alt="Resume" width="10" height="10" /></td>
                      <td width="1%" align="right" class="boxtopbg"><img src="images/box_top_right.gif" alt="Resume" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td align="left"  class="boxleftbg"><img src="images/box_left_center.gif" alt="Resume" width="10" height="10" /></td>
                      <td class="whitebg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        
                        <?php
					  }
                      		if ($skills != $prv_skills) 
                            {
                                echo "<tr> <td colspan=3 ><h5> $skills</h5></td> </tr> ";
                            }
	
                          if ($row2['field1']!=""  && $row2['field2']!="" && $row2['field3']!="" )
                          { 
                          
                          ?>
                                <tr>
                                  <td width="33%" ><h5><?=makeClickableLinks(stripslashes($row2['field1']))?></h5> </td>
                                  <td width="33%" ><h5><?=makeClickableLinks(stripslashes($row2['field2']))?></h5></td>
                                  <td width="33%" ><h5><?=makeClickableLinks(stripslashes($row2['field3']))?></h5></td>
                                </tr>
                          <?
                          }
                          elseif($row2['field1']!="" &&  $row2['field2']!="" )
                          {
                            ?>
                                 <tr>
                                  <td width="33%" ><h5><?=makeClickableLinks(stripslashes($row2['field1']))?> </h5></td>
                                  <td width="33%" colspan=2 ><h5><?=makeClickableLinks(stripslashes($row2['field2']))?></h5></td>
                                </tr>
                            <?
                          }
                          elseif($row2['field1']!="" )
                          {
                            ?>
                                 <tr>
                                  <td width="33%" colspan=3 ><h5><?=makeClickableLinks(stripslashes($row2['field1']))?> </h5></td>
                                </tr>
                            <?
                          }
                          elseif($row2['field2']!="" )
                          {
                            ?>
                                 <tr>
                                  <td width="33%" colspan=3 ><h5><?=makeClickableLinks(stripslashes($row2['field2']))?> </h5></td>
                                </tr>
                            <?
                          }
                          elseif($row2['field3']!="" )
                          {
                            ?>
                 <tr>
                  <td width="33%" colspan=3 ><h5><?=makeClickableLinks(stripslashes($row2['field3']))?> </h5></td>
                </tr>
            <?
		  }
		  
		  
	  	$prv_section=$section;
		$prv_skills=$skills;
	
		  	}// while
		
		  ?>
                        
                      </table></td>
                      <td align="right" class="boxrightbg" ><img src="images/box_right_center.gif" alt="Resume" width="10" height="10" /></td>
                    </tr>
                    <tr>
                      <td align="left" class="boxbottombg"><img src="images/box_bottom_left.gif" alt="Resume" width="10" height="10" /></td>
                      <td class="boxbottombg"><img src="images/box_bottom_center.gif" alt="Resume" width="10" height="10" /></td>
                      <td align="right" class="boxbottombg"><img src="images/box_bottom_right.gif" alt="Resume" width="10" height="10" /></td>
                    </tr>
                  </table></td>
                  </tr> 
                <tr>
                  <td >&nbsp;</td>
                </tr>
              </table>            </td> 
      </tr> 
      </tbody></table></td> 
  </tr> 
  <tr> 
    <td><img src="images/resume_bottom.gif" alt="Michael Marinaccio" width="950" height="39" /></td> 
  </tr> 
</tbody></table> 
</body></html>