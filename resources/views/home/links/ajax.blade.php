<div class="row">
    @if($links['bitcointalk'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['bitcointalk']}}" class="btn btn-block btn-primary btn-lg" target="_blank">BitcoinTalk</a>
        </div>
    @endif
    @if($links['twitter'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['twitter']}}" class="btn btn-block btn-primary btn-lg" target="_blank">Twitter</a>
        </div>
    @endif
    @if($links['calendar'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['calendar']}}" class="btn btn-block btn-primary btn-lg" target="_blank">Calendar</a>
        </div>
    @endif
    @if($links['coinmarketcap'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['coinmarketcap']}}" class="btn btn-block btn-primary btn-lg" target="_blank">CoinMarketCap</a>
        </div>
    @endif
    @if($links['btc'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['btc']}}" class="btn btn-block btn-primary btn-lg" target="_blank">{{$links['alt_name']}} BTC</a>
        </div>
    @endif
    @if($links['bnb'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['bnb']}}" class="btn btn-block btn-primary btn-lg" target="_blank">{{$links['alt_name']}} BNB</a>
        </div>
    @endif
    @if($links['eth'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['eth']}}" class="btn btn-block btn-primary btn-lg" target="_blank">{{$links['alt_name']}} ETH</a>
        </div>
    @endif

    @if($links['usdt'])
        <div class="col-lg-6">
            <a type="button" style="margin-bottom: 5px" href="{{$links['usdt']}}" class="btn btn-block btn-primary btn-lg" target="_blank">{{$links['alt_name']}} USDT</a>
        </div>
    @endif
</div>




