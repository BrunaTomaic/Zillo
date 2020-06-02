<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agent Profile</title>
</head>
<body> 

    <div id="agents">
    <?php
    $sjData = file_get_contents( 'data.json' );
    $jData = json_decode( $sjData ); 

    $key= '5d809b97df1aa';
    $name = $jData->agents->$key->name;
    $email = $jData->agents->$key->email;
      echo '
      <div id="'.$key.'" class="agent">
        <img>
        <input data-update="name" type="text" value="'.$name.'">
        <input data-update="email" type="text" value="'.$email.'">
        <a href="agent-delete.php?id='.$key.'">Delete</a>
      </div>';
    
    ?>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js">
    </script>

</body>
</html>