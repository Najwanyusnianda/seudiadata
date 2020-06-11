@extends('layout.master_front')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif
@if (!empty($indikator))
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
                    <label for="indikator">Indikator</label>
                    <input type="indikator" class="form-control" id="indikator" name="indikator"  value="{{$indikator->indikator}}">
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="graph_type">Tipe Visualisasi</label>
                    <select class="form-control" id="graph_type" name="graph_type">
                        <option selected disabled> Pilih Jenis Visualisasi</option>

                         <option value="Batang" {{$indikator->graph_type=='Batang' ? 'selected' : ''}}>Bar Chart (Batang)</option>
                         <option value="Garis"  {{$indikator->graph_type=='Garis' ? 'selected' : ''}}>Line Chart (Garis)</option>
                         <option value="pie_chart"  {{$indikator->graph_type=='pie_chart' ? 'selected' : ''}}>Pie Chart </option>

                    </select>
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="indikator">Judul Konten</label>
                    <input type="indikator" class="form-control" id="title" name="title"  value="{{$indikator->title }}">
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="indikator">Sub Judul Konten</label>
                <input type="indikator" class="form-control" id="subtitle" name="subtitle"  value="{{$indikator->subtitle }}">
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="data_file">Upload Data</label>
                    <input type="file" class="form-control-file" id="data_file" name="data_file">
                    <br>
                <a class="btn btn-info btn-sm" href="#" id="download_template">
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
@else
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4> Tambah Indikator Baru</h4>
        </div>
        <div class="card-body">
        <form action="{{route('data.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="indikator">Subject</label>
                    <select class="form-control" id="subject" name="subject">
                        <option selected disabled> Pilih Variabel</option>
                        @forelse ($subjects as $subject)
                         <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>
                <input type="hidden" class="form-control" id="indikator_id" name="indikator_id"  value="">
                <div class="form-group">
                    <label for="indikator">Indikator</label>
                    <input type="indikator" class="form-control" id="indikator" name="indikator"  value="">
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="graph_type">Tipe Visualisasi</label>
                    <select class="form-control" id="graph_type" name="graph_type">
                        <option selected disabled> Pilih Jenis Visualisasi</option>

                         <option value="Batang">Bar Chart (Batang)</option>
                         <option value="Garis">Line Chart (Garis)</option>
                         <option value="pie_chart">Pie Chart </option>

                    </select>
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="indikator">Judul Konten</label>
                    <input type="indikator" class="form-control" id="title" name="title"  value="">
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="indikator">Sub Judul Konten</label>
                <input type="indikator" class="form-control" id="subtitle" name="subtitle"  value="">
                    <small id="emailHelp2" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="data_file">Upload Data</label>
                    <input type="file" class="form-control-file" id="data_file" name="data_file">
                    <br>
                <a class="btn btn-info btn-sm" href="#" id="download_template">
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
@endif

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

<script>
var download_button = $('#download_template');

download_button.click(function (e) {
    e.preventDefault();
    var type=$('#graph_type').val();
    if(type=="Garis"){
        var download_url="{{ route('data.downloadTemplate',['Garis']) }}";
    }else if(type=="Batang"){
        var download_url="{{ route('data.downloadTemplate',['Batang']) }}";
    }else if(type=="pie_chart"){
        var download_url="{{ route('data.downloadTemplate',['pie_chart']) }}";
    }
   

    $.ajax({
        type: 'GET',
        url: download_url,
        success: function (filepath) {
        console.log(filepath);
        window.open(filepath);
        },
        error: function (err) {
            alert('gagal download');
            }
        });
    });

</script>
@endsection