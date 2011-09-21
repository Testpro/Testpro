<?
include_once("inc/common.php") ;
	include("check_login.php");
error_reporting(E_ALL ^ E_NOTICE);
$sql="SELECT * FROM resume_detail WHERE section='".$_GET['section']."' order by field_order ASC" ;  
$res= mysql_query($sql)  or die (mysql_error()) ; 
$res2= mysql_query($sql)  or die (mysql_error()) ; 
$row2=mysql_fetch_array($res2); 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstration Panel</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="process_edit.php" name="frmResume" method="post" >

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
            <td> <?php
			include("inc/leftPan.php")
			?></td>
          </tr>
          <tr>
            <td height="200" valign="bottom"><h5><span class="orangetext"><strong>Questions?</strong></span><strong> Send us an email:</strong><br />
                <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a></h5></td>
          </tr>
        </table></td>
        <td width="1%" align="left" valign="top" class="vr"><img src="images/vr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
        <td width="74%" valign="top"><table width="100%" cellspacing="6" cellpadding="0">
          <tr>
            <td width="100%" colspan="3"><h4 class="orangetext"><strong>RESUME Edit Section </strong></h4></td>
          </tr>

          <tr class="hr">
            <td colspan="3"><img src="images/hr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
          </tr>
        <?
			if ($_GET['nosection']) 
			{
			?>
          <tr>
            <td colspan="3" align="left" class="text orangetext">
			
			
				<? echo "<div class='orangetext'> Please enter Section Name </div>" ; ?> 
			
			
			&nbsp;</td>
         
          </tr>
		  <? }
			?> 
		 <tr>
                <td align="left" class="text orangetext">
				Section Name:				<BR><strong>
                </strong></td>
                <td align="left" class="text orangetext"><input type="text" name="sectionNew" id="sectionNew" value="<?=$_REQUEST['section']?>" />
                  <input type="hidden" name="section" id="section" value="<?=$_REQUEST['section']?> " /></td>
                <td align="left" class="text orangetext">&nbsp;</td>
              </tr>
		 <tr>
		   <td align="left" valign="top" class="text orangetext"> Special Skills:&nbsp; <br />
		       <strong> </strong></td>
		   <td align="left" valign="top" class="text orangetext"><textarea name="skills" cols="30" rows="2" id="textarea"><? if($row2['skills']!="")echo $row2['skills'];?></textarea></td>
		   <td align="left" class="text orangetext">&nbsp;</td>
		   </tr>
		 <tr>
		   <td colspan="2" align="left" class="text orangetext"><strong>
		     <hr />
		   </strong></td>
		   <td align="left" class="text orangetext">&nbsp;</td>
		   </tr>

          <tr >
            <td colspan="3" align="left"><table width="100%" border="0">
              <tr class="text orangetext">
                <td width="33%"><h5>Field 1 
                </h5></td>
                <td width="33%" ><h5>Field 2 
                </h5></td>
                <td width="33%"><h5> Field 3 </h5></td>
              </tr>
             <?
			 	while ($row=mysql_fetch_array($res)) 
				{
			 ?> 
			  <tr class="text orangetext">
                <td><input name="field1[]" type="text" id="field1[]" value="<?=$row['field1']?>" ></td>
                <td ><input name="field2[]" type="text" id="field2[]" value="<?=$row['field2']?>"></td>
                <td><input name="field3[]" type="text" id="field3[]" value="<?=$row['field3']?>"></td>
                <td><a href="resume_delete_row.php?row_id=<?=$row['id']?>&section=<?=$_GET['section']?>"  onclick="return confirm('Are you sure! You want to delete this row');"  class='text'><img src="images/delete.png" border="0" /></a></td>
              </tr>
			  <?
			  }// while 
			  ?> 
              
              
            </table></td> </tr>
           <tr >
            <td colspan="3" align="right">
            <span id="NewRow"></span>
          </tr>
		  <tr >
            <td colspan="3" align="right"><input type="reset" name="Reset" id="button" value="Cancel" onclick="window.location='resume.php'" />
                <input type="submit" name="button2" id="button2" value="Submit Changes" /> <a href="JavaScript:;" class= "" onclick="AddRow();">  Add New Row  </a>  </td>
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
 <script>
var xmlHttp;			  
			  function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}


			  function AddRow(id)
			  {
			  
			   xmlHttp=GetXmlHttpObject();
				 url="getRow.php";
				xmlHttp.onreadystatechange=showRow;
				xmlHttp.open("POST",url,true)
				xmlHttp.send(null)
				
			  }
			  function showRow()
			  {
			 
			if (xmlHttp.readyState==4)
			{
				var str=document.getElementById("NewRow").innerHTML;
				
			  	var ResponseText =xmlHttp.responseText;
				
					
					if (str)
					document.getElementById("NewRow").innerHTML=str+ResponseText ;
					else
					document.getElementById("NewRow").innerHTML=ResponseText ;
				}// if 	
			  }
			  
			  </script>
			 
<map name="Map" id="Map"><area shape="rect" coords="647,44,745,85" href="https://www.seventhplanet.net/" target="_blank" alt="Seventh Planet, Inc." />
<area shape="rect" coords="43,37,291,70" href="index.htm" alt="Adminstration Panel" />
</map></body>
</html>
