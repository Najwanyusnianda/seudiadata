


    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="col-4">
                    <div class="form-group">
                        <label for="indikatorSelect">Indikator</label>
                        <select class="form-control" id="indikatorSelect">
                            <option selected disabled> Pilih Variabel</option>
                            @forelse ($subject_indikator as $indikator)
                        <option value={{route('content.graph.content',[$indikator->indikator_id])}}>{{$indikator->indikator_item}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="graph-content-wrapper">

                </div>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function(){

            var indikatorSelect=$('#indikatorSelect');
            var graphWrapper=$('.graph-content-wrapper');

 


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
                 alert("Terjadi Kesalahan");
                }
                });
            });



        })
    </script>
