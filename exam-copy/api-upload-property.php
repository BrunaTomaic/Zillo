<?php
session_start();
$sAgentId = $_SESSION['id'];
$sPropertyId = uniqid();
$sPropertyPrice = $_POST['txtPrice'];
$sPropertyBds = $_POST['txtBds'];
$sPropertyBa = $_POST['txtBa'];
$sPropertySqft = $_POST['txtSqft'];
$sStreet = $_POST['txtStreet'];
$sStreetNumber = $_POST['txtStreetNumber'];
$sZipCode = $_POST['txtZipcode'];
$sjData = file_get_contents('data.json');
$jData = json_decode($sjData);
$sjPostalcodes = file_get_contents('zipcodes.json');
$jPostalcodes = json_decode($sjPostalcodes);
$jProperty = new stdClass(); // new agent
$jProperty->internalId = uniqid();
$jProperty->price = $sPropertyPrice;
$jProperty->bds = $sPropertyBds;
$jProperty->ba = $sPropertyBa;
$jProperty->sqft = $sPropertySqft;
$jProperty->address = $sPropertyAddress;

$jProperty->images = [];
$jAddress = new stdClass();
$jAddress->street = $sStreet;
$jAddress->streetnumber = $sStreetNumber;
$jAddress->zipcode = $sZipCode;
$jAddress->coordinates = $jPostalcodes->zipcodes->$sZipCode;
$jProperty->address = $jAddress;


$iNumberOfImages = count($_FILES['propertyImages']['name']);
//Looping through uploaded images and specify path and size for validation
for ($i = 0; $i < $iNumberOfImages; $i++) {

    $sImageName = $_FILES['propertyImages']['name'][$i];
    $sImageSize = $_FILES['propertyImages']['size'][$i];
    $sTempPathImages = $_FILES['propertyImages']['tmp_name'][$i];

    //Validation of size and extension
    // if($_FILES['propertyImages']['size'][$i]<20480){}

    $sExtension = pathinfo($sImageName, PATHINFO_EXTENSION);
    $sExtension = strtolower($sExtension);

    //Add unique name to the image
    $sUniqueImageName = uniqid() . '.' . $sExtension;

    //Uploading images
    move_uploaded_file($sTempPathImages, "images/$sUniqueImageName");
    //Adds it to the array of images
    array_push($jProperty->images, $sUniqueImageName);
}


$jData->agents->$sAgentId->properties->$sPropertyId = $jProperty;

$sjData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('data.json', $sjData);
echo '{"status":1,"message":"property created","id":"' . $sAgentId . '","Line":' . __LINE__ . '}';
