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