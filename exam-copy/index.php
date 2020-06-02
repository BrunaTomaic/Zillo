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

<body>

    <?php
    ini_set('display_errors', 1);
    require_once(__DIR__ . '/navbar.php');
    ?>

    <div id="map_properties">

        <div id='map'></div>

        <div id="properties">

            <?php
            $sjData = file_get_contents('data.json');
            $jData = json_decode($sjData);
            $aProperties = [];

            foreach ($jData->agents as $jAgent) {
                foreach ($jAgent->properties as $sKey => $jProperty) {
                    echo ' <div id="Right' . $jProperty->internalId . '" class="property">
                    <img/ src="images/' . $jProperty->images[0] . '">
                    <div class="details">
                    <div class="price">$' . $jProperty->price . '</div>
                    <div class="propertystats">
                        <div>' . $jProperty->bds . ' bds  | </div>
                        <div>' . $jProperty->ba . ' ba  | </div>
                        <div>' . $jProperty->sqft . ' sqft </div>
                    </div> 
                    </div>   
                        <div class="propertystat">
                            <div class="address"><span class="dot"></span>' . $jProperty->address->street. '</div>
                            <div class="salestatus salestatus1">' . $jProperty->address->streetnumber. '</div>
                        </div>
                    
                     </div>';
                    array_push($aProperties, $jProperty);
                }
            }


            
            // foreach ($jProperties as $jProperty) {
            //     echo "
            // <div id='Right{$jProperty->id}' class='property'>
            //   <img src='{$jProperty->image}'>
            //   <div class='details'>
            // <div class='price'>$" . $jProperty->price . "</div>

            // </div>
            // <div class='address'>" . $jProperty->address . "</div>
            // <div class='salestatus'><span class='dot'></span>" . $jProperty->salestatus . "</div>

            // </div>";
            // }


            ?>





        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script>
        const sjProperties = '<?php echo json_encode($aProperties); ?>'
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
        for (let jProperty of ajProperties) { // json object with json objects in it
            var el = document.createElement('a');
            el.href = '#Right' + jProperty.id
            el.className = 'marker'
            el.style.backgroundImage = 'url(images/marker2.png)';
            el.style.width = "50px"
            el.style.height = "50px"
            el.id = jProperty.internalId
            console.log(jProperty)
            el.addEventListener('click', function() {
                console.log(`Highlight property with ID ${this.id} `);
                removeActiveClassFromProperty()
                document.getElementById(this.id).classList.add('active') // left
                console.log(document.getElementById('Right' + this.id))
                document.getElementById('Right' + this.id).classList.add('active') // right
            });
            var lngLat = jProperty.address.coordinates;
            // console.log(lngLat);
            // add marker to map
            new mapboxgl.Marker(el).setLngLat(lngLat).addTo(map);
        } // end loop

        // $('.active').removeClass('.active')
        function removeActiveClassFromProperty() {
            let properties = document.querySelectorAll('.active')
            properties.forEach(function(oPropertyDiv) {
                oPropertyDiv.classList.remove('active')
            })
        }
    </script>





</body>

</html>