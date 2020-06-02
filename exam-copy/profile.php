<?php
ini_set('display_errors', 1);
session_start();

if (!$_SESSION) header('location:login.php');

$sId2 = $_SESSION['id'];
echo "new id $sId2";
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

  <div class="profile-h1 profile-h11">
  <h1>Welcome <?= $_SESSION['jAgent']->name  ?></h1>
  <a href="logout.php">Logout</a>
  </div>
  <img style="width:200px" src="images/default.png">
  <h1 class="profile-h2">Update info</h1>
  <div class="profile-h1" id="agents">
    <?php
    $sAgentId = $_SESSION['id'];
    $sjData = file_get_contents('data.json'); // text from file
    $jData = json_decode($sjData); // convert text to JSON
    $name = $jData->agents->$sAgentId->name;
    $email = $jData->agents->$sAgentId->email;
    echo '
          <div id="' . $sAgentId . '" class="agent">
            <input class="profile-name" data-update="name" type="text" value="' . $name . '">
            <input class="profile-name" data-update="email" type="text" value="' . $email . '">
            <a href="delete-agent.php?id=' . $sAgentId . '">Delete</a>
          </div>';
    ?>
  </div>

  <h1 class="profile-h1">Add properties</h1>
  <form class="profile-form" id="newPropertyForm">
    <div class="div-margin profile-div"><input class="profile-input" type="text" name="txtPrice" data-type="integer" data-min="1" placeholder="Price"></div>
    <input class="div-margin profile-div profile-input" type="text" name="txtStreet" placeholder="Street">
    <input class="div-margin profile-div profile-input" type="text" name="txtStreetNumber" placeholder="Street number">
    <input class="div-margin profile-div profile-input" type="text" name="txtZipcode" placeholder="Zipcode">
    <div class="div-margin profile-div"><input class="profile-input" type="text" name="txtBds" data-type="integer" data-min="1" placeholder="Bds"></div>
    <div class="div-margin profile-div"><input class="profile-input" type="text" name="txtBa" data-type="integer" data-min="1" placeholder="Ba"></div>
    <div class="div-margin profile-div"><input class="profile-input" type="text" name="txtSqft" data-type="integer" data-min="1" placeholder="Sqft"></div>
    <div class="div-margin profile-div"><input class="profile-input" type="file" name="propertyImages[]" multiple="multipart/form-data"></div>
    <div class="div-margin profile-div profile-box"><button onclick="addNewProperty(this);return false">Upload new property</button></div>
  </form>
  <div class="container">
       
        <?php
       
        $sAgentId = $_SESSION['id'];
        $sjData = file_get_contents('data.json');
        $jData = json_decode($sjData);

        foreach ($jData->agents->$sAgentId->properties as $sKey => $jProperty) {

            echo '<div class="property">
            <div>Price: "' . $jProperty->price . '"</div>
            <div>Bds: "' . $jProperty->bds . '"</div>
            <div>Ba: "' . $jProperty->ba . '"</div>
            <div>Sqft: "' . $jProperty->sqft . '"</div>
            <div>Address: "' . $jProperty->address->street . '"</div>
          <img src="images/' . $jProperty->images[0] . '" style="width:100px;height:100px"/>
          <a href="delete-property.php?id=' . $sKey . '">DELETE</a>
          <a href="update-property.php?id=' . $sKey . '">UPDATE</a>

            </div>';
        }


        ?>
    

    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="script.js"></script>
  
</body>

</html>