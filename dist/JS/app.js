        const urlParams = new URLSearchParams(window.location.search);
        if(urlParams.size !== 0)
            {
                const latitude = urlParams.get("latitude");
                const longitude = urlParams.get("longitude");
                var currentlySearched = L.marker([latitude, longitude]).addTo(map);
                map.fitBounds([
                    [latitude,longitude],
                    [latitude,longitude]
                ]
                );
            }

let routesList = [];
let storesList = [];
let stopsList = [];
const datePickerInput = document.querySelector("#datePickerInput");
const salesmenList = document.querySelector("#salesmenList");
const salesmenInputList = [];
fetch("/api/salesmen")
.then(res=>res.json())
.then((res)=>{
    res.forEach((salesman)=>{
        const container = document.createElement("div");
        container.classList.add("radioInputGroup__inputContainer");
        const input = document.createElement("input");
        input.setAttribute("aria-carid",salesman.car_id);
        input.setAttribute("aria-color",salesman.color);
        input.setAttribute("aria-salesman_code",salesman.salesman_code);
        input.setAttribute("type","radio");
        input.setAttribute("value",salesman.car_id)
        input.setAttribute("id",salesman.salesman_id);
        input.setAttribute("name","salesman");
        const label = document.createElement("label");
        input.addEventListener("click",(e)=>{
            const stopIconOptions = {
                iconUrl: `api/stopIcon?color=cc0033`,
                iconSize:[30,60]
            }
            const stopIcon = L.icon(stopIconOptions);
            const storeIconOptions = {
                iconUrl: `api/icon?color=${e.target.getAttribute("aria-color")}`,
                iconSize:[20,40]
            }
            const storeIcon = L.icon(storeIconOptions);
            stopsList.forEach(stop=>stop.remove());
            stopsList = [];
            storesList.forEach(store => store.remove());
            storesList = [];
            routesList.forEach(route => route.remove());
            routesList = [];
            // console.log(e.target.getAttribute("aria-carid"));
            const datePickerValue = new Date(datePickerInput.value);
            // console.log(datePickerValue.getTime()/1000);
            const timeValue = datePickerValue.getTime()/1000;
            // Fetch the stores
            // console.log(`/api/stores?salesman_code=${e.target.getAttribute("aria-salesman_code")}`);
            fetch(`/api/stores?salesman_code=${e.target.getAttribute("aria-salesman_code")}`)
            .then(res=>res.json())
            .then((res)=>{
                // console.log(res);
                res.forEach((store)=>{
                    const marker = L.marker([store.latitude,store.longitude],{
                        icon: storeIcon
                    }).addTo(map);
                    const apartmentNumber = store.apartment_number===null?" ":`/${store.apartment_number}`;
                    marker.bindPopup(`${store.name} <br> ${store.street_name} ${store.street_number} ${apartmentNumber}`);
                    storesList.push(marker);
                })
            })
            // Fetch the routes
            fetch(`/api/routes?car_id=${e.target.getAttribute("aria-carid")}&date=${timeValue}`)
            .then(res=>res.json())
            .then((res)=>{
                if(res.length!==0)
                    {
                        console.log(res);
                        const zeroSpeedFrames = res.filter((frame)=>{
                            return frame.speed === 0 && frame.is_engine_ignited === 0;
                        })
                        console.log(zeroSpeedFrames);
                        const stops = zeroSpeedFrames.reduce((object,item)=>{
                            if(object[item.longitude] == null)
                                {
                                    object[item.longitude]= [];
                                }
                                object[item.longitude].push([item.latitude,item.longitude]);
                                return object;
                        },{});
                        console.log(stops);
                        let stopNumber = 1;
                        for(const [key,value] of Object.entries(stops)){
                            const stopMarker = L.marker(value[0],{
                                icon:stopIcon,
                                iconSize: [18,26]
                            }).addTo(map);
                            stopMarker.bindPopup(`Przystanek nr: ${stopNumber}`);
                            stopsList.push(stopMarker);
                            stopNumber++;
                        }
                        const latlang = res.map((route)=>{
                            return [parseFloat(route.latitude),parseFloat(route.longitude)];
                        })
                        const polyline = L.polyline(latlang,{color:"#000000"}).addTo(map);
                        map.fitBounds(polyline.getBounds());
                        routesList.push(polyline);
                    }
                    else{
                        alert("No data found");
                    }

            })
        })
        label.setAttribute("for",salesman.salesman_id);
        label.innerText = `${salesman.name} ${salesman.surname}`;
        container.append(input,label);
        salesmenInputList.push(container);
        salesmenList.append(container);
    })
})

