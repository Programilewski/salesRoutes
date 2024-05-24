import {createElement,createIcons,createRow} from "./functions.js";

const salesmen_table = document.querySelector("#salesmen_table");

fetch("/api/salesmen")
.then(res=>res.json())
.then((res)=>{
    res.forEach((salesman)=>{
        const list = createRow(salesman,"salesman_id");
        const iconsContainer = createIcons({
                editicon:
                    {
                    src:"/assets/media/edit.svg",
                    endpoint:`/api/salesman?id=${salesman["salesman_id"]}`
                    },
                "deleteIcons":
                    {
                        src:"/assets/media/delete.svg",
                        endpoint:`/api/salesman?id=${salesman["salesman_id"]}`
                    }
            }
        );
        list.append(iconsContainer);
        salesmen_table.append(list);
    })
})

