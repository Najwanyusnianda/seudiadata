@extends('layout.master_front')

@section('styles')
    <style>
        #map { height: 500px; }
    </style>
    	<style>#map { width: 800px; height: 500px; }
            .info {
                padding: 6px 8px;
                font: 14px/16px Arial, Helvetica, sans-serif;
                background: white;
                background: rgba(255, 255, 255, 0.8);
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                border-radius: 5px;
            }

            .info h4 {
                margin: 0 0 5px;
                color: #777;
            }

            .legend {
                text-align: left;
                line-height: 18px;
                color: #555;
            }

            .legend i {
                width: 18px;
                height: 18px;
                float: left;
                margin-right: 8px;
                opacity: 0.7;
            }

            </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <h4 class="card-title">Garis Kemiskinan</h4>
                        <div class="card-tools">
                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                            <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                        </div>
                    </div>
                    <p class="card-category"> Perkembangan Garis Kemiskinan di Aceh Barat Daya tahun 2010-2019</p>
                </div>
                <div class="card-body">
                  <table class="table table-condensed">
                      <tbody>
                          <tr>
                            <td  width="50%">
                                <div class="">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex autem a, 
                                    nostrum modi vero neque tenetur perspiciatis architecto nisi sapiente ab odit,
                                     voluptatem earum quam beatae officiis sunt doloribus officia.
                                                            </div>
                            </td>
                        </tr>
                      </tbody>
                  </table>



                    </div>
               
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
var map = L.map('map').setView([4.569413, 96.733986], 7);
console.log(map);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=' + mapboxAccessToken, {
    id: 'mapbox/light-v9',
    attribution: "...",
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);

// control that shows state info on hover
    var info = L.control();

    info.onAdd = function (map) {
		this._div = L.DomUtil.create('div', 'info');
		this.update();
		return this._div;
	};

	info.update = function (props) {
		this._div.innerHTML = '<h4>US Population Density</h4>' +  (props ?
			'<b>' + props.NAME_2 + '</b><br />' + props.CC_2 + ' people / mi<sup>2</sup>'
			: 'Hover over a state');
    };
    info.addTo(map);
	// get color depending on population density value
	function getColor(d) {
		return d > 1100 ? '#800026' :'#6655';
			 
    }
    function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.CC_2)
		};
    }
    
    function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 5,
			color: '#666',
			dashArray: '',
			fillOpacity: 0.7
		});

		if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			layer.bringToFront();
		}

		info.update(layer.feature.properties);
    }
    
    var geojson;

	function resetHighlight(e) {
		geojson.resetStyle(e.target);
		info.update();
	}

	function zoomToFeature(e) {
		map.fitBounds(e.target.getBounds());
	}

	function onEachFeature(feature, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight,
			click: zoomToFeature
		});
    }
    
    function joinProperties(geojson,json){
        geojson.features.forEach(element => {
            //console.log(element)
            if(element.properties.CC_2==json.id){
                element.propertes.value=json.value
            }
            
        });

        return geojson;
    }

var geodata;

$.getJSON("/data/Aceh.json",function(data){
    geodata=data;
    geojson = L.geoJson(data,{
        style: style,
		onEachFeature: onEachFeature
    }).addTo(map);
})

</script>
@endsection