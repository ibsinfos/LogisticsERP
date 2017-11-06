<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/

// this script is used to delete a record.

// connect to the database

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
      echo "<p style='    text-align: center; font-size: 24px; padding: 15px; background: lightblue; border-radius: 5px; margin-top: 15px;'> The record has been deleted successfully <a href =\"javascript:history.go(-1)\">GO Back</a> </p>";

}



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

$id = $_GET['id'];



// delete the entry

$result = mysqli_query($conn, "DELETE FROM Collections WHERE id=$id")

or die(mysqli_error($conn));



// redirect back to the view page

header("Location: /Finance/Pages/Collections/collectionDatabaseManagerView.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: /Finance/Pages/Collections/collectionDatabaseManagerView.php");

}



?>