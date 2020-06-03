


    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="col-4">
                    <div class="form-group">
                        <label for="indikatorSelect">Indikator</label>
                        <select class="form-control" id="indikatorSelect">
                           <option value="{{route('tk.graph.series.tpak')}}">TPAK</option>
                         <option value="{{route('tk.graph.series.tpt')}}">TPT</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="graph-tk-wrapper">

                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function(){

            var indikatorSelect=$('#indikatorSelect');
            var graphWrapper=$('.graph-tk-wrapper');

            var url="{{route('tk.graph.series.tpak')}}"
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
