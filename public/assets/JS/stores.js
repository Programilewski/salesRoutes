const allSalesmen = document.querySelectorAll("#searchSalesmanField a");
const inputSearchItems = document.querySelectorAll(".inputSearch");
const allSalesmenList = document.querySelector("#searchSalesmanField");
const salesmenInput = document.querySelector("#searchSalesman");
const popupFiltersIcon = document.querySelector("#popupFiltersIcon");
const popupFiltersContent = document.querySelector("#popupFiltersContent");



inputSearchItems.forEach((input)=>{
    input.addEventListener("input",(e)=>{

        const inputTableLinks = document.querySelectorAll(`#${input.id} ul li`);
        const inputTable = document.querySelector(`#${input.id} ul`);
        inputTableLinks.forEach((link)=>{
            if(link.textContent.toLowerCase().includes(e.target.value.toLowerCase()))
            {
                link.style.display = "block";
                inputTable.style.border = "1px solid gray";
            }
            else
            {
                link.style.display = "none";
                inputTable.style.border = "none";
                
            }
        })
    });
    const inputInner = document.querySelector(`#${input.id} input`);
    inputInner.addEventListener("focus",()=>{   
        const inputTableLinks = document.querySelectorAll(`#${input.id} ul li`);
        const inputTable = document.querySelector(`#${input.id} ul`);
        console.log(inputTable);
        inputTableLinks.forEach((link)=>{
            link.style.display = "block";
            inputTable.style.border = "1px solid gray";
        })
    })
    inputInner.addEventListener("click",()=>{
        const inputTableLinks = document.querySelectorAll(`#${input.id} ul li`);
        const inputTable = document.querySelector(`#${input.id} ul`);
        document.addEventListener("click",(event)=>{
        let isClickInside = input.contains(event.target);
        if(!isClickInside)
        {
            inputTableLinks.forEach((link)=>{
                inputTable.style.border = "none";
                link.style.display = "none";
            })
        }
    })  
  })
})

document.querySelector("#rows_per_page").addEventListener("change",()=>{
    document.querySelector("#rows_per_page_form").submit();
})