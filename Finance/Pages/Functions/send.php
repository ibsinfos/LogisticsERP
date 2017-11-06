<button onclick="history.go(-1);">Go Back </button>




<button onclick="history.go(-1);">Go Back </button>
<br>


<?php





echo "<h1>Email Sender loaded successfully.</h1>";




// connect to the database.

$servername ="localhost";
$username = "aiberpco_aibwp";
$password = "Superflower86@";
$dbname = "aiberpco_aibwp";

// Create Connection over here to the sql databse.
$conn = new mysqli($servername, $username, $password, $dbname);

// Make sure there is a successfull connection.

if ($conn->connect_error) {
    die("Oops, Something went wrong with the connection of the sql php data. Check the sql databse info is correct and that there is no error. Error code: " . $conn->connect_error);

}




else {
    echo "PHP and SQL successfully linked. <br>";
}

// confirm that the 'id' value is a valid integer before getting the form data



// get id from row

// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM Collections WHERE id=$id")

or die(mysqli_error());

$row = mysqli_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{


echo $id;

echo "<br>";
// get data from db

$companyname = $row['companyname'];
echo $companyname;
echo "<br>";

$type = $row['type'];

$date_col = $row['date_col'];

$num = $row['num'];

$po = $row['po'];

$email = $row['email'];

echo $email;
echo "<br>";

$terms = $row['terms'];

$duedate = $row['duedate'];

$aging = $row['aging'];

$openbalance = $row['openbalance'];

$total = $row['total'];






}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}




// begin writing the email

echo " The ID IS:";
echo $id;
echo "<br>";



// begin email functions

/* This is the template in charge of sending a collection email notice */
/* Written by Avi Tannenbaum of StarShows Studios inc. All rites resreved 2016 */
/* Collection notice email template begin */ 

// Email Starts Here
//$emailEntered = urldecode($_GET["email2"]);

/* enter custom email for test only.
// Email Starts Here */
$emailEntered = urldecode($email);


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

// Start using the collection information and manipulating the content below here.


//Mesasage begin
$message = '<html><body>';
// Styled header text.
$message .= '<h1 style="color:#f40;">Dear Customer</h1>';
// Styled body text begims here.
$message .= '<p style="color:#080;font-size:18px;">Test Email sent from the AIB ERP system by Avi Tannenbaum</p>';
// content
$message .= '<p style="color:#080;font-size:18px;">Dear </p>' .$companyname;

// outstanding balance
$message .= '<p style="color:#080;font-size:18px;">You have an outstanding balance of  </p>' .$total;

// from date
$message .= '<p style="color:#080;font-size:18px;">from the date of  </p>' .$date_col;


// End html tags nessasry for email to send html formatted text


$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}


?>


