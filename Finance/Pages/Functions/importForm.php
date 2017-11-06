
<button onclick="history.go(-1);">Go Back </button>
<h3> Please select a file and upload it to begin </h3>
<form action=" \Finance\Pages\Functions\import.php" method="post" enctype="multipart/form-data">
    Upload the excell file: <input type="file" name="xlsfile" size="200" />
    <input type="submit" name="submit" value="Submit" />
</form>