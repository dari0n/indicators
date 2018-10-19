
function goRedis() {
    var osn = $( "#getOSN option:selected" ).text();
    var tf =  $( "#getTF option:selected" ).text();
    var deltaTf = $( "#deltaTF option:selected" ).text();
    var RedisTable =   $('#redisTable').DataTable( {
        stateSave:true,
        "ajax": 'home/jsonOutput/?osn='+osn+'&tf='+tf+'&deltaTf='+deltaTf,


    } );
    setTimeout(function () {
        if (!RedisTable.data().any()) {
            alert('Empty data. Please wait. Click GO button after 2 min, or choose another filter.')
        }
    },1500);
    console.log('AutoReload Complete');
    setInterval( function () {
        RedisTable.ajax.reload( null, false ); // user paging is not reset on reload
        console.log('dataReloaded');
    }, 3000 );
}

goRedis();
