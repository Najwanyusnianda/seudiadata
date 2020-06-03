<div class="card">
    <div class="card-header">
        <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">Gini Ratio</h4>
            <div class="card-tools">
            </div>
        </div>
        <p class="card-category"> Perkembangan Gini Ratio di Aceh Barat Daya tahun 2010-2019</p>
    </div>

    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>


<script>
    //alert("woe")
    var gk_data = @json($gini_ratio, JSON_PRETTY_PRINT);
    var tahun_gk = @json($tahun, JSON_PRETTY_PRINT);
    //console.log(gk_data);
    //gk_data = JSON.parse(gk_data);
    console.log(tahun_gk);
    //tahun_gk=JSON.parse(tahun_gk);

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: tahun_gk,
            datasets: [{
                label: 'Gini Ratio',
                backgroundColor: '#2980b9',
                borderColor: '#3498db',
                data: gk_data,
                fill: false
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>