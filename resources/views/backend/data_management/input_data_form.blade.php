@extends('layout.master_front')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4> Update Data Konten {{$indikator->indikator}}</h4>
            </div>
            <div class="card-body">
            <form action="{{route('data.update')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="indikator_id" name="indikator_id"  value="{{$indikator->id}}">
                    <div class="form-group">
                        <label for="indikator">Parameter</label>
                        <input type="indikator" class="form-control" id="indikator" name="indikator" readonly value="{{$indikator->indikator}}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="indikator">Tipe Visualisasi</label>
                        <input type="indikator" class="form-control" id="indikator" name="indikator" readonly value="{{$indikator->graph_type}}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="indikator">Judul Konten</label>
                        <input type="indikator" class="form-control" id="title" name="title"  value="{{$indikator->title ?? ''}}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="indikator">Sub Judul Konten</label>
                    <input type="indikator" class="form-control" id="subtitle" name="subtitle"  value="{{$indikator->subtitle ?? ''}}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="data_file">Upload Data</label>
                        <input type="file" class="form-control-file" id="data_file" name="data_file">
                        <br>
                    <a class="btn btn-info btn-sm" href="{{asset('dataTemplate/garis_template')}}">
                            <span class="btn-label">
                                <i class="fa fa-download"></i>
                            </span>
                            Download Template Data
                    </a>
                    
                    </div>
                    <div class="form-group">
                        <textarea name="ulasan" id="ulasan">
                            &lt;p&gt;This is some sample content.&lt;/p&gt;
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
         

               
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
    <script>
           ClassicEditor
        .create( document.querySelector( '#ulasan' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection