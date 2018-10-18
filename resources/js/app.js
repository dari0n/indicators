
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */




function goRedis() {
    var osn = $( "#getOSN option:selected" ).text();
    var tf =  $( "#getTF option:selected" ).text();
    var deltaTf = $( "#deltaTF option:selected" ).text();
    var RedisTable =   $('#redisTable').DataTable( {
        "ajax": 'home/jsonOutput/?osn='+osn+'&tf='+tf+'&deltaTf='+deltaTf,
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
    var deltaTf = $( "#deltaTF option:selected" ).text();
    setTimeout(function () {
        var RedisTable =  $('#redisTable').DataTable( {
            "ajax": 'home/jsonOutput/?osn='+osn+'&tf='+tf+'&deltaTf='+deltaTf,
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
