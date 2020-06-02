<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
<?php 
//echo 'x';
    $sjProperties = file_get_contents("properties.json");
    $jProperties = json_decode($sjProperties);
    $jPropertiesID = $_GET['id'];
    //echo $jPropertiesID;
    $sPrice = $jProperties->$jPropertiesID->price;
    $sBds = $jProperties->$jPropertiesID->bds;
    $sBa = $jProperties->$jPropertiesID->ba;
    $sSqft = $jProperties->$jPropertiesID->sqft;
    $sAddress = $jProperties->$jPropertiesID->address;

    if($_POST){

    $sUpdatePrice = $_POST['txtPrice'];
    $sUpdateBds = $_POST['txtBds'];
    $sUpdateBa = $_POST['txtBa'];
    $sUpdateSqft = $_POST['txtSqft'];
    $sUpdateAddress = $_POST['txtAddress'];
    //$sUpdateImages = $_POST['imageFile'];
    //echo $sUpdateProperty;
    
    
    $jProperties->$jPropertiesID->price = $sUpdatePrice;
    $jProperties->$jPropertiesID->bds = $sUpdateBds;
    $jProperties->$jPropertiesID->ba = $sUpdateBa;
    $jProperties->$jPropertiesID->sqft = $sUpdateSqft;
    $jProperties->$jPropertiesID->address = $sUpdateAddress;
    //$jProperties->$jPropertiesID->path = $sUpdateImg;
    
    
    $sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
    file_put_contents("properties.json", $sjProperties);
    //echo $sjProperties;
   // sleep(2);
    header('location:properties.php');
}else{
 
?>
<h1>Update property with id <?= $_GET['id']; ?></h1>

<form method="POST">
  <input name="txtPrice" type="text" value="<?php echo $sPrice; ?>">
  <input name="txtBds" type="text" value="<?php echo $sBds; ?>">
  <input name="txtBa" type="text" value="<?php echo $sBa; ?>">
  <input name="txtSqft" type="text" value="<?php echo $sSqft; ?>">
  <input name="txtAddress" type="text" value="<?php echo $sAddress; ?>">
    <button>UPDATE PROPERTY</button>
  </form>
  <?php
}

  ?>
</body>
</html>