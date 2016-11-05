<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

<div class="container" id="search-container">
	<input id="search-input" type="text" required autofocus/>
	<button id="search-get" type="submit" onclick='onSearchClick()'>Search For Homes</button>
</div>
	
	<div class="container" id="search-result-container"></div>

	<body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWOv3nHrDtvumbxi2wfyzUCLJBiV3ax4k&callback=initMap"
    async defer></script>
  </body>
