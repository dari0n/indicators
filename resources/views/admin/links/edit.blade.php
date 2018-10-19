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

                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="alt_name">
                                            <span>Alt Name</span>
                                        </label>
                                        <input class="form-control input-lg" name="alt_name" type="text" placeholder="" value="{{$link->alt_name}}">
                                    </div>

                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="bir_name">
                                            <span>BitCoinTalk</span>
                                        </label>
                                        <input class="form-control input-lg" name="bitcointalk" type="text" placeholder="" value="{{$link->bitcointalk}}">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                            <label for="link">
                                                <span>Twitter</span>
                                            </label>
                                            <input class="form-control input-lg" name="twitter" type="text" placeholder="" value="{{$link->twitter}}">
                                    </div>

                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>Calendar</span>
                                        </label>
                                        <input class="form-control input-lg" name="calendar" type="text" placeholder="" value="{{$link->calendar}}">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>CoinMarketCap</span>
                                        </label>
                                        <input class="form-control input-lg" name="coinmarketcap" type="text" placeholder="" value="{{$link->coinmarketcap}}">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>{{$link->alt_name}} BTC</span>
                                        </label>
                                        <input class="form-control input-lg" name="btc" type="text" placeholder="" value="{{$link->btc}}">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>{{$link->alt_name}} BNB</span>
                                        </label>
                                        <input class="form-control input-lg" name="bnb" type="text" placeholder="" value="{{$link->bnb}}">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>{{$link->alt_name}} ETH</span>
                                        </label>
                                        <input class="form-control input-lg" name="eth" type="text" placeholder="" value="{{$link->eth}}">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>{{$link->alt_name}} USDT</span>
                                        </label>
                                        <input class="form-control input-lg" name="usdt" type="text" placeholder="" value="{{$link->usdt}}">
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