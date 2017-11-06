email sender page loaded successfully
<?php


// the php code here is written buy Avi Tannenbaum
// This code is responsible for loading multiple template files with sneders type.$_COOKIE

//Import Collections notice email template.

include '/erp/aibwp/Mail/Templates/CollectionsEmail.php';

//Confirm this page in php loads successfully.
echo " <br> \r\n php running successfully. <br>";

//Confirm the code has recieved the correct email entered into the form.
echo " The email you entered is: "  ;
// Recorded email
echo urldecode($_GET['email2']);


?>