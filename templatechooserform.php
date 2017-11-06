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

<p> Here you will find templates that can be used to send to customers. </p>
<h1> Please choose a template to work with: </h1>
<!-- Form Begins -->
<form name="ex2" action="xfer.php" method="POST"><div class="centre">
<select name="xfer" size="1">
<option value="/erp/aibwp/Mail/Templates/returnEmail.php">Return Email</option>
<option value="/erp/aibwp/emailsender.php">Collection</option>
<option value="net3.htm">Test</option>
</select>
<input type="submit" value="Load Template" />
</div></form>

</body>

</html>


