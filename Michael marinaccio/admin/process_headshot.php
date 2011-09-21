<?php
	require_once("inc/common.php");
	require_once("class.imageconverter.php");	
	$srno = $_POST['srno'];
	$thumbnail_path = "";
	$display_path = "";
	$printable_path = "";
	
	if ($_FILES['thumbnail']['tmp_name'] != "")
	{
	
		$new_name=$_FILES['thumbnail']['name'];
		$new_name=rand().$new_name;
		$thumbnail_path = "../G_images/thumb_".$new_name;
		move_uploaded_file($_FILES['thumbnail']['tmp_name'],$thumbnail_path);

			
			// get the extention
/*		$ext=explode("/",$_FILES['thumbnail']['type']);
		$ext=$ext[1];
		$len =intval ("-".strlen($ext));
		//upload file
		$new_name=$_FILES['thumbnail']['name'];
		$new_name=rand().$new_name;
		$thumbnail_path = "../G_images/thumb_".$new_name;
		move_uploaded_file($_FILES['thumbnail']['tmp_name'],$thumbnail_path);
		// convert image.
		$img = new ImageConverter($thumbnail_path,"jpg");
		$thumbnail_path=str_replace(".".$ext,"jpg",$thumbnail_path);*/
		
	}//if
	if ($_FILES['display']['tmp_name'] != "")
	{
		// get the extention
		/*$ext=explode("/",$_FILES['display']['type']);
		$ext=$ext[1];
		$len =intval ("-".strlen($ext));
		//upload file
		$new_name=$_FILES['display']['name'];
		$new_name=rand().$new_name;
		$display_path = "../G_images/disp_".$new_name;
		move_uploaded_file($_FILES['display']['tmp_name'], $display_path);
		// convert image.
		$img = new ImageConverter($display_path,"jpg");
		$display_path=str_replace(".".$ext,".jpg",$display_path);*/
		
		$new_name=$_FILES['display']['name'];
		$new_name=rand().$new_name;
		$display_path = "../G_images/disp_".$new_name;
		move_uploaded_file($_FILES['display']['tmp_name'], $display_path);


	}//if
	if ($_FILES['printable']['tmp_name'] != "")
	{
		// get the extention
/*		$ext=explode("/",$_FILES['printable']['type']);
		$ext=$ext[1];
		$len =intval ("-".strlen($ext));
		//upload file
		$new_name=$_FILES['printable']['name'];
		$new_name=rand().$new_name;
		$printable_path = "../G_images/disp_".$new_name;
		move_uploaded_file($_FILES['printable']['tmp_name'], $printable_path);
		// convert image.
		$img = new ImageConverter($printable_path,"jpg");
		$new_name=str_replace(".".$ext,".jpg",$printable_path);*/

		$new_name=$_FILES['printable']['name'];
		$new_name=rand().$new_name;
		$printable_path = "../G_images/print_".$new_name;
		move_uploaded_file($_FILES['printable']['tmp_name'], $printable_path);


	}//if
	
	if ($_FILES['single']['tmp_name'] != "")
	{
			
		if (file_exists($nrow['thumbnail_path'])) 	unlink("".$nrow['thumbnail_path']);
		if (file_exists($nrow['display_path'])) 	unlink("".$nrow['display_path']);
		if (file_exists($nrow['printable_path']))	unlink("".$nrow['printable_path']);
			
			// get the extention
		$ext=explode("/",$_FILES['single']['type']);
		$ext=$ext[1];
		$len =intval ("-".strlen($ext));
		$new_name=$_FILES['single']['name'];
		$new_name=rand().$new_name;
		move_uploaded_file($_FILES['single']['tmp_name'], "../G_images/".$new_name);
		//$img = new ImageConverter("../G_images/".$new_name,"jpg");
		$new_name=str_replace(".".$ext,".jpg",$new_name);
		
		$thumbnail_path = "../G_images/thumb_".$new_name;
		$display_path = "../G_images/disp_".$new_name;
		$printable_path = "../G_images/print_".$new_name;
	
		$uploadedfile ="../G_images/".$new_name;
		copy("../G_images/".$new_name, $printable_path);
		
		// Capture the original size of the uploaded image
		
		list($width,$height)=getimagesize($uploadedfile);
		//$newwidth=450;
	
		$newheight=280;
		$newwidth=($width/$height)* $newheight;
		//$newheight=($height/$width)*$newwidth;
		$newheight1=75;
		$newwidth1=120;
	
		$src =  imagecreatefromjpeg($uploadedfile);
		
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$filename = "../G_images/disp_".$new_name;
		imagejpeg($tmp,$filename,100);
		imagedestroy($src);
		imagedestroy($tmp);
		

		$src1 = imagecreatefromjpeg($filename);
		list($width,$height)=getimagesize($filename);
		$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
		imagecopyresampled($tmp1,$src1,0,0,0,0,$newwidth1,$newheight1,$width,$height);
		$filename1= "../G_images/thumb_".$new_name;
		imagejpeg($tmp1,$filename1,100);
		imagedestroy($src1);
		imagedestroy($tmp1);
	}//if
	
	
	$caption = $_POST['caption'];
	
	
	if ($thumbnail_path!="" ) 
	{
		$sql="update headshot set caption = '".$caption."',thumbnail_path= '".$thumbnail_path."' where  srno =".$srno ;
		//echo "query is ".$sql;
		mysql_query($sql)or die(mysql_error());
	}// if 


	if ($display_path!="" ) 
	{
		$sql="update headshot set caption = '".$caption."',display_path ='".$display_path."' where  srno =".$srno ;
	//echo "query is ".$sql;
		mysql_query($sql)or die(mysql_error());	
	}// if 

	if ($printable_path!="" )
	{
		$sql="update headshot set caption = '".$caption."',printable_path = '".$printable_path."' where  srno =".$srno ;
		//echo "query is ".$sql;
			mysql_query($sql)or die(mysql_error());	
	}// if 

		$sql="update headshot set caption = '".$caption."'  where  srno =".$srno ;
		mysql_query($sql)or die(mysql_error());	

	header("Location:headshots.php");
?>