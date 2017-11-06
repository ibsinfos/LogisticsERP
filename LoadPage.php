

<!-- Written By Avi Tannenbaum 2016all rites reserved-->
<!-- insert this page into an iframe to display it on the same page -->
<!DOCTYPE html>
<html>
<head>
<title>Template Chooser Form</title>
<script>
function goBack() {
    window.history.back()
}
</script>
</head>

<body>
<button onclick="goBack()" class="GoBackButton">Go Back</button>
</body>

</html>


<?php
$requested_page = $_POST["selectedPage"];

switch($requested_page) {
  case 'page_1' :
  echo "test2";
    header("Location: /erp/erp/aibwp/Mail/Templates/returnEmail.php");
  break;

  case 'page_2' :
  echo "Test 2";
    header("Location: /erp/erp/aibwp/Mail/Templates/CollectionsEmail.php");
  break;
 default :
  echo "No page was selected";
  break;
} 
?>