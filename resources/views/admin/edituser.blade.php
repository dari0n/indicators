@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
        </div>

        <div class="box-body">
            <form method="post" action="{{action('admin\UserController@update',$user->id)}}">
                @csrf
                @method('PUT')
            <div class="form-group-lg">
                <div class="row">

                    <div class="col-lg-offset-1 col-lg-4">


                        <label for="name">
                            <span>Username</span>
                        </label>
                        <input class="form-control input-lg" name="name" type="text" placeholder="" value="{{$user->name}}">
                    </div>
                    <div class="col-lg-6">
                        <label for="name">
                            <span>@mail</span>
                        </label>
                        <input class="form-control input-lg" name="email" type="text" placeholder="" value="{{$user->email}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-offset-1 col-lg-4">
                        @if(Auth::user() && Auth::user()->group_id == 84235)
                        <label for="name">
                            <span>Group ID</span>
                        </label>
                        <input class="form-control input-lg" name="group_id" type="text" placeholder="" value="{{$user->group_id}}">
                        @endif
                    </div>
                    @if(Auth::user() && Auth::user()->group_id == 99)
                    <div class="col-lg-offset-1 col-lg-10">
                        <label for="name">
                            <span>Active</span>
                        </label>
                        <input class="form-control input-lg" name="is_active" type="text" placeholder="" value="{{$user->is_active}}">

                    </div>
                    @endif
                    @if(Auth::user() && Auth::user()->group_id == 84235)
                        <div class="col-lg-6">
                            <label for="name">
                                <span>Active</span>
                            </label>
                            <input class="form-control input-lg" name="is_active" type="text" placeholder="" value="{{$user->is_active}}">

                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-12">
                        <div style="margin-top: 20px; margin-bottom: 20px" class="ddq">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
            </div>
        </div>
    </div>
@endsection