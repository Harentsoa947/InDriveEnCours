let lat = document.querySelector('.latitude').textContent
let lng = document.querySelector('.longitude').textContent

fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
    .then(response => response.json())
    .then(data => {
        let placeName = data.display_name
        document.querySelector('.position').textContent = placeName
        var map = L.map('map').setView([lat, lng], 16)

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map)

        var marker = L.marker([lat, lng]).addTo(map)

        marker.bindPopup("Chauffeur", {
            permanent: true
        }).openPopup()
    })