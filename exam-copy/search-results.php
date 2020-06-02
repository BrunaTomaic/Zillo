<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>

<body class="searchh">

<header>

<div><a href="index.php"><img src="images/logo.png"></a></div>

<nav class="menu">
    <a href="login.php">Agent login</a>
    <a href="login-user.php">User login</a>

</nav>
<div class="form-container">
    <form id="frmSearch" method="POST">
        <input class="menu-search" name="search" id="txtSearch" type="text" placeholder="search">
        <button class="menu-search" id="serachBtn">Search</button>
    </form>
    <div id="results"></div>
</div>
</header>

    <?php

    $sZipcode = $_GET['zipcode'];
    // echo $sZipcode;
    $sjData = file_get_contents('data.json');
    $jData = json_decode($sjData);

    foreach ($jData->agents as $jAgent) {
        foreach ($jAgent->properties as  $jProperty) {
            if ($jProperty->address->zipcode == $sZipcode) {
                echo '
                <div id="Right' . $jProperty->internalId . '" class="property-search">
                <img/ src="images/' . $jProperty->images[0] . '">
                <div class="details">
                <div class="price">$' . $jProperty->price . '</div>
                <div class="propertystats">
                    <div>' . $jProperty->bds . ' bds  | </div>
                    <div>' . $jProperty->ba . ' ba  | </div>
                    <div>' . $jProperty->sqft . ' sqft </div>
                </div> 
                </div>   
                    <div class="propertystat">
                        <div class="address"><span class="dot"></span>' . $jProperty->address->street. '</div>
                        <div class="salestatus salestatus1">' . $jProperty->address->streetnumber. '</div>
                    </div>
                
                 </div>';
            }
        }
    }


    ?>
</body>

</html>