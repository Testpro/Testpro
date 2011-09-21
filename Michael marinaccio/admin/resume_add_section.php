<?
require_once("inc/common.php");
	include("check_login.php");
error_reporting(E_ALL ^ E_NOTICE);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminstration Panel : Resume : Add New Section s</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script>
function validate() 
{
	if(document.frmResume.section.value=="" )
	{
		alert("Please enter section name.") ;
		document.frmResume.section.focus();
		return false;
	}// if 
	return true;
	
}// function



</script>
</head>


<body>
<form action="process_add_new_section.php" name="frmResume" method="post"  onsubmit="javaScript:return validate();">

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
            <td height="200" valign="bottom"><h5><span class="orangetext"><strong>Questions?</strong></span><strong> Send us an email:</strong><br />
                <a href="mailto:webmaster@seventhplanet.net">webmaster@seventhplanet.net</a></h5></td>
          </tr>
        </table></td>
        <td width="1%" align="left" valign="top" class="vr"><img src="images/vr.gif" alt="Adminstration Panel" width="2" height="1" /></td>
        <td width="74%" valign="top"><table width="100%" cellspacing="6" cellpadding="0">
          <tr>
            <td colspan="3"><h4 class="orangetext"><strong>RESUME - Add New Section !</strong></h4> <hr></td>
          </tr>

          <tr class="hr">
            <td colspan="3"></td>
          </tr><?
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
                <td width="22%" align="left" class="text orangetext">
				Section Name:  				    <BR><strong>
               
                </strong></td>
                <td width="76%" align="left" class="text orangetext"><input type="text" name="section" id="section" /></td>
                <td width="2%" align="left" class="text orangetext">&nbsp;</td>
              </tr>
			<tr>
                <td align="left" valign="top" class="text orangetext">
				Special Skills:&nbsp;
				<BR><strong>
                </strong></td>
                <td align="left" valign="top" class="text orangetext"><textarea name="skills" cols="30" rows="2" id="textarea"></textarea></td>
                <td align="left" class="text orangetext">&nbsp;</td>
              </tr>
			<tr>
			  <td colspan="2" align="left" valign="top" class="text orangetext"><strong>
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
              <tr class="text orangetext">
                <td><input name="field1[]" type="text" id="field1[]" /></td>
                <td ><input name="field2[]" type="text" id="field2[]" /></td>
                <td><input name="field3[]" type="text" id="field3[]" /></td>
              </tr>
              <tr class="text orangetext">
                <td><input name="field1[]" type="text" id="field1[]" /></td>
                <td ><input name="field2[]" type="text" id="field2[]" /></td>
                <td><input name="field3[]" type="text" id="field3[]" /></td>
              </tr>
              <tr class="text orangetext">
                <td><input name="field1[]" type="text" id="field1[]" /></td>
                <td ><input name="field2[]" type="text" id="field2[]" /></td>
                <td><input name="field3[]" type="text" id="field3[]" /></td>
              </tr>
			
            </table> </td> </tr>
         <tr >
            <td colspan="3" align="right">
            <span id="NewRow"></span>
          </tr>
          <tr >
            <td colspan="3" align="right"><input type="reset" name="Reset" id="button" value="Cancel" onclick="window.location='resume.php'" />
                <input type="submit" name="button2" id="button2" value="Submit Changes" /> <a href="JavaScript:;" onclick="AddRow();">  Add New Row  </a> </td>
          </tr>
          <tr >
            <td colspan="3" align="right" class="orangetext"><h5>(*First add as many rows as you wish and then enter data in field boxes)</h5></td>
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
