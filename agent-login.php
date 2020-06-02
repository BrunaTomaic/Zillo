 <?php
  ini_set('display_errors', 1);

  session_start();
  if ($_SESSION) {
    // header('Location: agent-profile.php');
  }
  $sjData = file_get_contents('data.json');
  $jData = json_decode($sjData);

  if ($_POST) {
    foreach ($jData->agents as $sKey => $jAgent) {
      $sCorrectEmail = $jData->agents->$sKey->email;
      $sCorrectPassword = $jData->agents->$sKey->password;
      if ($sCorrectEmail == $_POST['txtEmail'] && $sCorrectPassword == $_POST['txtPassword']) {
        $_SESSION['jAgent'] = $jAgent;
        header('Location: agent-profile.php');
        exit;
      }
      // HERE IS THE BUGGGG , IF YOU COMMENT IT OUT LOGIN DOESNT WORK
      // else {
      //   echo ' <form  method="POST">
      //   <input name="txtEmail" type="text" placeholder="Email">
      //   <input name="txtPassword" type="password" placeholder="Password">
      //   <button>LOGIN</button>
      //   </form>';
      //   echo 'Email or Password is not correct';
      //   exit();
      // };
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Log in</title>
</head>
<body class="test">
  
<form action="agent-profile.php" method="POST">
   <input name="txtEmail" type="text" placeholder="Email">
   <input name="txtPassword" type="password" placeholder="Password">
   <button>LOGIN</button>
 </form>

</body>
</html>