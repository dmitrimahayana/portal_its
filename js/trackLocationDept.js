function loadScript() {   
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyBhLdGt8ENDXDz3xVuUcxOqH8L3jWHZZNA&sensor=true&callback=initialize";
    document.body.appendChild(script);
}

var map;
var lat;
var lng;

function initialize() {
    var myLatlng = new google.maps.LatLng(lat ,lng);
    var mapOptions = {
      zoom: 15,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.HYBRID
    }
    
    var marker = new google.maps.Marker({
        position: myLatlng,
        title:"Location Of Departement"
    });

    // To add the marker to the map, call setMap();
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    marker.setMap(map);

}


function goToPage(inp,inp2){
    lat=inp;
    lng=inp2;
    $("<div id='map-canvas' style='height: 100%;width: 100%;'></div>").dialog({
        modal: true,
        title: 'Location Departement',
        width: '500',
        height: '500',
        show: {
            //effect: "slide",
            duration: 500
        },
        hide: {
            //effect: "slide",
            duration: 500
        },
        close: function(event, ui) {$(this).remove();}
    }).dialog('open');
    
    /*var progressbar = $( "#progressbar" ),
        progressLabel = $( ".progress-label" );
        progressbar.progressbar({
            value: false,
            change: function() {
                //progressLabel.text( progressbar.progressbar( "value" ) + "%" );
            },
            complete: function() {
                //progressLabel.text( "Complete!" );
            }
        });
        function progress() {
            var val = progressbar.progressbar( "value" ) || 0;
            progressbar.progressbar( "value", val + 5 );
            if ( val < 99 ) {
                setTimeout( progress, 100 );
            }
        }
        setTimeout( progress, 200 );
        */
       loadScript();
        //setTimeout(function() { loadScript();}, 2000);
};