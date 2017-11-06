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


//query
$sql=mysql_query("SELECT id,name FROM table");
if(mysql_num_rows($sql)){
$select= '<select name="select">';
while($rs=mysql_fetch_array($sql)){
      $select.='<option value="'.$rs['id'].'">'.$rs['name'].'</option>';
  }
}
$select.='</select>';
echo $select;
?>