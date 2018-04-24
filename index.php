<!DOCTYPE html>
<html>
  <head>
    <title>Varios Marker en un mapa</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
		var infoWindow = new google.maps.InfoWindow();
		  
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.440819, lng: -3.618624},
          zoom: 17
        });
		
		function createMarker(options, html) { // ojo, una función dentro de otra función
			var marker = new google.maps.Marker(options);
			if (html) {
				google.maps.event.addListener(marker, "click", function () {
					infoWindow.setContent('<textarea id="infoarea"></textarea>');
					infoWindow.setContent(html);
					infoWindow.open(options.map, this);
				});
			}
			return marker;
		}
		marker = createMarker({
            position: new google.maps.LatLng(40.440819, -3.618624),
            map: map,
            icon: 'images/icono.jpg',
        }, "<h4>Información sobre Cronos 63</h4>");
		
		marker = createMarker({
            position: new google.maps.LatLng(40.443652, -3.616994),
            map: map,
            icon: 'images/icono.jpg',
        }, "<h4>Información sobre Metro Torre Arias</h4>");
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaXXXXj_62-Lv2lfaA4IIekpX_KWGNj-5nJy0&callback=initMap"
    async defer></script>
  </body>
</html>