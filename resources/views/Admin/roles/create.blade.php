@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Role</div>

                <div class="panel-body">
                    <form action="{{ route('roles::store') }}" method="post" class="create-roles"
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="" class="form-control" id="name">
                        </div>

                        <input type="submit" class="btn btn-default pull-right" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
