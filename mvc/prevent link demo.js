

$links = document.querySelectorAll('.all-links')

$links.addEventListener('click', function (event) {
    event.preventDefault()

    const duration = 500


    var timeout = setTimeout(function () {

        window.location = event.target.href

    }, duration);


    event.target.fancyAnimation({duration: duration})
})
