function initialize()
{
	var myLatlng = new google.maps.LatLng(membersList[0][0], membersList[0][1]);
	var mapOptions = {
		zoom: 1,
		center: myLatlng
	};

	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	$.each(membersList, function(k, options)
	{
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(options[0], options[1]),
			map: map,
			animation: google.maps.Animation.DROP,
			title: options[2] + ' from ' + options[5] + ', ' + options[4] + ', IP: ' + options[3]
		});

		// add the marker
		marker.setMap(map);
	});

	google.maps.event.addListener(position, 'click', function() {
		infowindow.open(map,marker);
	});

	function _addMarker(entryIdx, coords)
	{
		var entry = self.data[entryIdx];

		var options = {animation: google.maps.Animation.DROP, map: self.map, position: coords, title: entry.title};
		if (entry.marker)
		{
			options.icon = entry.marker;
		}
		var marker = new google.maps.Marker(options);
		var infowindow = new google.maps.InfoWindow({content: _composeInfoWindowContent(entry)});

		google.maps.event.addListener(marker, 'click', function()
		{
			infowindow.open(self.map, marker);
		});

		bounds.extend(coords);

		if (entryIdx == (self.data.length - 1))
		{
			(1 == self.data.length)
				? _mapCenterAndZoom(coords)
				: self.map.fitBounds(bounds);
		}
	}
}

google.maps.event.addDomListener(window, 'load', initialize);