<!DOCTYPE HTML PUBLIC "//W#C//DTD HTML 4.01//EN" "\Finance\Pages\frameworks\HTML\strict.dtd">

<html>

<head>
<title>Lookup collection records</title>
</head>
<body>

<h1>Collections Manager</h1>
<p> By Avi Tannenbaum <p>
	


	<!-- new record button -->

	<p><div class="newRecordButton"><a href="\Finance\Pages\Functions\new.php">Add a new record </a></div></p>

	<p><div class="newRecordButton"><a href="\Finance\Pages\Functions\importForm.php">Import from excell </a></div></p>

	<p><div class="newRecordButton"><a href="\Finance\Pages\Functions\new.php">Send an email to everyone. </a></div></p

	<?php

	// Designed and developed by Avi Tannenabum.
	// All rites researved to Avi Tannenbaum 2016.
/*
collectionDatabaseManagerView.php

Displays all data from the 'collections' table.
*/



//connect to the database

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








// Get results from database.


$result = $conn->query("SELECT * FROM Collections");



// display results.


echo "<p><b> View All</b> | <a href=' /Finance/Pages/Collections/Views/viewCollectionsPagenated.php?page=1'>View Collections Pagenated</a></p>";

// Cell Style is defined here
// table style collections

echo "<table border='1' cellpadding='10'>";

// defin the table cell headers
echo "<tr> <th>Companey Name</th> <th>Type</th> <th>Date</th> <th>Number</th> <th>Post Office Box</th> <th>EMail</th> <th>Terms</th> <th>Due Date</th> <th>Aging</th> <th>Open Ballance</th> <th>Total</th> <th>Row ID</th> <th></th> <th></th> <th></th>";

// Loop through the results of the database query allowing the data to be displayed in a table

while($row = mysqli_fetch_array( $result )) {

// echo out the contents of the database into the table.

echo "<tr>";

// Companey Name.
echo '<td>' . $row['companyname'] .'</td>';

// Type
echo '<td>' . $row['type'] .'</td>';

//Date
echo '<td>' . $row['date_col'] .'</td>';

//Invoice number
echo '<td>' . $row['num'] .'</td>';

//PO number - 
echo '<td>' . $row['po'] .'</td>';

//EMail - the email feild from the server..
echo '<td>' . $row['email'] .'</td>';

//Terms - terms of service.
echo '<td>' . $row['terms'] .'</td>';

//Due Date - When it has to be payed by.
echo '<td>' . $row['duedate'] .'</td>';

//Aging  - The time the customer has not payed the bill.
echo '<td>' . $row['duedate'] .'</td>';

//Open Balance  - How much the customer still has to pay us.
echo '<td>' . $row['openbalance'] .'</td>';

//Total  - How much the customer still has to pay us.
echo '<td>' . $row['total'] .'</td>';

//Row ID  - For tecnical use mostly. The ID of the row to pull the correct infromation.
echo '<td>' . $row['id'] .'</td>';

// Begin with edit button
echo '<td><div class="FuncButton"><a href="\Finance\Pages\Functions\edit.php?id=' . $row['id'] . '">Edit</a></div></td>';

// Begin with delete button.
echo '<td><div class="FuncButton"><a href="\Finance\Pages\Functions\delete.php?id=' . $row['id'] . '">Remove</a></div></td>';

// Begin with email collection button.
echo '<td><div class="FuncButton"><a href="\Finance\Pages\Functions\send.php?id=' . $row['id'] . '">Send Notice</a></div></td>';

echo "</tr>";

}


// close the table.
echo "</table>";





	?>
>
</body>




<!-- footer -->
</html>
<?php
// footer details
$directory = getcwd()."\n";
// show the directory root of the document.

echo '<div class="Footer"> <p> You can find this document in the following directory: </p> </div>';
echo $directory;
?>