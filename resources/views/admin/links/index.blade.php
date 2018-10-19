@extends('admin.layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Links</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <a class="addLinkBtn" href="{{route('links.create')}}"><i class="fa fa-plus-square"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="linksTable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ALT Name</th>
                                <th>BIR NAME</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $link)

                                <tr>

                                    <td><a href="{{$link->$link}}">{{$link->alt_name}}</a></td>
                                    <td><a href="{{$link->link}}">{{$link->bir_name}}</a></td>
                                    <td>{{$link->link}}</td>
                                    <td>
                                        <form style="display: inline-block" action="{{ route('links.edit', $link->id)}}" method="get">


                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </form>
                                        <form style="display: inline-block" action="{{ route('links.destroy', $link->id)}}" method="post">
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
                                <th>ALT Name</th>
                                <th>BIR NAME</th>
                                <th>Link</th>
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