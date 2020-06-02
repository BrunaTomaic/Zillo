<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/app.css">
  <title>crud-property</title>
</head>

<body>
  <h1>properties</h1>

  <form id="newPropertyForm">
    <input type="file" name="propertyImages[]" multiple="multipart/form-data">
    <input type="text" name="txtPrice" data-type="integer" data-min="1" placeholder="Price">
    <input type="text" name="txtBds" data-type="integer" data-min="1" placeholder="Bda">
    <input type="text" name="txtBa" data-type="integer" data-min="1" placeholder="Ba">
    <input type="text" name="txtSqft" data-type="integer" data-min="1" placeholder="Sqft">
    <input type="text" name="txtAddress" placeholder="Address">
   
    <button onclick="addNewProperty(this);return false">Upload new property</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="script.js"></script>
</body>

</html>