<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>

<body class="update-property-body">
    <?php
    session_start();
    $sAgentId = $_SESSION['id'];
    $sPId = $_GET['id'];
    $sUpdatePrice = $_POST['txtUpdatePrice'];
    $sUpdateBds = $_POST['txtUpdateBds'];
    $sUpdateBa = $_POST['txtUpdateBa'];
    $sUpdateSqft = $_POST['txtUpdateSqft'];
    $sUpdateStreet = $_POST['txtUpdateStreet'];
    $sjData = file_get_contents('data.json');
    $jData = json_decode($sjData);
    if ($_POST) {
        $jData->agents->$sAgentId->properties->$sPId->price = $sUpdatePrice;
        $jData->agents->$sAgentId->properties->$sPId->bds = $sUpdateBds;
        $jData->agents->$sAgentId->properties->$sPId->ba = $sUpdateBa;
        $jData->agents->$sAgentId->properties->$sPId->sqft = $sUpdateSqft;
        $jData->agents->$sAgentId->properties->$sPId->address->street = $sUpdateStreet;
        $sjData = json_encode($jData, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $sjData);
        header('Location: profile.php');
    }

    ?>
    <form class="update-property-form" method="POST">
        <input name='txtUpdatePrice' type="text" value="<?= $jData->agents->$sAgentId->properties->$sPId->price  ?>">
        <input name='txtUpdateBds' type="text" value="<?= $jData->agents->$sAgentId->properties->$sPId->bds  ?>">
        <input name='txtUpdateBa' type="text" value="<?= $jData->agents->$sAgentId->properties->$sPId->ba  ?>">
        <input name='txtUpdateSqft' type="text" value="<?= $jData->agents->$sAgentId->properties->$sPId->sqft  ?>">
        <input name='txtUpdateStreet' type="text" value="<?= $jData->agents->$sAgentId->properties->$sPId->address->street  ?>">
        <button>Update</button>
    </form>

</body>

</html>