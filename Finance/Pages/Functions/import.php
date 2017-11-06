

<button onclick="history.go(-1);">Go Back </button>

<?php
/*
echo "<h1>Import page loaded and under construction</h1>";




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




if(isset($_POST["submit"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $companyname = $filesop[0];
 $type = $filesop[1];
  $date_col = $filesop[1];
   $num = $filesop[1];
    $po = $filesop[1];
     $email = $filesop[1];
      $terms = $filesop[1];
       $duedate = $filesop[1];
        $aging = $filesop[1];
         $openbalance = $filesop[1];
$openbalance = $total[1];
 
 $sql = mysql_query("INSERT INTO csv (companyname, type, date_col, num, po, email, terms, duedate, aging, openbalance, total) VALUES ('$companyname','$type','$date_col','$num','$po','$email','$terms','$duedate','$aging','$openbalance','$total')");
 }
 
 if($sql){
 echo "You database has imported successfully";
 }else{
 echo "Sorry! There is some problem.";
 }
}

*/

/*

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




ini_set("display_errors",1);
require_once '/Finance/Pages/Functions/excel_reader2.php';


if(isset($_POST["submit"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 
$data = new Spreadsheet_Excel_Reader($file);
 
echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
 
$html="<table border='1'>";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
	{	
	if(count($data->sheets[$i][cells])>0) // checking sheet not empty
		{
		echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i][cells])."<br />";
		for($j=1;$j<=count($data->sheets[$i][cells]);$j++) // loop used to get each row of the sheet
			{ 
			$html.="<tr>";
			for($k=1;$k<=count($data->sheets[$i][cells][$j]);$k++) // This loop is created to get data in a table format.
				{
				$html.="<td>";
				$html.=$data->sheets[$i][cells][$j][$k];
				$html.="</td>";
				}
			$companyname = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][3]);
			$type = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][6]);
			$date_col = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][8]);
			$num = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][10]);
			$po = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][12]);
			$email = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][14]);
			$terms = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][16]);
			$dued = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][18);
			$aging = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][20]);
			$openBalance = mysqli_real_escape_string($connection,$data->sheets[$i][cells][$j][22]);
			
			$query = "insert into Collections(companyname,type,date_col,num,po,email,terms,dued,aging,openBalance) values('".$companyname."','".$type."','".$date_col."','".$num."','".$po."','".$email."','".$terms."','".$duedate."','".$aging."','".$openbalance."')";
 
			mysqli_query($connection,$query);
			$html.="</tr>";
				}
			}
 
		}
	}

 }
$html.="</table>";
echo $html;
echo "<br />Data Inserted in dababase";
*/



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


ini_set("display_errors",1);
require_once '../Finance/Pages/Functions/excel_reader2.php';

$data = new Spreadsheet_Excel_Reader("http://www.aiberp.com/Finance/Pages/File/Report_from_AIB_Express_Logistics_LLC.xlsx");


echo "Total Sheets in this XLS file is: ".count($data->sheets). "<";

?>



