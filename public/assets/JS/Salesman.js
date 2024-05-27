
export class Salesman{
    constructor(car_id,code,color,date) {
        
        this.car_id = car_id;
        this.code = code;
        this.color = color;
        this.date = date;
    }
    fetchData(endpoint)
    {
        return new Promise((resolve, reject)=>{
            fetch(endpoint)
                .then(res=>res.json())
                .then((res)=>resolve(res));
        })
    }
    showStores()
    {
        const storesData = [];
        this.fetchData(`/api/stores?salesman_id=${this.code}`)
        .then((stores)=>{
            stores.forEach((store)=>{
                const storeIconOptionss = {
                    iconUrl:"/api/icon",
                    iconSize:[20,40]
                }
                const storeMarker = L.marker([store.latitude,store.longitude],{icon:L.icon(storeIconOptionss)}).addTo(map);
                storesData.push(storeMarker);
            })
            return storesData;
        })
    }
    getRoutes(date){
        return this.fetchData(`/api/routes?car_id=${this.car_id}&date=${date}`);
    }
    sortRoutes(routes){
        const ignoreArray = [];
        const result = [];  
        routes.forEach((route)=>{
            if(!ignoreArray.includes(route.latitude)){
                result.push(routes.filter(item=>item.latitude===route.latitude));
                ignoreArray.push(route.latitude);
            }
        })
        return result;
    }
    showRoute()
    {   this.getRoutes(this.date)
        .then((routes)=>{
            const coordinates = routes.reduce((arr,item)=>{
                arr.push([item.latitude,item.longitude]);
                return arr;
            },[])
            const polyline = L.polyline(coordinates,{color:"#000000"}).addTo(map);
            map.fitBounds(polyline.getBounds());
        })
    }
    getStops(routes,engineState,speedOnStop){
        const allStops = [];
        while(routes.some((route) =>  route.is_engine_ignited === engineState && route.speed === speedOnStop))
            {
                let firstOccurence = routes.find(route=>route.is_engine_ignited === engineState && route.speed === speedOnStop);
                let firstOccurenceIndex = routes.indexOf(firstOccurence);
                let firstOccurenceIndexNotMutated = routes.indexOf(firstOccurence);
                let chunkLength = 0;
                while(routes[firstOccurenceIndex]!== undefined && routes[firstOccurenceIndex].is_engine_ignited === engineState && routes[firstOccurenceIndex].speed === speedOnStop)
                    {
                        chunkLength++;
                        firstOccurenceIndex++;
                    }
                let chunk = routes.splice(firstOccurenceIndexNotMutated,chunkLength+1);
                allStops.push(chunk);
            }
            return allStops;
    }
    formatDate(unixTime){
        const date = new Date(unixTime*1000);
        const formattedHour = date.getHours() < 10 ? `0${date.getHours()}`: date.getHours();
        const formattedMinute = date.getMinutes() < 10 ? `0${date.getMinutes()}`: date.getMinutes();
        const formattedSecond = date.getSeconds() < 10 ? `0${date.getSeconds()}`: date.getSeconds();
        const dateFormatted = `${formattedHour}:${formattedMinute}:${formattedSecond}`;
        return dateFormatted;
    }
    mergeAndSortStops(offArray,onArray){
        const mergedArrays = offArray.concat(onArray);
        mergedArrays.sort((a,b)=>a[0].time - b[0].time);
        return mergedArrays;
    }
    showStops()
    {
        this.getRoutes(this.date)
        .then((routes)=>{
            console.log(routes);
            // THIS IS A CORRECT FORMULA, BUT ORIGINALLY THE SOLID TEAM DOES NOT INCLUDE THE STOPS BELOW 60 SECONDS.
            const onIgnitionStops = this.getStops([...routes],1,0);
            let offIgnitionStops = this.getStops([...routes],0,0);
            console.log(offIgnitionStops);
            console.log(onIgnitionStops);
            const stops = this.mergeAndSortStops(offIgnitionStops,onIgnitionStops);
            this.renderStops(stops);
        })
    }
    
    renderStops(stops){
        stops.forEach((stop,index)=>{
            console.log(stop[0], "<-- This is the stop")
            const stopIconOptions = {
                iconUrl: `/api/stopIcon?digit=${index+1}`,
                iconSize:[30,30]
            }
            const marker = L.marker([stop[0].latitude,stop[0].longitude],{icon:L.icon(stopIconOptions)}).addTo(map);
            const message = stop[0].is_engine_ignited === 1?"na włączonej stacyjce":"na wyłączonej stacyjce";
            const firstItemTime = stop[0].time;
            const lastItemTime = stop[stop.length-1].time;
            const timeDifference = lastItemTime - firstItemTime;
            const date = new Date(timeDifference*1000);
            const dateFormatted = date.toISOString();
            const firstItemDate = this.formatDate(firstItemTime);
            const lastItemDate = this.formatDate(lastItemTime);

            marker.bindPopup(`Postój nr: <b>${index+1}</b> ${message}<br> Czas postoju: ${dateFormatted.slice(11,19)}<br>Postój od: ${firstItemDate}<br>Postój do ${lastItemDate}<br>
            ${stop[0].latitude} ${stop[0].longitude}`);
        })
    }
}
 