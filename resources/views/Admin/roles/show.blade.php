@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Role</div>

                <div class="panel-body">
                    <h3>{{ $role->name }}</h3>

                    <hr>

                    @foreach ($role->permissions as $permission)
                    <div class="col-md-2">
                        <div class="well well-sm text-center">{{ $permission->name }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
