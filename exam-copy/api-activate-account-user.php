
<?php 
//TODO Check that the userID is passed
//TODO Check that the userID is a valid ID
//TODO Check that the key is valid key :5463-yfht-4837-hfgv

$skey=$_GET['key']; 
$sUserId=$_GET['id'];
echo "<h1> Welcome {$_GET['id']} $skey</h1>";
 
 // database
 $sjData=file_get_contents('data.json');
 $jData=json_decode($sjData);
 if($jData->users->$sUserId->verified==1){
     echo 'You can not activate again';
     echo '<a href="login-user.php">Login</a>';
     exit;
 }
if($jData->users->$sUserId->ActivationKey==$skey){
    echo 'match found';
    echo '<a href="login-user.php">Login</a>';
    $sjData=json_encode($jData,JSON_PRETTY_PRINT);
    file_put_contents('data.json',$sjData);

}else{
    echo 'match  not found';
}


 