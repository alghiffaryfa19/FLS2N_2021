@extends('layouts.geo')
@section('title','Dashboard')
@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<style>
#mapid { min-height: 800px; }
</style>
@endsection
@section('content')
<div class="flex-1 flex flex-col bg-blue-50 py-4 lg:py-8 px-4 lg:px-6 xl:px-8 overflow-hidden">

    <!-- topbar -->
    <div class="max-w-screen-2xl w-full mx-auto flex justify-between">
      <div class="hidden md:block">
        <h1 class="text-2xl mb-1 font-bold text-blue-800">Geospasial Persebaran Peserta FLS2N</h1>
        
      </div>
      <div class="form-input">
        <a href="{{route('admin')}}"  class="bg-yellow-600 py-2 px-8 shadow-md rounded text-white mr-5">Kembali</a>
    </div>
    </div>
    <!--/ topbar -->

    <!-- main content -->
    <div class="flex-1 py-4 lg:py-10">
        <div class="max-w-screen-2xl mx-auto">
          <div class="py-3">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-5 bg-white border-b border-gray-200">
                        <div class="card-body" id="mapid"></div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
  </div>
@endsection
@section('script')
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<script>
var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
var markers = L.markerClusterGroup();

axios.get('{{ route('api.outlets.index') }}')
.then(function (response) {
    var marker = L.geoJSON(response.data, {
        pointToLayer: function(geoJsonPoint, latlng) {
            return L.marker(latlng).bindPopup(function (layer) {
                return layer.feature.properties.map_popup_content;
            });
        }
    });
    markers.addLayer(marker);
})
.catch(function (error) {
    console.log(error);
});
map.addLayer(markers);

map.on('click', function(e) {
    let latitude = e.latlng.lat.toString().substring(0, 15);
    let longitude = e.latlng.lng.toString().substring(0, 15);

    if (theMarker != undefined) {
        map.removeLayer(theMarker);
    };

    var popupContent = "Your location : " + latitude + ", " + longitude + ".";
    popupContent += '<br><a href="#">Add new outlet here</a>';

    theMarker = L.marker([latitude, longitude]).addTo(map);
    theMarker.bindPopup(popupContent)
    .openPopup();
});
</script>
@endsection