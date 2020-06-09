
<div class="row">
    <div class="card col-md-12 col-12">
        <div class="card-header">
            <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">{{$content_dt->title ?? 'Tidak ada Judul'}}</h4>
                <div class="card-tools">
                    <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                    <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card">
                        <span class="fa fa-sync-alt"></span>
                        </button>
                    <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                </div>
            </div>
            <p class="card-category">{{$content_dt->subtitle ?? 'Tidak ada Judul'}}</p>
        </div>
        <div class="card-body">
    
    
    
            <canvas id="myChart"></canvas>
    
    
    
    
    
    
    
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

@if ($content_dt->graph_type=="Garis")
<script>
 
    var data=@json($data,JSON_PRETTY_PRINT);
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
    
@endif
