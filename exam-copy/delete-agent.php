<?php
session_start();
$sAgentId=$_SESSION['id'];

$sjData=file_get_contents('data.json');
$jData= json_decode($sjData);

$jData->agents->$sAgentId->verified = 0;

$sjData=json_encode($jData,JSON_PRETTY_PRINT);
file_put_contents('data.json',$sjData);
header('Location: index.php');

