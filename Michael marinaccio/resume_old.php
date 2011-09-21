<?
error_reporting(E_ALL);
require("admin/inc/common.php");
error_reporting(E_ALL^E_NOTICE);
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
      <tbody><tr>
        <td class="blacktext" width="80%" align="right"><h5><strong><img src="images/download_resume.jpg" alt="Download Resume" width="28" height="32"></strong></h5></td>
        <td class="blacktext" width="20%" align="right"><h5><strong><a href="resume.pdf" target="_blank" class="blacktext">Download Print Version (.pdf)</a></strong></h5></td>
      </tr>
      <tr>
        <td colspan="2"><h1 class="blacktext">Resume</h1>
        <h5 class="blacktext">&nbsp;</h5>
          <h5 class="blacktext">http://www.speedreels.com/talent/lgoodman/</h5>
          <h5 class="blacktext"><br>
  SAG*AFTRA*AEA</h5>
          <h5 class="blacktext"><br>
            Height: 		<?=$row['height']?> </h5>
          <h5 class="blacktext">Weight: 		<?=$row['weight']?></h5>
          <h5 class="blacktext">Hair: 			<?=$row['hair']?></h5>
          <h5 class="blacktext">Eyes: 		<?=$row['eyes']?></h5>
          <h5 class="blacktext">&nbsp;</h5>
          <h5 class="blacktext">ADDRESS</h5>
          <!--<h5 class="blacktext">Chateau Billings</h5>
          <h5 class="blacktext">A Talent Agency</h5>
          <h5 class="blacktext">(323) 965-5432 Phone</h5>
          <h5 class="blacktext">(323) 931-7404 Fax<br>-->
         <h5 class="blacktext"><?=$text2?> </h5>
         
         <BR />
         <table width="100%" border="0" class="blacktext">
              
		 <?
		 $sql="SELECT * FROM resume_detail order by id " ;
		 $rs=mysql_query($sql) or die (mysql_error()) ;
		while ($row2=mysql_fetch_array($rs))
		{ 
			
		$section=trim($row2['section']);
		$skills=trim($row2['skills']);
		if ($section != $prv_section) 
		{
			echo "<tr> <td colspan=2 > <b>$section </b> </td>  </tr>  \n";
		}
		if ($skills != $prv_skills) 
		{
			echo "<tr> <td colspan=2 > <b>$skills</td> </tr> ";
		}
	
		  if ($row2['field1']!=""  && $row2['field2']!="" && $row2['field3']!="" )
		  { 
		  
		  ?> 
                
                <tr>
                  <td width="33%"><?=$row2['field1']?> </td>
                  <td width="33%"><?=$row2['field2']?></td>
                  <td width="33%"><?=$row2['field3']?></td>
                </tr>
          <?
		  }
		  elseif($row2['field1']!="" &&  $row2['field2']!="" )
		  {
		  	?>
                 <tr>
                  <td width="33%"><?=$row2['field1']?> </td>
                  <td width="33%" colspan=2><?=$row2['field2']?></td>
                </tr>
			<?
		  }
		  elseif($row2['field1']!="" )
		  {
		  	?>
                 <tr>
                  <td width="33%" colspan=3><?=$row2['field1']?> </td>
                </tr>
            <?
		  }
		  elseif($row2['field2']!="" )
		  {
		  	?>
                 <tr>
                  <td width="33%" colspan=3><?=$row2['field2']?> </td>
                </tr>
            <?
		  }
		  elseif($row2['field3']!="" )
		  {
		  	?>
                 <tr>
                  <td width="33%" colspan=3><?=$row2['field3']?> </td>
                </tr>
            <?
		  }
		  
		  
	  	$prv_section=$section;
		$prv_skills=$skills;
	
		  	}// while
		
		  ?>
           </table>
            </td>
      </tr>
	    </tbody></table></td>
  </tr>
  <tr>
    <td><img src="images/resume_bottom.gif" alt="Michael Marinaccio" width="950" height="39" /></td>
  </tr>
</tbody></table>
</body></html>