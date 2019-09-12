jQuery(document).ready(function () {

    var mapContainer = document.getElementById('realty-map')

    if (mapContainer) {
        ymaps.ready(init)
    }

    function init () {
        var coords = {
            lat: document.getElementById('pods-form-ui-pods-meta-lat'),
            lng: document.getElementById('pods-form-ui-pods-meta-lng')
        }

        var placeMarkCoord = [44.894965, 37.316170]
        if (coords.lat.value && coords.lng.value) {
            placeMarkCoord = [coords.lat.value, coords.lng.value]
        }

        var rMap = new ymaps.Map('realty-map', {
                center: placeMarkCoord,
                zoom: 12
            }, {}),
            marker = new ymaps.GeoObject({
                // Описание геометрии.
                geometry: {
                    type: 'Point',
                    coordinates: placeMarkCoord
                },
                // Свойства.
                properties: {
                    iconCaption: 'Перетащить'
                }
            }, {
                draggable: true
            })

        rMap.geoObjects.add(marker)

        marker.events.add('dragend', function (e) {
            var currentCoord = marker.geometry.getCoordinates()
            coords.lat.value = currentCoord[0]
            coords.lng.value = currentCoord[1]
        })

        var searchControl = rMap.controls.get('searchControl')
        searchControl.events.add('load', function (e) {
            var results = searchControl.getResultsArray()
            console.dir(results[0])
        })
    }
})