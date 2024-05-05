
const searchInput = document.querySelector("#searchVoiviodeships");
const searchField = document.querySelector("#searchVoiviodeshipsField");
const voivodeships =[
"Dolnośląskie",
"Kujawsko-pomorskie",
"Lubelskie",
"Lubuskie",
"Łódzkie",
"Małopolskie",
"Mazowieckie",
"Opolskie",
"Podkarpackie",
"Podlaskie",
"Pomorskie",
"Śląskie",
"Świętokrzyskie",
"Warmińsko-mazurskie",
"Wielkopolskie",
"Zachodniopomorskie"
]

searchInput.addEventListener("input",(e)=>{
    searchField.innerHTML = "";
    const searchValue = e.target.value;
    const regex = new RegExp(searchValue,"i");
    const newArray = voivodeships.filter((voivodeship)=>{
        return regex.test(voivodeship);
    })
    newArray.forEach((voivodeship)=>{
        const newItem = document.createElement("li");
        newItem.classList.add("inputSearch__item");
        newItem.innerText = voivodeship;
        searchField.append(newItem);
    })
})

const routesTable = document.querySelector("#routesTable");

fetch("https://api.gps2.solidsecurity.pl/message/new/115693/1712268000/1713218400",{
    headers:{
        'Authorization': '20f9bf2f595c10cad6dfdfa2e44325e2dda41000'
    }
})
.then(res=>res.json())
.then(res=>{
    console.log(res.frames);
    res.frames.forEach((frame)=>{
        const itemList = document.createElement("ul");
        itemList.classList.add("table__row");
        const fakeID = document.createElement("li");
        fakeID.innerHTML = "1";
        const idItem = document.createElement("li");
        idItem.innerHTML = frame.id;
        const carIDItem = document.createElement("li");
        carIDItem.innerHTML = frame.car;
        const ignitionItem = document.createElement("li");
        ignitionItem.innerHTML = frame.ignition;
        const latitudeItem = document.createElement("li");
        latitudeItem.innerHTML = frame.latitude;
        const longitudeItem = document.createElement("li");
        longitudeItem.innerHTML = frame.longitude;
        const dateItem = document.createElement("li");
        const importDate = new Date(frame.time);
        dateItem.innerHTML = importDate;
        itemList.append(    
            idItem,
            carIDItem,
            ignitionItem,
            latitudeItem,
            longitudeItem,
            dateItem
        )
        routesTable.append(itemList);
    })
});