



<?php

/*

NEW.PHP

Allows user to create a new entry in the database

*/



// creates the new record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($comp, $typ, $dc, $phn, $pob, $eml, $trms, $ddate, $agng, $opnblnc, $ttl ,$error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>New Record</title>

</head>

<body>


<button onclick="history.go(-1);">Go Back </button>
<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<div>

<strong>Companey Name: *</strong> <input type="text" name="companyname" value="<?php echo $comp; ?>" /><br/>

<strong>Type: *</strong> <input type="text" name="type" value="<?php echo $typ; ?>" /><br/>

<strong>Date of Collection: *</strong> <input type="date" name="date_col" value="<?php echo $dc; ?>" /><br/>

<strong>Phone Number: *</strong> <input type="text" name="num" value="<?php echo $phn; ?>" /><br/>

<strong>PO Box: *</strong> <input type="text" name="po" value="<?php echo $pob; ?>" /><br/>

<strong>Email: *</strong> <input type="text" name="email" value="<?php echo $eml; ?>" /><br/>

<strong>Terms: *</strong> <input type="text" name="terms" value="<?php echo $trms; ?>" /><br/>

<strong>Due Date: *</strong> <input type="text" name="duedate" value="<?php echo $ddate; ?>" /><br/>

<strong>Aging: *</strong> <input type="text" name="aging" value="<?php echo $agng; ?>" /><br/>

<strong>Open Balance: *</strong> <input type="text" name="openbalance" value="<?php echo $opnblnc; ?>" /><br/>

<strong>Total: *</strong> <input type="text" name="total" value="<?php echo $ttl; ?>" /><br/>


<p>* required</p>

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



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

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



// check to make sure both fields are entered

if ($companyname == '' || $type == '' || $date_col == '' || $num == '' || $po == '' || $email == '' || $terms == '' || $duedate == '' || $aging == '' || $openbalance == '' || $total == '')

{

// generate error message

$error = 'Uh Oh! Big problem over here. You must fill all those feilds.';



// if either field is blank, display the form again

renderForm($companyname, $type, $date_col, $num, $po, $email, $terms, $duedate, $aging, $openbalance, $total, $error);

}

else

{

// save the data to the database

mysqli_query($conn, "INSERT Collections SET companyname='$companyname', type='$type', date_col='$date_col', num='$num', po='$po', email='$email', terms='$terms', duedate='$duedate', aging='$aging', openbalance='$openbalance', total='$total'")

or die(mysqli_error());

 echo "<p style='    text-align: center;
    font-size: 24px;
    padding: 15px;
    background: lightblue;
    border-radius: 5px;
    margin-top: 15px;'> Record added successfully <a href =\"javascript:history.go(-1)\">GO Back</a> </p>";



// once saved, redirect back to the view page

header("Location: /Finance/Pages/Collections/collectionDatabaseManagerView.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','','','','','','','');

}

?>