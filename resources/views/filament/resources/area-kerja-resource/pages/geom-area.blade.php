<x-filament::page>

<div class="p-2 space-y-2 bg-white rounded-xl shadow">
    <div class="py-4">
        @include('components.alert')
    </div>

    <input type="hidden" id="lat" value="{{$data->kabupatenKota->lat}}">
    <input type="hidden" id="long" value="{{$data->kabupatenKota->long}}">

    <textarea hidden name="geom" id="geom" cols="30" rows="10" wire:model="geometri"></textarea>

    <div wire:ignore id="map-con">

    </div>

    <button style="margin-top: 20px;" class="rounded-full bg-primary-500 py-2 px-3 text-white drop-shadow-sm hover:bg-primary-600 active:bg-primary-700 focus:outline-none focus:ring focus:ring-primary-300" type="button" wire:click="saveLocation">
        Simpan Area
    </button>
</div>
    

@push('scripts')
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <script src="{!! asset('leaflet/docs/examples/libs/leaflet-src.js') !!}"></script>
            
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
    <script src="{!! asset('leaflet/custom-leflet.js') !!}"></script>
@endpush

</x-filament::page>
