
<div class="row">
	<div class="card col-md-12 col-12">
        <div class="card-header">
            <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">{{$content_dt->title ?? 'Tidak ada Judul'}}</h4>
                <div class="card-tools">
     
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="download_data" data-toggle="download_data" href="{{ route('data.downloadDataMap',[$content_dt->id]) }}" role="tab" aria-selected="true"><i class="fas fa-file-download"></i> Download Data</a>
                        </li>

                    </ul>
                   <!-- <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card">
                        <span class="fa fa-sync-alt"></span>
                    </button>-->
                </div>
            </div>
            <p class="card-category">{{$content_dt->subtitle ?? 'Tidak ada Judul'}}</p>
        </div>

    </div>
</div>

	<div id="map" class="mx-auto"></div>

        


        <script src="{{ asset('data/us-states.js') }}"></script>
<script>
console.log(statesData);
var mapboxAccessToken = 'pk.eyJ1IjoiZW5qZXdlIiwiYSI6ImNrOXphaW1jZDBjcHIzZW52Y2cwczM3cTMifQ.CNAgLezF4O0YBasQm4bEdA';
var map = L.map('map').setView([4.569413, 96.733986], 7.4);
//var jumlah_kemiskinan;
var json_variable;
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
        var title="{{ $content_dt->title }}"
		this._div.innerHTML = '<h4>'+title+' </h4>' +  (props ?
			'<b>' + props.NAME_2 + '</b><br />' + props.variable_data
			: 'Pilih Daerah');
    };
    info.addTo(map);
	// get color depending on population density value

	//var min = Math.min.apply(null, arr),
	    //max = Math.max.apply(null, arr);
		temp_data=new Array();
		df=@json($map_data,JSON_PRETTY_PRINT);
		df.forEach(element => {
			temp_data.push(parseInt( element.map_data)) 
		});
	//	console.log("df:")
//console.log(temp_data)
///////////////////////////////////////math/////////////////////////////
	function Quartile_25(data) {
	    return Quartile(data, 0.25);
	}

	function Quartile_50(data) {
	    return Quartile(data, 0.5);
	}

	function Quartile_75(data) {
	    return Quartile(data, 0.75);
	}

	function Quartile(data, q) {
	    data = Array_Sort_Numbers(data);
	    var pos = ((data.length) - 1) * q;
	    var base = Math.floor(pos);
	    var rest = pos - base;
	    if ((data[base + 1] !== undefined)) {
	        return data[base] + rest * (data[base + 1] - data[base]);
	    } else {
	        return data[base];
	    }
	}

	function Array_Sort_Numbers(inputarray) {
	    return inputarray.sort(function (a, b) {
	        return a - b;
	    });
	}

	function Array_Sum(t) {
	    return t.reduce(function (a, b) {
	        return a + b;
	    }, 0);
	}

	function Array_Average(data) {
	    return Array_Sum(data) / data.length;
	}

	function Array_Stdev(tab) {
	    var i, j, total = 0,
	        mean = 0,
	        diffSqredArr = [];
	    for (i = 0; i < tab.length; i += 1) {
	        total += tab[i];
	    }
	    mean = total / tab.length;
	    for (j = 0; j < tab.length; j += 1) {
	        diffSqredArr.push(Math.pow((tab[j] - mean), 2));
	    }
	    return (Math.sqrt(diffSqredArr.reduce(function (firstEl, nextEl) {
	        return firstEl + nextEl;
	    }) / tab.length));
	}
/////////////////////////////////////////////////
	console.log(Quartile_75(temp_data));
	console.log(Quartile_50(temp_data));
	function getColor(d) {
		return d > Quartile_75(temp_data) ? '#800026' :
				d > Quartile_50(temp_data) ? '#BD0026' :
				d > Quartile_25(temp_data)  ? '#FC4E2A' : '#FD8D3C';
		

			 
    }
    function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.variable_data)
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
			grades = [0, Quartile_25(temp_data), Quartile_50(temp_data), Quartile_75(temp_data)],
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
//load json data--------------------------------------------------------
/*$.getJSON("/data/kemiskinan/jumlah_miskin.json",function(data){
	jumlah_kemiskinan=data;
});*/
json_variable=@json($map_data,JSON_PRETTY_PRINT);
console.log(json_variable);
$.getJSON("/data/Aceh.json",function(data){
	//console.log(jumlah_kemiskinan["0"][2010]);
	//console.log(jumlah_kemiskinan["0"]);
    geodata=data;

	geodata.features.forEach(element => {
           json_variable.forEach(prop => {
			if(prop.kode==element.properties.CC_2){
				//console.log(element.properties.CC_2);
              element.properties.variable_data=prop["map_data"];
		
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