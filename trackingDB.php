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






$sql = "INSERT INTO InternalTrackingDataBase (RecipientCompaney, ComapneyEmail, RecipientName, 
AddressLine1, AddressLine2, City, State, ZipCode, trackingNumber, SenderCompany, SenderName, SAddressLine1,
 SAddressLine2, SCity, SState, SZip, SenderTelephone, Status)
VALUES ('$_POST[Label_RecipientCompaney]', '$_POST[Label_CompaneyEmail]', '$_POST[Label_RecipientName]', '$_POST[Label_AddressLine1]', '$_POST[Label_AddressLine2]', '$_POST[Label_City]', '$_POST[Label_State]', '$_POST[Label_ZipCode]', '$_POST[Label_trackingNumber]', '$_POST[Label_SenderCompaney]', '$_POST[Label_SenderName]', '$_POST[Label_SAddressLine1]', '$_POST[Label_SAddressLine2]', '$_POST[Label_SCity]', '$_POST[Label_SState]',
 '$_POST[Label_SZip]', '$_POST[Label_SenderTelephone]', '$_POST[Label_Status]')";

setcookie("UserFormData", serialize($_POST), time()+3600);  /* expire in 1 hour */


$target_dir = "/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



if ($conn->query($sql) === TRUE) {
    echo "<p style='    text-align: center;
    font-size: 24px;
    padding: 15px;
    background: lightblue;
    border-radius: 5px;
    margin-top: 15px;'> This package has been added to the AIB database for intenral tracking successfully <a href =\"javascript:history.go(-1)\">GO Back</a> </p>";
printf("Intenral tracking id is %d\n", mysql_insert_id());
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>