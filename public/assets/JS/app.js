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
        .then(stops=>stopsReference = stops);



    })
})
