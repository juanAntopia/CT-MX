window.onload = function () {
	var latLng = new google.maps.LatLng(25.7019264, -100.47245190000001);
	var stylez = [{
			featureType: "all",
			elementType: "all",
			stylers: [{
					saturation: -100
			}]
	}];
	var myOptions = {
			zoom: 18,
			center: latLng,
			panControl: false,
			mapTypeControlOptions: {
					mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID, 'grayscale'],
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			},
			zoomControlOptions: {
					style: google.maps.ZoomControlStyle.SMALL,
					position: google.maps.ControlPosition.TOP_LEFT
			},
			mapTypeId: google.maps.MapTypeId.TERRAIN
	};
	map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
	var mapType = new google.maps.StyledMapType(stylez, {
			name: "Escala grises"
	});
	map.mapTypes.set('grayscale', mapType);
	map.setMapTypeId('grayscale');
	var marker = new google.maps.Marker({
			position: latLng,
			map: map
	});

	google.maps.event.addListener(marker, 'click', function () {
			infowindow2.open(map, marker);
	});
}

