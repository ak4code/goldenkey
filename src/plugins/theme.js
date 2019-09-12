(function () {
    let menus = document.querySelectorAll('.menu')
    if (menus) {
        for (let menu of menus) {
            menu.className = 'uk-nav uk-nav-default uk-light'
        }
    }
    const mapContainer = document.getElementById('property-map')

    if (mapContainer) {
        ymaps.ready(init)
        const coords = [44.894965, 37.316170]
        if (mapContainer.dataset.lat && mapContainer.dataset.lng) {
            coords[0] = mapContainer.dataset.lat
            coords[1] = mapContainer.dataset.lng
        }
        console.dir(coords)

        function init () {
            const propertyMap = new ymaps.Map('property-map', {
                center: coords,
                controls: ['zoomControl'],
                zoom: 14
            }, {})
            const marker = new ymaps.Placemark(coords)
            propertyMap.geoObjects.add(marker)
        }
    }
})()
