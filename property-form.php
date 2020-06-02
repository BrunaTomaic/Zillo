<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>UPLOAD YOUR PROPERTY</title>
</head>
<body>
  
  <?php

    if($_POST){
    $sPrice = intval($_POST['txtPrice']);
    if (empty($_POST['txtPrice'])) {
        sendErrorMessage('Price is missing');
    }
    $sPrice = intval($_POST['txtBds']);
    if (empty($_POST['txtBds'])) {
        sendErrorMessage('Bds is missing');
    }
    $sPrice = intval($_POST['txtBa']);
    if (empty($_POST['txtBa'])) {
        sendErrorMessage('Ba is missing');
    }
    $sPrice = intval($_POST['txtSqft']);
    if (empty($_POST['txtSqft'])) {
        sendErrorMessage('Sqft is missing');
    }
    $sPrice = intval($_POST['txtAddress']);
    if (empty($_POST['txtAddress'])) {
        sendErrorMessage('Address is missing');
    }
    echo $sImage;
    // check img upload extension :png jpg jpeg gif
    $sExtension = pathinfo( $_FILES['myFile][‘name'] , PATHINFO_EXTENSION );
    $sExtension = strlow( $sExtension ); // convert to lower case
    $aAllowedExtensions = ['png', 'jpg', 'jpeg', 'gif']; 
    // REG EX
    if( !in_array( $sExtension , $aAllowedExtensions ) ){
      sendErrorMessage( 'The uploaded file must be png or jpg ...' , __LINE__ );
    } 
    function sendErrorMessage($sErrorMessage){
    $sPrice = $_POST['txtPrice'];
    $sBds = $_POST['txtBds'];
    $sBa = $_POST['txtBa'];
    $sSqft = $_POST['txtSqft'];
    $sAddress = $_POST['txtAddress'];
    $sImage = $_FILES['myFile'];
    
    echo '< = form action="property-upload.php" method="POST" enctype="multipart/form-data">
            <input name="txtPrice" type="text" placeholder="price" value="' . $sPrice . '">
            <input name="txtBds" type="text" placeholder="bds" value="' . $sBds . '">
            <input name="txtBa" type="text" placeholder="ba" value="' . $sBa . '">
            <input name="txtSqft" type="text" placeholder="sqft" value="' . $sSqft . '">
            <input name="txtAddress" type="text" placeholder="Address" value="' . $sAddress . '">
            <input  name="myFile" type="file" value="' . $sImage . '">
            <button>UPLOAD PROPERTY</button>
        </form>';
    echo "<p>$sErrorMessage</p>";

    exit;
}
    
    }else{
?>
      <form action="property-upload.php" method="POST" enctype="multipart/form-data">
  <input name="txtPrice" type="text" placeholder="price">
  <input name="txtBds" type="text" placeholder="bds">
  <input name="txtBa" type="text" placeholder="ba">
  <input name="txtSqft" type="text" placeholder="sqft">
  <input name="txtAddress" type="text" placeholder="Address">
    <input  name="myFile" type="file">
    <button>UPLOAD PROPERTY2</button>
  </form>
  <?php
    }
?>
  

</body>
</html>