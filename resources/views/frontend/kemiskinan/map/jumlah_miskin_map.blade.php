

        <div id="map" class="mx-auto"></div>


        <script src="{{ asset('data/us-states.js') }}"></script>




<script>
console.log(statesData);
var mapboxAccessToken = 'pk.eyJ1IjoiZW5qZXdlIiwiYSI6ImNrOXphaW1jZDBjcHIzZW52Y2cwczM3cTMifQ.CNAgLezF4O0YBasQm4bEdA';
var map = L.map('map').setView([4.569413, 96.733986], 7.4);
var jumlah_kemiskinan;
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
		this._div.innerHTML = '<h4>Jumlah Penduduk Miskin Aceh 2019 (Ribu) </h4>' +  (props ?
			'<b>' + props.NAME_2 + '</b><br />' + props.n_2019 + ' ribu jiwa'
			: 'Pilih Daerah');
    };
    info.addTo(map);
	// get color depending on population density value
	function getColor(d) {
		return d > 101 ? '#800026' :
				d > 77  ? '#BD0026' :
				d > 53  ? '#E31A1C' :
				d > 29  ? '#FC4E2A' :
				d > 5   ? '#FD8D3C' :
				'#FEB24C';

			 
    }
    function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.n_2019)
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

	//add legend
	var legend = L.control({position: 'bottomright'});

	legend.onAdd = function (map) {

		var div = L.DomUtil.create('div', 'info legend'),
			grades = [0, 5, 29, 53, 77, 101],
			labels = [],
			from, to;

		for (var i = 0; i < grades.length; i++) {
			from = grades[i];
			to = grades[i + 1];

			labels.push(
				'<i style="background:' + getColor(from + 1) + '"></i> ' +
				from + (to ? '&ndash;' + to : '+'));
		}

		div.innerHTML = labels.join('<br>');
		return div;
	};

	legend.addTo(map);
    
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

$.getJSON("/data/kemiskinan/jumlah_miskin.json",function(data){
	jumlah_kemiskinan=data;
});

$.getJSON("/data/Aceh.json",function(data){
	//console.log(jumlah_kemiskinan["0"][2010]);
	//console.log(jumlah_kemiskinan["0"]);
    geodata=data;

	geodata.features.forEach(element => {
           jumlah_kemiskinan.forEach(prop => {
			if(prop.kode==element.properties.CC_2){
				//console.log(element.properties.CC_2);
              element.properties.n_2019=prop["2019"];
		
            }
		   })
            
    });

	console.log(geodata);	


    geojson = L.geoJson(data,{
        style: style,
		onEachFeature: onEachFeature
    }).addTo(map);
})

</script>