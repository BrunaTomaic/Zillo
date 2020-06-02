<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <?php
  // $_GET $_POST $_SESSION $_FILES
  //echo "<div>SIZE: {$_FILES['myFile']['size']}</div>";
  //echo "<div>NAME: {$_FILES['myFile']['name']}</div>";
  //echo "<div>TYPE: {$_FILES['myFile']['type']}</div>";
  //echo "<div>TEMP NAME: {$_FILES['myFile']['tmp_name']}</div>";
  
  $sUniqueImageName = uniqid();
  move_uploaded_file( $_FILES['myFile']['tmp_name'] , 
                      "images/$sUniqueImageName" );

  $sPrice= $_POST['txtPrice'];
  $sBds= $_POST['txtBds'];
  $sBa= $_POST['txtBa'];
  $sSqft= $_POST['txtSqft'];
  $saddress= $_POST['txtAddress'];
// echo $sPrice;
$jProperty = new stdClass();
$jProperty->price=$sPrice;
$jProperty->bds=$sBds;
$jProperty->ba=$sBa;
$jProperty->sqft=$sSqft;
$jProperty->address=$saddress;
$jProperty->image=$sUniqueImageName;
// echo json_encode($jProperty);
 
$sjProperties= file_get_contents("properties.json");
$jProperties=json_decode($sjProperties);
$sPropertyUniqueId= uniqid();
$jProperties->$sPropertyUniqueId=$jProperty;
// echo json_encode($jProperties);
$sjProperties=json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents("properties.json", $sjProperties);

  ?>
  <a href="property-form.php">Upload another property</a>
  <a href="properties.php">View properties</a>

</body>
</html>