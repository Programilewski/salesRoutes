const storesTable = document.querySelector("#storesTable");
// TODO: Test if it is effective to create an array of the options
const testArray = ["store_id","name","voivodeship","city","street_name","street_number","zip_code","salesman_id","latitude","longitude"];
fetch("/stores.php")
.then(res=>res.json())
.then((res)=>{
    console.log(res[15]);
    res.forEach((store)=>{
        const list = document.createElement("ul");
        list.classList.add("table__row");
        if(store.store_id <50){
            testArray.forEach((property)=>{
                const item = document.createElement("li");
                item.classList.add("table__cell");
                item.innerText = store[property];
                list.append(item);
            })
            const iconsContainer = document.createElement("li");
            iconsContainer.classList.add("table__cell");
            const mapIcon = document.createElement("img");
            mapIcon.setAttribute("src","/dist/assets/map.svg");
            mapIcon.addEventListener("click",()=>{
                location.href = `/?latitude=${store.latitude}&longitude=${store.longitude}`;
            })
            const editIcon = document.createElement("img");
            editIcon.setAttribute("src","/dist/assets/edit.svg");
            const deleteIcon = document.createElement("img");
            deleteIcon.setAttribute("src","/dist/assets/delete.svg");
            iconsContainer.append(mapIcon,editIcon,deleteIcon);
            list.append(iconsContainer);
            storesTable.append(list);
        }
      
    })
})


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