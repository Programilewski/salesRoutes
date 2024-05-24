import {createElement,createIcons,createRow} from "./functions.js";


const storesTable = document.querySelector("#storesTable");
function fetchData(){

    fetch("/api/stores?&limit=15")
        .then(res=>res.json())
        .then((res)=>{
            console.log(res);
            res.forEach((store)=>{
                const list = createRow(store,"store_id");
                const iconsContainer = createIcons({
                        editicon:
                            {
                                src:"/assets/media/edit.svg",
                                endpoint:`/api/store?id=${store["store_id"]}`
                            },
                            deleteIcons:
                                {
                                    src:"/assets/media/delete.svg",
                                    endpoint:`/api/store?id=${store["store_id"]}`
                                },
                                mapIcons:
                                    {
                                        src:"/assets/media/map.svg",
                                        endpoint:`/?latitude=${store["latitude"]}&longitude=${store["longitude"]}`
                                    },
                    }
                );
                list.append(iconsContainer);
                storesTable.append(list);
            })
        })
}
fetchData();

//const searchInput = document.querySelector("#searchVoiviodeships");
//const searchField = document.querySelector("#searchVoiviodeshipsField");
//const voivodeships =[
//"Dolnośląskie",
//"Kujawsko-pomorskie",
//"Lubelskie",
//"Lubuskie",
//"Łódzkie",
//"Małopolskie",
//"Mazowieckie",
//"Opolskie",
//"Podkarpackie",
//"Podlaskie",
//"Pomorskie",
//"Śląskie",
//"Świętokrzyskie",
//"Warmińsko-mazurskie",
//"Wielkopolskie",
//"Zachodniopomorskie"
//]
//
//searchInput.addEventListener("input",(e)=>{
//    searchField.innerHTML = "";
//    const searchValue = e.target.value;
//    const regex = new RegExp(searchValue,"i");
//    const newArray = voivodeships.filter((voivodeship)=>{
//        return regex.test(voivodeship);
//    })
//    newArray.forEach((voivodeship)=>{
//        const newItem = document.createElement("li");
//        newItem.classList.add("inputSearch__item");
//        newItem.innerText = voivodeship;
//        searchField.append(newItem);
//    })
//})