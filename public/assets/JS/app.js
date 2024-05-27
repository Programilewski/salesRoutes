import {Salesman} from "./Salesman.js";

const salesmenButtons = document.querySelectorAll(".radioInputGroup__inputContainer input");
salesmenButtons.forEach((button)=>{
    button.addEventListener("click",(e)=>{
        const datePickerValue = new Date(document.querySelector("#datePickerInput").value);
        const correctlyFormattedDate = datePickerValue.getTime()/1000;
        const salesman = new Salesman(e.target.value,e.target.getAttribute("aria-salesmanCode"),e.target.getAttribute("aria-color"),correctlyFormattedDate);
        const stores = salesman.showStores();
        const route = salesman.showRoute()
        .then(route=>console.log(route))


        const stops = salesman.showStops();



    })
})
