@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @can('users-create')
            <a href="{{ route('users::create') }}" class="btn btn-default pull-right">New user</a>
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
                                <th>E-mail</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @can('users-show')
                                    <a href="{{ route('users::show', $user->id) }}" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                    @endcan

                                    @can('users-edit')
                                    <a href="{{ route('users::edit', $user->id) }}" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    @endcan

                                    @can('users-delete')
                                    <a href="{{ route('users::delete', $user->id) }}" class="btn btn-default btn-sm">
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
