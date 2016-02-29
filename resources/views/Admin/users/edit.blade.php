@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Role</div>

                <div class="panel-body">
                    <form action="{{ route('users::update', $user->id) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        <input type="hidden" name="_method" value="put"></input>
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="" class="form-control" id="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Repeat password</label>
                            <input type="password" name="password_confirmation" value="" class="form-control" id="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Role</label>
                            <select name="role" class="form-control">
                                <option value="" disabled="" selected="">Select a role</option>

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{($user->role_id == $role->id) ? 'selected' : ''}}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" class="btn btn-default pull-right" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
