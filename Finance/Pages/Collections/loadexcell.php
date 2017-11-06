<!-- setting a div here for the html for main wrapper styling -->
<div class="uploadXLSForm">
<h1> Upload an updated XLS to begin the sending of notices to the customers. <h1>


<!-- form begin -->
<form action="/Finance/Pages/Collections/XLParserUploader.php" method="post" enctype="multipart/form-data">

<h2> Your Excell file: </h2>
<!-- begin input declaration -->
<input type="file" name="collections" size="30" />


<input type="submit" name="submit" value="Uplad this file" />
</form>