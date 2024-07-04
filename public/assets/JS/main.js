const menuToggler = document.querySelector("#menuToggler");
const mainNavigation = document.querySelector("#mainNavigation");

menuToggler.addEventListener("click",()=>{
    mainNavigation.classList.toggle("mainNavigation--visible");
    menuToggler.classList.toggle("menu__toggler--moved");
})

popupFiltersIcon.addEventListener("click",()=>{
    popupFiltersContent.classList.toggle("popup__content--hidden");
})
