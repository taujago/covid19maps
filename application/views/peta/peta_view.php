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
<style>
    #legend {
        background-color: #fff;
        width: 300px;
        margin-bottom: 50px;
        margin-left : 20px;
        padding: 10px;
    }

    #tlegend {
        border-collapse: collapse;
        
    }

    #tlegend th {
        background-color: #ccc;
        border: solid 1px #000;
        text-align: center;
    }

    #tlegend td {
        border: solid 1px #000;
        text-align: center;
    }

    #moving_div{
                position: fixed;
                width: 1px;
                height: 1px;
                border-radius: 100%;
                background-color:black;
                box-shadow: 0 0 10px 10px black;
                top: 49%;
                left: 48.85%;
            }


</style>
    

</head>
<body style="overflow: hidden;">
<!-- 
<div class="row">
    <div class="col-md-12 p-3">
        <span class="p-4 text-primary text-xl-left">Update terakhir pada : <?php echo $waktu; ?></span>
    </div>
</div> -->

<!-- 
<div id="moving_div">
    MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA MBALALA KABEKA NOROA 
</div> -->


    <div id="mapid" style="width:100%; height:100%;"></div>
    <div id="legend"> 
        <h4 class="text-primary text-xl-left">Update terakhir pada : <?php echo $waktu; ?></h4>
       <table id="tlegend">
        <tr><Th>KECAMATAN</TD><Th>ODP</TD><Th>PDP</TD><Th>KONFIRMASI</TD></tr>
        <?php 
        $todp=0; $tpdp =0; $tpositif=0;
        foreach($record->result() as $row) :  
            $todp   += $row->odp;
            $tpdp   += $row->pdp;
            $tpositif+= $row->positif;
        ?>
            <tr>
                <td><?php echo $row->kecamatan ?></td>
                <td><?php echo $row->odp ?></td>
                <td><?php echo $row->pdp ?></td>
                <td><?php echo $row->positif ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <tr><Th>JUMLAH</TD><Th><?php echo $todp; ?></TD><Th><?php echo $tpdp; ?></TD><Th><?php echo $tpositif; ?></TD></tr>
        </tr>
       </table>

       <br />
       <h4>Keterangan</h4> : 
       <table cellpadding="2px" cellspacing="2px;">
        <tr><td style="background-color: green;">&nbsp; &nbsp;&nbsp;</td><td>ODP</td></tr>
        <tr><td style="background-color: yellow;">&nbsp; &nbsp;&nbsp;</td><td>ODP,PDP</td></tr>
        <tr><td style="background-color: red;">&nbsp; &nbsp;&nbsp;</td><td>KONFIRMASI</td></tr>
       </table>
    </div>

    
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


        var $mouseX = 0, $mouseY = 0;
        var $xp = 0, $yp =0;
    



    var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';


      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });


        var map;
        var link = '<?php echo isset($geojson) ? $geojson : "" ?>'; 

        function initialize() {
            var map = new google.maps.Map(
            document.getElementById("mapid"), {
                center: new google.maps.LatLng(-8.753745,116.852609),
                zoom: '50',
                mapTypeId: 'roadmap',
                mapTypeControl: false
                // mapTypeId: google.maps.MapTypeId.SATELLITE
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
                    strokeColor: '#00000',
                    strokeWeight: 1,
                    fillColor : feature.getProperty('color'),
                    fillOpacity : 1,
                    icon: pinImage,
                    shadow: pinShadow,
                };
            });



            map.data.addListener('mousemove', function(e){
                


                $mouseX = e.tb.screenX;
                $mouseY = e.tb.screenY; 
                console.log(e);
                console.log(e.tb.screenX);
                console.log(e.tb.screenY);
                // console.log(e.XO.tb.screenX);
                // console.log(e.pageY);

            });


            map.data.addListener('click', function(event){


                // infowindow.open(map, map.data);

                $('#detail_peta').modal('show');
                var kec  = event.feature.getProperty('kec');
                var odp  = event.feature.getProperty('odp');
                var pdp  = event.feature.getProperty('pdp');
                var positif  = event.feature.getProperty('positif');
                var mati  = event.feature.getProperty('mati');

               

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
                        fontSize: 9,
                        //fontColor : clr,
                        strokeWeight : 1,
                        strokeColor : '#000000',
                    });
                }
            }); 

        var legend = document.getElementById('legend');

        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);


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