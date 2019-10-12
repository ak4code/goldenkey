(function (window) {
    'use strict'
    ymaps.ready(init)

    function init () {
        const coords = {
            lat: document.getElementById('pods-form-ui-pods-meta-lat'),
            lng: document.getElementById('pods-form-ui-pods-meta-lng')
        }

        let placeMarkCoord = [44.894965, 37.316170]
        if (coords.lat.value && coords.lng.value) {
            placeMarkCoord = [coords.lat.value, coords.lng.value]
        }

        const rMap = new ymaps.Map('realty-map', {
            center: placeMarkCoord,
            zoom: 12
        }, {})
        const marker = new ymaps.GeoObject({
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
            let currentCoord = marker.geometry.getCoordinates()
            coords.lat.value = currentCoord[0]
            coords.lng.value = currentCoord[1]
        })
    }
})()