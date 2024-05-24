const routesTable = document.querySelector("#routesTable");
const testArray = ["route_id","car_id","is_engine_ignited","speed","latitude","longitude","time"];
fetch("/routes.php")
.then(res=>res.json())
.then((res)=>{  
    res.forEach((route)=>{
        const list = document.createElement("ul");
        list.classList.add("table__row");
        if(route.route_id < 120 && route.route_id > 50){
            testArray.forEach((property)=>{
                const item = document.createElement("li");
                item.classList.add("table__cell"); q
                item.innerText = route[property];
                list.append(item);
            })
            const iconsContainer = document.createElement("li");
            iconsContainer.classList.add("table__cell");
            const mapIcon = document.createElement("img");
            mapIcon.setAttribute("src","/dist/assets/map.svg");
            mapIcon.addEventListener("click",()=>{
                location.href = `/?latitude=${route.latitude}&longitude=${route.longitude}`;
            })
            const editIcon = document.createElement("img");
            editIcon.setAttribute("src","/dist/assets/edit.svg");
            const deleteIcon = document.createElement("img");
            deleteIcon.setAttribute("src","/dist/assets/delete.svg");
            iconsContainer.append(mapIcon,editIcon,deleteIcon);
            list.append(iconsContainer);
            routesTable.append(list);
        }
      
    })
})


const updateRoutesBtn = document.querySelector("#updateRoutes");
const controls = document.querySelector(".controls");
updateRoutesBtn.addEventListener("click",()=>{
    const startTime  = new Date();
    fetch("/update.php")
    .then((res)=>{
        const endTime = new Date();
        const elapsedTime = (endTime - startTime)/1000;
        console.log("Time elapsed: ",elapsedTime,"s");
        const loader = document.createElement("div");
        loader.classList.add("loader");
        loader.style.animationDuration = `${elapsedTime}s`;
        controls.append(loader);
        return res.json();
    })
    .then((res)=>{
        console.log(res);
    })
})