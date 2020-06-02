<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
</head>
<body>

    <h1>Deleting product <?= $_GET['id']; ?></h1>
  <?php
  // Open the file
  $sPropertyId =  $_GET['id'];
  $sjProperties = file_get_contents('data.json');
  $jProperties = json_decode( $sjProperties );
  unset( $jProperties->agents->$sPropertyId );
  $sjProperties = json_encode( $jProperties, JSON_PRETTY_PRINT );
  file_put_contents('data.json', $sjProperties );
  echo $sjProperties;
  sleep(3);
  header('Location: agent-profile.php');
  ?>

</body>
</html>