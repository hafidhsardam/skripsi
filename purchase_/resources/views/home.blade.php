@extends('template')
 
@section('title_Dashboard', 'active')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
    <h5 id="form">Dashboard</h5><br>
    <!-- <div class="shadow p-3 mb-5 bg-white rounded">
        <a href="{{URL::to('Users/create')}}" class="btn btn-success">CREATE</a><br><br>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
            <tr></tr>
        </table>
    </div> -->
@endsection
