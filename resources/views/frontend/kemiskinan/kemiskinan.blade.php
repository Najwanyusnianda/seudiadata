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

        <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
            <li class="nav-item submenu">
                <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="true">Ulasana</a>
            </li>
            <li class="nav-item submenu">
                <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Peta</a>
            </li>
            <li class="nav-item submenu">
                <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Grafik</a>
            </li>
        </ul> 
        <br>
        <div class="kemiskinan-wrapper">
            @yield('kemiskinan-content')
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

    })


</script>

@endsection