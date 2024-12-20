<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Google Maps Integration</title>
    <style>
      #map {
        height: 500px;
        width: 100%;
      }
    </style>
  </head>
  <body>
    <h1>Find Store Location</h1>
    <form id="locationForm">
      <label for="address">Enter address or coordinates:</label>
      <input
        type="text"
        id="address"
        name="address"
        placeholder="Enter address or lat, lon"
      />
      <button type="submit">Find Location</button>
    </form>

    <div id="map"></div>

    <script>
      let map;

      function initMap() {
        // Default location to center the map (Vietnam)
        const centerLocation = { lat: 10.8231, lng: 106.6297 };

        // Initialize the map
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 8,
          center: centerLocation,
          mapId: "1cb2376437fe5943",
        });

        // Array of store locations
        const stores = [
          { lat: 10.8231, lng: 106.6297 }, // Vietnam
          { lat: 37.7749, lng: -122.4194 }, // San Francisco
          { lat: 40.7128, lng: -74.006 }, // New York
          { lat: 34.0522, lng: -118.2437 }, // Los Angeles
          { lat: 41.8781, lng: -87.6298 }, // Chicago
          { lat: 51.5074, lng: -0.1278 }, // London
          { lat: 48.8566, lng: 2.3522 }, // Paris
          { lat: 55.7558, lng: 37.6176 }, // Moscow
          { lat: 35.6895, lng: 139.6917 }, // Tokyo
          { lat: -33.8688, lng: 151.2093 }, // Sydney
        ];

        // Loop through the store locations and add a marker for each one
        stores.forEach((location) => {
          new google.maps.Marker({
            position: location,
            map: map,
          });
        });
      }

      // Handle form submission to find address or coordinates
      document
        .getElementById("locationForm")
        .addEventListener("submit", function (event) {
          event.preventDefault();

          const locationInput = document.getElementById("address").value;

          if (locationInput) {
            // Try to parse the input as latitude and longitude
            const coords = locationInput.split(",");
            if (coords.length === 2) {
              const lat = parseFloat(coords[0].trim());
              const lon = parseFloat(coords[1].trim());

              if (!isNaN(lat) && !isNaN(lon)) {
                // Valid coordinates: create a marker and center the map
                const latLng = { lat: lat, lng: lon };
                map.setCenter(latLng);
                new google.maps.Marker({
                  position: latLng,
                  map: map,
                });
              } else {
                alert("Invalid coordinates");
              }
            } else {
              // Input is not coordinates, try to geocode the address
              const geocoder = new google.maps.Geocoder();
              geocoder.geocode(
                { address: locationInput },
                function (results, status) {
                  if (status === google.maps.GeocoderStatus.OK) {
                    const latLng = results[0].geometry.location;
                    map.setCenter(latLng);
                    new google.maps.Marker({
                      position: latLng,
                      map: map,
                    });
                  } else {
                    alert("Address not found");
                  }
                }
              );
            }
          }
        });
    </script>

    <!-- Google Maps API script -->
    <?php
      $googleMapsApiKey = getenv('GOOGLE_MAPS_API_KEY');
    ?>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo htmlspecialchars($googleMapsApiKey); ?>&callback=initMap"
      async
      defer
    ></script>
  </body>
</html>
