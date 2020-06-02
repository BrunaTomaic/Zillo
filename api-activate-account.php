<?php
//todo:check that the user ID is passed
//todo:check that the user ID is valid Id
//todo:check that the key is valid- key 3454-rtrt-5665-tyuu-6776

$sKey = $_GET['key']; // key from the url
$sUserId = $_GET['id']; // user id from the url
echo "<h1>Welcome {$_GET['id']} $sKey</h1>";

$sjData = file_get_contents( 'data.json' ); // open file
$jData = json_decode( $sjData ); // convert text to object

if($jData->$sUserId->verified=1){
    echo 'Cannot activate account';
    exit;
}

if( $jData->$sUserId->activationKey == $sKey ){
  echo 'match found';
  $jData->$sUserId->verified = 1; // convert 0 to 1
  $sjData = json_encode( $jData, JSON_PRETTY_PRINT ); // convert json to text
  file_put_contents( 'data.json' , $sjData );  // save text to file
}else{
  echo 'no match found';
}