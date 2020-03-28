<!DOCTYPE html>
<html>
    <?php $prot = isset($_SERVER['HTTPS'])?"https":"http"; ?>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <title>Drawing Tools</title>
        <link href="<?= base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">
        <script src="<?= base_url(); ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script type="text/javascript"
        src="<?= $prot; ?>://maps.googleapis.com/maps/api/js?key=AIzaSyDwFDIGf4SfMS7X1A0PLhclAkDPWqOiy5s&&libraries=drawing"></script>

        <style type="text/css">
            #map, html, body {padding: 0;margin: 0;height: 100%;}
            #panel {width: 200px; font-family: Arial, sans-serif; font-size: 13px; float: right; margin: 10px;}
            #color-palette {clear: both;}
            .color-button {width: 14px; height: 14px; font-size: 0; margin: 2px; float: left; cursor: pointer; }
            #delete-button {margin-top: 5px;}
            #legend {width : 30%; float: right;}
            #map {width : 70%; float : left;}
        </style>

        <script type="text/javascript">
            var drawingManager;
            var selectedShape;
            var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
            var selectedColor;
            var colorButtons = {};


            function clearSelection() {
                if (selectedShape) {
                    if (typeof selectedShape.setEditable == 'function') {
                        selectedShape.setEditable(false);
                    }
                    selectedShape = null;
                }
                // curseldiv.innerHTML = "<b>cursel</b>:";
            }

            function updateCurSelText(shape) {
                console.log(shape);
                posstr = "" + selectedShape.position;
                if (typeof selectedShape.position == 'object') {
                    posstr = selectedShape.position.toUrlValue();
                    //console.log('apa ini...'+posstr);
                    var gue_marker_loh = posstr;

                }
                pathstr = "" + selectedShape.getPath;
                //console.log('ini juga...'+pathstr);
                if (typeof selectedShape.getPath == 'function') {
                    pathstr = "";
                    for (var i = 0; i < selectedShape.getPath().getLength(); i++) {
                    // .toUrlValue(5) limits number of decimals, default is 6 but can do more
                        pathstr += selectedShape.getPath().getAt(i).toUrlValue() + "&#10;";
                        console.log('sudah jadi ya...'+pathstr);
                    }
                    pathstr += "";
                }
                bndstr = "" + selectedShape.getBounds;
                cntstr = "" + selectedShape.getBounds;
                if (typeof selectedShape.getBounds == 'function') {
                    var tmpbounds = selectedShape.getBounds();
                    cntstr = "" + tmpbounds.getCenter().toUrlValue();
                    bndstr = "[NE: " + tmpbounds.getNorthEast().toUrlValue() + " SW: " + tmpbounds.getSouthWest().toUrlValue() + "]";
                }
                cntrstr = "" + selectedShape.getCenter;
                if (typeof selectedShape.getCenter == 'function') {
                    cntrstr = "" + selectedShape.getCenter().toUrlValue();
                }
                radstr = "" + selectedShape.getRadius;
                if (typeof selectedShape.getRadius == 'function') {
                    radstr = "" + selectedShape.getRadius();
                }
                console.log('path str '+pathstr);
                if (pathstr == "undefined") {
                    $("#koordinat").html(gue_marker_loh);
                }
                else{
                    $("#koordinat").html(pathstr);
                }
            }

            function setSelection(shape, isNotMarker) {
                console.log('1. set selection');
                clearSelection();
                selectedShape = shape;
                
                if (isNotMarker){
                    shape.setEditable(true);
                    // selectColor(shape.get('fillColor') || shape.get('strokeColor'));
                }

                updateCurSelText(shape);
            }

            function deleteSelectedShape() {
                if (selectedShape) {
                    selectedShape.setMap(null);
                }
            }

            function deletePlacesSearchResults() {
                for (var i = 0, marker; marker = placeMarkers[i]; i++) {
                    marker.setMap(null);
                }
                placeMarkers = [];
                input.value = ''; // clear the box too
            }

            function selectColor(color) {
                selectedColor = color;
                for (var i = 0; i < colors.length; ++i) {
                    var currColor = colors[i];
                    colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
                }

                // Retrieves the current options from the drawing manager and replaces the
                // stroke or fill color as appropriate.
                var polylineOptions = drawingManager.get('polylineOptions');
                polylineOptions.strokeColor = color;
                drawingManager.set('polylineOptions', polylineOptions);

                var rectangleOptions = drawingManager.get('rectangleOptions');
                rectangleOptions.fillColor = color;
                drawingManager.set('rectangleOptions', rectangleOptions);

                var circleOptions = drawingManager.get('circleOptions');
                circleOptions.fillColor = color;
                drawingManager.set('circleOptions', circleOptions);

                var polygonOptions = drawingManager.get('polygonOptions');
                polygonOptions.fillColor = color;
                drawingManager.set('polygonOptions', polygonOptions);
            }

            function setSelectedShapeColor(color) {
                if (selectedShape) {
                    if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
                        selectedShape.set('strokeColor', color);
                    } else {
                        selectedShape.set('fillColor', color);
                    }
                }
            }

            var map;
            var placeMarkers = [];
            //var koor = <?= $koor; ?>;
            //console.log(koor);

            function initialize() {
                map = new google.maps.Map(document.getElementById('map'), { 
                    zoom: 13,//10,
                    center: new google.maps.LatLng(<?= $koor; ?>),//(22.344, 114.048),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: false,
                    zoomControl: true
                });

                var polyOptions = {
                    strokeWeight: 0,
                    fillOpacity: 0.45,
                    editable: true
                };

                drawingManager = new google.maps.drawing.DrawingManager({
                    drawingMode: google.maps.drawing.OverlayType.POLYGON,
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_CENTER,
                        drawingModes: ['polygon']
                    },
                    markerOptions: {
                        draggable: true,
                        editable: true,
                    },
                    polylineOptions: {
                        editable: true
                    },
                    rectangleOptions: polyOptions,
                    circleOptions: polyOptions,
                    polygonOptions: polyOptions,
                    map: map
                });

                google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
                    console.log('complete');
                    //~ if (e.type != google.maps.drawing.OverlayType.MARKER) {
                    var isNotMarker = (e.type != google.maps.drawing.OverlayType.MARKER);
                    // Switch back to non-drawing mode after drawing a shape.
                    drawingManager.setDrawingMode(null);
                // Add an event listener that selects the newly-drawn shape when the user
                    // mouses down on it.
                    var newShape = e.overlay;
                    newShape.type = e.type;

                    google.maps.event.addListener(newShape, 'click', function() {
                        console.log('click');
                        setSelection(newShape, isNotMarker);
                    // console.log('klik');
                    });

                    google.maps.event.addListener(newShape, 'drag', function() {
                        console.log('drag');
                        updateCurSelText(newShape);
                    });

                    google.maps.event.addListener(newShape, 'dragend', function() {
                        console.log('dragend');
                        updateCurSelText(newShape);
                    });

                    setSelection(newShape, isNotMarker);
                    //~ }// end if
                });

                google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
                google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

            }

            google.maps.event.addDomListener(window, 'load', initialize);
            
            
        </script>
    </head>
    <body>

        <div id="map"></div> 
        <div id="legend">
            <div class="row mt-3 mr-2 ml-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Koordinat</div>
                        <div class="card-body">
                            <textarea id="koordinat" class="form-control" rows=10></textarea>

                            <a onclick="set_koordinat()" href="#" class=" mt-2 btn btn-primary">
                            Gunakan koordinat </a>
                            
                            <button id="delete-button" class="btn btn-danger">Hapus</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">
        function set_koordinat() { 
            $("#koordinat", opener.window.document).val($("#koordinat").val());
            window.close();
        }
    </script>
</html>
