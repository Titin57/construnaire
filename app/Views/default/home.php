<?php $this->layout('layoutBootstrap', ['title' => 'Home', 'currentPage' => 'home']) ?>

<?php $this->start('main_content') ?>

<!DOCTYPE html>
<!--- This is the code for Google Map API 
works well with GPS in Tablet and Mobile -->
<html>
    <head>
        <style type="text/css">
            #map-canvas{
                height: 500px;
            }
        </style>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAi2xF7h7N2DidYQHyD5f64moiewLCJTvI"
        type="text/javascript"></script>

        <script type="text/javascript">

            var map;

            function showPosition(position) {
                // here we define the geolocation position
                // defined are coordinates for longitude 
                
                // uncomment console.log to see error messages regarding browser setup for https
                // console.log(position);
                var currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                var mapOptions = {
                    center: currentLocation,
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map-canvas"),
                        mapOptions);
                
                // includes a marker on the map
                var marker = new google.maps.Marker({
                    position:currentLocation,
                    map: map
                });
            }

            $(document).ready(function () {
                navigator.geolocation.getCurrentPosition(showPosition);
            });
        </script>
    </head>
    <body>
        <div id="map-canvas"></div>
    </body>
</html>

<?php $this->stop('main_content') ?>
