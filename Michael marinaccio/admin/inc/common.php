<?php
	include_once("global.inc.php");

	// My SQL conection 
/*	define ("HOST","localhost");
	//mysql305.ixwebhosting.com
	define("USER","root");
	define("PASS","");
		define("DB","flash_cms_mm"); */
	
	define ("HOST","localhost");
	define("USER","wwwmich_sntech00");
	define("PASS","cmsmmflash");
	define("DB","wwwmich_cmsmm");
	
	//connectttttttttt
	mysql_connect(HOST,USER,PASS) or die (HOST.",".USER.",".PASS ) ;
	mysql_select_db(DB);
	session_start();
	?>