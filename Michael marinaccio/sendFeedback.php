<?

	if ($_GET['name']!="" && $_GET['email']!="" &&  $_GET['comments']!=""     ) 

	{
		if($_GET['phone']!="") {
			$ph = $_GET['phone'];
		} else {
			$ph = " ";
		}
		$a=mail("mjmarinaccio@gmail.com" ,"Feedback from website","A message posted on website as below \n\n".$_GET['comments']." \nPhone: ".$ph." \n ","FROM:".$_GET['email']."" );

		if ($a) 

		{

			echo "Message Sent!" ;

		}

		

	}

	else

	{

		echo "Please enter all values " ;

	}

	

?> 