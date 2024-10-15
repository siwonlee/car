<?use Carbon\Carbon;?>
<?

$category = Request::input('category');
use App\Models\Vendor;

?>
@extends('layouts.admin')

@section('content')
<?
//dd($upcs);
?>
 


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<style>
    #mapid { min-height: 500px; }
</style>



<div class="px-3 py-2">
<div class="px-10 py-4 text-3xl text-center "  >   Select the vendor you are visiting. </div>
</div>
 
 
 
<div class="flex items-center justify-center px-3 py-2 ">
 
 
             
        <input type="text"     class="w-full px-4 py-2 mb-3 ml-10 mr-10 text-lg border rounded focus:outline-none focus:bg-white" 
        placeholder="Type Vendor ID, Store Name or Address"  autofocus name="vselect" id="vselect" > 
      
          {{-- <input type=submit class="ml-2 btn btn-warning btn-lg" id="check"  value=" SEARCH ">    --}}

   
 
 

 
</div>   
    
 
<div class="table min-w-full p-6 divide-y divide-gray-200 ">
   
  <table class="table table-bordered table-hover">
    <thead>
    <tr class="px-5 py-3 text-left text-gray-600 bg-gray-100 border-b-2 border-gray-200 ">
    <th>Vendor ID / Store Name / Address  </th>
 
    </tr>
    </thead>
    <tbody id="vs_tbody">
    </tbody>
    </table>    
  
</div>



<div class="p-2 card ">
    <div class="card-body" id="mapid"></div>
</div>





<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 
<script>


const getPosition = () => {
  return new Promise((resolve, reject) => {
    navigator.geolocation.getCurrentPosition(resolve, reject);
  });
};

const getMap = async () => {
  try {
    const position = await getPosition();
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    var map = L.map('mapid').setView([latitude, longitude], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var markers = L.markerClusterGroup();

    axios.get('{{ route('apivendor.index') }}')
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

   




    console.log(latitude); // Use latitude value here
  } catch (error) {
    console.log(error);
  }
};

getMap();

 



    
</script>










 
 


@endsection



