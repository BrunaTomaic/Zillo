<?php
ini_set('display_errors', 1);

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
    if (!preg_match("/^[a-zA-Z]+\s{1}[a-zA-Z]*$/", $sName)) {
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
    if (strlen($_POST['txtPassword']) < 8) {
        sendErrorMessage('Password is too short');
    }
    if (strlen($_POST['txtPassword']) > 100) {
        sendErrorMessage('Password is too long');
    }

    $jAgent = new stdClass();
    $jAgent->name = $sName;
    $jAgent->email = $sEmail;
    $jAgent->password = $sPassword;
    $jAgent->properties = new stdClass();
    $sAgentUniqueId = uniqid();
    $sjData = file_get_contents('data.json');
    $jData = json_decode($sjData);
    $jData->agents->$sAgentUniqueId = $jAgent;
    $sjData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $sjData);
    header("location:welcomeMessage.php?name=$sName");
}
function sendErrorMessage($sErrorMessage)
{
    $sName = $_POST['txtName'];
    $sEmail = $_POST['txtEmail'];
    echo '<form method="POST">
    <input name="txtName" type="text" value="' . $sName . '" >
    <input name="txtEmail" type="text" placeholder="Email" value="' . $sEmail . '">
    <input name="txtPassword" type="password" placeholder="Password">
    <button>SIGNUP AS AGENT</button>
</form>';
    echo "<p>$sErrorMessage</p>";

    exit;
}


?>


<form method="POST">
    <input name="txtName" type="text" placeholder="Full Name">
    <input name="txtEmail" type="text" placeholder="Email">
    <input name="txtPassword" type="password" placeholder="Password">
    <button>SIGNUP AS AGENT</button>
</form>