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
        <table class="table table-condensed">
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
                            {{$sb->subject_name}}
                        </td>
                        <td>
                        <a href="{{route('data.indicatorIndex',[$sb->id])}}" class="btn btn-info btn-sm"><i class="fas fa-eye" aria-hidden="true"></i> Detail</a>
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