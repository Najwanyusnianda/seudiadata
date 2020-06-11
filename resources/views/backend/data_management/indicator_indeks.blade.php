@extends('layout.master_front')

@section('page_header')
<h4 class="page-title">Daftar Indikator Grafik  {{ $subject->subject_name }}</h4>
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
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="{{route('data.indicatorIndex',[$subject->id])}}">Daftar Indikator Grafik {{ $subject->subject_name }}</a>
    </li>

</ul>
@endsection
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
                <div class="card-head-row" >
                @if (!empty($subject))
                Daftar Indikator {{$subject->Indikators}}
                @else
                    error
                @endif
                <div class="card-tools">
                    <a href="{{ route('data.create') }}"
                        class="btn btn-info btn-round btn-sm mr-2 ">
                        <span class="btn-label">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="font-weight-bold"> Tambah Indikator</span>
                    </a>

                </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Indikator</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($indikators as $indikator)
                        <tr>
                            <td>
                                {{$indikator->indikator}}
                            </td>
                            <td>
                            <a href="{{route('data.input.index',[$indikator->id])}}" class="btn btn-info btn-sm">    
                                <span class="btn-label">
                                    <i class="far fa-edit"></i> Update Data
                                </span>
                            </a>
                            <!--<a class="btn btn-danger">
                                <span class="btn-label">
                                    <i class="fa fa-heart"></i>
                                </span>
                                Hapus
                            </a>-->
                            </td>
                        </tr>
    
                        @empty
                            
                   
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection