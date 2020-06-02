<?php
session_start();
$PId = $_GET['id'];
$sAgentId = $_SESSION['id'];
$sjData = file_get_contents('data.json');
$jData = json_decode($sjData);
unset($jData->agents->$sAgentId->properties->$PId);
$sjData = json_encode($jData, JSON_PRETTY_PRINT);
file_put_contents('data.json', $sjData);
header('Location: profile.php');
