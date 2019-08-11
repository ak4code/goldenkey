(function () {
    let menus = document.querySelectorAll('.menu')
    if (menus) {
        for (let menu of menus) {
            menu.className = 'uk-nav uk-nav-default uk-light'
        }
    }
})()