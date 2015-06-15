var map = null;
var geocoder = null;
var marker = null;
var enableMapClick = false;

var m_default = {
					zoom_level : 10,
					lat_init : -6.192139,
					lng_init : 106.836094,
					map_canvas : "#map_canvas",
					lat_field : "#lat",
					lng_field : "#long",
					geocode_field : "#find_address"
				};
var m_option = null;

function initialize_map(m_opt){
	m_option = $.extend({}, m_default, m_opt);
	geocoder = new google.maps.Geocoder();
	var mapOptions = {
	  zoom: m_option.zoom_level,
	  center: new google.maps.LatLng(m_option.lat_init,m_option.lng_init),
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map($(m_option.map_canvas)[0], mapOptions);	
}

function place_marker(location) {
	if(marker == null){
		marker = new google.maps.Marker({
		  map: map
		});
	}
	marker.setPosition(location);
}

var mapOptions = {
				zoom_level : 15,
				lat_init : -6.192139,
				lng_init : 106.836094,
				map_canvas : "#map_canvas"
			  };

$(document).ready(function(){
	initialize_map(mapOptions);
	var loc = new google.maps.LatLng($('#itm_lat').val(),$('#itm_lon').val());
	place_marker(loc);
	map.setCenter(loc);
});