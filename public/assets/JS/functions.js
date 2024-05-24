export function createElement(element,atributes = {},classes = []){
    const newElement = document.createElement(element);
    for(const [key,value] of Object.entries(atributes)){
        newElement.setAttribute(key,value);
    }
    classes.forEach((className)=>{
                newElement.classList.add(className);
            })
    return newElement;
}
export function createIcons(icons){
    const iconsContainer = createElement("li",{},["table__cell"]);
    for(const [key,value] of Object.entries(icons)){
        const icon = createElement("img",{src:value.src},[]);
        const iconLink = createElement("a",{href:value.endpoint},[])
        iconLink.append(icon);
        iconsContainer.append(iconLink);
        console.log(iconsContainer);
    }
    return iconsContainer;
}
export function createRow(rowData,idName)
{
    const list = createElement("ul",{},["table__row"]);
    for(const [key,value] of Object.entries(rowData))
        {
            const item = createElement("li",{},["table__cell"]);
            if(key==="color")
                {
                    item.innerHTML =`<input type='color' value='#${value}'>`;
                    item.addEventListener("click",(e)=>e.preventDefault());
                }
            else{
                item.innerText = value;
            }
            list.append(item);
        }
        return list;
}
