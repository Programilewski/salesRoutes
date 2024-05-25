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
                const storeMarker = L.marker([store.latitude,store.longitude]).addTo(map);
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
    showStops()
    {
        this.getRoutes(this.date)
        .then((routes)=>{
            console.log(routes);
            const filtered = routes.filter(route => route.speed === 0);
            console.log(filtered);
            routes.forEach((route,index)=>{
                if(route.is_engine_ignited === 1 && route.speed === 0)
                    {

                    }
                // if(route.is_engine_ignited === 0 && route.speed === 0)
                //     {

                //     }
            })
        })
    }
    // getStopsOnIgnition(){
    //     this.getRoutes(this.date)
    //         .then((routes)=>{
    //             const onIgnitionRoutes = routes.filter(route=>route.is_engine_ignited === 1 && route.speed === 0);
    //             const stops = this.sortRoutes(onIgnitionRoutes);
    //             this.renderStops(stops,"zapalony silnik",icon);
    //         })
    // }
    // getStopsOffIgnition(date,icon)
    // {
    //     this.getRoutes(date)
    //     .then((routes)=>{
    //         const offIgnitionRoutes = routes.filter(route=>route.is_engine_ignited === 0);
    //         const stops = this.sortRoutes(offIgnitionRoutes);
    //         this.renderStops(stops,"zgaszony silnik",icon);
    //     })
    // }
    renderStops(stops,engineState,icon){
        let stopsCounter = 1;
        stops.forEach((item)=>{
            const marker = L.marker([item[0].latitude,item[0].longitude],{icon:icon}).addTo(map);
            const timeDifference = item[item.length-1].time - item[0].time;
            const timeValue = new Date(timeDifference * 1000).toISOString().substring(11, 19);
            marker.bindPopup(`Przystanek nr (${engineState}): ${stopsCounter}<br> Czas postoju: ${timeValue}`);
            stopsCounter++;
        })

    }



}
