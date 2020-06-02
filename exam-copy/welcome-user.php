<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>welcome</title>
</head>

<body class="welcome-body">
    <div>
    <?php $sName = $_GET['name'] ?>
    <h1> Welcome <?php echo $sName ?></h1>
    <p>Please verify your email <a href="api-send-email-user.php?id=$sName">Here</a></p>
    </div> 
</body>

</html>