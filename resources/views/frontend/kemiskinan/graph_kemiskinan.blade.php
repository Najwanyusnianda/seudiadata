@extends('frontend.kemiskinan.kemiskinan')


@section('kemiskinan-content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="col-4">
                    <div class="form-group">
                        <label for="indikatorSelect">Indikator</label>
                        <select class="form-control" id="indikatorSelect">
                          <option value="gk">Garis Kemiskinan</option>
                          <option value="gr">Gini Ratio</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="graph-kemiskinan-wrapper">

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){

            var indikatorSelect=$('#indikatorSelect');
            var graphWrapper=$('.graph-kemiskinan-wrapper');



        })
    </script>
@endsection