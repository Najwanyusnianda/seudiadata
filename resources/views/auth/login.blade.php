@extends('layouts.app')

@section('content')

<div class="card card-login">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="padding bg-primary text-center align-items-center d-flex" style="background-color:#34495e !important">
                    <div id="particles-js"></div>
                    <div class="w-100">
                        <div class="">
                            <img src="{{asset('img/Lambang_Badan_Pusat_Statistik_(BPS)_Indonesia.png')}}" alt="kodinger logo" class="img-fluid" style="height: 60px;width:auto;">
                        </div>
                        <h4 class="text-light mb-2 mt-2">BPS Aceh Barat Daya</h4>
                     
                        <p class="lead text-light"></p>
                        <button class="btn btn-block ">
                            Website BPS 
                        </button>
                    </div>

                    <div class="help-links">
                        <ul>
                            <!--<li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="padding">
                    <h2>SeudiaData</h2>
                    <p class="lead">Harap Login Terlebih Dahulu</p>
                    <form autocomplete="off" method="POST" action="{{route('login')}}" class="needs-validation">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" tabindex="1">
                        </div>
                        <div class="form-group">
                            <label class="d-block" for="password">
                                Password
                                <div class="float-right">
                                    <a href="#">Lupa Password?</a>
                                </div>
                            </label>
                            <input type="password" name="password" class="form-control" id="password" tabindex="2">
                        </div>
                        <div class="form-group text-right">
                            <!--<div class="float-left mt-2">
                                <a href="#">Create an account?</a>
                            </div>-->
                            <button class="btn btn-primary" tabindex="3">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
