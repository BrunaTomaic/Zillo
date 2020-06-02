<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app-property.css">
    <title>Properties</title>
</head>
<body>
  <div class="container">
    <a href="property-form.php">Upload property</a>

    <?php 
    
    //read/display from text file
      $sjProperties=file_get_contents("properties.json");
      $jProperties=json_decode($sjProperties);
      $sBluePrint='
        <div class="property">
          <img class="property-img" src="{{path}}">
            <div>$:{{price}}</div>
            <div>BDS: {{bds}}</div>
            <div>BA: {{ba}}</div>
            <div>SQFT: {{sqft}}</div>
            <div>address: {{address}}</div>
            <a href="property-delete.php?id={{id}}">DELETE</a>
            <a href="property-update.php?id={{id}}">UPDATE</a>
        </div>'; 
      foreach($jProperties as $sKey=>$jProperty ){
          //echo $sKey;
           $sCopyBluePrint=$sBluePrint;
           $sCopyBluePrint= str_replace('{{price}}',$jProperty->price,$sCopyBluePrint);
           $sCopyBluePrint= str_replace('{{bds}}',$jProperty->bds,$sCopyBluePrint);
           $sCopyBluePrint= str_replace('{{ba}}',$jProperty->ba,$sCopyBluePrint);
           $sCopyBluePrint= str_replace('{{sqft}}',$jProperty->sqft,$sCopyBluePrint);
           $sCopyBluePrint= str_replace('{{address}}',$jProperty->address,$sCopyBluePrint);
           $sCopyBluePrint= str_replace('{{path}}',$jProperty->image,$sCopyBluePrint);
           $sCopyBluePrint= str_replace('{{id}}',$sKey,$sCopyBluePrint);
           echo $sCopyBluePrint;
      }
    ?>
  </div>
</body>
</html>