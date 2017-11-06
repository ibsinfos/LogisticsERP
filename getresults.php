<?php
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

$sql = "SELECT RecipientCompaney, ComapneyEmail, RecipientName, AddressLine1, AddressLine2, City, State, ZipCode, trackingNumber, SenderCompany,   FROM InternalTrackingDataBase";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Recipient Companey: " . $row["RecipientCompaney"]. " - Email: " . $row["ComapneyEmail"]. " " . $row["RecipientName"]. "Address Line 1: " . $row["AddressLine1"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>