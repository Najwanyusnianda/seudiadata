
<div class="row">
    <div class="card col-md-12 col-12">
        <div class="card-header">
            <div class="card-head-row card-tools-still-right">
                <h4 class="card-title">'Distribusi (%) PDRB (ADHB) menurut Lapangan Usaha</h4>
                <div class="card-tools">
                    <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                    <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span
                            class="fa fa-sync-alt"></span></button>
                    <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                </div>
            </div>
            <p class="card-category"> Distribusi (%) PDRB (ADHB) menurut Lapangan Usaha 2019</p>
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
    
    
    
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates minima illum dignissimos beatae, vitae,
             animi eos quas necessitatibus explicabo tempore perspiciatis eveniet ut enim dicta aliquam! Doloremque nulla quidem nam!
    
    
    
    
    
    
        </div>
    </div>
</div>


<script>
    var data_pdrb=@json($data_dist_pdrb,JSON_PRETTY_PRINT);
    var label_lp=@json($label_lp,JSON_PRETTY_PRINT);

    //gk_data=JSON.parse(gk_data);
    
    //tahun_gk=JSON.parse(tahun_gk);
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
// The type of chart we want to create
        type: 'bar',

// The data for our dataset
    data: {
    labels: label_lp,
    datasets: [
        {
        label: 'Distribusi (%) PDRB (ADHB) menurut Lapangan Usaha',

        data: data_pdrb,
    
        }
    ]
},

// Configuration options go here
        options: {}
    });
</script>