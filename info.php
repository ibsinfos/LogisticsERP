
<?php
$servername = "localhost";
$username = "aiberpco_aibwp2";
$password = "Superflower86@";
$dbname = "aiberpco_aibwp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO LabelDataBase (Company, DateRecieved, TrackingNumber4)
VALUES ('$_POST[Label_Company]', '$_POST[Label_DateRecieved]', '$_POST[Label_TrackingNumber4]')";

setcookie("UserFormData", serialize($_POST), time()+3600);  /* expire in 1 hour */

if ($conn->query($sql) === TRUE) {
    echo "<p style='    text-align: center;
    font-size: 24px;
    padding: 15px;
    background: lightblue;
    border-radius: 5px;
    margin-top: 15px;'> This package has been added to the AIB database for intenral tracking successfully <a href =\"javascript:history.go(-1)\">GO Back</a> </p>";

   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>