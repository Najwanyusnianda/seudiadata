@extends('layout.master_front')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4> Update Data</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <input type="indikator" class="form-control" id="indikator_id" name="indikator_id" hidden value="{{$indikator->id}}">
                    <div class="form-group">
                        <label for="indikator">Indikator</label>
                    <input type="indikator" class="form-control" id="indikator" name="indikator" readonly value="{{$indikator->indikator}}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Data</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        <br>
                        <a class="btn btn-info btn-sm" href="#">
                            <span class="btn-label">
                                <i class="fa fa-download"></i>
                            </span>
                            Download Template Data
                        </a>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Ulasan</label>
                        <div id="ulasan"></div>
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