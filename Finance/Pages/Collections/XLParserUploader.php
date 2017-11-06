<?php 
// Designed and developed by Avi Tannenbaum of StarShows Studios 2016

// This is the excell parser designed to take information from the html form this file could be linked to and parse the infromation to a database.

// check if a file has been chosen for upload

// include the collection email
/* -- Test uplaod starts here.
if($_FILES['collections']['name'])
{
    //if there are no errors

    if(!$_FILES['collections']['error']) {
        // set dat and modifie the future of the file name 

        $todaysDate = date("Y/m/d");
        // test to see that todays date works correctlty.$_COOKIE
    
    echo "Today is " . $todaysDate;
        $new_file_name = strtolower($_FILES['collections']['collections_' . $todaysDate]); 

        if($_FILES['collections']['size'] > (1024000)) {
                    // warn that the file is too large
                    $valid_file = false;
                    $message = 'Hey there, the file you have uploaded is too large.  try deviding the file or compressing it and uploading it seperatly.';



        } 
        
        //if the file has passed test.
        if($valid_file) {
            // move it to where we want it to.
            move_uploaded_file($_FILES['collections']['collections_' . $todayDate], '/erp/aibwp/uploads/collections/excell/' .$new_file_name);
            $message = 'Yay, Thank you for submitting this excell tabel. It has been uplaoded succeessfully and will be procceedd and sent to the customer shortly.';
        }

      // let the user know incase there is an error.$_COOKIE

      else {
// Set that to be the returned message
            $message = 'Oh no! Something must have gone wrong! I have an error message from the dark side. ' .$_FILES['collections']['error']; 
      }

      }

      // display some of the files details upon successfull upload.$_COOKIE

      $_FILES['field_name']['name']
      $_FILES['field_name']['size']
      $_FILES['field_name']['type']
      $_FILES['field_name']['tmp_name']



        
        // cant be larher than 1 MB (should be alot less.)
    }
*/
    // check to see that the file is compatible for upload.

/* 
// fauled
$directory = getcwd()."\n";
// show the directory of the document.

echo '<div class="Footer"> <p> You can find this document in the following directory: </p> </div>';
echo $directory;
}

// Real Upload starts here.

$target_dir = '/erp/aibwp/uploads/collections/excell/';


$file_parts = pathinfo($target_dir);


$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOK = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if the file is  excell
if(isset($_POST["submit"])) {

//check to see that thr rctention of the file is correct
    switch($file_parts['extention']) 
    {


case "csv":
$uploadOk = 1;
echo
case NULL:
    echo "No file uploaded. Please try again.";
break;

default:
$uploadOK = 0;
echo " FIle type is not correct, Please upload only CSV format of exell. For questions ask Avi Tannenbaum or your IT manager.";

    } // end of switch

}

*/

/*
//Set uplaod directory. 
define("UPLOAD_DIR", "/erp/aibwp/uploads/collections/excell");

// check that the file is correct file type.
if (!empty($_FILES["collectionsFile"])) {
    $collectionsFile = $_FILES["collectionsFile"];

    if ($collectionsFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $collectionsFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($collectionsFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
}
*/
/*
$target_dir = "/erp/aibwp/uploads/collections/excell/";
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
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

 // Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "csv" ) {
    echo "Sorry, only CSV files are allowed.";
    $uploadOk = 0;
}
    
}
*/

// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.

$uploaddir = '/uploads/collections/excell';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";



?>