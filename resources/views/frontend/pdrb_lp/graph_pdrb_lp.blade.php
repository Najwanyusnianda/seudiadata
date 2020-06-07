


    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="col-4">
                    <div class="form-group">
                        <label for="indikatorSelect">Indikator</label>
                        <select class="form-control" id="indikatorSelect">
                           <option value="{{route('pdrb_lp.graph.series.pdrb_adhb')}}">PDRB ADHB</option>
                         <option value="{{route('pdrb_lp.graph.series.pdrb_adhk')}}"> PDRB ADHK</option>
                         <option value="{{route('pdrb_lp.graph.pie.pdrb')}}">Distribusi Pie PDRB</option>
                         <option value="{{route('pdrb_lp.graph.series.pertumbuhan_ekonomi')}}">Pertumbuhan Ekonomi</option>
                         <option value="{{route('pdrb_lp.graph.series.implisit')}}">Pertumbuhan Implisit</option>
                         \<option value="{{route('pdrb_lp.graph.bar.pdrb_distribusi')}}" selected>Distribusi Bar PDRB</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="graph-pdrb_lp-wrapper">

                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function(){

            var indikatorSelect=$('#indikatorSelect');
            var graphWrapper=$('.graph-pdrb_lp-wrapper');

            var url="{{route('pdrb_lp.graph.bar.pdrb_distribusi')}}"
            $.ajax({
                url:url,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                
                graphWrapper.html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                  
                },
                error:function(e){
                 alert(e.toString());
                }
            });


            indikatorSelect.change(function(){
                var url =this.value;

                $.ajax({
                url:url,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                
                graphWrapper.html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                  
                },
                error:function(e){
                 alert(e.toString());
                }
                });
            });



        })
    </script>
