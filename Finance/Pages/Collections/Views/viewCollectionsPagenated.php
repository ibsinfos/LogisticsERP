<!DOCTYPE HTML PUBLIC "//W#C//DTD HTML 4.01//EN" "/Finance/Pages/frameworks/HTML/strict.dtd">

<html>

<!-- Open header script -->

<head>

<!--name title of thetitle page goes here -->
<title>View Records</>

</head>

<body>
	
<h1>Collections Manager</h1>
<p> By Avi Tannenbaum <p>


    <!-- new record button -->

    <p><div class="newRecordButton"><a href="\Finance\Pages\Functions\new.php">Add a new record </a></div></p>

    <p><div class="newRecordButton"><a href="\Finance\Pages\Functions\importForm.php">Import from excell </a></div></p>

    <p><div class="newRecordButton"><a href="\Finance\Pages\Functions\new.php">Send an email to everyone. </a></div></p

<?php



/*
This is the viewCollectionsPage.php

Display all collection rows from the 'collections' table.

This is a modifyed version of collectionDatabasemanagerview.php but it has a speciel pagenation view included.

*/



// connect to the database.

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



// Number of results to show per page.
$per_page = 3;


// Check the total amount of pages that make the database.
$result = $conn->query("SELECT * FROM Collections");

$total_results = mysqli_num_rows($result);

$total_pages = ceil($total_results / $per_page);



// check if the 'page varieable is set and rtetireved from the url at view-pagenated.php?page=1'


if(isset($_GET['page']) && is_numeric($_GET['page']))
{
	$show_page = $_GET['page'];


	// Make sure the $show_page value is a good value.
 if ($show_page > 0 && $show_page <= $total_pages) 
 {

 	$start = ($show_page -1) * $per_page;

 	$end = $per_page;

 }


}
else
{
	// if page is not set, show first set of results

	$start = 0;

	$end = $per_page;


}


// display pagenation


echo "<p><a href=' /Finance/Pages/Collections/collectionDatabaseManagerView.php'>View All</a> | <b>View Page</b> ";

for  ($i = 1; $i <= $total_pages; $i++)

{
	echo "<a href='\Finance\Pages\Collections\Views\viewCollectionsPagenated.php?page=$i'>$i</a> ";
}

echo "</p>";




// begin filling the table with data.

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Type</th> <th>Date</th> <th>Invoice Number</th> <th>Post Office Box</th> <th>EMail</th> <th>Terms</th> <th>Due Date</th> <th>Aging</th> <th>Open Balance</th> <th>Total</th> <th>ID</th> <th></th> <th</th> <th></th></tr>";
/*

// loop and display all the results from the database puller and query.


for ($i = $start; $i < $end; $i++)
{
	// make sure that the php doesent try to show results that arent really there.
	if ($i == $total_results) {
		break; 
	}

*/

	// While loopp to accomidate new php syntaxes

	while($row = mysqli_fetch_assoc($result)){



	echo "<tr>";

    echo '<td>' . $row['companyname'] . '</td>';

    echo '<td>' . $row['type'] . '</td>';

    echo '<td>' . $row['date_col'] . '</td>';

    echo '<td>' . $row['num'] . '</td>';

    echo '<td>' . $row['po'] . '</td>';

    echo '<td>' . $row['email'] . '</td>';

    echo '<td>' . $row['terms'] . '</td>';

    echo '<td>' . $row['duedate'] . '</td>';

    echo '<td>' . $row['aging'] . '</td>';

    echo '<td>' . $row['openbalance'] . '</td>';

    echo '<td>' . $row['total'] . '</td>';

    echo '<td>' . $row['id'] . '</td>';

 // now for the buttons
// Edit button,
echo '<td><a href="\Finance\Pages\Functions\edit.php?id=' . $row['id'] . '">Edit</a></td>';
// delete button
echo '<td><a href="\Finance\Pages\Functions\edit.php?id=' . $row['id'] . '">Remove</a></td>';

// Email notify button
echo '<td><a href="\Finance\Pages\Functions\send.php?id=' . $row['id'] . '">Email</a></td>';

echo "</tr>";

	}

	// echo out the contentsof each row into the table

/* Not rellevanrt.  this sis fopr mysql and is deprecated n php 5 +

	echo "<tr>";

	echo '<td>' . $row['id') . '</td>';

    echo '<td>' . $row['companyname') . '</td>';

    echo '<td>' . $row['type') . '</td>';

    echo '<td>' . $row['date_col') . '</td>';

    echo '<td>' . $row['num') . '</td>';

    echo '<td>' . $row['po') . '</td>';

    echo '<td>' . $row['email') . '</td>';

    echo '<td>' . $row['terms') . '</td>';

    echo '<td>' . $row['duedate') . '</td>';

    echo '<td>' . $row['aging') . '</td>';

    echo '<td>' . $row['openbalance') . '</td>';

    echo '<td>' . $row['total') . '</td>';

 // now for the buttons
// Edit button,
echo '<td><a href="\erp\aibwp\Finance\Pages\Functions\edit.php?id=' . $row['id') . '">Edit</a></td>';
// delete button
echo '<td><a href="\erp\aibwp\Finance\Pages\Functions\edit.php?id=' . $row['id') . '">Delete</a></td>';

// Email notify button
echo '<td><a href="\erp\aibwp\Finance\Pages\Functions\send.php?id=' . $row['id') . '">Email</a></td>';

echo "</tr>";
*/

/*
}

*/

// close the table over here.

echo "</table>";

// pagenation

?>



    <!-- new record button -->

    <p><div class="newRecordButton"><a href="\Finance\Pages\Functions\new.php">Add a new record </a></div></p>

    <p><div class="newRecordButton"><a href="\Finance\Pages\Functions\importForm.php">Import from excell </a></div></p>

    <p><div class="newRecordButton"><a href="\Finance\Pages\Functions\new.php">Send an email to everyone. </a></div></p
</body>
</html>