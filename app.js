var I2of5 = net.technoriver.I2of5;

window.onload = function () {

  var elementBarcode1 = document.getElementsByClassName("barcodeVal1");
  for (var x = 0; x < elementBarcode1.length; x++) {
   var barcode1 = new UCCEAN(elementBarcode1[x].innerHTML);
   var result1 = barcode1.encode();
   var hrText1 = barcode1.getHRText();
   elementBarcode1[x].innerHTML = result1;
   var elementHumanReadableText1 = document.getElementsByClassName("humanReadable1");
   elementHumanReadableText1[x].innerHTML = hrText1;
  }

  var elementBarcode2 = document.getElementsByClassName("barcodeVal2");
  for (var x = 0; x < elementBarcode2.length; x++) {
   var barcode2 = new I2of5(elementBarcode2[x].innerHTML, true);
   var result2 = barcode2.encode();
   var hrText2 = barcode2.getHRText();
   elementBarcode2[x].innerHTML = result2;
   var elementHumanReadableText2 = document.getElementsByClassName("humanReadable2");
   elementHumanReadableText2[x].innerHTML = hrText2;
  }

};