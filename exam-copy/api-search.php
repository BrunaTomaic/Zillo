<?php
// Thinks that 0 is empty
// if( empty( $_GET['search'] )  && $_GET['serach'] !== "0"  ){
if (!isset($_GET['search'])) {
    echo '[]';
    exit;
}

$sSearchFor = $_GET['search']; // The user's input 2400
$zipCodes = ['2400', '2700', '3100', '3200', '2100', '2200', '2300']; // Database
$matches = [];

foreach ($zipCodes as $zipCode) {
    if (strpos($zipCode, $sSearchFor) !==  false) { // ! = =
        array_push($matches, $zipCode);
    }
}

echo json_encode($matches);
