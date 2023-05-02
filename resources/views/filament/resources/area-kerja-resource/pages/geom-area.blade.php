<x-filament::page>

<div class="p-2 space-y-2 bg-white rounded-xl shadow">
    <div class="py-4">
        @include('components.alert')
    </div>

    <input type="hidden" id="lat" value="{{$data->kabupatenKota->lat}}">
    <input type="hidden" id="long" value="{{$data->kabupatenKota->long}}">

    <textarea hidden name="geom" id="geom" cols="30" rows="10" wire:model="geometri"></textarea>
    <textarea hidden name="geom_coordinate" id="geom_coordinate" cols="30" rows="10">{{$data_coordinate_geom ? $data_coordinate_geom : null }}</textarea>

    <div wire:ignore id="map-con">
    </div>

    <button style="margin-top: 20px;" class="rounded-full bg-primary-500 py-2 px-3 text-white drop-shadow-sm hover:bg-primary-600 active:bg-primary-700 focus:outline-none focus:ring focus:ring-primary-300" type="button" wire:click="saveLocation">
        Simpan Area
    </button>
</div>
    

@push('scripts')
    <script src="{!! asset('leaflet/jquery-2.2.4.js') !!}"></script>
        
    <script src="{!! asset('leaflet/src/Leaflet.draw.js') !!}"></script>
    <script src="{!! asset('leaflet/src/Leaflet.Draw.Event.js') !!}"></script>

    <script src="{!! asset('leaflet/src/Toolbar.js') !!}"></script>
    <script src="{!! asset('leaflet/src/Tooltip.js') !!}"></script>

    <script src="{!! asset('leaflet/src/ext/GeometryUtil.js') !!}"></script>
    <script src="{!! asset('leaflet/src/ext/LatLngUtil.js') !!}"></script>
    <script src="{!! asset('leaflet/src/ext/LineUtil.Intersect.js') !!}"></script>
    <script src="{!! asset('leaflet/src/ext/Polygon.Intersect.js') !!}"></script>
    <script src="{!! asset('leaflet/src/ext/Polyline.Intersect.js') !!}"></script>
    <script src="{!! asset('leaflet/src/ext/TouchEvents.js') !!}"></script>

    <script src="{!! asset('leaflet/src/draw/DrawToolbar.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.Feature.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.SimpleShape.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.Polyline.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.Marker.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.Circle.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.CircleMarker.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.Polygon.js') !!}"></script>
    <script src="{!! asset('leaflet/src/draw/handler/Draw.Rectangle.js') !!}"></script>


    <script src="{!! asset('leaflet/src/edit/EditToolbar.js') !!}"></script>
    <script src="{!! asset('leaflet/src/edit/handler/EditToolbar.Edit.js') !!}"></script>
    <script src="{!! asset('leaflet/src/edit/handler/EditToolbar.Delete.js') !!}"></script>

    <script src="{!! asset('leaflet/src/Control.Draw.js') !!}"></script>

    <script src="{!! asset('leaflet/src/edit/handler/Edit.Poly.js') !!}"></script>
    <script src="{!! asset('leaflet/src/edit/handler/Edit.SimpleShape.js') !!}"></script>
    <script src="{!! asset('leaflet/src/edit/handler/Edit.Rectangle.js') !!}"></script>
    <script src="{!! asset('leaflet/src/edit/handler/Edit.Marker.js') !!}"></script>
    <script src="{!! asset('leaflet/src/edit/handler/Edit.CircleMarker.js') !!}"></script>
    <script src="{!! asset('leaflet/src/edit/handler/Edit.Circle.js') !!}"></script>
    {{-- <script src="{!! asset('leaflet/custom-leflet.js') !!}"></script> --}}
    <script>
        var polyGeoJson = null;
        var layer;
        var osmUrl, osmAttrib, osm, map, drawnItems;
        var baseAction = null;
        var dataId = null;

        var lat = $('#lat').val();
        var long = $('#long').val();

        var geom_coordinate_json = $('#geom_coordinate').val();
        console.log(geom_coordinate_json);
        
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
    </script>
@endpush

</x-filament::page>
