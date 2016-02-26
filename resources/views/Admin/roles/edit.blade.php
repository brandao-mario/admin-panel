@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Role</div>

                <div class="panel-body">
                    <form action="{{ route('roles::update', $role->id) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        <input type="hidden" name="_method" value="put">
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="name">
                        </div>

                        <input type="submit" class="btn btn-default pull-right" value="Save">
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Permissions</div>

                <div class="panel-body">
                    <form action="{{ route('roles::addPermission', $role->id) }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <select name="permission" class="form-control">
                                        <option value="" disabled="" selected="">Select a permission for add to role</option>
                                        @foreach ($permissions as $permission)
                                            @if (!$permission->roles->contains($role))
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-default btn-block">Allow</button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        @foreach ($role->permissions as $p)
                        <div class="col-md-3">
                            <div class="well well-sm">
                                <p>{{ $p->name }} 
                                    <a href="{{ route('roles::removePermission', [$role->id, $p->id]) }}" class="pull-right">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
