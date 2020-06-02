<?php
$sAgentId=$_POST['id'];
$sKeyToUpdate=$_POST['key'];
$sNewValue=$_POST['value'];

$sjData= file_get_contents('data.json');//text from file
$jData= json_decode($sjData);
//update the data
$jData->agents->$sAgentId->$sKeyToUpdate=$sNewValue;


$sjData= json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('data.json', $sjData);//file to text