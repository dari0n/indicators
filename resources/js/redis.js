
function goRedis() {
    
    var RedisTable =   $('#redisTable').DataTable( {
        stateSave:true,
        "ajax": {
            'url':'home/jsonOutput/',
            "data": function(data){
                data.osn = $( "#getOSN option:selected" ).text();
                data.tf =  $( "#getTF option:selected" ).text();
                data.deltaTf = $( "#deltaTF option:selected" ).text();
            },
        }


    } );
    setTimeout(function () {
        if (!RedisTable.data().any()) {

        }
    },1500);

    console.log('AutoReload Complete');

    setInterval( function () {
        RedisTable.ajax.reload( null, false ); // user paging is not reset on reload
        console.log('dataReloaded');
    }, 30000 );

    $("#goRedisButton").click(function () {
       RedisTable.destroy();
       goRedis();
    });
}

goRedis();
