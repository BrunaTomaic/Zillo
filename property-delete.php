<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
</head>
<body>
    <h1>The user is trying to delete a peoperty with id <?= $_GET['id']; ?></h1>

    <?php 
//open the file
$sPropertyId = $_GET['id'];
$sjProperties = file_get_contents("properties.json");
$jProperties= json_decode($sjProperties);

unset($jProperties->$sPropertyId);

$sjProperties = json_encode($jProperties, JSON_PRETTY_PRINT);
file_put_contents("properties.json", $sjProperties);
echo $sjProperties;

sleep(2);
header('location: properties.php');

?>
</body>
</html>

