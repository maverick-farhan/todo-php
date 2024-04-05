let todo_to_check = document.querySelectorAll("#todo-check");
let checkbox = document.querySelectorAll("#check");
let submitBtn = document.querySelector("#todo-add");
let checkedColor = "#757575";
let normalColor = "#FF1744"
checkbox.forEach((check)=>{
        if(check.checked){
            check.parentElement.children[1].style.textDecoration = "line-through";
            check.parentElement.children[1].style.color = `${checkedColor}`;
            check.parentElement.children[1].style.cursor = `not-allowed`;
            // check.parentElement.children[1].disabled = `disabled`;//any truthy makes in true
            check.parentElement.children[1].disabled = true;
            // check.parentElement.children[1].readOnly = `readonly`;

        }
        if(!check.checked){
            check.parentElement.children[1].style.textDecoration = "none";
            check.parentElement.children[1].style.color = `${normalColor}`;
            // check.parentElement.children[1].readOnly = `readonly`;
            check.parentElement.children[1].style.cursor = `text`;
            check.parentElement.children[1].disabled = false;
        }
        check.addEventListener("change",(e)=>{
            
        if(e.target.checked){
            e.target.parentElement.children[1].style.textDecoration = "line-through";
            e.target.parentElement.children[1].style.color = `${checkedColor}`;
            // check.parentElement.children[1].readOnly = `readonly`;
            e.target.parentElement.children[1].style.cursor = `not-allowed`;
            e.target.parentElement.children[1].disabled = `disabled`;
    }
        if(!e.target.checked){
            e.target.parentElement.children[1].style.textDecoration = "none";
            e.target.parentElement.children[1].style.color = `${normalColor}`;
            // check.parentElement.children[1].readOnly = `readonly`;
            e.target.parentElement.children[1].style.cursor = `text`;
            e.target.parentElement.children[1].disabled = false;
        }
        })
    });

// submitBtn.addEventListener('click',(e)=>{
//     e.preventDefault();
// })
