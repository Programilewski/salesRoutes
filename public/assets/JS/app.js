import {Salesman} from "./Salesman.js";
let routeReference = null;
let storesReference = null;
let stopsReference = null;



const salesmenButtons = document.querySelectorAll(".radioInputGroup__inputContainer input");
salesmenButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
        routeReference!==null && routeReference.remove();
        storesReference!==null && storesReference.forEach(store=>store.remove());
        stopsReference!==null && stopsReference.forEach(stop=>stop.remove());

        
        const datePickerValue = new Date(document.querySelector("#datePickerInput").value);
        const correctlyFormattedDate = datePickerValue.getTime()/1000;
        const salesman = new Salesman(e.target.value,e.target.getAttribute("aria-salesmanCode"),e.target.getAttribute("aria-color"),correctlyFormattedDate);
        const stores = salesman.showStores()
        .then(stores=> storesReference = stores);
        const route = salesman.showRoute()
        .then(route=>routeReference = route)


        const stops = salesman.showStops()
        .then((stopsData)=>{
            console.log(stopsData);
            stopsReference = stopsData.stops;
            const timeline = document.querySelector(".timeline");
            stopsData.stops.forEach((stop,index)=>{
                // const li = document.createElement("li");
                const stopItem = document.createElement("div");
                stopItem.classList.add("stop");
                stopItem.addEventListener("click",()=>{
                    map.setZoom(15);

                    map.panTo(stop.getLatLng(),{
                        animate:true
                    });

                });
                const number = document.createElement("div");
                number.classList.add("stop__number");
                number.innerHTML = index+1;
                const data = document.createElement("div");
                data.classList.add("stop__time");
                // data.innerHTML = stop.getLatLng().toString();
                data.innerHTML = `${stopsData.dates[index][1]} - ${stopsData.dates[index][2]}`;
                console.log(stopsData.dates[index]);
                stopItem.append(number,data);
                timeline.append(stopItem);
            });
        });



    })
})
const currentURL = window.location.href;
const parsedURL = new URL(currentURL);
const params = parsedURL.searchParams;

const latitude = params.get("latitude");
const longitude = params.get("longitude");

// const currentMarker = L.marker([latitude,longitude]).addTo(map);
// map.panTo(currentMarker.getLatLng());
