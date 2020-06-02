<?php
//thinks that 0 is empty
if(!isset($_GET['search'])){
    echo '[]';
    exit;
}

$sSearchFor=$_GET['search']; //the user's input 2400
$zipCodes=['2400', '2700', '3500', '3730']; //detabase
$matches=[];

foreach($zipCodes as $zipCode){
    if(strpos($zipCode, $sSearchFor) !== false){
        array_push($matches, $zipCode);
    }
}

echo json_encode($matches);

// == 1 is the same as "1"
// === 1 is not the same as "1"
//checking the data type


// if(in_array($sSearchFor, $aZipCodes)){
//     echo 'Match';
// }else{
//     echo 'Not found';
// }


//echo "the user is searching for {$sSearchFor}";
