@extends('templateWithOutSearch')

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
    <form method="POST" action="{{ route('Users.update',$users->id_user) }}">
        @csrf
        @method('PUT')
        <a href="#" onclick="history.back()" class="btn btn-success">Back</a>
        <button type="submit" class="btn btn-success">
                    {{ __('Update') }}
                </button>

        <a href="{{URL::to('delete_user', $users->id_user)}}" class="btn btn-success">Delete</a>
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input value="{{$users->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input value="{{$users->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <!-- <button type="submit" class="btn btn-success">
                    {{ __('Update') }}
                </button>
                <a href="#" onclick="history.back()" class="btn btn-success">Back</a> -->
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    $(`input[name="password"]`).on("change",function(){
        if($(this).val() != ""){
            $(`input[name="password_confirmation"]`).attr("required",true);
        }else{
            $(`input[name="password_confirmation"]`).attr("required",false);
        }
    })
</script>
@endsection
@endif
