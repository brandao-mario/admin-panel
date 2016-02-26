@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @can('roles-create')
            <a href="{{ route('roles::create') }}" class="btn btn-default pull-right">New role</a>
            @endcan
        </div>

        <hr>
        
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('roles-show')
                                    <a href="{{ route('roles::show', $role->id) }}" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                    @endcan

                                    @can('roles-edit')
                                    <a href="{{ route('roles::edit', $role->id) }}" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    @endcan

                                    @can('roles-delete')
                                    <a href="{{ route('roles::delete', $role->id) }}" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
