<?php

session_start();

if ($_POST) {
    //Name validation
    $sName = $_POST['txtName'];
    if (empty($_POST['txtName'])) {
        sendErrorMessage('Full name is missing');
    }

    if (strlen($_POST['txtName']) < 2 || strlen($_POST['txtName']) > 50) {
        sendErrorMessage('Full name should have Min 2 and Max 50 characters');
    }
    if (!preg_match("/^[a-zA-Z][a-z]+\s{1}[a-zA-Z][a-z]*$/", $sName)) {
        sendErrorMessage('Characters in full name are invalid');
    }

    //Email validation
    $sEmail = $_POST['txtEmail'];
    if (empty($_POST['txtEmail'])) {
        sendErrorMessage('Email is missing');
        exit();
    }
    if (!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) {
        sendErrorMessage('Email is invalid');
        exit();
    }

    //Password validation
    $sPassword = $_POST['txtPassword'];
    if (empty($_POST['txtPassword'])) {
        sendErrorMessage('Password is missing');
        exit();
    }
    if (strlen($_POST['txtPassword']) < 2) {
        sendErrorMessage('Password is too short');
    }
    if (strlen($_POST['txtPassword']) > 100) {
        sendErrorMessage('Password is too long');
    }
}function sendErrorMessage($sErrorMessage){
    $sName = $_POST['txtName'];
    $sEmail = $_POST['txtEmail'];
    $sPassword = $_POST['txtPassword'];
    echo '<form method="POST">
    <input name="txtName" type="text" placeholder="'.$sName.'">
    <input name="txtEmail" type="text" placeholder="'.$sEmail.'">
    <input name="txtPassword" type="password" placeholder="'.$sPassword.'">
    <button>SIGNUP AS USER</button>
</form>';
    echo "<p>$sErrorMessage</p>";

    exit;
}

if ($_POST) {
    $sName = $_POST['txtName'];
    $sEmail = $_POST['txtEmail'];
    $sPassword = $_POST['txtPassword'];
    $jAgent = new stdClass();
    $jAgent->name = $sName;
    $jAgent->email = $sEmail;
    $jAgent->password = $sPassword;
    $jAgent->ActivationKey = bin2hex(random_bytes(16));
    $jAgent->verified = 1;
    $sAgentUniqueId = uniqid();
    $sjData = file_get_contents('data.json');
    $jData = json_decode($sjData);
    $jData->users->$sAgentUniqueId = $jAgent;
    $sjData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $sjData);
    header("location:welcome-user.php?name=$sName");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>Signup</title>
</head>

<body class="login-body">

<header class="header">
<div><a href="index.php"><img src="images/logo.png"></a></div>
<a class="login-a" href="login.php">Agent login</a>
</header>

<div class="div">
<h1 class="login-h1">User signup</h1>
    <form class="form" method="POST">
        <input class="login-input" name="txtName" type="text" placeholder="Full Name">
        <input class="login-input" name="txtEmail" type="text" placeholder="Email">
        <input class="login-input" name="txtPassword" type="password" placeholder="Password">
        <button class="button" >SIGNUP AS USER</button>
    </form>
    <a href="login-user.php">Login as an User</a>
</div>
</body>

</html>