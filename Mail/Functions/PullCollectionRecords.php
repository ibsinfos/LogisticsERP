<?php
// Here you can pull records for collections.
// You can include this page in any email you want to include the collectin notice information over here.$_COOKIE
echo "<h1> The collecton information includsion page has loaded successfully. </h1>";

// start a databse connection overhere.

$servername = "localhost";
$username = "starshows_aibwp";
$password = "Superflower86@";
$dbname = "starshows_aibwp";

// Creat an sql cunnection and run the conn function

$conn =new mysqli($servername, $username, $passwords, $dbname);

// make sure there is a successfull connection.

if ($conn->connect_error) {
    die("Oops, there seems to be a problem with the connectuon to the sql server. Contasct Avi Tannenbaum or Check the sql database information and see that maybe the serverside passwords or information has not changed. Hint: " . $conn->connect_error);
}

else 
{
    echo " PHO and SQL successfully linked. <br> ";
    
}


?>