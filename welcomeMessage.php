<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
</head>

<body>
    <h1> Welcome <?php echo $_GET['name'] ?></h1>
    
    <?php
session_start(); //Start your memory
if ($_SESSION) {
    echo '<a href="api-send-email.php">send email</a>';
} else {
    header('Location: agent-login.php');
}?>

</body>

</html>