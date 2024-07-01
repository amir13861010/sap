<div>

    <link href="https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

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

        .recording-controls {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .map-button:hover circle {
            fill: #4264FB;
        }

        .map-button:hover path {
            stroke: #fff;
        }

        .map-button:active circle {
            fill: #4264FB;
        }

        .map-button:active path {
            stroke: #fff;
        }

        .map-button.selected circle {
            fill: #4264FB;
        }

        .map-button.selected path {
            stroke: #fff;
        }
        .map-controls {
            grid-column-gap: 10px;
            background-color: #fff;
            border-radius: 32px;
            justify-content: flex-start;
            align-items: center;
            padding: 6px;
            display: flex;
            position: absolute;
            z-index: 10;
            top: 13px;
            bottom: auto;
            left: 13px;
            right: auto;
            box-shadow: 0 0 4px rgba(21, 45, 72, .25);
        }

        .map-button {
            display: flex;
            border-radius: 8px;
            justify-content: center;
            transition: fill 2s ease, stroke 2s ease;
        }

        .map-button:hover circle {
            fill: #4264FB;
        }

        .map-button:hover path {
            stroke: #fff;
        }

        .map-button:active circle {
            fill: #4264FB;
        }

        .map-button:active path {
            stroke: #fff;
        }

        .map-button.selected circle {
            fill: #4264FB;
        }

        .map-button.selected path {
            stroke: #fff;
        }


    </style>

    <div id="map" wire:ignore></div>
    <div class="map-controls">
        <div class="map-button" id="dawn">
            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <circle cx="19" cy="19" r="18.5" fill="white" />
                    <path d="M29.9414 29.9673L7.44141 29.9673" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M24.717 29.9669C24.717 26.8095 22.1574 24.25 19.0001 24.25C15.8427 24.25 13.2832 26.8095 13.2832 29.9669"
                          stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.998 17.9084V20.3202" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <path d="M18.998 12.7725L18.998 6.53246" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M22.1094 8.33984L19.0723 5.95312" stroke="#4264FB" stroke-width="2" stroke-linecap="round" />
                    <path d="M15.8867 8.33984L18.9238 5.95312" stroke="#4264FB" stroke-width="2" stroke-linecap="round" />
                    <path d="M10.4746 21.4402L12.1786 23.1458" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M27.5245 21.4402L25.8184 23.1458" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
        </div>
        <div class="map-button" id="day">
            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <circle cx="19" cy="19.0002" r="18.5" fill="white" />
                    <path
                        d="M19 24.5467C22.0635 24.5467 24.5469 22.0632 24.5469 18.9998C24.5469 15.9363 22.0635 13.4529 19 13.4529C15.9366 13.4529 13.4531 15.9363 13.4531 18.9998C13.4531 22.0632 15.9366 24.5467 19 24.5467Z"
                        stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M19 7.30005V9.6401" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <path d="M10.7285 10.7268L12.3819 12.3817" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.30078 18.9998H9.64083" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <path d="M10.7285 27.2725L12.3834 25.6182" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M19 30.6999V28.3589" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <path d="M27.2726 27.2725L25.6172 25.6182" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.6994 19.0002H28.3594" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <path d="M27.2726 10.7268L25.6172 12.3817" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
        </div>
        <div class="map-button" id="dusk">
            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <circle cx="19" cy="19" r="18.5" fill="white" />
                    <path
                        d="M24.4979 28.9589C24.4979 25.923 22.0368 23.4619 19.0009 23.4619C15.965 23.4619 13.5039 25.923 13.5039 28.9589"
                        stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M19 17.3643V19.6833" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                          stroke-linejoin="round" />
                    <path d="M10.8008 20.7603L12.4393 22.4003" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M30.25 28.9592L7.75 28.9592" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M27.1991 20.7603L25.5586 22.4003" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M18.998 5.90894L18.998 12.1489" stroke="#4264FB" stroke-width="2" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15.8887 10.3416L18.9258 12.7283" stroke="#4264FB" stroke-width="2" stroke-linecap="round" />
                    <path d="M22.1113 10.3416L19.0742 12.7283" stroke="#4264FB" stroke-width="2" stroke-linecap="round" />
                </g>
            </svg>
        </div>
        <div class="map-button" id="night">
            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <circle cx="19" cy="19" r="18.5" fill="white" />
                    <path
                        d="M18.53 27.9489C14.9462 28.7919 11.3593 27.5714 9.01172 25.0631C10.617 25.5423 12.3651 25.6235 14.1138 25.2139C19.4467 23.9597 22.7537 18.6189 21.4996 13.2864C21.0884 11.5378 20.2364 10.01 19.0919 8.78589C22.3837 9.77013 25.0744 12.4361 25.9173 16.0214C27.1705 21.3549 23.864 26.6947 18.53 27.9489Z"
                        stroke="#4264FB" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
        </div>
    </div>
    <div class="toolbox" id="toolbox">
        <div class="recording-controls">
            <button id="recordButton"><i class="fa-solid fa-microphone"></i></button>
            <button id="stopButton" style="display:none;"><i class="fa-solid fa-stop"></i></button>
            <button id="pauseButton" style="display:none;"><i class="fa-solid fa-pause"></i></button>
            <button id="resumeButton" style="display:none;"><i class="fa-solid fa-play"></i></button>
            <button id="playButton" style="display:none;">Play</button>
            <button id="uploadButton" style="display:none;">Upload</button>
            <button id="cancelButton" style="display:none;">Cancel</button>
        </div>
        <button onclick="viewPlaylist()"><i class="fa-solid fa-layer-group"></i></button>
        <button onclick="mentionPeople()"><i class="fa-solid fa-quote-left"></i></button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <form wire:submit.prevent="save">
        <input type="hidden" wire:model="latitude">
        <input type="hidden" wire:model="longitude">
        <input type="file" wire:model="audio" id="audioInput" style="display: none;">
        <button type="submit" wire:loading.attr="disabled">Save</button>
        <div wire:loading wire:target="save">
            Uploading... <!-- Add loading indicator or progress bar here -->
        </div>
    </form>


    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2FwLXVzZXIiLCJhIjoiY2x1NWRwdzR5MXBubTJrcXN6M24yN2piZyJ9.mAmcP0Tigjh8OMQSlyAFJg';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/standard',
            projection: 'globe',
            center: [2.293506, 48.859605],
            zoom: 16.2,

        });
        const voiceRecords = @json($voiceRecords); // Pass the voice records to JavaScript
        const MIN_ZOOM_LEVEL = 14;

        voiceRecords.forEach(record => {
            const image = document.createElement('img');
            image.src = `{{ asset("images/Voice_show-removebg-preview.png") }}`; // Replace with your image path
            image.width = 60; // Adjust image width as needed
            image.height = 60; // Adjust image height as needed

            const marker = new mapboxgl.Marker({ element: image })
                .setLngLat([record.longitude, record.latitude])
                .setPopup(new mapboxgl.Popup().setHTML(`<p>Voice Recording: <a href="storage/${record.audio_path}" target="_blank">Play</a></p>`))
                .addTo(map);
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
                    // The `*-emissive-strength` properties control the intensity of light emitted on the source features.
                    // To enhance the visibility of a line in darker light presets, increase the value of `line-emissive-strength`.
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
        document.querySelectorAll('.map-button').forEach(button => {
            button.addEventListener('click', () => {
                // Remove 'selected' class from all buttons
                document.querySelectorAll('.map-button').forEach(btn => btn.classList.remove('selected'));

                // Add 'selected' class to the clicked button
                button.classList.add('selected');

                // Change the map light preset based on the button ID
                const preset = button.id; // 'dawn', 'day', 'dusk', 'night'
                console.log(preset);
                map.setConfigProperty('basemap', 'lightPreset', preset);
            });
        });

        let marker;
        let toolboxCoordinates;

        map.on('click', function (e) {
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

        let audio;
        let audioFile;

        document.addEventListener('DOMContentLoaded', function () {
            let mediaRecorder;
            let audioChunks = [];
            let audioBlob;
            let audioUrl;


            document.getElementById('recordButton').addEventListener('click', startRecording);
            document.getElementById('stopButton').addEventListener('click', stopRecording);
            document.getElementById('pauseButton').addEventListener('click', pauseRecording);
            document.getElementById('resumeButton').addEventListener('click', resumeRecording);
            document.getElementById('playButton').addEventListener('click', playRecording);
            document.getElementById('uploadButton').addEventListener('click', uploadRecording);
            document.getElementById('cancelButton').addEventListener('click', cancelRecording);

            function startRecording() {
                if (map.getZoom() < MIN_ZOOM_LEVEL) {
                    alert("Zoom in closer to record audio at a specific location.");
                    return;
                }
                if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
                    alert("Your browser does not support audio recording");
                    return;
                }

                navigator.mediaDevices.getUserMedia({audio: true})
                    .then(stream => {
                        mediaRecorder = new MediaRecorder(stream);
                        audioChunks = [];

                        mediaRecorder.addEventListener("dataavailable", event => {
                            audioChunks.push(event.data);
                        });

                        mediaRecorder.addEventListener("stop", () => {
                            audioBlob = new Blob(audioChunks);
                            audioFile = new File([audioBlob], "recording.wav", {type: "audio/wav"});
                            audioUrl = URL.createObjectURL(audioBlob);
                            audio = new Audio(audioUrl);
                            toggleButtons(false, true);
                        });

                        mediaRecorder.start();
                        toggleButtons(true);
                    });
            }

            function stopRecording() {
                mediaRecorder.stop();
            }

            function pauseRecording() {
                mediaRecorder.pause();
                document.getElementById('pauseButton').style.display = 'none';
                document.getElementById('resumeButton').style.display = 'block';
            }

            function resumeRecording() {
                mediaRecorder.resume();
                document.getElementById('resumeButton').style.display = 'none';
                document.getElementById('pauseButton').style.display = 'block';
            }

            function playRecording() {
                if (audio) {
                    audio.play();
                }
            }

            function uploadRecording() {
                const formData = new FormData();
                formData.append('file', audioFile);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('/upload-audio', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                        @this.call('setLatitudeLongitudeAndAudio', toolboxCoordinates.lat, toolboxCoordinates.lng, data.filePath);
                        } else {
                            alert('Failed to upload audio');
                        }
                    });
            }

            function cancelRecording() {
                audioChunks = [];
                audioBlob = null;
                audioFile = null;
                audioUrl = null;
                audio = null;
                toggleButtons(false);
            }

            function toggleButtons(isRecording, hasRecording = false) {
                document.getElementById('recordButton').style.display = isRecording ? 'none' : 'block';
                document.getElementById('stopButton').style.display = isRecording ? 'block' : 'none';
                document.getElementById('pauseButton').style.display = isRecording ? 'block' : 'none';
                document.getElementById('resumeButton').style.display = 'none';
                document.getElementById('playButton').style.display = hasRecording ? 'block' : 'none';
                document.getElementById('uploadButton').style.display = hasRecording ? 'block' : 'none';
                document.getElementById('cancelButton').style.display = hasRecording ? 'block' : 'none';
            }

            map.on('move', function () {
                if (toolboxCoordinates) {

                    showToolbox(toolboxCoordinates);
                }
            });
        });
    </script>

</div>
