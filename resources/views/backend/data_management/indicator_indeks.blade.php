@extends('layout.master_front')

@section('page_header')
<h4 class="page-title">Daftar Indikator</h4>
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
        <a href="{{route('data.indicatorIndex',[$subject->id])}}">Daftar Indikator</a>
    </li>

</ul>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @if (!empty($subject))
                Daftar Indikator {{$subject->Indikators}}
                @else
                    error
                @endif
             
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
                        @forelse ($indikators as $indikator)
                        <tr>
                            <td>
                                {{$indikator->indikator}}
                            </td>
                            <td>
                            <a href="{{route('data.input.index',[$indikator->id])}}" class="btn btn-info">    
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