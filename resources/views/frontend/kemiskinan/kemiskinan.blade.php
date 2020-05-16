@extends('layout.master_front')

@section('styles')
    <style>
        #map { height: 500px; }
    </style>
    	<style>#map { width: 800px; height: 500px; }
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
<h4 class="page-title">Kemiskinan</h4>
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
        <a href="#">Tables</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Basic Tables</a>
    </li>
</ul>
@endsection
@section('content')

<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="nav-link " href="{{route('kemiskinan.ulasan')}}" id="kemiskinanUlasan">Ulasan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('kemiskinan.graph')}}" id="kemiskinanGrafik">Grafik</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('kemiskinan.map')}}" id="kemiskinanPeta">Peta</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="{{route('kemiskinan.data')}}"  id="kemiskinanData">Data</a>
    </li>
  </ul> 
        <br>
        <div class="kemiskinan-wrapper">

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
                   
                $('.kemiskinan-wrapper').html(response);

                },
                error:function(e){
                
                }
            });       
    }
    
    $(document).ready(function(){
  
        var wrapper= $('.kemiskinan-wrapper');
        var ulasan =$('#kemiskinanUlasan');
        var peta=$('#kemiskinanPeta');
        var grafik=$('#kemiskinanGrafik');

        function addFocus(me){
                    ulasan.removeClass('active');
                    grafik.removeClass('active');
                    peta.removeClass('active');
                    me.addClass('active');
                
        }

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
                
                $('.kemiskinan-wrapper').html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                    addFocus($(this));
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
                
                $('.kemiskinan-wrapper').html(response);
                    //me.css({"background-color": "#007bff", "color":"white"}); 
                    addFocus($(this));
                },
                error:function(e){
                 alert(e.toString());
                }
            });
        })
    })


</script>

@endsection