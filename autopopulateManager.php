<?php


//Created and designed by Avi Tannenbaum 2016 | StarShows Studios 2016
$servername = "localhost";
$username = "aiberpco_aibwp";
$password = "Superflower86@";
$dbname = "aiberpco_aibwp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql ="SELECT RecipientCompaney RecipientCompaney FROM InternalTrackingDataBase";
$result = mysql_query($sql);

echo "<select name='InternalTrackingDataBase'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['RecipientCompaney'] ."'>" . $row['RecipientCompaney'] ."</option>";

}
echo "</select>";
?>
