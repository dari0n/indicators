@extends('admin.layout')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
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
                </thead>
                <tbody>

                    @foreach($entries as $entry)
                        <tr>
                        <td>{{$entry['osn']}}</td>
                        <td>{{$entry['pair_name']}}</td>
                        <td>{{$entry['timeframe']}}</td>
                        <td>{{$entry['close_price']}}</td>
                        <td>{{$entry['openTime']}}</td>
                        <td>{{$entry['clouseTime']}}</td>
                        <td>{{$entry['RSI']}}</td>
                        <td>{{$entry['ADX']}}</td>
                        <td>{{$entry['AO']}}</td>
                        <td>{{$entry['MACD']}}</td>
                        <td>{{$entry['STOCH_K']}}</td>
                        <td>{{$entry['STOCH_D']}}</td>
                        <td>{{$entry['STOH_RSI_K']}}</td>
                        <td>{{$entry['STOH_RSI_K']}}</td>
                        <td>{{$entry['TIME']}}</td>
                        </tr>
                        @endforeach



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