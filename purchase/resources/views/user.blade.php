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

        <form action="" method="get" class="row mb-4 ml-1">
            <?php $name = [] ?>
            <select name="name" class="form-control col-sm-10 mr-2">
                <option value="">Filter User Name </option>
                @foreach ($users as $vendors)
                    @if(!in_array($vendors->name, $name))
                    <?php if(!in_array($vendors->name, $name)) array_push($name, $vendors->name) ?>
                    <option <?= $_GET && $_GET['name'] == $vendors->name ? "selected" : "" ?> value="{{ $vendors->name }}">{{ $vendors->name }}</option>

                    @endif
                @endforeach 
            </select>
            <button type="submit" class="btn btn-success mr-2">Filter</button>
            <a href="/Users" class="btn btn-success">Reset</a>
        </form>
        
        <table class="table table-striped table-hover">
            <tr>
                <th>No</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Level</th>
            </tr>
            <?php $no=1 ?>
            @forelse ($users as $vendors)    

            <?php 
                $name = ($_GET && $_GET['name'] != "") ? ($_GET && $_GET['name'] == $vendors->name ? true : false) : true;
            ?>

            @if($name)

            <tr  class="border px-4 py-2" onclick="window.location=' {{route('Users.edit', $vendors->id_user)}}' " style="cursor: pointer;">               

                <td>{{ $no++ }}</td>
                <td>{{ $vendors->name }}</td>
                <td>{{ $vendors->email }}</td>
                <td>{{ $vendors->level }}</td>                
            </tr>
            @endif
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