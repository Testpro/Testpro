<?php
include_once("checklogin.php");
include_once("template.inc.php");
headers();
?>

<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>Admin Portal</TITLE>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">-->
<style>
.tablestyle{
		font-family: Tahoma, Verdana;
		
		margin:0px 0pt 0px;
		font-size: 8pt;
		border-color: silver;
		vertical-align:middle;
		width:100%;
		background-color: White ;
		border-width:thin;  
		border-left-width :0px;
		border-right-width:0px;
		border-bottom: solid 1px silver;
		border-top-color :White;
		border-spacing :0;
         
}

P {
	PADDING-LEFT: 8px; FONT-SIZE: 12px; MARGIN: 10px; COLOR: #333333; LINE-HEIGHT: 18px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
.small {
	PADDING-LEFT: 10px; FONT-WEIGHT: normal; FONT-SIZE: 10px; COLOR: #333333; LINE-HEIGHT: 14px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
.headerstyle {
		background-color:#03415D;
		border-color:gray;
		border-style:solid ;
		border-width:thick;  
    
} 
.big {
	PADDING-LEFT: 10px; FONT-SIZE: 14px; COLOR: #333333; LINE-HEIGHT: 14px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}
TD {
	FONT-SIZE: 12px; COLOR: #333333; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
}

INPUT {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 10px; PADDING-BOTTOM: 0px; COLOR: #333; PADDING-TOP: 0px; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #eeeeee
}
.rowstyle
{
		height:5px;
		vertical-align :middle ;
		
			PADDING-LEFT: 10px; FONT-WEIGHT: normal; FONT-SIZE: 10px; COLOR: #333333; LINE-HEIGHT: 14px; FONT-FAMILY: verdana, arial, "ms sans serif", sans-serif
	
}
TEXTAREA {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 10px; PADDING-BOTTOM: 0px; COLOR: #333; PADDING-TOP: 0px; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #eeeeee
}
SELECT {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 10px; PADDING-BOTTOM: 0px; COLOR: #333; PADDING-TOP: 0px; FONT-FAMILY: verdana, arial, sans-serif; BACKGROUND-COLOR: #eeeeee
}
INPUT.button {
	BORDER-RIGHT: #999 2px outset; BORDER-TOP: #999 2px outset; BORDER-LEFT: #999 2px outset; BORDER-BOTTOM: #999 2px outset; BACKGROUND-COLOR: #ccc
}
</STYLE>

</HEAD>
<BODY bgColor=#eeeeee>
<CENTER>
<TABLE cellSpacing=20 width="100%">
  <TBODY>
  <!--<TR>
      <TD bgcolor="#999999" height = 30> 
        <div align="center"><font color="#FFFFFF"><b>Administration 
          Portal</b></font> </div>
      </TD>
    </TR>-->
	<?php include_once("menu.php"); ?>
  <TR>
    <TD>
                                                 
                                                      
                                                          <?php

pt_register('GET','ord');
if($db==1)
{
	//echo $hostname.$username.$password.$dbname.$table;
	
	echo "<form name='frmmain' method='POST' action='process_mastersettings.php'>";
	echo"<table border=0 width=90% class='tablestyle'>";
	echo "<tr class='headerstyle'>";
	
	$query = "select * from master_setting ";
	$result = mysql_query($query);
	$bgcolor = "#F9F9F9";
	while($row=mysql_fetch_array($result))
	{
		echo "<tr bgcolor='".$bgcolor."'>";
		if($bgcolor == "#F9F9F9")
		{
			$bgcolor = "#C6E0FD";
		}//if
		else
		{
			$bgcolor = "#F9F9F9";
		}//else
		echo "<td class='rowstyle'>".$row['setting_name']."</td>";
		echo "<td class='rowstyle'>";
		switch($row['setting_type'])
		{
			case 'Textbox':
				echo "<input type='textbox' size=40 name='".$row['setting_name']."' value='".stripslashes($row['current_value'])."'>";
				break;
			case 'Textarea':
				echo "<textarea rows=20 cols=60 name='".$row['setting_name']."' id='".$row['setting_name']."'> ".stripslashes($row['current_value'])."</textarea>";
				echo "<script language='javascript1.2'>generate_wysiwyg('".$row['setting_name']."');</script>";
				break;
			case 'Textbox':
				echo "<input type='checkbox' name='".$row['setting_name']."' value='".$row['current_value']."'>";
				break;
		}//switch
		echo "</td>";
		echo "</tr>";
	}
	
	echo "<tr><td class='rowstyle'><input type='submit' value='Update Settings'>";

	echo "</table></form>";
}

//MySQL ends

?>
                                                          <br>
