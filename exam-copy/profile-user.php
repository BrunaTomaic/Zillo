<?php
session_start();

if (!$_SESSION) header('location:login-users.php');

// $sId2 = $_SESSION['id'];
// echo "new id $sId2";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>Profile</title>

</head>

<body class="profile-body">

<header class="header">
<div><a href="index.php"><img src="images/logo.png"></a></div>
<a class="login-a" href="index.php">Map</a>
</header>

<div class="profile-h1-user">
    <h1>Welcome <?= $_SESSION['jAgent']->name  ?></h1>
    <a href="logout-user.php">Logout</a>
</div>
    <img style="width:200px" src="images/default.png">
    <h1 class="profile-h2">Update info</h1>
    
    <div class="profile-h1" id="agents">
        <?php
    $sAgentId = $_SESSION['id'];
    $sjData = file_get_contents( 'data.json' ); // text from file
    $jData = json_decode( $sjData ); // convert text to JSON
    $name = $jData->users->$sAgentId->name;
    $email = $jData->users->$sAgentId->email;
      echo '
      <div id="'.$sAgentId.'" class="agent">
        <input class="profile-name" data-update="name" type="text" value="'.$name.'">
        <input class="profile-name" data-update="email" type="text" value="'.$email.'">
        <a href="delete-user.php?id='.$sAgentId.'">Delete</a>
      </div>';
    ?>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="script-user.js"></script>

</body>

</html>