


 <?php

   // require_once('/erp/aibwp/conn.php'); //establish the connection with the database on this page.

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

$queryData = mysql_query("SELECT DISTINCT RecipientCompaney AS RecipientCompaney FROM 'InternalTrackingDataBase' ");

$result = mysql_fetch_array(mysql_query($queryData));   //$result now has database tables

?>
<select name='RecipientCompaney'>
<?php
while($row = mysql_fetch_array($result))
{
    ?>
        <option values=<?php echo($row['RecipientCompaney']); ?></option>
    <?php
}
?>
</select>
<?php
?>