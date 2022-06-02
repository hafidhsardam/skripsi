@extends('template')
 
@section('title_Users', 'active')
 
@section('sidebar')
    @parent
@endsection

@section('title_')
<h5 id="form">Users</h5><br>
@endsection

@if(Auth::user()->level == 'admin')

@section('content')
    <div class="shadow p-3 mb-5 bg-white rounded">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
        <a href="{{url('Users/create')}}" class="btn btn-success">CREATE</a><br><br>
        <table class="table">
            <tr>
                <th>No</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Level</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($users as $vendors)    

            <tr  class="border px-4 py-2" onclick="window.location=' {{route('Users.edit', $vendors->id_user)}}' " style="cursor: pointer;">               

                <td>{{ $no++ }}</td>
                <td>{{ $vendors->name }}</td>
                <td>{{ $vendors->email }}</td>
                <td>{{ $vendors->level }}</td>                
            </tr>
            @empty
                <div class="alert alert-danger">
                    User has been empty.
                </div>
            @endforelse 
        </table>
        {{ $users->links() }}
    </div>
@endsection
@endif