<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($comp, $typ, $dc, $phn, $pob, $eml, $trms, $ddate, $agng, $opnblnc, $ttl, $id ,$error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>


<button onclick="history.go(-1);">Go Back </button>
<br>
<form action="" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>ID:</strong> <?php echo $id; ?></p>


<strong>Companey Name: *</strong> <input type="text" name="companyname" value="<?php echo $companyname; ?>"/><br/>

<strong>Type: *</strong> <input type="text" name="type" value="<?php echo $type; ?>"/><br/>


<strong>Date of Collection: *</strong> <input type="text" name="date_col" value="<?php echo $date_col; ?>"/><br/>

<strong>Phone Number: *</strong> <input type="text" name="num" value="<?php echo $num; ?>"/><br/>

<strong>Po Box: *</strong> <input type="text" name="po" value="<?php echo $po; ?>"/><br/>

<strong>Email Address: *</strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br/>

<strong>Terms: *</strong> <input type="text" name="terms" value="<?php echo $terms; ?>"/><br/>

<strong>Due Date: *</strong> <input type="text" name="duedate" value="<?php echo $duedate; ?>"/><br/>

<strong>Aging: *</strong> <input type="text" name="aging" value="<?php echo $aging; ?>"/><br/>

<strong>Open Balance: *</strong> <input type="text" name="openbalance" value="<?php echo $openbalance; ?>"/><br/>

<strong>Total: *</strong> <input type="text" name="total" value="<?php echo $total; ?>"/><br/>


<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}







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

    
}




// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['id']))

{

// get form data, making sure it is valid

$id = $_POST['id'];


$companyname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['companyname']));

$type = mysqli_real_escape_string($conn, htmlspecialchars($_POST['type']));

$date_col = mysqli_real_escape_string($conn, htmlspecialchars($_POST['date_col']));

$num = mysqli_real_escape_string($conn, htmlspecialchars($_POST['num']));

$po = mysqli_real_escape_string($conn, htmlspecialchars($_POST['po']));

$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));

$terms = mysqli_real_escape_string($conn, htmlspecialchars($_POST['terms']));

$duedate = mysqli_real_escape_string($conn, htmlspecialchars($_POST['duedate']));

$aging = mysqli_real_escape_string($conn, htmlspecialchars($_POST['aging']));

$openbalance = mysqli_real_escape_string($conn, htmlspecialchars($_POST['openbalance']));

$total = mysqli_real_escape_string($conn, htmlspecialchars($_POST['total']));



// check that firstname/lastname fields are both filled in

if ($companyname == '' || $type == '' || $date_col == '' || $num == '' || $po == '' || $email == '' || $terms == '' || $duedate == '' || $aging == '' || $openbalance == '' || $total == '')

{

// generate error message

$error = 'Uh Oh! Big problem over here.  <br> Please fill in all the blanks my friend.';



//error, display form

renderForm($companyname, $type, $date_col, $num, $po, $email, $terms, $duedate, $aging, $openbalance, $total, $error);

}

else

{

// save the data to the database

mysqli_query($conn, "UPDATE Collections SET companyname='$companyname', type='$type', date_col='$date_col', num='$num', po='$po', email='$email', terms='$terms', duedate='$duedate', aging='$aging', openbalance='$openbalance', total='$total' WHERE id='$id'")

or die(mysqli_error($conn));
  echo "<p style='    text-align: center;
    font-size: 24px;
    padding: 15px;
    background: lightblue;
    border-radius: 5px;
    margin-top: 15px;'> This record was successfully updated <a href =\"javascript:history.go(-1)\">GO Back</a> </p>";


// once saved, redirect back to the view page

header("Location: /Finance/Pages/Collections/collectionDatabaseManagerView.php");

}

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

{

// query db

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM Collections WHERE id=$id")

or die(mysqli_error());

$row = mysqli_fetch_array($result);



// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$companyname = $row['companyname'];

$type = $row['type'];

$date_col = $row['date_col'];

$num = $row['num'];

$po = $row['po'];

$email = $row['email'];

$terms = $row['terms'];

$duedate = $row['duedate'];

$aging = $row['aging'];

$openbalance = $row['openbalance'];

$total = $row['total'];




// show form

renderForm($companyname, $type, $date_col, $num, $po, $email, $terms, $duedate, $aging, $openbalance, $total, $id, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>