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
                    <th>dlt</th>
                    <th>Last Price</th>

                </tr>
                </thead>
                <tbody>

                @foreach($entries as $entry)
                    <tr>
                        <td>{{$entry['osn']}}</td>
                        <td>{{$entry['pair_name']}}</td>
                        <td>{{$entry['timeframe']}}</td>
                        <td>{{$entry['dlt']}}</td>
                        <td>{{$entry['close_price']}}</td>


                    </tr>
                @endforeach



                </tbody>
                <tfoot>
                <tr>
                    <th>OSN</th>
                    <th>Pairs</th>
                    <th>TF</th>
                    <th>dlt</th>
                    <th>Last Price</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection