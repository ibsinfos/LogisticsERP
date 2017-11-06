
<?php/*

/*

This is the NEW.php document.
This documment is in charge of letting the user make new new entrys in the database,

*/

// Designed and developed by Avi Tannenbaum, All rites researved 2016.

// The following code makes a back  end version of thwe user form to make a new entry.

// Since this form will be used multiple times in the file. It is presented as a function that is easyliy reusable.
// PHP Function form. yay!

// remember the names inside of the brackets are variebles and not values from anywhere yet,
/*
function renderForm($companyname, $type, $date_col, $num, $email $terms, $duedate, $aging, $openbalance, $total, $id)

{

?>
	<!DOCTYPE HTML PUBLIC "//W#C//DTD HTML 4.01//EN" "/erp/aibwp/Finance/Pages/frameworks/HTML/strict.dtd">

	<html>

	<head>
	<title> Add a new record  </title>
	</head>

	<body>

<?php

	// bring on all the errors. debuggin superhero.

	if ($error != '')
	{
		echo '<div style="padding: 4px; border:1px solid red; color:red;">' .$error.'</div>';

		// end of error displaying.


	}


?>


<form action="" method="post">

<div>

<!-- Companey name feild -->
<strong>Companey Name: *</strong> <input type="text" name="companyname" value="<?php echo $companyname; ?>" /><br/>

<!-- Type feild -->
<strong>Type: *</strong> <input type="text" name="type" value="<?php echo $type; ?>" /><br/>

<!-- Date of collection feild -->
<strong>Date of Collection: *</strong> <input type="date" name="date_col" value="<?php echo $date_col; ?>" /><br/>

<!-- Number feild -->
<strong>Phone Number: *</strong> <input type="text" name="num" value="<?php echo $num; ?>" /><br/>

<!-- Post office box feild -->
<strong>Post Office Box: *</strong> <input type="text" name="po" value="<?php echo $po; ?>" /><br/>

<!-- Email Feild  -->
<strong>Email: *</strong> <input type="text" name="email" value="<?php echo $email; ?>" /><br/>

<!-- Terms Feild  -->
<strong>Terms: *</strong> <input type="text" name="terms" value="<?php echo $terms; ?>" /><br/>

<!-- Due Date Feild  -->
<strong>Due Date: *</strong> <input type="date" name="duedate" value="<?php echo $duedate; ?>" /><br/>

<!-- Aging Feild  -->
<strong>Aging: *</strong> <input type="text" name="aging" value="<?php echo $aging; ?>" /><br/>

<!-- Open Balance Feild  -->
<strong>Open Balance: *</strong> <input type="text" name="openbalance" value="<?php echo $openbalance; ?>" /><br/>

<!-- Total Feild  -->
<strong>Total: *</strong> <input type="text" name="total" value="<?php echo $total; ?>" /><br/>

<p> *Required</p>

<input type="submit" name="submit" value="Save">

</div>
</form>

</body>

</html>


<?php

}




// establish a connection to the database

// Written By Avi Tannenbaum
// Enter the connection details here.

$servername ="localhost";
$username = "root";
$password = "";
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


// Check to see if the form has been successfully submitted. start to proccess the form and save it to the sql database.


if (isset($_POST['submit']))
{
	// get form data and make sure its ok.

	$companyname = mysqli_real_escape_string(htmlspecialchars($_POST['companyname']));
	$type = mysqli_real_escape_string(htmlspecialchars($_POST['type']));
	$date_col = mysqli_real_escape_string(htmlspecialchars($_POST['date_col']));
	$num = mysqli_real_escape_string(htmlspecialchars($_POST['num']));
	$po = mysqli_real_escape_string(htmlspecialchars($_POST['po']));
	$email = mysqli_real_escape_string(htmlspecialchars($_POST['email']));
	$terms = mysqli_real_escape_string(htmlspecialchars($_POST['terms']));
	$duedate = mysqli_real_escape_string(htmlspecialchars($_POST['duedate']));
	$aging = mysqli_real_escape_string(htmlspecialchars($_POST['aging']));
	$openbalance = mysqli_real_escape_string(htmlspecialchars($_POST['openbalance']));
	$total = mysqli_real_escape_string(htmlspecialchars($_POST['total']));
	

	// chekc to make sure that all feilds are entered.

	if ($companyname == '' || $type == '' || $date_col == '' || $num == '' || $po == '' || $email == '' || $terms == '' || $duedate == '' || $aging == '' || $openbalance == '' || $total == '' )
	{
		// Generate an error message for the user telling him that there was no input or that something is missing.

		// missing error

		$error = 'Uh Oh!, Big problem overhere.. You forgot this feilds.';



		// Well, if the form isd blank display the form again 


		renderForm($companyname, $type, $date_col, $num, $po, $email, $terms, $duedate, $aging, $openbalance $total, $error);



	}
	else
	{
		// if all is good go ahead and save the data in the database.

		mysqli_query("INSERT collections SET companyname='$companyname', type='$type', date_col='$date_col', num='$num', po='$po', email='$email', terms='$terms', duedate='$duedate', aging='$aging', openbalance='$openbalance', total='$total' ") 
		or die(mysqli_error());



	// once saved, redirect the user back the the page where that collection manager is stored.


		header("Location:  /erp/aibwp/Finance/Pages/Collections/collectionDatabaseManagerView.php");
	}

}
else 

// if the form has not been submitrted than restart the form.


{
renderForm('', '', '', '', '', '', '', '', '', '', '', '');

}
*/
?>