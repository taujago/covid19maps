<html>
<head>
    <title>PETA LOKASI || SIMTAN</title>
    
    
    <script src="<?php echo base_url(); ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/vendors/bootstrap.bundle.min.js"></script>
    
    <link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/fonts/fonts/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.css" rel="stylesheet" />   
    <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.all.js"></script>

    

</head>
<body style="overflow: hidden;">
    <div id="mapid" style="width:100%; height:100%;"></div>
    
    <div id="detail_peta" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success pt-2 pb-2">
                    <span class="modal-title h4 font-weight-bold" id="judul_modal"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="detail_lokasi"></div>
                </div>
                <div class="modal-footer  pt-2 pb-2">
                    <button type="button" id="edit" class="btn btn-info d-none">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwFDIGf4SfMS7X1A0PLhclAkDPWqOiy5s"></script>
    <script src="<?php echo base_url(); ?>/assets/js/maplabel.js"></script>
    
    <script type="text/javascript">

        var map;
        var link = '<?php echo isset($geojson) ? $geojson : "" ?>'; 

        function initialize() {
            var map = new google.maps.Map(
            document.getElementById("mapid"), {
                center: new google.maps.LatLng(-8.753745,116.852609),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.SATELLITE
            });
            if (link !== '') {
                map.data.loadGeoJson(link);
            }

            map.data.setStyle(function(feature) {
                var pinColor = feature.getProperty('color').replace("#", "");
                var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                    new google.maps.Size(21, 34),
                    new google.maps.Point(0,0),
                    new google.maps.Point(10, 34));
                var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
                    new google.maps.Size(40, 37),
                    new google.maps.Point(0, 0),
                    new google.maps.Point(12, 35));

                return {
                    strokeColor: feature.getProperty('color'),
                    strokeWeight: 4,
                    fillColor : feature.getProperty('color'),
                    fillOpacity : 0.7,
                    icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/parking_lot_maps.png',
                    shadow: pinShadow,
                };
            });

            map.data.addListener('click', function(event){
                $('#detail_peta').modal('show');
                var kec  = event.feature.getProperty('kec');
                var odp  = event.feature.getProperty('odp');
                var pdp  = event.feature.getProperty('pdp');
                var positif  = event.feature.getProperty('positif');
                var mati  = event.feature.getProperty('mati');

               // console.log(odp);

                $('#judul_modal').html('KECAMATAN' +' "'+ kec +'"');
                var html = `
                    <div class="col-7">Orang Dalam Pengawasan (ODP)</div><div class="col-5">: `+odp+`</div>
                    <div class="col-7">Pasien Dalam Pantauan (PDP)</div><div class="col-5">: `+pdp+`</div>
                    <div class="col-7">Positif</div><div class="col-5">: `+positif+`</div>
                    <div class="col-7">Meninggal</div><div class="col-5">: `+mati+`</div>`;

                $('#detail_lokasi').html(html);
            });

            var bounds = new google.maps.LatLngBounds();
            map.data.addListener('addfeature', function(e) {
                processPoints(e.feature.getGeometry(), bounds.extend, bounds);
                map.setCenter(bounds.getCenter());
                map.fitBounds(bounds);
            });


            map.data.addListener('addfeature',function(e){
                if(e.feature.getGeometry().getType()==='Polygon'){
                    var bounds = new google.maps.LatLngBounds();

                    e.feature.getGeometry().getArray().forEach(function(path){
                        path.getArray().forEach(function(latLng){bounds.extend(latLng);})
                    });
                    // e.feature.setProperty('bounds',bounds);
                    // new google.maps.Rectangle({map:map,bounds:bounds,clickable:false})
                    var kec  = e.feature.getProperty('kec');
                    var clr  = e.feature.getProperty('color');

                    var koor = bounds.getCenter();

                    var mapLabel = new MapLabel({
                        text: kec,
                        position: koor,
                        map: map,
                        fontSize: 16,
                        //fontColor : clr,
                        strokeWeight : 1,
                        strokeColor : '#000000',
                    });
                }
            });
        }

        function processPoints(geometry, callback, thisArg) {
            if (geometry instanceof google.maps.LatLng) {
                callback.call(thisArg, geometry);
            } else if (geometry instanceof google.maps.Data.Point) {
                callback.call(thisArg, geometry.get());
            } else {
                geometry.getArray().forEach(function(g) {
                    processPoints(g, callback, thisArg);
                });
            }
        }
        google.maps.event.addDomListener(window, "load", initialize);

    </script>
</body>
</html>