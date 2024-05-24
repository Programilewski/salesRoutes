import {Salesman} from "./Salesman.js";

const salesmenButtons = document.querySelectorAll(".radioInputGroup__inputContainer input");
salesmenButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{

        const datePickerValue = new Date(document.querySelector("#datePickerInput").value);
        const correctlyFormattedDate = datePickerValue.getTime()/1000;
        const salesman = new Salesman(e.target.value,e.target.getAttribute("aria-salesmanCode"),e.target.getAttribute("aria-color"),correctlyFormattedDate);
        const stores = salesman.showStores();
        const route = salesman.showRoute();
        const stops = salesman.showStops();
    //     const storeIconOptions = {
    //         iconUrl: `api/icon?color=${salesman.color}`,
    //         iconSize:[20,30]
    //     }
    //     const storeIcon = L.icon(storeIconOptions);
    //     const stopIconOptions = {
    //         iconUrl: `api/stopIcon?color=000000`,
    //         iconSize:[40,70]
    //     }
    //     const stopIcon = L.icon(stopIconOptions);
    //     salesman.getStores().then((stores) => {
    //     storePoints = salesman.showStores(stores,storeIcon);
    // })


    })
})
