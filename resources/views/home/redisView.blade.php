@extends('home.layout')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Nothing is impossible</h3>

        </div>
        <div class="row">
            <div style="margin-left: 20px" class="redisSelection">
                <div class="form-row">
                    <div class="col-lg-2 col-xs-4">

                        <div class="col">
                            <label for="getOSN">Choose OSN</label>
                            <select id="getOSN" style="margin-bottom: 20px" name="OSN" class="form-control">
                                @foreach($keys as $entry)
                                    <option>{{$entry}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-4">
                        <div class="col">
                            <label for="getTF">Choose Timeframe</label>
                            <select id="getTF"  name="TF" class="form-control">
                                @foreach($tf as $t)
                                    <option>{{$t}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-4">
                        <div class="col">
                            <label for="getInterval">Reload Interval</label>
                            <select id="getInterval"  name="interval" class="form-control">
                                <option value="60000">1 min</option>
                                <option value="120000">2 min</option>
                                <option value="180000">3 min</option>
                                <option value="240000">4 min</option>
                                <option value="300000">5 min</option>

                            </select>

                        </div>
                    </div>
                    <div class="col-lg-1 col-xs-4">
                        <div class="col">
                            <button type="button" style="margin-top: 23px" id="goRedisButton" onclick="goRedis()" class="btn btn-block btn-success">Go</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="redisTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th tabindex="0" id="0">OSN</th>
                    <th>Pairs</th>
                    <th>TF</th>
                    <th>Close Price</th>
                    <th>Open Time</th>
                    <th>Clouse Time</th>
                    <th>RSI</th>
                    <th>ADX</th>
                    <th>AO</th>
                    <th>MACD</th>
                    <th>STOCH K</th>
                    <th>STOCH D</th>
                    <th>STOCH RSI K</th>
                    <th>STOCH RSI D</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>





                </tbody>
                <tfoot>
                <tr>
                    <th>OSN</th>
                    <th>Pairs</th>
                    <th>TF</th>
                    <th>Close Price</th>
                    <th>Open Time</th>
                    <th>Clouse Time</th>
                    <th>RSI</th>
                    <th>ADX</th>
                    <th>AO</th>
                    <th>MACD</th>
                    <th>STOCH K</th>
                    <th>STOCH D</th>
                    <th>STOCH RSI K</th>
                    <th>STOCH RSI D</th>
                    <th>Time</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('script')
    <script>
    function goRedis() {
    var osn = $( "#getOSN option:selected" ).text();
    var tf =  $( "#getTF option:selected" ).text();
    var RedisTable =   $('#redisTable').DataTable( {
    "ajax": 'home/jsonOutput/?osn='+osn+'&tf='+tf,
    'destroy': true,

    } );
    setTimeout(function () {
    if (!RedisTable.data().any()) {
    alert('Empty data. Please wait. Click GO button after 2 min, or choose another filter.')
    }
    },1500);
    console.log('AutoReload Complete');
    }

    function firstLoadTable(){
    var osn = $( "#getOSN option:selected" ).text();
    var tf =  $( "#getTF option:selected" ).text();
    setTimeout(function () {
    var RedisTable =  $('#redisTable').DataTable( {
    "ajax": 'home/jsonOutput/?osn='+osn+'&tf='+tf,
    'destroy': true,

    } );
    setTimeout(function () {
    if (!RedisTable.data().any()) {
    alert('Empty data. Please wait.')
    }
    },2000);
    console.log('Firstload: OK');
    },1000);
    }

    function reloadDataTable(){
    var interval = $( "#getInterval option:selected" ).val();
    setInterval(function () {
    goRedis();
    },interval);
    }
    firstLoadTable();
    reloadDataTable();
    </script>
@endsection