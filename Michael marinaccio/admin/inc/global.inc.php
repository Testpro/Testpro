<?php

function findexts ($filename)
{
	$filename = strtolower($filename) ;
	$exts = split("[/\\.]", $filename) ;
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts;
} 

function makeClickableLinks($text)
{

        $text = html_entity_decode($text);
        $text = " ".$text;
        $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a href="\\1" target="_blank">\\1</a>', $text);
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a href="\\1" target="_blank">\\1</a>', $text);
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
        '\\1<a href="http://\\2" target="_blank">\\2</a>', $text);
        $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})',
        '<a href="mailto:\\1" target="_blank">\\1</a>', $text);
        return $text;
}



function get_setting($setting_name)
{
	$sql="SELECT current_value FROM master_setting WHERE setting_name='".$setting_name."'";
	$rs=mysql_query($sql);
	if($row=mysql_fetch_array($rs))
	{
		return $row[0];
	}//if
	else
	{
		return "";
	}//else
}//function

function writeFile()
{
	// create the text file for flash
	// Get Contetns from the file 
	$h=fopen("text_resume_working.txt","rb");
	$text=fread($h,filesize("text_resume_working.txt"));
	fclose($h);
	// got the text now replace the {} things with database itmes.
	// get items from database
	$sql="SELECT * FROM resume_master ";
	$row=mysql_fetch_array(mysql_query($sql));
	 $text=str_replace("{url}",$row['url'],$text);
	
	$text=str_replace("{height}",makeClickableLinks($row['height']),$text);
	
	$text=str_replace("{weight}",makeClickableLinks($row['weight']),$text);
	
	$text=str_replace("{eyes}",makeClickableLinks($row['eyes']),$text);
	
	
	// add the address from contact file.
$h_contact=fopen("../text_contact.txt","rb");

	$text_contact=fread($h_contact,filesize("../text_contact.txt"));
	fclose($h_contact);
	$text2=str_replace("&Message=","",$text_contact);
	//$text2=str_replace("Message=","",$text_contact);
	$text=str_replace("{address1}","<BR>".$text2,$text);
	
	$text=str_replace("{phone}",makeClickableLinks($row['phone']),$text);
	$text=str_replace("{fax}",makeClickableLinks($row['fax']),$text);
	$text=str_replace("{hair}",makeClickableLinks($row['hair']),$text);
	
	// add the sections in the Current text
	$sql="SELECT * FROM resume_detail order by id " ;
	$rs=mysql_query($sql);
	$str_section="";
	
	while ( $row=mysql_fetch_array($rs) ) 
	{
		$section=trim(makeClickableLinks($row['section']));
		$skills=trim(makeClickableLinks($row['skills']));
		
		$field1=trim(makeClickableLinks($row['field1']));
		$field2=trim(makeClickableLinks($row['field2']));
		$field3=trim(makeClickableLinks($row['field3']));
		if ($section != $prv_section) 
		{
			$str_section.="<BR><BR><b>$section </b>\n";
		}
		if ($skills != $prv_skills) 
		{
			$str_section.="<BR> <b>$skills</b>\n <BR>";
		}
		// trying to aling with adding spaces
		$str_section.= $field1.putSpace(20-(strlen($field1))).$field2.putSPace( 20-(strlen($field2))).$field3.putSPace( 20-(strlen($field1)))."<BR>" ;
		$prv_section=$section;
		$prv_skills=$skills;
	}///while 
	$text=str_replace("{section}",$str_section,$text);
	// write new replaced content to the flash 
	$text_file="text_resume.txt";
	$handle=fopen("../$text_file", "w");

	$a=fwrite($handle,stripslashes(html_entity_decode($text)));
	fclose($handle);
	return $text ;
}

function putSpace($cnt)
{
	$tm="";
	for($i=0;$i<=$cnt;$i++)
	{
		$tm.= " ";
	}// for
	return $tm;
}


?>