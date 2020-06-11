@extends('layout.master_front')


@section('page_header')
<h4 class="page-title">Daftar Subject</h4>
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
        <a href="{{route('data.index')}}">Daftar Subject</a>
    </li>


</ul>
@endsection

@section('content')
<div class="container-fluid">
<div class="card">
    <div class="card-header">
 Daftar  Subject 
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Subject</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subject as $sb)
                    <tr>
                        <td>
                            <span class="font-weight-bold"> {{$sb->subject_name}}</span>
                           
                        </td>
                        <td>
                        <a href="{{route('data.indicatorIndex',[$sb->id])}}" class="btn btn-sm btn-info" style="background-color:#0984e3 !important;"><i class="fas fa-chart-area"></i> Grafik</a>
                        <a href="{{route('data.mapIndicatorIndex',[$sb->id])}}" class="btn btn-info btn-sm" style="background-color:#00b894 !important"><i class="far fa-map"></i> Peta</a>
                        </td>
                    </tr>

                    @empty
                        
               
                @endforelse
            </tbody>
        </table>


    </div>
    <div class="card-footer">

    </div>
</div>
</div>
@endsection