<?php

/* This is the template in charge of sending a collection email notice */
/* Written by Avi Tannenbaum of StarShows Studios inc. All rites resreved 2016 */
/* Collection notice email template begin */ 

// Email Starts Here
//$emailEntered = urldecode($_GET["email2"]);

/* enter custom email for test only.
// Email Starts Here */


echo "Please enter the customers email.";
$msg="";
if(isset($_POST['submit']))
{

	$companey_name = "[AIB Express Logistics]";
	$from_add = "finance@aibexpressonline.com"; 

	$to_add = $_POST['emailfeild']; //This useses the html form in order to send the emailfeild.

	$subject = "$companey_name Outstanding receivable. ";
	$message = "Test Message";
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
	
	
	if(mail($to_add,$subject,$message,$headers)) 
	{
		$msg = "Mail sent OK";
	} 
	else 
	{
 	   $msg = "Error sending email!";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Test form to email</title>
</head>

<body>
<?php echo $msg ?>
<p>
<form action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method='post'>
<input type="text" name="emailfeild" id="emailfeild">
<input type='submit' name='submit' value='Submit'>
</form>
</p>


</body>
</html>