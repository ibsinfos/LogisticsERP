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



  $stmt = $con->prepare("SELECT `RecipientCompaney`, `ComapneyEmail`, `RecipientName`, `RecipentName`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `trackingNumber`, `SenderCompany`, `SenderName`, `SAddressLine1`, `SAddressLine2`, `SCity`, `SState`, `SZip`, `SenderTelephone`, `lid`, `Status` FROM `InternalTrackingDataBase` WHERE 1"); /* START PREPARED STATEMENT */
  $stmt->execute(); /* EXECUTE THE QUERY */
  $stmt->bind_result($Label_RecipientCompaney, $Label_CompaneyEmail, $Label_RecipientName, $Label_AddressLine1, $Label_AddressLine2, $Label_City, $Label_State, $Label_ZipCode, $Label_trackingNumber, $Label_SenderCompaney, $Label_SenderName, $Label_SAddressLine1, $Label_SAddressLine2, $Label_SCity, $Label_SState, $Label_SZip, $Label_SenderTelephone, $Label_Status)/* BIND THE RESULT TO THIS VARIABLE */
  while($stmt->fetch()){ /* FETCH ALL RESULTS */
    $description_arr[] = $Label_RecipientCompaney, $Label_CompaneyEmail, $Label_RecipientName, $Label_AddressLine1, $Label_AddressLine2, $Label_City, $Label_State, $Label_ZipCode, $Label_trackingNumber, $Label_SenderCompaney, $Label_SenderName, $Label_SAddressLine1, $Label_SAddressLine2, $Label_SCity, $Label_SState, $Label_SZip, $Label_SenderTelephone, $Label_Status; /* STORE EACH RESULT TO THIS VARIABLE IN ARRAY */
  } /* END OF WHILE LOOP */

  echo json_encode($description_arr); /* ECHO ALL THE RESULTS */







if ( $_POST['RecipientCompaney'] == '' && $allowStoreRecipients == 1 ) {
					//Temporary error handling for deployment
					if ( !isset( $_POST['ComapneyEmail'] ) ) {
						$_POST['ComapneyEmail'] = '';
					}
					$sql = "INSERT INTO InternalTrackingDataBase (RecipientCompaney, RecipentName, AddressLine1, AddressLine2, City, State, ZipCode, trackingNumber, SenderCompany, SenderName, SAddressLine1, SAddressLine2, SCity, SState, SZip, SenderTelephone, lid, status ";
					
					$sql .= ") VALUES ($lid, '".$_POST['RecipentName']."', '".$_POST['RecipientCompaney']
						."', '".$_POST['AddressLine1']."', '".$_POST['AddressLine2']."', '".$db->real_escape_string($_POST['City'])."', '".$db->real_escape_string($_POST['SenderTelephone'])."', ";
					
					$db->query($sql);
					
					$_POST['RecipentName'] = $db->insert_id;
				}
?>