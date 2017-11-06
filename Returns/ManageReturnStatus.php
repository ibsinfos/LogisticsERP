<?php
// Here you can manage al the returns and send an email to the customer.
// Created by Avi T.

echo "Reutrn Page loaded successfully. <br>";

// create a connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Set the connection. 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check conenction
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else
 {
     echo "Connected to the sql server successfully. <br>";
 }

 $
?>
<h1> Update a record.</h1>
<p> HTML Form starts here </p>