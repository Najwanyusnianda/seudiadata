

@if ($content_dt->data != null)
<div class="row">
    <div class="card col-md-12 col-12">
        <div class="card-header">
            <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">{{$content_dt->title ?? 'Tidak ada Judul'}}</h4>
                <div class="card-tools">
     
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="download_data" data-toggle="download_data" href="{{ route('data.downloadData',[$content_dt->id]) }}" role="tab" aria-selected="true"><i class="fas fa-file-download"></i> Download Data</a>
                        </li>

                    </ul>
                   <!-- <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card">
                        <span class="fa fa-sync-alt"></span>
                    </button>-->
                </div>
            </div>
            <p class="card-category">{{$content_dt->subtitle ?? 'Tidak ada Judul'}}</p>
        </div>
        <div class="card-body">
    
            <div class="row">
  
                <div class="col-md-10">
                    <canvas id="myChart"></canvas>
                </div>
             
            </div>
    
   
    
    
    
    
            <div class="row">
                @if (($content_dt->graph_type=="Batang" or $content_dt->graph_type=="pie_chart" )  and $content_dt->data != null)
                <table class="table table-sm" id="keteranganTable">
                    <thead>
                        <th>Keterangan</th>
                        <th>Indeks</th>
                    </thead>
                <tbody>
                    @foreach ($item as $key=>$object)
                        <tr>
                            <td> <small>{{ $object }}</small> </td>
                            <td> <small>{{ $alias[$key] }}</small> </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>   
                

                @else
    
                @endif
            </div>
    
    
        </div>
    </div>
</div>

<div class="row">
    <div class="card col-md-12 col-12">
        <div class="card-header">
            <div class="card-head-row card-tools-still-right">
                <h4 class="card-title">Ulasan </h4>
                <div class="card-tools">

                </div>
            </div>
            <p class="card-category"> </p>
        </div>
        <div class="card-body">
    
    
    
            {!!$content_dt->ulasan ?? 'Tidak ada Ulasan'!!}
    
     
    
    
        </div>
    </div>
</div>
@else
    <h1>Tidak ada</h1>
@endif

<script>
    $('#keteranganTable').DataTable({
        "searching": false,
        "lengthChange": false,
        pageLength: 5,

    });
</script>

@if ($content_dt->graph_type=="Garis" and $content_dt->data != null )
<script>
 
    var data=@json($data ?? '',JSON_PRETTY_PRINT);
    var tahun=@json($tahun,JSON_PRETTY_PRINT);
    var label="{{$content_dt->indikator}}";
    //var label=@json($content_dt->indikator_item);

    //gk_data=JSON.parse(gk_data);
    
    //tahun_gk=JSON.parse(tahun_gk);
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
// The type of chart we want to create
        type: 'line',

// The data for our dataset
    data: {
    labels: tahun,
    datasets: [
        {
        label: label,
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: data,
        fill:true
        }
    ]
},

// Configuration options go here
        options: {}
    });
</script>
@else
   @if ($content_dt->graph_type=="Batang" and $content_dt->data != null)
   <script>
 
    var data=@json($data ?? '',JSON_PRETTY_PRINT);
    var item=@json($item,JSON_PRETTY_PRINT);
    var alias_label=@json($alias,JSON_PRETTY_PRINT);
    var label="{{$content_dt->indikator}}";
    //var label=@json($content_dt->indikator_item);

    //gk_data=JSON.parse(gk_data);
    
    //tahun_gk=JSON.parse(tahun_gk);
    var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + 0 + "," + g + "," + b + ")";
    };
    var colorz=new Array();

    for (let index = 0; index < data.length; index++) {
       // const element = array[index];
        colorz.push(dynamicColors());
    }
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
// The type of chart we want to create
        type: 'bar',

// The data for our dataset
    data: {
    labels: alias_label,
    datasets: [
        {
        label: label,
        backgroundColor: colorz,
        borderColor: colorz,
        data: data,
        barPercentage: 0.5,
        barThickness: 8,
        maxBarThickness:10,
        minBarLength: 2,
        }
    ]
},

// Configuration options go here
        options: {}
    });
</script>
   @else
       @if ($content_dt->graph_type=="pie_chart" and $content_dt->data != null)
       <script>
 
        var data=@json($data ?? '',JSON_PRETTY_PRINT);
        var item=@json($item,JSON_PRETTY_PRINT);
        var alias_label=@json($alias,JSON_PRETTY_PRINT);
        var label="{{$content_dt->indikator}}";
        //var label=@json($content_dt->indikator_item);
    
        //gk_data=JSON.parse(gk_data);
        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + 0 + "," + g + "," + b + ")";
    };
    var colorz=new Array();

    for (let index = 0; index < data.length; index++) {
       // const element = array[index];
        colorz.push(dynamicColors());
    }
    //console.log(colorz);
        //tahun_gk=JSON.parse(tahun_gk);
        
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
    // The type of chart we want to create
            type: 'pie',
    
    // The data for our dataset
        data: {
        labels: alias_label,
        datasets: [
            {
            label: label,
            backgroundColor: colorz,
            borderColor: colorz,
            data: data,
            }
        ]
    },
    
    // Configuration options go here
            options: {}
        });
    </script>
       @else
           
       @endif
   @endif 
@endif
