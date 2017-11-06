<?php

// PHP code goes here.

//Feel free to load or include additional framwork information here as a header.


/*
<!-- setting a div here for the html for main wrapper styling -->
<div class="uploadXLSForm">
<h1> Upload an updated XLS to begin the sending of notices to the customers. <h1>


<!-- form begin -->
<form action="/erp/aibwp/Finance/Pages/Collections/XLParserUploader.php" method="post" enctype="multipart/form-data">

<h2> Your Excell file: </h2>
<!-- begin input declaration -->
<input type="file" name="fileToUpload" />
<br>

<input type="submit" name="submit" value="Uplad this file" />
</form>





<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="/erp/aibwp/Finance/Pages/Collections/XLParserUploader.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Uplaod this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
*/


if(isset($_FILES['excellFile'])){
      $errors= array();
      $file_name = $_FILES['excellFile']['name'];
      $file_size =$_FILES['excellFile']['size'];
      $file_tmp =$_FILES['excellFile']['tmp_name'];
      $file_type=$_FILES['excellFile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['excellFile']['name'])));
      
      $expensions= array("csv");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a CSV or CSV file.";
      }
      
      if($file_size > 10000000){
         $errors[]='File size must be less than 10 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"/uploads/collections/excell/".$file_name);
         echo "Uplaoded successfully Success";
      }else{
         print_r($errors);
      }
   }






// This is where the upload form center belongs and al the code inchare of client end loading of data to the server goes through this form.$_COOKIE
?>

<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
      <h3> Upload FIle </h3>
         <input type="file" name="excellFile" />
         <input type="submit"/>
      </form>
      
   </body>
</html>

