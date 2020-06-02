<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My properties</title>
</head>

<body>

    <div class="container">
        <a href="profile.php">Upload another property</a>
        <?php
        session_start();
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
    

    </div><a href="profile.php"></a>
    <script>

    </script>
</body>

</html>