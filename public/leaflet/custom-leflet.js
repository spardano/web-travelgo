    var polyGeoJson = null;
    var layer;
    var osmUrl, osmAttrib, osm, map, drawnItems;
    var baseAction = null;
    var dataId = null;

    var lat = $('#lat').val();
    var long = $('#long').val();

    // var geom_coordinate_json = $('#geom_coordinate').val();

    
    function initMap(mapCon, zoomVal = 13, lt = lat, lg = long){

        $('#map-con').empty();
        mapCon.append("<div id='map' name='map' class='form-control' style='width: auto; height: 400px'></div>");
        osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors';
        osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib });
        map = new L.Map('map', { center: new L.LatLng(lt, lg), zoom: zoomVal });
        drawnItems = L.featureGroup().addTo(map);
        L.control.layers({
            'osm': osm.addTo(map),
            "google": L.tileLayer('http://www.google.com/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
                attribution: 'google'
            })
        }, { 'drawlayer': drawnItems }, { position: 'topleft', collapsed: false }).addTo(map);
        map.addControl(new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                poly: {
                    allowIntersection: false
                },
                edit: false
            },
            draw: {
                polygon: {
                    allowIntersection: false,
                    showArea: true
                },
                polyline : false,
                circle: false,
                marker: false,
                rectangle: false

            }
        }));
        map.on(L.Draw.Event.CREATED, function (event) {
            layer = event.layer;

            drawnItems.addLayer(layer);
            polyGeoJson = JSON.stringify(layer.toGeoJSON());

            // $('#geom').val(polyGeoJson);
            Livewire.emit('changeGeometri', polyGeoJson);
       

            layer.on('edit', function() {
                console.log('Polygon was edited!');
            });
        });

        if(geom_coordinate_json){

            
            var geom_coordinate = JSON.parse(geom_coordinate_json);
            let geojsonFeature = {
                type: "Feature",
                properties: {
                    "name": 'Test',
                    "amenity": "Lokasi Kerja",
                    "popupContent": ":)"
                },
                geometry: geom_coordinate
            };

            let selectedFeature = null;
                L.geoJSON(geojsonFeature,{
                    onEachFeature: function (feature, layer1) {
                        layer = layer1;
                        layer.bindPopup(feature.properties.name);
                        polyGeoJson = JSON.stringify(layer.toGeoJSON());
                        drawnItems.addLayer(layer);
                        layer.on('click', function(e){
                            if(selectedFeature)
                                selectedFeature.editing.disable();
                            selectedFeature = e.target;
                            e.target.editing.enable();
                        });
                        layer.on('edit', function(event) {
                            layer = event.target;
                            layer.bindPopup(layer.feature.properties.name);
                            polyGeoJson = JSON.stringify(layer.toGeoJSON());
                        });
                    }
                }).addTo(map);
                console.log(geojsonFeature)
        }
    }

    initMap($('#map-con'));

    function updateNewLokasi() {
        console.log("ayam masuk update")
        let nama = $('#edit-nama').val();
        if(nama && polyGeoJson){
            $(".overlay").removeClass('d-none').addClass('d-flex');
            axios.patch('lokasis/' + dataId,{
                nama : nama,
                geom : polyGeoJson
            })
                .then((res) => {
                    $(".overlay").removeClass('d-flex').addClass('d-none');
                    console.log(res);
                    $('#data-table').DataTable().ajax.reload();
                    $('#modal-lg-edit').modal('hide');
                    Swal.fire(
                        'Berhasil!',
                        'Data berhasil diedit!',
                        'success'
                    )
                    initMap($('#map-con-edit'));
                })
                .catch((e) => {
                    $(".overlay").removeClass('d-flex').addClass('d-none');
                    console.log(e);
                    Swal.fire(
                        'Gagal!',
                        'Terjadi Kesalahan saat input data!',
                        'error'
                    )
                })
        }
    }


    $(document).ready(function() {

        $('#data-table tbody').on('click', '.edit', function() {
            // getFormEdit();
            const data = table.row($(this).parents('tr')).data();
            dataId = data['id'];
            if (baseAction == null) {
                baseAction = $('#form-open-edit').html();
            }
            axios.get('lokasis/' + data['id']).then(function(res) {
                let val = res.data;
                $('#edit-nama').val(data['nama']);
                let geojsonFeature = {
                    type: "Feature",
                    properties: {
                        "name": data['nama'],
                        "amenity": "Lokasi Kerja",
                        "popupContent": ":)"
                    },
                    geometry: val
                };
                let latti = geojsonFeature.geometry.coordinates[0][0][1] || null;
                let longi = geojsonFeature.geometry.coordinates[0][0][0] || null;

                initMap($('#map-con-edit'), 18, latti, longi);
                
                let selectedFeature = null;
                L.geoJSON(geojsonFeature,{
                    onEachFeature: function (feature, layer1) {
                        layer = layer1;
                        layer.bindPopup(feature.properties.name);
                        polyGeoJson = JSON.stringify(layer.toGeoJSON());
                        drawnItems.addLayer(layer);
                        layer.on('click', function(e){
                            if(selectedFeature)
                                selectedFeature.editing.disable();
                            selectedFeature = e.target;
                            e.target.editing.enable();
                        });
                        layer.on('edit', function(event) {
                            layer = event.target;
                            layer.bindPopup(layer.feature.properties.name);
                            polyGeoJson = JSON.stringify(layer.toGeoJSON());
                        });
                    }
                }).addTo(map);
                console.log(geojsonFeature)
                $('#modal-lg-edit').modal('show');
            }).catch(function(msg) {
                console.log(msg)
            })
        });



    });