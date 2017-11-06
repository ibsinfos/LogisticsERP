 function showInput() {
 // This is a function in charge of  proccesing the return form and creating a label from it by Avi Tannnebaum.
var b = document.getElementById("dateID2").value;
// Date
var a = document.getElementById("tnID").value;         
  // Tracking number         
      
var c =  document.getElementById("DescriptionID").value;
// Companey

var d = document.getElementById("companeyChoose").value;

// Email
var e = document.getElementById("emailFeild").value;

// Phone number
var f = document.getElementById("PhonenumberID").value;

//Client refrence

var g = document.getElementById("ClientRef").value;

//Status
var h = document.getElementById("StatusID").value;
/*
//attachment
var i = document.getElementById("AttchID").value;
//
*/
// print
document.write("Tracking Number: ",a,"<br><br>Date: ",b,"<br><br>Box Description:",c,"<br><br>Companey Name:<br>",d,"<br><br>Email:",e,"<br><br>Phone Number",f,"<br><br>Client Refrence",g,"<br><br>Status<br>",h);

// ,c, "<br><br>Companey Name: ",d,"<br><br>Email:",e,"<br><br>Phone Number",f,"<br><br>Client Refrence:",g,"<br><br>Status",h,"<br><br>Attachment:",i,




}


function printButton() {
    window.print();
}


