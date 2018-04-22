function initMap() {
  if (locations == null) return;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: { lat: 45.7788727, lng: 4.8679611 }
  });

  infoWindow = new google.maps.InfoWindow;

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('You are here');
      infoWindow.open(map);
      map.setCenter(pos);
    }, function () {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

  // Create an array of alphabetical characters used to label the markers.
  //var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  // Add some markers to the map.
  // Note: The code uses the JavaScript Array.prototype.map() method to
  // create an array of markers based on a given "locations" array.
  // The map() method here has nothing to do with the Google Maps API.
  //var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';

  var markers = locations.map(function (location, i) {
    return new google.maps.Marker({
      position: location,
      //label: labels[i % labels.length],
      //title: location.address,
      //icon: iconBase + 'parking_lot_maps.png'
    });
  });

  markers.map(function (marker) {
    google.maps.event.addDomListener(marker, "click", function (event) {
      var latitude = event.latLng.lat().toFixed(5);
      var longitude = event.latLng.lng().toFixed(5);
      getByID(latitude,longitude);
    });
  })


  // Add a marker clusterer to manage the markers.
  var markerCluster = new MarkerClusterer(map, markers,
    { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' }); 
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
    'Error: The Geolocation service failed.' :
    'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}
