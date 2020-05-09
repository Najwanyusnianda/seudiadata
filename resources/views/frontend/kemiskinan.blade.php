@extends('layout.master_front')

@section('styles')
    <style>
        #map { height: 500px; }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row-12">
            <div class="card">
                <div class="card-header">
                    Garis Kemiskinan
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

<script src="{{ asset('data/us-states.js') }}"></script>
    <script>
        var gk_data=@json($garis_kemiskinan,JSON_PRETTY_PRINT);
        var tahun_gk=@json($tahun,JSON_PRETTY_PRINT);

        gk_data=JSON.parse(gk_data);
        
        //tahun_gk=JSON.parse(tahun_gk);
        
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
    // The type of chart we want to create
            type: 'line',

    // The data for our dataset
    data: {
        labels: tahun_gk,
        datasets: [{
            label: 'Garis Kemiskinan',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: gk_data
        }]
    },

    // Configuration options go here
    options: {}
});
    </script>



<script>
console.log(statesData);
var mapboxAccessToken = 'pk.eyJ1IjoiZW5qZXdlIiwiYSI6ImNrOXphaW1jZDBjcHIzZW52Y2cwczM3cTMifQ.CNAgLezF4O0YBasQm4bEdA';
var map = L.map('map').setView([4.569413, 96.733986], 10);
console.log(map);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + mapboxAccessToken, {
    id: 'mapbox/light-v9',
    attribution: "...",
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);





$.getJSON("/data/Aceh.json",function(data){
    L.geoJson(data).addTo(map);
})

</script>
@endsection