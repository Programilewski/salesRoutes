const menuToggler = document.querySelector("#menuToggler");
const mainNavigation = document.querySelector("#mainNavigation");
const mapNavigationToggle = document.querySelector("#mapNavigationToggle");
const mapNavigation = document.querySelector("#mapNavigation");
const mapNavigationToggleIcon  = document.querySelector("#mapNavigationToggle svg");

let toggle = true;
if(mapNavigationToggle)
{
    mapNavigationToggle.addEventListener("click",()=>{
        if(toggle)
        {
            window.innerWidth<960?mapNavigationToggleIcon.style.transform = `rotate(270deg)`:mapNavigationToggleIcon.style.transform = `rotate(180deg)`;
            mapNavigation.classList.add("mapNavigation--hidden");
            toggle = false;
        }
        else    
        {
            window.innerWidth<960?mapNavigationToggleIcon.style.transform = `rotate(90deg)`:mapNavigationToggleIcon.style.transform = `rotate(0deg)`;
            // mapNavigationToggleIcon.style.transform = `rotate(0deg)`;
            mapNavigation.classList.remove("mapNavigation--hidden");
            toggle = true;
        }
    })
}


menuToggler.addEventListener("click",()=>{
    mainNavigation.classList.toggle("mainNavigation--visible");
    // menuToggler.classList.toggle("menu__toggler--moved");
    menuToggler.classList.toggle("menu__toggler--open");
})

popupFiltersIcon.addEventListener("click",()=>{
    popupFiltersContent.classList.toggle("popup__content--hidden");
})
