<div class="row-md-8">
    <div class="card ">
        <div class="card-header">
            <div class="col-4">
                <div class="form-group">
                    <label for="indikatorSelect">Indikator</label>
                    <select class="form-control" id="indikatorSelect">
                       <option value="{{route('kemiskinan.map.jumlah')}}">Jumlah Penduduk Miskin</option>
                     <option value="#">Persentase Penduduk miskin</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="map-kemiskinan-wrapper">
    
            </div>
    
        </div>
    </div>
</div>



<script>

	$(document).ready(function(){
		var indikatorSelect=$('#indikatorSelect');
        var mapWrapper=$('.map-kemiskinan-wrapper');

		var url="{{route('kemiskinan.map.jumlah')}}";

            $.ajax({
                url:url,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                
                mapWrapper.html(response);
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

