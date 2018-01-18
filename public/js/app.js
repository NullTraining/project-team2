/* called by deferred async google map script include */
function initMap() {
    $(document).ready(function(){

        var mapContainer = document.getElementById("map");

        var latitude = '-12.043333';
        var longitude = '-77.028333';

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showMap);
        } else {
            mapContainer.innerHTML = "Geolocation is not supported by this browser.";
        }

        function showMap(position) {

            latitude = position.coords.latitude;
            longitude = position.coords.longitude;

            map = new GMaps({
                div: '#map',
                lat: latitude,
                lng: longitude
            });

            $('.points').each(function (index, point) {
                var pointPosition = $(point).data();

                map.addMarker({
                    lat: pointPosition.lat,
                    lng: pointPosition.long,
                    title: 'Some Title',
                    click: function (e) {
                        if (console.log)
                            console.log(e);
                        alert('You clicked in this marker');
                    }
                });
            })
        }
    });
}
