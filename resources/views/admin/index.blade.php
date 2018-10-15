@extends('admin.layout')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Users Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                @if(Auth::user() && Auth::user()->group_id == 84235)
                                    <th>Group_id</th>
                                @endif
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @if(Auth::user() && Auth::user()->group_id == 84235)
                                <td>{{$user->group_id}}</td>
                                @endif
                                <td>{{$user->is_active}}</td>
                                <td>
                                    <form style="display: inline-block" action="{{ route('user.edit', $user->id)}}" method="get">


                                        <button class="btn btn-primary" type="submit">Edit</button>
                                    </form>
                                    <form style="display: inline-block" action="{{ route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>Email</th>
                                @if(Auth::user() && Auth::user()->group_id == 84235)
                                    <th>Group_id</th>
                                @endif
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection