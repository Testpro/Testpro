var xmlHttp

function sendFeedback()
{
		xmlHttp=GetXmlHttpObject();
		var url="sendFeedback.php";
		url=url+"?name="+document.getElementById('name').value+"&phone="+document.getElementById('phone').value+"&email="+document.getElementById('email').value+"&comments="+document.getElementById('comments').value;
		//alert ('this is url'+url);
		xmlHttp.onreadystatechange=ShowMsg;
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	
}

function LoadFile(file)
{
	//alert(file);
	xmlHttp=GetXmlHttpObject();
		var url="get_file_contents.php";
		url=url+"?file="+file;
		//alert ('this is url'+url);
		xmlHttp.onreadystatechange=ShowHtml;
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
}// Load File.

function ShowHtml()
{
	var ResponseText =(xmlHttp.responseText);
	if (ResponseText) 
	{
		document.getElementById("BioAjax").innerHTML=ResponseText;
		
	}/// if 
	
}// function ShowEmail.

function ShowMsg()
{
	var ResponseText =(xmlHttp.responseText);
	if (ResponseText) 
	{
		document.getElementById("FeedbackMsg").innerHTML=ResponseText;
		
	}/// if 
	
}// function ShowEmail.



	
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



 	function mailCheck(object)
	{
		// email validation	
		var len1 = object.value.length;
		var j ;
		var flag1=0;
		var flag2=0;
		for(j=0; j<=len1;j++)
		   {
			   if(j==0)
			      {
			        if ((object.value.charAt(j)=="@")||(object.value.charAt(j)=="."))
					  {
					   alert("Enter one Valid Email id \n Example:- www.mymail@mydomain.com");
					   //document.getElementById(label).style.color="#FF0000";
					   object.focus();
					   return false;
					  }
			       }
					if (object.value.charAt(j)=="@")
						  {  flag1=1;	 }
					if (object.value.charAt(j)==".")
						 {  flag2=1;    }	
		  } 	 
				
			  if ((object.value.charAt(0)=="@")||(object.value.charAt(0)==".")||(object.value.charAt(len1)=="@")||(object.value.charAt(len1)=="."))
					  {
					   $flag=0;
					   $flag=0;
					  }
		
		
		if((flag1!=1)||(flag2!=1))
				  {
				   alert("Invalid E-mail ID\n Example:- www.mymail@mydomain.com");  
				   //document.getElementById(label).style.color="#FF0000";
				   object.focus();
					return false;
				  }
		 // end of email validation	   
		return true; 
 }

function IsNumeric(strString)
   //  check for valid numeric strings	
   {
   var strValidChars = "0123456789.-";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
   }


