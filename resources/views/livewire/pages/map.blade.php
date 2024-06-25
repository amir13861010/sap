<div>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Change a map's style configuration property</title>
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <link href="https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.js"></script>
        <style>
            body { margin: 0; padding: 0; }
            #map { position: absolute; top: 0; bottom: 0; width: 100%; }
            .map-overlay {
                font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
                position: absolute;
                width: 200px;
                top: 0;
                left: 0;
                padding: 10px;
            }
            .map-overlay .map-overlay-inner {
                background-color: #fff;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
                border-radius: 3px;
                padding: 10px;
                margin-bottom: 10px;
            }
            .map-overlay-inner fieldset {
                display: flex;
                justify-content: space-between;
                border: none;
            }
            .map-overlay-inner label {
                font-weight: bold;
                margin-right: 10px;
            }
            .map-overlay-inner .select-fieldset {
                display: block;
            }
            .map-overlay-inner .select-fieldset label {
                display: block;
                margin-bottom: 5px;
            }
            .map-overlay-inner .select-fieldset select {
                width: 100%;
            }
            .toolbox {
                position: absolute;
                display: none;
                flex-direction: column;
                align-items: center;
                background-color: #fff;
                padding: 5px;
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
                border-radius: 5px;
                z-index: 1000;
            }
            .toolbox button {
                background: none;
                border: none;
                margin: 5px 0;
                cursor: pointer;
            }
            .toolbox button img {
                width: 24px;
                height: 24px;
            }
        </style>
    </head>
    <body>
    <div id="map"></div>

    <div class="map-overlay top">
        <div class="map-overlay-inner">
            <fieldset class="select-fieldset">
                <label>Select light preset</label>
                <select id="lightPreset" name="lightPreset">
                    <option value="dawn">Dawn</option>
                    <option value="day" selected="">Day</option>
                    <option value="dusk">Dusk</option>
                    <option value="night">Night</option>
                </select>
            </fieldset>
            <fieldset>
                <label for="showPlaceLabels">Show place labels</label>
                <input type="checkbox" id="showPlaceLabels" checked="">
            </fieldset>
            <fieldset>
                <label for="showPointOfInterestLabels">Show POI labels</label>
                <input type="checkbox" id="showPointOfInterestLabels" checked="">
            </fieldset>
            <fieldset>
                <label for="showRoadLabels">Show road labels</label>
                <input type="checkbox" id="showRoadLabels" checked="">
            </fieldset>
            <fieldset>
                <label for="showTransitLabels">Show transit labels</label>
                <input type="checkbox" id="showTransitLabels" checked="">
            </fieldset>
        </div>
    </div>

    <div class="toolbox" id="toolbox">
        <button onclick="recordAudio()"><i class="fa-solid fa-microphone"></i></button>
        <button onclick="viewPlaylist()"><i class="fa-solid fa-layer-group"></i></button>
        <button onclick="mentionPeople()"><i class="fa-solid fa-quote-left"></i></button>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2FwLXVzZXIiLCJhIjoiY2x1NWRwdzR5MXBubTJrcXN6M24yN2piZyJ9.mAmcP0Tigjh8OMQSlyAFJg';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            center: [-3.188267, 55.953251], // central coordinates of Scotland [lng, lat]
            zoom: 6, // zoom level
            pitch: 62, // starting pitch
            bearing: -20 // starting bearing
        });

        map.on('style.load', () => {
            map.addSource('line', {
                type: 'geojson',
                lineMetrics: true,
                data: {
                    type: 'LineString',
                    coordinates: [
                        [2.293389857555951, 48.85896319631851],
                        [2.2890810326441624, 48.86174223718291]
                    ]
                }
            });

            map.addLayer({
                id: 'line',
                source: 'line',
                type: 'line',
                paint: {
                    'line-width': 12,
                    'line-emissive-strength': 0.8,
                    'line-gradient': [
                        'interpolate',
                        ['linear'],
                        ['line-progress'],
                        0,
                        'red',
                        1,
                        'blue'
                    ]
                }
            });
        });

        let marker;
        let toolboxCoordinates;

        map.on('click', function(e) {
            var coordinates = e.lngLat;
            toolboxCoordinates = coordinates;
            showToolbox(coordinates);
            if (marker) {
                marker.remove();
            }
            marker = new mapboxgl.Marker()
                .setLngLat(coordinates)
                .addTo(map);
        });

        function showToolbox(coordinates) {
            var toolbox = document.getElementById("toolbox");
            var point = map.project(coordinates);
            toolbox.style.left = point.x + 'px';
            toolbox.style.top = point.y + 'px';
            toolbox.style.display = "flex";
        }

        map.on('move', function() {
            if (toolboxCoordinates) {
                showToolbox(toolboxCoordinates);
            }
        });

        function recordAudio() {
            alert("ضبط صدا");
        }

        function viewPlaylist() {
            alert("مشاهده پلی لیست");
        }

        function mentionPeople() {
            alert("منشن افراد");
        }

        document
            .getElementById('lightPreset')
            .addEventListener('change', function () {
                map.setConfigProperty('basemap', 'lightPreset', this.value);
            });
        document
            .querySelectorAll('.map-overlay-inner input[type="checkbox"]')
            .forEach((checkbox) => {
                checkbox.addEventListener('change', function () {
                    map.setConfigProperty('basemap', this.id, this.checked);
                });
            });
    </script>

    </body>
    </html>

</div>
