        function initMap() {
            var mapPosition = {lat: 43.807842, lng: 143.898659};
            var mapArea = document.getElementById('maps');
            var mapOptions = {
                center: mapPosition,
                zoom: 16,
            };
            var map = new google.maps.Map(mapArea, mapOptions);

            var markerOptions = {
                map: map,
                position: mapPosition,
                icon: '/wp-content/themes/daiichi-gp.co.jp/img/recruit_map_img01.png',
            };
            var marker = new google.maps.Marker(markerOptions);
        }
