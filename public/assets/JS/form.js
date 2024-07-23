const latitudeInput = document.querySelector("#latitude");
const longitudeInput = document.querySelector("#longitude");

let latitude = parseFloat(latitudeInput.value);
let longitude = parseFloat(longitudeInput.value);
let map = L.map('formMap').setView([latitude, longitude], 9);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

console.log(latitude, longitude);

let marker = L.marker([latitude, longitude]).addTo(map);

function updateMap() {
    latitude = parseFloat(latitudeInput.value);
    longitude = parseFloat(longitudeInput.value);
    
    // Remove the existing marker
    map.removeLayer(marker);
    
    // Add a new marker at the updated coordinates
    marker = L.marker([latitude, longitude]).addTo(map);
    
    // Update the map view
    map.setView([latitude, longitude], 9);
}

latitudeInput.addEventListener("input", (e) => {
    latitudeInput.value = e.target.value;
    updateMap();
});

longitudeInput.addEventListener("input", (e) => {
    longitudeInput.value = e.target.value;
    updateMap();
});
