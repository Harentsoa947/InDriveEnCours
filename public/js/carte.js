let lat = document.querySelector('.latitude').textContent
let lng = document.querySelector('.longitude').textContent


let latUser = document.querySelector('#latUser').value
let lonUser = document.querySelector('#lonUser').value

fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
    .then(response => response.json())
    .then(data => {
        let placeName = data.display_name
        document.querySelector('.position').textContent = placeName
        var map = L.map('map').setView([lat, lng], 13)

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map)

        var marker = L.marker([lat, lng], {icon: greenIcon}).addTo(map)

        marker.bindTooltip('Chauffeur', {
            permanent: true,
            direction: "top",
            offset: [0, -30]
        })

        var pointUser = L.marker([latUser, lonUser]).addTo(map)

        pointUser.bindTooltip('Vous', {
            permanent: true,
            direction: "top"
        })

    })

var greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
})