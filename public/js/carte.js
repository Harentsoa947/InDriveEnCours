var map = L.map('map', {
    zoomDelta: 0.25,
    zoomSnap: 0
}).setView([-18.9191, 47.5244], 15)

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 25
}).addTo(map)

var marker = L.marker([-18.9191, 47.5244]).addTo(map)

marker.bindPopup('Position du chauffeur', {
    permanent : true,
}).openPopup();