@extends('layout.master_front')

@section('page_header')
<h4 class="page-title">Daftar Indikator Peta {{ $subject->subject_name }}</h4>
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
        <a href="{{ route('data.index') }}">Daftar Subject</a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="{{ route('data.mapIndicatorIndex',[$subject->id]) }}">Daftar Indikator Peta  {{ $subject->subject_name }} </a>
    </li>

</ul>
@endsection
@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row" >
                <div class="card-title">
                    @if(!empty($subject))
                        Daftar Indikator Peta {{ $subject->subject_name }} 
                    @else
                        error
                    @endif
                </div>

                <div class="card-tools">
                    <a href="{{ route('data.createMap') }}"
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
            <table class="table">
                <thead>
                    <tr>
                        <td>Indikator</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($indikators as $indikator)
                        <tr>
                            <td>
                                {{ $indikator->indikator }}
                            </td>
                            <td>
                                <a href="{{ route('data.mapInput.index',[$indikator->id]) }}"
                                    class="btn btn-info btn-sm">
                                    <span class="btn-label">
                                        <i class="far fa-edit"></i> Update Data
                                    </span>
                                </a>
                                <a href="{{route('data.deleteMap',[$indikator->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah ingin menghapus indikator ini?');">    
                                    <span class="btn-label">
                                        <i class="fas fa-trash-alt"></i> Delete
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
