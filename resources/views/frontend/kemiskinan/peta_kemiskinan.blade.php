<div class="card">
    <div class="card-body">
        <div id="map"></div>

    </div>
</div>

<script src="{{ asset('data/us-states.js') }}"></script>




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