@extends('layout.master_front')

@section('content')
<div class="container-fluid">
<div class="card">
    <div class="card-header">
 Daftar  Subject 
    </div>
    <div class="card-body">
        <table class="table">
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
                        <a href="{{route('data.indicatorIndex',[$sb->id])}}" class="btn btn-info"> Detail</a>
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