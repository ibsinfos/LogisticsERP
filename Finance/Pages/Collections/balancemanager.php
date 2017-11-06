<p>Balance manager page loaded </p>

<h1> Balances Manager </h1>

<?php
// start intro html here
echo "<div class = 'headerClass'>
<h1> Here is the billing manager </h1>
<p> You can find here all of the trasnactions and past dues over here. <p>";


$directory = getcwd()."\n";
// show the directory root of the document.

echo '<div class="Footer"> <p> You can find this document in the following directory: </p> </div>';
echo $directory;




// Written By Avi Tannenbaum
// Enter the connection details here.

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


$sql = "SELECT companyname, type, date_col, num, po, email, terms, duedate, aging, openbalance, total, id FROM Collections";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

// Output data of each row into a table with a while loop.

// Have a spaces. 
// Begin displaying collection results.
echo "<br>";
while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"]. " - Name: " . $row["companyname"]. " - Type: " .$row["type"]. " <br>";

}

} else {
    echo "0 results";
}

include '/erp/aibwp/Finance/Pages/Functions/UpdateRecord.php';

$conn->close()

// include update record below here.


?>
<p> ======= <br> This text is HTML <br> and loads in the balancemanager.php <br> page as HTML footer code <br> underneath the php code. <p>
<h1> Update a record.</h1>
<p> HTML Form starts here: </p>
<!-- Begin loading an html form in order to update records over here. -->

<p> loaded popup button below here </p>
<div class="popupIframeDivClass">
<a href="#popupIframe" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline">Launch Uplaod Form</a>
<div data-role="popup" id="popupIframe" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
    <iframe src="/erp/aibwp/Finance/Pages/Collections/fileuploadform.php" width="90%" height="90%" seamless=""></iframe>
</div>
<p> loaded popup button above here </p>
<br>

<form name="ex2" action="/erp/aibwp/xfer.php" method="POST"><div class="centre">
<p>Enter ID:</p>
<!-- Select email -->
<input type="text" name="Choose_ID"><br>
<select name="xfer" size="1">
<option value="/erp/aibwp/Mail/Templates/returnEmail.php">Return Email</option>
<option value="/erp/aibwp/Mail/Templates/CollectionsEmail.php">Collection</option>
<option value="/erp/aibwp/Mail/Templates/ItemRecievedUnvarified.php">Unvarified return</option>
<option value="net3.htm">Test</option>
</select>
<!-- Submit the text over here. -->
<input type="submit" value="Load Template" />
</div></form>

<script>
// popup for the iframew javascript
$( document ).on( "pagecreate", function() {
    // The window width and height are decreased by 30 to take the tolerance of 15 pixels at each side into account
    function scale( width, height, padding, border ) {
        var scrWidth = $( window ).width() - 30,
            scrHeight = $( window ).height() - 30,
            ifrPadding = 2 * padding,
            ifrBorder = 2 * border,
            ifrWidth = width + ifrPadding + ifrBorder,
            ifrHeight = height + ifrPadding + ifrBorder,
            h, w;
        if ( ifrWidth < scrWidth && ifrHeight < scrHeight ) {
            w = ifrWidth;
            h = ifrHeight;
        } else if ( ( ifrWidth / scrWidth ) > ( ifrHeight / scrHeight ) ) {
            w = scrWidth;
            h = ( scrWidth / ifrWidth ) * ifrHeight;
        } else {
            h = scrHeight;
            w = ( scrHeight / ifrHeight ) * ifrWidth;
        }
        return {
            'width': w - ( ifrPadding + ifrBorder ),
            'height': h - ( ifrPadding + ifrBorder )
        };
    };
    $( ".ui-popup iframe" )
        .attr( "width", 0 )
        .attr( "height", "auto" );
    $( "#popupIframe" ).on({
        popupbeforeposition: function() {
            // Bring in the custom iframe popup scale to get the width and height
            var size = scale( 497, 298, 15, 1 ),
                w = size.width,
                h = size.height;
            $( "#popupIframe iframe" )
                .attr( "width", w )
                .attr( "height", h );
        },
        popupafterclose: function() {
            $( "#popupIframe iframe" )
                .attr( "width", 0 )
                .attr( "height", 0 );
        }
    });
});

</script>

<style>

iframe {
    border: none;
}

</style>








</div>