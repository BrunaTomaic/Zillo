<?php
ini_set('display_errors', 1);

session_start();

(function () {
    if (!$_POST) return;
    if (
        empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) return;
    if (
        empty($_POST['password']) || strlen($_POST['password']) < 4 || strlen($_POST['password']) > 20
    ) return;
    /// Using session
    $sjData = file_get_contents('data.json');
    $jData = json_decode($sjData);
    if ($_POST) {
        foreach ($jData->agents as $sKey => $jAgent) {
            $sCorrectEmail = $jData->agents->$sKey->email;
            $sCorrectPassword = $jData->agents->$sKey->password;
            if ($sCorrectEmail == $_POST['email'] && $sCorrectPassword == $_POST['password']) {
                $_SESSION['jAgent'] = $jAgent;
                $_SESSION['id'] = $sKey;
                header("Location: profile.php?id=$sKey");
                exit;
            }
        }
    }
})();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>Agent login</title>
</head>
<style>
    input.error {
        background-color: rgba(198, 38, 65, .1);
    }

    input {
        outline: none;
        border: 1px solid gray;
    }
</style>

<body class="login-body">

<header class="header">
<div><a href="index.php"><img src="images/logo.png"></a></div>
<a class="login-a" href="login-user.php">User login</a>
</header>

<div class="div">
    <h1 class="login-h1">Agent login</h1>
    <form class="form" id="frmLogin" action="login.php" method="POST">
        <input class="login-input" name="email" type="text" maxlenth="100" placeholder="Email" data-validate="email" data-type="email">
        <input class="login-input" name="password" type="password" maxlenth="100" placeholder="Password" data-type="string">
        <button class="button" id="btnLogin" onclick="validateForm(this)">Login</button>
    </form>
    <a href="signup.php">Signup as an Agent</a>
</div>

    <script src="validate.js"></script>
    <script src="js/login.js"></script>
</body>

</html>