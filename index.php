<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="app.css">
  

  <script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel="stylesheet">

  <title>Zello</title>
</head>
<body class="body">

<?php 
require_once(__DIR__.'/navbar.php'); 
?>

  <div id="map_properties">

    <div id='map'></div>

    <div id="properties">

      <?php
      $sjProperties = file_get_contents('properties.json');
      $jProperties = json_decode($sjProperties);

        foreach($jProperties as $jProperty){
          echo "
            <div id='Right{$jProperty->id}' class='property'>
              <img src='{$jProperty->image}'>
              <div class='details'>
            <div class='price'>$" . $jProperty->price . "</div>
            <div class='propertystats'>
                  <div>" . $jProperty->bds . " bds  | </div>
                  <div> " . $jProperty->ba . " ba | </div>
                  <div> " . $jProperty->sqft." sqft</div>
            </div>
            </div>
            <div class='address'>".$jProperty->address."</div>
            <div class='salestatus'><span class='dot'></span>".$jProperty->salestatus . "</div>
              
            </div>";
        }
      

      ?>





    </div>

  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>

const txtSearch = document.querySelector('#txtSearch')
const divResults = document.getElementById('results')
txtSearch.addEventListener('input', function(){

    function checkSearch(){
    if($('#txtSearch').val().lenght==0){
    $('#txtSearch').removeClass('error')
    $('#results').hide()
    return
    }
}
    function checkSearch(){
    if($('#txtSearch').val().lenght<2){
        $('#txtSearch').addClass('error')
    }
    }

    $.ajax({
        url: "api-search.php",
        data: $('#formSearch').serialize(),
        dataType: "JSON"
    })
    .done(function(matches){
        console.log(matches)
        $('#results').empty()
        $(matches).each(function(index, zip){
            
            zip=zip.replace(/</g, '&lt;')
            zip=zip.replace(/>/g, '&gt;')
            let divZip = `<div><a href="search.php?zip=${zip}">${zip}</a></div>`
            $('#results').append(divZip)
        })
    })
    .fail(function(){
        console.log('Error')
    })

    //console.log('a')
    if(txtSearch.value.length==0){
        divResults.style.display = 'none'
    }else{
        divResults.style.display = 'block'
    }

    })
</script>

  <script>
      const sjProperties = '<?php echo json_encode($jProperties); ?>'
      ajProperties = JSON.parse(sjProperties) // convert text into an object
      console.log(ajProperties)

      mapboxgl.accessToken = 'pk.eyJ1Ijoic2FudGlhZ29kb25vc28iLCJhIjoiY2swYzVoYmNmMHlkZzNibzR4NTNxamU3cSJ9.QNJx-cfl48aSOx8purGNeA';
      var map = new mapboxgl.Map({
      container: 'map',
      center: [12.555050, 55.704001], // starting position
      zoom: 12, // starting zoom
      style: 'mapbox://styles/santiagodonoso/ck0c6jrhh02va1cnp07nfsv64'
      
      });
      map.addControl(new mapboxgl.NavigationControl());

    // JSON works with for in loops
    // Arrays work with forEach and also with for of
    for( let jProperty of ajProperties ){ // json object with json objects in it
    
      var el = document.createElement('a');
      el.href = '#Right'+jProperty.id
      el.className = 'marker'
      el.style.backgroundImage = 'url(marker.png)';
      el.style.width = "50px"
      el.style.height = "50px"
      el.id = jProperty.id
      el.addEventListener('click', function() {
        console.log(`Highlight property with ID ${this.id} `);
        removeActiveClassFromProperty()
        document.getElementById(this.id).classList.add('active') // left
        document.getElementById('Right'+this.id).classList.add('active') // right
      });
    // add marker to map
    new mapboxgl.Marker(el).setLngLat(jProperty.geometry.coordinates).addTo(map);      
  } // end loop

    // $('.active').removeClass('.active')
    function removeActiveClassFromProperty(){
      let properties = document.querySelectorAll('.active')
      properties.forEach( function( oPropertyDiv ) {
        oPropertyDiv.classList.remove('active')
      } )
    }  


    </script>

  

</body>
</html>