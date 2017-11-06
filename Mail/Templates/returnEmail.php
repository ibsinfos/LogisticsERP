return page loaded successfully

<?php

/* Setup connection with the sql databse */

/*Designed and developed by Avi Tannenbaum 2016 */
// Set connection configuration
$servername = "localhost";  //Avi, Enter database loclhost
$username = "username";  //Avi, Enter database username
$password = "password"; //Avi, Enter database password
$dbname = "myDB"; //Avi, Enter database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check a connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "";

$conn->close();
?>