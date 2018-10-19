@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Link</h3>
                    </div>

                    <div class="box-body">
                        <form method="post" action="{{action('admin\LinksController@update',$link->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group-lg">
                                <div class="row">

                                    <div class="col-lg-offset-1 col-lg-4">


                                        <label for="alt_name">
                                            <span>Alt Name</span>
                                        </label>
                                        <input class="form-control input-lg" name="alt_name" type="text" placeholder="" value="{{$link->alt_name}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="bir_name">
                                            <span>Bir Name</span>
                                        </label>
                                        <input class="form-control input-lg" name="bir_name" type="text" placeholder="" value="{{$link->bir_name}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-offset-1 col-lg-10">
                                            <label for="link">
                                                <span>Href</span>
                                            </label>
                                            <input class="form-control input-lg" name="link" type="text" placeholder="" value="{{$link->link}}">

                                    </div>
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