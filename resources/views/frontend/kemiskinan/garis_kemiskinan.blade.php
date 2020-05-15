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