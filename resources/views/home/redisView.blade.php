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
                            <label for="getOSN">OSN</label>
                            <select id="getOSN" style="margin-bottom: 20px" name="OSN" class="form-control">
                                @foreach($keys as $entry)
                                    <option>{{$entry}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-4">
                        <div class="col">
                            <label for="getTF">Timeframe</label>
                            <select id="getTF"  name="TF" class="form-control">
                                @foreach($tf as $t)
                                    <option>{{$t}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-4">
                        <div class="col">
                            <label for="deltaTF">Delta Timeframe</label>
                            <select id="deltaTF"  name="interval" class="form-control">
                                <option>1d</option>
                                <option>3d</option>
                                <option>7d</option>
                                <option>14d</option>
                                <option>30d</option>
                                <option>90d</option>
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
        <div class="row">
            <div class="col-sm-12">
                <div class="box-body">
                    <table id="redisTable" class="table table-bordered table-striped">
                        <thead style="font-size: 12px">
                        <tr>
                            <th tabindex="0" id="0">OSN</th>
                            <th>ALT</th>
                            <th>TF</th>
                            <th>Close Price</th>
                            <th>RSI</th>
                            <th>ADX</th>
                            <th>AO</th>
                            <th>MACD</th>
                            <th>STOCH K</th>
                            <th>STOCH D</th>
                            <th>STOCH RSI K</th>
                            <th>STOCH RSI D</th>
                            <th>Delta</th>
                            <th>LastPrice</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>





                        </tbody>
                        <tfoot style="font-size: 12px">
                        <tr>
                            <th tabindex="0" id="0">OSN</th>
                            <th>ALT</th>
                            <th>TF</th>
                            <th>Close Price</th>
                            <th>RSI</th>
                            <th>ADX</th>
                            <th>AO</th>
                            <th>MACD</th>
                            <th>STOCH K</th>
                            <th>STOCH D</th>
                            <th>STOCH RSI K</th>
                            <th>STOCH RSI D</th>
                            <th>Delta</th>
                            <th>LastPrice</th>
                            <th>Time</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>




        </div>
        <!-- /.box-body -->
    </div>
    </div>
@endsection
@section('script')
<script>
    $(function () {


    setInterval(function () {
        var td = $("#redisTable tr td:nth-child(2)");
        console.log('Alt for links init');
        td.click(function () {
            $.ajax({

                url: "home/returnLinks?alt_name="+$(this).html(),
                cache: false
            })
                .done(function( msg ) {
                    if(!msg){
                        alert('Sorry, links for this element is empty((');
                    }else{

                        $("#linksContent").html(msg);
                        $("#modalLinks").modal('show');
                    }
                });
        })
    },2000)




    })
    /*
    * $.each(data, function(i, item) {
        alert(data[i].PageName);
      });​
    * */
</script>


@endsection