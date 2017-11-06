

<p> Collection page loaded successfully </p>

<?php
/* This is the template in charge of sending a collection email notice */
/* Written by Avi Tannenbaum of StarShows Studios inc. All rites resreved 2016 */
/* Collection notice email template begin */ 

// Email Starts Here
//$emailEntered = urldecode($_GET["email2"]);

/* enter custom email for test only.
// Email Starts Here */
$emailEntered = urldecode($_GET['email2']);


// check that the email feild is not blank.
if ($emailEntered != ""){
   $to = $emailEntered; 
}
else {
    echo "<br> <br> Somthings wrong. <br> email not intered correctly <br>  or No Email entered yet, Please enter an email. <br> <br>";
    
}
// The subjuct (Custom to the template).
$subject = '[AIB Express Logistics] Outstanding receivable. ';
// From email. Recomended general cumpoany email. this will be sent to gabi and amit.
$from = 'finance@aibexpressonline.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
// Change default email body text here - Avi Tannenbaum
// pull collection information for the email.$_COOKIE
// include the PullConnection.php document.$_COOKIE
include 'http://ftp.starshowsstudios.com/erp/aibwp/Mail/Functions/PullCollectionRecords.php';

// Start using the collection information and manipulating the content below here.


//Mesasage begin
$message = '<html><body>';
// Styled header text.
$message .= '<h1 style="color:#f40;">Dear Customer</h1>';
// Styled body text begims here.
$message .= '<p style="color:#080;font-size:18px;">Test Email sent from the AIB ERP system by Avi Tannenbaum</p>';
// End html tags nessasry for email to send html formatted text
$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}



?>
