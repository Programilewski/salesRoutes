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
let stopsListOnIgnition = [];
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
            const datePickerValue = new Date(datePickerInput.value);
            const timeValue = datePickerValue.getTime()/1000;
            // Fetch the stores
            fetch(`/api/stores?salesman_id=${e.target.getAttribute("aria-salesman_code")}`)
//            fetch("/api/stores")
            .then(res=>res.json())
            .then((res)=>{
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
                const filteredRoutesOnIgnition = res.reduce((array,item,index,originalArray)=>{
                    
                },[])
                console.log(res);
                if(res.length!==0)
                {
                    const zeroSpeedOnIgnitionFrames = res.filter((frame)=>{
                        return frame.speed === 0 && frame.is_engine_ignited === 1; 
                    })
                    console.log(zeroSpeedOnIgnitionFrames);
                    const zeroSpeedFrames = res.filter((frame)=>{
                        return frame.speed === 0 && frame.is_engine_ignited === 0;
                    })
                    const stops = zeroSpeedFrames.reduce((object,item)=>{
                        if(object[item.longitude] == null)
                        {
                            object[item.longitude]= [];
                        }
                        object[item.longitude].push(
                            {
                                coordinates:[item.latitude,item.longitude],
                                time:item.time
                        });
                        return object;
                    },{});
                    const onIgnitionStops = zeroSpeedOnIgnitionFrames.reduce((object,item)=>{
                        if(object[item.longitude] == null)
                        {
                            object[item.longitude]= [];
                        }
                        object[item.longitude].push(
                            {
                            coordinates:[item.latitude,item.longitude],
                            time:item.time
                            }
                        );
                        return object;
                    },{})
                    console.log(onIgnitionStops);
                        let stopNumber = 1;
                        for(const [key,value] of Object.entries(stops)){
                            const stopMarker = L.marker(value[0].coordinates,{
                                icon:stopIcon,
                                iconSize: [18,26]
                            }).addTo(map);
                            const startDate = new Date((value[0].time)*1000);
                            const endDate = new Date((value[value.length - 1].time)*1000);
                            stopMarker.bindPopup(`Przystanek nr: ${stopNumber}(na zgaszonym silniku) <br>
                            Od ${startDate.getHours()<10?"0":""}${startDate.getHours()}:${startDate.getMinutes()<10?"0":""}${startDate.getMinutes()}:${startDate.getSeconds()<10?"0":""}${startDate.getSeconds()} <br>    
                            Do ${endDate.getHours()<10?"0":""}${endDate.getHours()}:${endDate.getMinutes()<10?"0":""}${endDate.getMinutes()}:${endDate.getSeconds()<10?"0":""}${endDate.getSeconds()} 
                            `);
                            stopsList.push(stopMarker);
                            stopNumber++;
                        }
                        //
                        let stopNumberOnIgnition = 1;
                        for(const [key,value] of Object.entries(onIgnitionStops)){
                            const stopMarkerOnIgnition = L.marker(value[0].coordinates,{
                                icon:stopIcon,
                                iconSize: [18,26]
                            }).addTo(map);
                            const startDate = new Date((value[0].time)*1000);
                            const endDate = new Date((value[value.length - 1].time)*1000);
                            stopMarkerOnIgnition.bindPopup(`Przystanek nr: ${stopNumberOnIgnition} (na włączonym silniku) <br>
                            Od ${startDate.getHours()<10?"0":""}${startDate.getHours()}:${startDate.getMinutes()<10?"0":""}${startDate.getMinutes()}:${startDate.getSeconds()<10?"0":""}${startDate.getSeconds()} <br>
                            Do ${endDate.getHours()<10?"0":""}${endDate.getHours()}:${endDate.getMinutes()<10?"0":""}${endDate.getMinutes()}:${endDate.getSeconds()<10?"0":""}${endDate.getSeconds()} 
                            `);
                            stopsListOnIgnition.push(stopMarkerOnIgnition);
                            stopNumberOnIgnition++;
                        }
                        //
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


