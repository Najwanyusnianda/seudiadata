@extends('layout.master_front')

@section('styles')
    <style>
        #map { max-width: 1000px;,margin: auto }
    </style>
    	<style>#map { width: auto; height: 800px; }
            .info {
                padding: 6px 8px;
                font: 14px/16px Arial, Helvetica, sans-serif;
                background: white;
                background: rgba(255, 255, 255, 0.8);
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                border-radius: 5px;
            }

            .info h4 {
                margin: 0 0 5px;
                color: #777;
            }

            .legend {
                text-align: left;
                line-height: 18px;
                color: #555;
            }

            .legend i {
                width: 18px;
                height: 18px;
                float: left;
                margin-right: 8px;
                opacity: 0.7;
            }

            </style>
@endsection


@section('page_header')
<h4 class="page-title">content</h4>
<ul class="breadcrumbs">
    <li class="nav-home">
        <a href="#">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">content</a>
    </li>

</ul>
@endsection
@section('content')
<div class="card p-3">
    <ul class="nav nav-pills nav-primary">
        <li class="nav-item">
          <a class="nav-link" href="{{route('content.graph',['subject_id'=>$subject_id])}}" id="contentGrafik">Grafik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('content.map')}}" id="contentPeta">Peta</a>
        </li>
       <!-- <li class="nav-item">
          <a class="nav-link disabled" href="{{route('content.data')}}"  id="contentData">Data</a>
        </li>-->
     </ul> 
</div>

        <br>
        <div class="content-wrapper">
            
        </div>
 
  
@endsection


@section('scripts')

<script >

    function getInterface(pageUrl){
        $.ajax({
                url: pageUrl,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                   
                $('.content-wrapper').html(response);

                },
                error:function(e){
                
                }
            });       
    }
    
    $(document).ready(function(){
  
        var wrapper= $('.content-wrapper');
        var ulasan =$('#contentUlasan');
        var peta=$('#contentPeta');
        var grafik=$('#contentGrafik');

        function addFocus(me){
                    ulasan.removeClass('active');
                    grafik.removeClass('active');
                    peta.removeClass('active');
                    me.addClass('active');
                
        }

        function initialUi(){
            $.ajax({
                url:"{{route('content.ulasan')}}",
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                
                $('.content-wrapper').html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                   
                    grafik.removeClass('active');
                    peta.removeClass('active');
                    ulasan.addClass('active');
                },
                error:function(e){
                 alert(e.toString());
                }
            });
        }

        //initialUi();

        ulasan.click(function(e){
            e.preventDefault();
            var me=$(this)
            var url=$(this).attr('href');
            
            $.ajax({
                url:url,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                
                $('.content-wrapper').html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                   
                    grafik.removeClass('active');
                    peta.removeClass('active');
                    me.addClass('active');
                },
                error:function(e){
                 alert(e.toString());
                }
            });
        })


        grafik.click(function(e){
            e.preventDefault();
            var me=$(this)
            var url=$(this).attr('href');
            
            $.ajax({
                url:url,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                console.log('success');
                $('.content-wrapper').html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                    ulasan.removeClass('active');
            
                    peta.removeClass('active');
                    me.addClass('active');
                },
                error:function(e){
                 alert('e.toString()');
                }
            });
        })

        peta.click(function(e){
            e.preventDefault();

            var me=$(this)
            var url=$(this).attr('href');
            
            $.ajax({
                url:url,
                dataType: 'html',
                global: false,
                success: function(response) {
                   // console.log("Data: " + response);
                console.log('success');
                $('.content-wrapper').html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                    ulasan.removeClass('active');
            
                    grafik.removeClass('active');
                    me.addClass('active');
                },
                error:function(e){
                 alert('e.toString()');
                }
            });

        })
    })


</script>

@endsection