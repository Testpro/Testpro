<?
include("inc/common.php");
if (isset($_POST['username']) &&  isset($_POST['pass']) )
{
	// get master settings for admin username and password
	 $admin_username="admin";//get_setting("Admin_Username");
	 $admin_password="admin";//get_setting("Admin_Password");	 
	 
	 if ( $admin_username== $_POST['username']  && $admin_password==$_POST['pass']) 
	 {
	 	//Loggged in Sucessfull
		///Set the session variable 
		$_SESSION['username']=$admin_username;
		$_SESSION['usertype']="Admin";
		// redirect to the Index page.
		header("location: biography.php");
		exit();
	 }// if 
}

//check whethere user is already loggedin in or not 
if ( !(isset($_SESSION['username'])	&& isset($_SESSION['usertype']))  )
{
	// redirect to the Login Page.
	header("location:index.htm");
}
?>