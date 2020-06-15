@extends('layout.master_front')
@section('page_header')
<h4 class="page-title">Tambah User</h4>
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

    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="{{route('user.create')}}">Tambah User</a>
    </li>


</ul>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @if (empty($user))
                <h4>Tambah Pengguna Baru</h4>
                @else
                <h4>Update Data Pengguna</h4>
                @endif
            </div>
            <div class="card-body">
                @if (empty($user))
                <form action="{{route('user.store')}}" method="post" >
                    {{ csrf_field() }}
     
                    <div class="form-group">
                        <label for="indikator">Nama</label>
                        <input type="indikator" class="form-control" id="name" name="name" value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="indikator">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="indikator">Username</label>
                        <input type="text" class="form-control" id="username" name="username"  value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="indikator">Password</label>
                        <input type="password" class="form-control" id="password" name="password"  value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role </label>
                        <select class="form-control" id="role" name="role">
                            <!--<option value="2" >Admin</option>-->
                            <option value="3" >Operator</option>
                            <option value="4" >User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @else
                <form action="{{route('user.storeUpdate',[$user->id])}}" method="post" >
                    {{ csrf_field() }}
     
                    <div class="form-group">
                        <label for="indikator">Nama</label>
                        <input type="indikator" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="indikator">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->username }}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="indikator">Username</label>
                        <input type="text" class="form-control" id="username" name="username"  value="{{ $user->email }}">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="indikator">Password</label>
                        <input type="password" class="form-control" id="password" name="password"  value="">
                        <small id="emailHelp2" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role </label>
                        <select class="form-control" id="role" name="role">
                            <option disabled >Pilih Role</option>
                           <!-- <option value="2"  {{ $user->typeId==1 ? 'selected' : '' }}>Admin</option>-->
                            <option value="3" {{ $user->typeId==2 ? 'selected' : '' }} >Operator</option>
                            <option value="4" >User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endif

         

               
            </div>
            </div>
        </div>
    </div>
@endsection