<?php

session_start();
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
    $jAgent->properties = new stdClass();
    $sAgentUniqueId = uniqid();
    $sjData = file_get_contents('data.json');
    $jData = json_decode($sjData);
    $jData->agents->$sAgentUniqueId = $jAgent;
    $sjData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $sjData);
    header("location:welcome.php?name=$sName");
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
<a class="login-a" href="login-user.php">User login</a>
</header>

<div class="div">
<h1 class="login-h1">Signup as an Agent</h1>
    <form class="form" method="POST">
        <input class="login-input" name="txtName" type="text" placeholder="Full Name">
        <input class="login-input" name="txtEmail" type="text" placeholder="Email">
        <input class="login-input" name="txtPassword" type="password" placeholder="Password">
        <button class="button">SIGNUP AS AGENT</button>
    </form>
    <a href="login.php">Login as an Agent</a>
</div>
</body>

</html>