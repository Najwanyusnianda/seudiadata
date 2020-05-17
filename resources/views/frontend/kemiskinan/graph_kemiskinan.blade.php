


    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="col-4">
                    <div class="form-group">
                        <label for="indikatorSelect">Indikator</label>
                        <select class="form-control" id="indikatorSelect">
                           <option value="{{route('kemiskinan.graph.gk')}}">Garis Kemiskinan</option>
                         <option value="{{route('kemiskinan.graph.gini')}}">Gini Ratio</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="graph-kemiskinan-wrapper">

                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function(){

            var indikatorSelect=$('#indikatorSelect');
            var graphWrapper=$('.graph-kemiskinan-wrapper');

            var url="{{route('kemiskinan.graph.gk')}}"
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
