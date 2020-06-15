@extends('layout.master_front')
@section('page_header')
<h4 class="page-title">Kelola User</h4>
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
        <a href="{{route('user.index')}}">Kelola User</a>
    </li>


</ul>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">User Management</div>
            <div class="card-tools">
            <a href="{{route('user.create') }}" class="btn btn-info btn-border btn-round btn-sm mr-2">
                    <span class="btn-label">
                        <i class="fa fa-plush"></i>
                    </span>
                    Tambah Pengguna
                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($users->isEmpty())
            
        @else

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->typeId==1 ? 'Superadmin' : ($user->typeId==2 ? 'admin' : 'operator') }}</td>

                    <td>
                        <a href="{{ route('user.update',['user_id'=>$user->id]) }}" class="btn btn-sm btn-success"> Update Data</a>
                        <a href="{{ route('user.delete',['user_id'=>$user->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah ingin menghapus pengguna ini?');"> Hapus Data</a>
                    </td>
                </tr>
                @endforeach

                @endif
            </tbody>
        </table>

    </div>
</div>
@endsection

