import {Salesman} from "./Salesman.js";
let routeReference = null;
let storesReference = null;
let stopsReference = null;
const timeline = document.querySelector("#timeline");
const datePicker = document.querySelector("#datePickerInput");
const salesmenListItems = document.querySelectorAll(".radioInputGroup__inputContainer");
const salesmenList = document.querySelector("#salesmenList");

datePicker.addEventListener("click",function(e){
    e.target.showPicker();
})


function drawRoutes(button,e){
    timeline.innerHTML= "";
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
        stopsReference = stopsData.stops;
        stopsData.stops.forEach((stop,index)=>{
            const stopItem = document.createElement("div");
            stopItem.addEventListener("click",()=>{
                stopsData.stops.forEach((s)=>{
                    s.setZIndexOffset(1000);
                    s.setOpacity(0.2);
                });

                stop.setZIndexOffset(2000);
                stop.setOpacity(1);
                map.setView(stop.getLatLng(),map.getZoom(),{
                    animate:true
                });
            });
            const data = document.createElement("div");
            data.innerHTML = `<div class="stop">
    <div class="stop__icon">
        
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff0000"><path d="M440-440v-400h80v400h-80Zm40 320q-74 0-139.5-28.5T226-226q-49-49-77.5-114.5T120-480q0-80 33-151t93-123l56 56q-48 40-75 97t-27 121q0 116 82 198t198 82q117 0 198.5-82T760-480q0-64-26.5-121T658-698l56-56q60 52 93 123t33 151q0 74-28.5 139.5t-77 114.5q-48.5 49-114 77.5T480-120Z"/></svg>
    </div>
    <div class="stop__content">
        <h5 class="stop__title">Przystanek nr. ${index+1}</h5>
        <div class="stop__dateFrom">Od: ${stopsData.dates[index][1]}</div>
        <div class="stop__dateTo">Do: ${stopsData.dates[index][2]}</div>
    </div>
</div>`;
console.log(stopsData);
            stopItem.append(data);
            timeline.append(stopItem);
        });
    });
}

const salesmenButtons = document.querySelectorAll(".radioInputGroup__inputContainer input");
salesmenButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
    drawRoutes(button,e);        
    })
})
const currentURL = window.location.href;
const parsedURL = new URL(currentURL);
const params = parsedURL.searchParams;
console.log(params.size);
if(params.size>0)
    {
        const latitude = params.get("latitude");
        const longitude = params.get("longitude");
        const currentMarker = L.marker([latitude,longitude]).addTo(map);
        map.panTo(currentMarker.getLatLng());
    }



