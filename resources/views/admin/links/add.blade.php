@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Link</h3>
                    </div>
                    <div class="box-body">
                        <form method="post" action="{{route('links.store')}}">
                            @csrf
                            @method('POST')
                            <div class="form-group-lg">
                                <div class="row">

                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="alt_name">
                                            <span>Alt Name</span>
                                        </label>
                                        <input class="form-control input-lg" name="alt_name" type="text" placeholder="ADA" value="">
                                    </div>

                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="bir_name">
                                            <span>BitCoinTalk</span>
                                        </label>
                                        <input class="form-control input-lg" name="bitcointalk" type="text" placeholder="" value="">
                                    </div>

                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>Twitter</span>
                                        </label>
                                        <input class="form-control input-lg" name="twitter" type="text" placeholder="" value="">
                                    </div>

                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>Calendar</span>
                                        </label>
                                        <input class="form-control input-lg" name="calendar" type="text" placeholder="" value="">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>CoinMarketCap</span>
                                        </label>
                                        <input class="form-control input-lg" name="coinmarketcap" type="text" placeholder="" value="">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>BTC</span>
                                        </label>
                                        <input class="form-control input-lg" name="btc" type="text" placeholder="" value="">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>BNB</span>
                                        </label>
                                        <input class="form-control input-lg" name="bnb" type="text" placeholder="" value="">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>ETH</span>
                                        </label>
                                        <input class="form-control input-lg" name="eth" type="text" placeholder="" value="">
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10">
                                        <label for="link">
                                            <span>USDT</span>
                                        </label>
                                        <input class="form-control input-lg" name="usdt" type="text" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-offset-1 col-lg-12">
                                        <div style="margin-top: 20px; margin-bottom: 20px" class="ddq">
                                            <button type="submit" class="btn btn-success">Create</button>
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